<?php

require_once 'models/perfil.php';

$perfil = new Perfil();
$id_usuario = $_SESSION['id_usuario'];
$mensaje = '';

// Si el formulario fue enviado, procesamos los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actualizados = $perfil->update($id_usuario, $_POST, $_FILES);
    if ($actualizados) {
        $mensaje = '<div class="alert alert-success mt-3">Perfil actualizado correctamente.</div>';
    } else {
        $mensaje = '<div class="alert alert-warning mt-3">No se realizaron cambios o hubo un error.</div>';
    }
}

// Leemos los datos actuales del usuario para mostrar en el formulario
$usuario = $perfil->readOne($id_usuario);
include 'includes/header.php';
?>

<main class="container card mt-4">
  <h1>Aprobación Crediticia</h1>
  <p>Completa tus datos y sube tus documentos para agilizar el proceso.</p>
  
  <?php echo $mensaje; // Mostramos el mensaje de éxito o error ?>

  <form method="POST" action="perfil.php" enctype="multipart/form-data">
    <section class="edit-section">
      <h2>Edición de datos del usuario</h2>

      <div class="form-group">
        <label for="name">Nombre Completo</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre_completo'] ?? ''); ?>">
      </div>

      <div class="form-group">
        <label for="age">Edad</label>
        <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($usuario['edad'] ?? ''); ?>" min="18">
      </div>

      <div class="form-group">
        <label for="monthlyIncome">Ingresos mensuales</label>
        <input type="number" id="monthlyIncome" name="monthlyIncome" class="form-control" value="<?php echo htmlspecialchars($usuario['ingresos_mensuales'] ?? ''); ?>" step="0.01">
      </div>

      <div class="form-group">
        <label for="creditBureau">Buró de crédito</label>
        <select id="creditBureau" name="creditBureau" class="form-control" required>
            <option value="good" <?php echo ($usuario['buro_credito'] == 'good') ? 'selected' : ''; ?>>Bien</option>
            <option value="regular" <?php echo ($usuario['buro_credito'] == 'regular') ? 'selected' : ''; ?>>Regular</option>
            <option value="bad" <?php echo ($usuario['buro_credito'] == 'bad') ? 'selected' : ''; ?>>Mal</option>
        </select>
      </div>

      <div class="form-group">
          <label for="vehicleInterest">Vehículo de interés</label>
          <input type="text" id="vehicleInterest" name="vehicleInterest" class="form-control" value="<?php echo htmlspecialchars($usuario['vehiculo_interes'] ?? ''); ?>">
      </div>

      <hr>
      <h2>Documentos</h2>

      <div class="form-group">
          <label for="ine">INE o Identificación Oficial</label>
          <input type="file" id="ine" name="ine" class="form-control">
          <?php if (!empty($usuario['ine_documento'])): ?>
              <a href="uploads/<?php echo $usuario['ine_documento']; ?>" target="_blank">Ver INE actual</a>
              <input type="hidden" name="ine_actual" value="<?php echo $usuario['ine_documento']; ?>">
          <?php endif; ?>
      </div>

      <div class="form-group">
          <label for="comprobante_domicilio">Comprobante de Domicilio</label>
          <input type="file" id="comprobante_domicilio" name="comprobante_domicilio" class="form-control">
          <?php if (!empty($usuario['domicilio_documento'])): ?>
              <a href="uploads/<?php echo $usuario['domicilio_documento']; ?>" target="_blank">Ver comprobante actual</a>
              <input type="hidden" name="domicilio_actual" value="<?php echo $usuario['domicilio_documento']; ?>">
          <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </section>
  </form>
</main>

<?php include 'includes/footer.php'; ?>