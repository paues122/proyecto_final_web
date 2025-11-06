<?php 
include_once("../models/sistema.php");
$app = new Sistema();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
switch ($action) {
    case 'cambio':
        $data = $_POST;
        $cambio = $app->cambiarContraseña($data);
        if($cambio){
            $alerta['mesnaje'] = "se ha enviado un correo para cambiar su contraseña";
            $alerta['tipo'] = "success";
            include_once("./views/alert.php");
            require_once('./views/login/login.php');
        } else {
            $alerta['mensaje'] = "Error al procesar la solicitud, intente de nuevo";
            $alerta['tipo'] = "danger";
            include_once("./views/alert.php");
            include_once("./views/login/recuperar.php");
        }
        break;
    case 'recuperar':
        require_once("./views/login/recuperar.php");
        break;
    case 'token':
        $peticion = $_GET;
        require_once("./views/login/token.php");
        break;
    case 'reestablecer':
        $data = $_POST;
        $reestablecer = $app->reestablecerContraseña($data);
        if($reestablecer){
            $alerta['mensaje'] = "su contraseña ha sido cambiada correctamente";
            $alerta['tipo'] = "succes";
        }
        break;
    case 'logout':
        $app->logout();
        $alerta['mensaje'] = "Usted ha salido correctamente del sistema";
        $alerta['tipo'] = "success";
        include_once("./views/alert.php");
        include_once("./views/login/login.php");
        break;
    case 'login':
        if (isset($_POST['enviar'])) {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $login = $app->login($correo, $contrasena);
            if ($login) {
                header("Location: index.php");
            } else {
                $alerta['mensaje'] = "Correo o contraseña incorrecta";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
                include_once("./views/login/login.php");
            }
        } else {
            include_once("./views/login/login.php");
        }
    
        break;
    case 'recuperar':
        require_once("./views/login/recuperar.php");
        break;
    default:
        include_once("./views/login/login.php");
        break;
    }
?>
