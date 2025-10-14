<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AutoAgencia GAM</title>
  
  <link rel="stylesheet" href="css/style.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar">
  <a class="brand" href="index.php">AutoAgencia</a>
  <ul>
    <li><a href="index.php" data-route="inicio">Inicio</a></li>
    <li><a href="inventario.php" data-route="inventario">Inventario</a></li>
    <li><a href="cotizador.php" data-route="cotizador">Cotizador</a></li>
    <li><a href="perfil.php" data-route="perfil">Perfil</a></li>
    <li><a href="login.php" data-route="login">Login</a></li>
  </ul>
</nav>
<script>
  (function(){
    var path = location.pathname.split('/').pop() || 'index.php';
    var links = document.querySelectorAll('.navbar a[href]');
    for (var i=0;i<links.length;i++){
      if(links[i].getAttribute('href') === path){ links[i].classList.add('active'); }
    }
  })();
</script>