<?php
require_once(__DIR__."/../models/usuario.php");
$app = new Usuario();
$app->checarRol('Administrador');
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once(__DIR__."/views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data['correo'] = $_POST['correo'];
            $data['password'] = $_POST['password'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Usuario dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
            $data = $app -> read();
            include_once(__DIR__."/views/usuario/index.php");
        }else{
            include_once(__DIR__."/views/usuario/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            $data['correo'] = $_POST['correo'];
            $data['password'] = $_POST['password'];
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "Usuario modificado correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El ususario no fue modificado";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
            $data = $app -> read();
            include_once(__DIR__."/views/usuario/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once(__DIR__."/views/usuario/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Usuario eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El usuario no eliminado";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
        }
        $data = $app -> read();
        include_once(__DIR__."/views/usuario/index.php");
        break;
        
    case 'readUserRole':
        $id_usuario = $_GET['id'];
        $user_role = $app -> readUserRole($id_usuario);
        $data = $app -> readRole();
        include_once(__DIR__."/views/usuario/roles.php");
        break;

    case 'insertRole':  
        if (isset($_POST['enviar'])) {
            $data['id_usuario'] = $_GET['id_usuario'];
            $id_usuario = $data['id_usuario'];
            $data['id_role'] = $_GET['id_role'];
            $row = $app -> insertRole($data);
            if ($row){
                $alerta['mensaje'] = "Rol asignado correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El rol no fue asignado";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
            $user_role = $app -> readUserRole($data['id_usuario']);
            $data = $app -> readRole();
            include_once(__DIR__."/views/usuario/roles.php");
        }else{
            include_once(__DIR__."/views/usuario/index.php");
        }
        break;

    case 'deleteRole':
        if (isset($_POST['enviar'])) {
            $data['id_usuario'] = $_GET['id_usuario'];
            $id_usuario = $data['id_usuario'];
            $data['id_role'] = $_GET['id_role'];
            $row = $app -> deleteRole($data);
            if ($row){
                $alerta['mensaje'] = "Rol quitado correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El rol no fue quitado";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
            $user_role = $app -> readUserRole($data['id_usuario']);
            $data = $app -> readRole();
            include_once(__DIR__."/views/usuario/roles.php");
        }else{
            include_once(__DIR__."/views/usuario/index.php");
        }
        break;

    case 'read':
    default:
        $data = $app -> read();
        include_once(__DIR__."/views/usuario/index.php");
        break;
}
include_once(__DIR__."/views/footer.php");
?>