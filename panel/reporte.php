<?php 
require_once __DIR__.'/../models/sistema.php';
require_once __DIR__.'/../models/reporte.php';
require_once __DIR__.'/../models/institucion.php';
require_once __DIR__.'/../vendor/vendor/autoload.php';
$app = new Reporte();
ob_start();
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'read';
switch($accion){
    case 'institucionesInvestigadores':
        $app->checarRol('Administrador');
        $app->institucionesInvestigadores();
        break;
    case 'institucionesExcel':
        $app->checarRol('Administrador');
        $fecha_actual = date("d-m-Y");
        $numero_aleatorio = rand(1000, 9999);
        $app->institucionesExcel('Reporte_Instituciones_'.$fecha_actual.'_'.$numero_aleatorio.'.xls');
        break;
    case 'reporteQR':
        $app->checarRol('Administrador');
        $app->reporteQR();
        break;
    default:
        echo "Acción no válida";
        break;
}
?>