<?php
require_once __DIR__.'/models/sistema.php';
$sistema = new Sistema();
$logout = $sistema->logout();
var_dump($logout);
?>