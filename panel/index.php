<?php 
include_once(__DIR__."/../models/sistema.php");
include_once(__DIR__."/../models/institucion.php");
$app = new Sistema();
$institucion = new Institucion();
$app->checarRol('Index');
include_once("./views/header.php");
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
switch ($action) {
    default:
        $datosGraficas = $institucion -> reporteInstitucionesInvestigadores();
        include_once(__DIR__."/views/index/index.php");
        break;
}
include_once(__DIR__."/views/footer.php");
?>