<?php include 'includes/header.php'; ?>

<section class="login-card card">
  <h1>Bienvenido a GAM multimarca</h1>
  <h3>Inicia sesión como cliente</h3>

  <?php
    // Este pequeño bloque PHP mostrará un mensaje de error si la validación falla
    if (isset($_GET['error'])) {
        $error_msg = '';
        if ($_GET['error'] == 'datos_incorrectos') {
            $error_msg = 'Usuario o contraseña incorrectos.';
        } elseif ($_GET['error'] == 'faltan_datos') {
            $error_msg = 'Por favor, llena todos los campos.';
        }
        echo '<p style="color:var(--brand); text-align:center; font-weight:600;">' . $error_msg . '</p>';
    }
  ?>

  <form action="views/validar.php" method="POST">
    <div class="role-buttons">
      <div class="role-btn active">Cliente</div>
    </div>
    <div class="form-group">
      <input type="text" name="username" placeholder="Nombre de usuario" required>
    </div>
    <div class="form-group">
      <input type="password" name="password" placeholder="Contraseña" required>
    </div>
    <button type="submit" class="btn">Iniciar Sesión</button>
  </form>
</section>

<script>
  (function(){
    var btns = document.querySelectorAll('.role-btn');
    for (var i=0;i<btns.length;i++){
      btns[i].addEventListener('click', function(ev){
        for (var j=0;j<btns.length;j++){ btns[j].classList.remove('active'); }
        ev.currentTarget.classList.add('active');
      });
    }
  })();
</script>

<?php include 'includes/footer.php'; ?>