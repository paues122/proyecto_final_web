<?php
class Sistema{
    // --- DATOS DE CONEXIÓN PARA DOCKER ---
    private $_DSN = "pgsql:host=postgres;port=5432;dbname=database";
    private $_USER = "user";
    private $_PASSWORD = "password"; 
    protected $_DB = null;

    public function connect(){
        try {
            if ($this->_DB === null) {
                $this->_DB = new PDO($this->_DSN, $this->_USER, $this->_PASSWORD);
                $this->_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            die("Error de PDO: " . $e->getMessage());
        }
    }

    public function validarLogin($username, $password){
        $this->connect();

        $sql = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $this->_DB->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // --- ¡LA CORRECCIÓN ESTÁ AQUÍ! ---
        // Verificamos que el usuario exista antes de intentar hacer nada más
        if ($usuario) {
            // 1. Limpiamos la contraseña que viene del formulario
            $passwordLimpia = trim($password);
            // 2. Limpiamos el hash que viene de la base de datos
            $hashLimpio = trim($usuario['password']);

            // 3. Comparamos los valores limpios
            if (password_verify($passwordLimpia, $hashLimpio)) {
                return $usuario; // ¡Éxito!
            }
        }

        // Si el usuario no existe o la contraseña no coincide, retorna falso
        return false;
    }
}
?>