<?php 
include_once(__DIR__."/../models/sistema.php");
$app = new Sistema();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
switch ($action) {
    case 'logout':
        $app->logout();
        $alerta['mensaje'] = "Usted ha salido correctamente del sistema";
        $alerta['tipo'] = "success";
        include_once(__DIR__."/views/alert.php");
        include_once(__DIR__."/views/login/login.php");
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
                include_once(__DIR__."/views/alert.php");
                include_once(__DIR__."/views/login/login.php");
            }
        } else {
            include_once(__DIR__."/views/login/login.php");
        }
        break;
    case 'recuperar':
        require_once(__DIR__."/views/login/recuperar.php");
        break;  
    case 'cambio':
        $data =$_POST;
        $cambio = $app->cambiarContrasena($data);
        if ($cambio){
            $alerta['mensaje'] = "Se ha enviado un correo con su nueva contraseña";
            $alerta['tipo'] = "success";
            include_once(__DIR__."/views/alert.php");
            include_once(__DIR__."/views/login/login.php");
        }else {
            $alerta['mensaje'] = "No se encontró una cuenta con ese correo";
            $alerta['tipo'] = "danger";
            include_once(__DIR__."/views/alert.php");
            include_once(__DIR__."/views/login/recuperar.php");
        }  
        break;
    case 'token':
        $peticion = $_GET;
        require_once(__DIR__."/views/login/token.php");
        break;
    case 'restablecer':
        $data = $_POST;
        if ($data['contrasena'] !== $data['confirmar_contrasena']) {
            $alerta['mensaje'] = "Las contraseñas no coinciden";
            $alerta['tipo'] = "danger";
            include_once(__DIR__."/views/alert.php");
            $token = $data['token'];
            $correo = $data['correo'];  
            include_once(__DIR__."/views/login/token.php");
            break;
        }
        $restablecer = $app->restablecerContrasena($data);
        if ($restablecer){
            $alerta['mensaje'] = "Su contraseña ha sido restablecida correctamente";
            $alerta['tipo'] = "success";
            include_once(__DIR__."/views/alert.php");
            include_once(__DIR__."/views/login/login.php");
        } else {
            $alerta['mensaje'] = "Error al restablecer la contraseña. Verifique el token y vuelva a intentarlo.";
            $alerta['tipo'] = "danger";
            include_once(__DIR__."/views/alert.php");
            include_once(__DIR__."/views/login/token.php");
        }
        break;
    default:
        include_once(__DIR__."/views/login/login.php");
        break;
}
?>