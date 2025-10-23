<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Sistema{

    private $_DSN = "pgsql:host=postgres;port=5432;dbname=database";
    private $_USER = "user";
    private $_PASSWORD = "password"; 
    protected $_DB = null;

    public function __construct() {
        $this->connect(); 
    }


    public function connect(){
        try {
            if ($this->_DB === null) {
                $this->_DB = new PDO($this->_DSN, $this->_USER, $this->_PASSWORD);
                $this->_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
         
            echo "<h1>¡ERROR DE CONEXIÓN!</h1>";
            echo "<pre>";
            echo "No me pude conectar a la base de datos. Revisa esto:\n";
            echo "DSN:      " . htmlspecialchars($this->_DSN) . "\n";
            echo "Usuario:  " . htmlspecialchars($this->_USER) . "\n";
            echo "Password: " . htmlspecialchars($this->_PASSWORD) . "\n";
            echo "Error de PDO: " . $e->getMessage();
            echo "</pre>";
            exit;
        }
    }

    public function login($correo, $password){
     
        try {
          
            $sql = "SELECT * FROM usuarios WHERE correo = :correo"; 
            $stmt = $this->_DB->prepare($sql);
            $stmt->bindParam(':correo', $correo); 
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        
            if ($usuario) {
                $passwordLimpia = trim($password);
                $hashLimpio = trim($usuario['password']); 

            
                if (password_verify($passwordLimpia, $hashLimpio)) { 
                
                    $_SESSION['id_usuario'] = $usuario['id_usuario']; 
                    $_SESSION['username'] = $usuario['correo']; 
                    $_SESSION['rol'] = $usuario['rol']; 
                    $_SESSION['validado'] = true;
                    return true;
                }
            }
            return false;

        } catch (PDOException $e) {
            error_log("Error en login: " . $e->getMessage());
            return false;
        }
    }

    public function isAuth(){ 
        if(isset($_SESSION['validado'])){
            if(!$_SESSION['validado']){
              
                $this->logout();
                return false;
            }
            return true;
        }
        return false;
    }

    public function validarRol($rol_requerido){
        if($this->isAuth()){ 
            if(isset($_SESSION['rol']) && $_SESSION['rol'] == $rol_requerido){
                return true;
            }
        
            header("Location: index.php");
            exit;
        }
         
        header("Location: login.php");
        exit;
    }

    public function logout(){
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}

