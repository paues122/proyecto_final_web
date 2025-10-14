<?php
require_once "sistema.php";

class Inventario extends Sistema{

    /**
     * Lee todos los vehículos del inventario.
     */
    public function read() {
        $this->connect();
        $sql = "SELECT * FROM inventario ORDER BY marca, nombre";
        $stmt = $this->_DB->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Crea un nuevo vehículo en el inventario.
     * @param array $data Los datos del vehículo a crear.
     */
    public function create($data){
        $this->connect();
        $sql = "INSERT INTO inventario(nombre, modelo, marca, anio, precio, mensualidad, enganche) 
                VALUES (:nombre, :modelo, :marca, :anio, :precio, :mensualidad, :enganche)";
        
        $stmt = $this->_DB->prepare($sql);
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':modelo', $data['modelo'], PDO::PARAM_STR);
        $stmt->bindParam(':marca', $data['marca'], PDO::PARAM_STR);
        $stmt->bindParam(':anio', $data['anio'], PDO::PARAM_INT);
        $stmt->bindParam(':precio', $data['precio']);
        $stmt->bindParam(':mensualidad', $data['mensualidad']);
        $stmt->bindParam(':enganche', $data['enganche']);
        
        $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * Elimina un vehículo del inventario por su ID.
     * @param int $id_vehiculo El ID del vehículo a eliminar.
     */
    public function delete($id_vehiculo){
        if (!is_numeric($id_vehiculo)) {
            return 0;
        }
        $this->connect();
        $sql = "DELETE FROM inventario WHERE id_vehiculo = :id_vehiculo";
        $stmt = $this->_DB->prepare($sql);
        $stmt->bindParam(':id_vehiculo', $id_vehiculo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    // Aquí podrías agregar las funciones readOne($id) y update($data, $id)
    // siguiendo la misma lógica que en tu ejemplo de "Tratamiento".
}
?>