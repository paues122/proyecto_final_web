<?php
require_once 'models/sistema.php';
$sistema = new Sistema();
$logout = $sistema->logout();
var_dump($logout);
?>