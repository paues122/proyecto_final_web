<?php
require_once(__DIR__."/../models/privilege.php");
$app = new Privilege();
$app->checarRol('Administrador');
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once(__DIR__."/views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data['privilege'] = $_POST['privilege'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Privilegio dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
            $data = $app -> read();
            include_once(__DIR__."/views/privilege/index.php");
        }else{
            include_once(__DIR__."/views/privilege/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            $data['privilege'] = $_POST['privilege'];
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "Privilegio modificado correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue modificado";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
            $data = $app -> read();
            include_once(__DIR__."/views/privilege/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once(__DIR__."/views/privilege/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Privilegio eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once(__DIR__."/views/alert.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue eliminado";
                $alerta['tipo'] = "danger";
                include_once(__DIR__."/views/alert.php");
            }
        }
        $data = $app -> read();
        include_once(__DIR__."/views/privilege/index.php");
        break;
        
    case 'read':
    default:
        $data = $app -> read();
        include_once(__DIR__."/views/privilege/index.php");
        break;
}
include_once(__DIR__."/views/footer.php");
?>