<?php
// ¡CLAVE! Primero nos unimos a la sesión para poder revisarla.
session_start();

// Ahora sí, revisamos si el permiso existe.
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}
?>