<?php
require_once 'config.php';

if (!isset($_SESSION['id_usuario'])) {
  
    header('Location: ' . BASE_URL . 'login.php');
    exit;
}
?>