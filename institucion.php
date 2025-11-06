<?php
require_once("./models/institucion.php");
include_once("views/header.php");
$app = new Institucion;
$instituciones=$app->read();
include_once("./views/institucion/index.php");
    
?>

<?php
/*
//Mysql//
/*
    $pdo = new PDO("mysql:host=mariadb;dbname=database", "user", "password");
    $sth = $pdo->prepare("SELECT * FROM institucion");
    $sth->execute();
    $instituciones = $sth->fetchAll();
  
//PostgresQl//
    $pdo = new PDO("pgsql:host=postgres;port=5432;dbname=database", "user", "password");
    $sth = $pdo->prepare("SELECT * FROM institucion");
    $sth->execute();
    print "Fetch all of the remaining rows in the result set:\n";
    $result = $sth->fetchAll();
    print_r($result);
    */
    include_once("./views/footer.php");
?>