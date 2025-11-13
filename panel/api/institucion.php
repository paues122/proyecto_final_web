<?php
header('Content-Type: application/json');
require_once(__DIR__."/../../models/institucion.php");
$app = new Institucion();
$action = $_SERVER['REQUEST_METHOD'];
#$app->checarRol('Administrador');
$data = array();
$id = isset($_GET['id'] ) ? $_GET['id'] : null;
switch ($action) {
    case 'POST':
        $data= $_POST;
        if (!is_null($id)){
            $row = $app -> update($data, $id);
            $data['mensaje'] = $row ? "Institución modificada correctamente" : "La institución no fue modificada";
        }else {
            $row = $app -> create($data);
            $data['mensaje'] = $row ? "Institución creada correctamente" : "La institución no fue creada";
        }
        break;
    case 'DELETE':
        if (!is_null($id)) {
            $row = $app -> delete($id);
            if ($row){
                $data['mensaje'] = "Institución eliminada correctamente";
            }else{
                $data['mensaje'] = "La institución no fue eliminada";
            }
        }else {
            $data['mensaje'] = "ID no proporcionado para eliminar";
        }
    break;
    case 'GET':
    default:
        if (is_null($id)) {
            $data = $app -> read();
        }else{
            $data = $app -> readOne($id);
        }
        break;
}
print(json_encode($data, JSON_PRETTY_PRINT));
?>