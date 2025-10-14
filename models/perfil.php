<?php
require_once "sistema.php";

class Perfil extends Sistema {

    /**
     * Lee todos los datos de un usuario específico por su ID.
     */
    public function readOne($id_usuario) {
        $this->connect();
        $sql = "SELECT * FROM usuarios WHERE id = :id_usuario";
        $stmt = $this->_DB->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualiza los datos del perfil de un usuario, incluyendo archivos.
     */
    public function update($id_usuario, $data, $files) {
        $this->connect();

        // 1. Manejar la subida de la INE
        $ruta_ine = $this->uploadFile($files['ine'], $id_usuario, 'ine');
        // Si no se subió un nuevo archivo, mantenemos el antiguo
        if ($ruta_ine === null) {
            $ruta_ine = $data['ine_actual'];
        }

        // 2. Manejar la subida del Comprobante de Domicilio
        $ruta_domicilio = $this->uploadFile($files['comprobante_domicilio'], $id_usuario, 'domicilio');
        if ($ruta_domicilio === null) {
            $ruta_domicilio = $data['domicilio_actual'];
        }

        // 3. Actualizar la base de datos
        $sql = "UPDATE usuarios SET 
                    nombre_completo = :nombre_completo,
                    edad = :edad,
                    ingresos_mensuales = :ingresos_mensuales,
                    buro_credito = :buro_credito,
                    vehiculo_interes = :vehiculo_interes,
                    ine_documento = :ine_documento,
                    domicilio_documento = :domicilio_documento
                WHERE id = :id_usuario";
        
        $stmt = $this->_DB->prepare($sql);
        $stmt->bindParam(':nombre_completo', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':edad', $data['age'], PDO::PARAM_INT);
        $stmt->bindParam(':ingresos_mensuales', $data['monthlyIncome']);
        $stmt->bindParam(':buro_credito', $data['creditBureau'], PDO::PARAM_STR);
        $stmt->bindParam(':vehiculo_interes', $data['vehicleInterest'], PDO::PARAM_STR);
        $stmt->bindParam(':ine_documento', $ruta_ine, PDO::PARAM_STR);
        $stmt->bindParam(':domicilio_documento', $ruta_domicilio, PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * Función privada para manejar la subida de un archivo.
     */
    private function uploadFile($file, $id_usuario, $prefix) {
        // Verificar si se subió un archivo y no hay errores
        if (isset($file['error']) && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $fileName = uniqid($prefix . '_' . $id_usuario . '_') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                return $fileName; // Retorna solo el nombre del archivo
            }
        }
        return null; // No se subió archivo o hubo un error
    }
}
?>