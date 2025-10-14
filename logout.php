<?php
// 1. Nos unimos a la sesión que ya está iniciada.
session_start();

// 2. Destruimos todas las variables de la sesión (como $_SESSION['id_usuario']).
session_unset();

// 3. Destruimos la sesión por completo.
session_destroy();

// 4. Redirigimos al usuario a la página de login.
header('Location: login.php');
exit; // Aseguramos que el script se detenga aquí.
?>