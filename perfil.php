<?php

require_once 'models/perfilm.php';

$perfil = new Perfil();

$id_usuario = $_SESSION['id_usuario']; 
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $actualizados = $perfil->update($id_usuario, $_POST, $_FILES);
    if ($actualizados) {
        $mensaje = '<div class="alert alert-success mt-3">Perfil actualizado correctamente.</div>';
    } else {
        $mensaje = '<div class="alert alert-warning mt-3">No se realizaron cambios o hubo un error.</div>';
    }
}

$usuario = $perfil->readOne($id_usuario);

include 'includes/header.php';
?>

<main class="container card mt-4">
  <h1>Aprobación Crediticia</h1>
  <p>Completa tus datos y sube tus documentos para agilizar el proceso.</p>
  
  <?php echo $mensaje;  ?>
  <form method="POST" action="perfil.php" enctype="multipart/form-data">
    <section class="edit-section">
      <h2>Edición de datos del usuario</h2>

      <div class="form-group">
        <label for="name">Nombre Completo</label>
   
        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre_completo'] ?? ''); ?>">
      </div>
      
      <div class="form-group">
          <label for="email">Correo Electrónico</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['correo'] ?? ''); ?>" readonly>
          <small>El correo electrónico no se puede modificar.</small>
      </div>

      <div class="form-group">
          <label for="age">Edad</label>
          <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($usuario['edad'] ?? ''); ?>">
      </div>

      <div class="form-group">
          <label for="monthlyIncome">Ingresos Mensuales</label>
          <input type="number" step="0.01" id="monthlyIncome" name="monthlyIncome" class="form-control" value="<?php echo htmlspecialchars($usuario['ingresos_mensuales'] ?? ''); ?>">
      </div>
      
      <div class="form-group">
          <label for="creditBureau">Estatus en Buró de Crédito</label>
          <select id="creditBureau" name="creditBureau" class="form-control">
              <option value="">Seleccionar...</option>
              <option value="Bueno" <?php echo (($usuario['buro_credito'] ?? '') == 'Bueno') ? 'selected' : ''; ?>>Bueno</option>
              <option value="Regular" <?php echo (($usuario['buro_credito'] ?? '') == 'Regular') ? 'selected' : ''; ?>>Regular</option>
              <option value="Malo" <?php echo (($usuario['buro_credito'] ?? '') == 'Malo') ? 'selected' : ''; ?>>Malo</option>
              <option value="Sin historial" <?php echo (($usuario['buro_credito'] ?? '') == 'Sin historial') ? 'selected' : ''; ?>>Sin historial</option>
          </select>
      </div>

      <div class="form-group">
          <label for="vehicleInterest">Vehículo de interés</label>
          <input type="text" id="vehicleInterest" name="vehicleInterest" class="form-control" value="<?php echo htmlspecialchars($usuario['vehiculo_interes'] ?? ''); ?>">
      </div>

      <hr>
      <h2>Documentos</h2>
      <p>Sube tus documentos en formato PDF o imagen (JPG, PNG).</p>

      <div class="form-group">
          <label for="ine">INE o Identificación Oficial</label>
          <input type="file" id="ine" name="ine" class="form-control">
          <!-- Mostramos un enlace al archivo actual si existe -->
          <?php if (!empty($usuario['ine_documento'])): ?>
              <a href="<?php echo htmlspecialchars($usuario['ine_documento']); ?>" target="_blank">Ver INE actual</a>
              <!-- Campo oculto para mantener el archivo actual si no se sube uno nuevo -->
              <input type="hidden" name="ine_actual" value="<?php echo htmlspecialchars($usuario['ine_documento']); ?>">
          <?php endif; ?>
      </div>

      <div class="form-group">
          <label for="comprobante_domicilio">Comprobante de Domicilio</label>
          <input type="file" id="comprobante_domicilio" name="comprobante_domicilio" class="form-control">
          <?php if (!empty($usuario['domicilio_documento'])): ?>
              <a href="<?php echo htmlspecialchars($usuario['domicilio_documento']); ?>" target="_blank">Ver comprobante actual</a>
              <input type="hidden" name="domicilio_actual" value="<?php echo htmlspecialchars($usuario['domicilio_documento']); ?>">
          <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </section>
  </form>
</main>

<?php include 'includes/footer.php'; ?>

