<?php
// ¡Siempre inicia la sesión al principio de los archivos que la usarán!
session_start();

// Incluimos nuestro modelo que contiene la lógica de la base de datos
require_once('../models/sistema.php');

// Verificamos que los datos se envíen por el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    // Comprobamos que ambos campos tengan datos
    if (empty($username) || empty($password)) {
        header("Location: ../login.php?error=faltan_datos");
        exit;
    }

    // Creamos una nueva instancia de nuestra clase Sistema
    $sistema = new Sistema();
    $usuarioValido = $sistema->validarLogin($username, $password);

    if ($usuarioValido) {
        // Si el login es exitoso:
        // 1. Guardamos la información del usuario en una sesión.
        $_SESSION['id_usuario'] = $usuarioValido['id'];
        $_SESSION['username'] = $usuarioValido['username'];

        // 2. Redirigimos al usuario a su página de perfil.
        header("Location: ../perfil.php");
        exit;
    } else {
        // Si los datos son incorrectos, lo regresamos al login con un mensaje de error.
        header("Location: ../login.php?error=datos_incorrectos");
        exit;
    }

} else {
    // Si alguien intenta acceder a este archivo directamente, lo mandamos al inicio.
    header("Location: ../index.php");
    exit;
}
?>