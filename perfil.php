
<?php include 'includes/header.php'; ?>

<main class="container card">
  <h1>Aprobación Crediticia</h1>
  <section class="edit-section">
    <h2>Edición de datos del usuario</h2>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" id="name" placeholder="Tu nombre" value="Juan Pérez">
    </div>
    <div class="form-group">
      <label for="age">Edad</label>
      <input type="number" id="age" placeholder="Tu edad" value="30" min="18">
    </div>
    <div class="form-group">
      <label for="monthlyIncome">Ingresos mensuales</label>
      <input type="number" id="monthlyIncome" placeholder="Monto en pesos" value="20000" step="0.01">
    </div>
    <div class="form-group">
      <label for="creditBureau">Buró de crédito</label>
      <select id="creditBureau" required>
        <option value="">Selecciona una opción</option>
        <option value="good">Bien</option>
        <option value="regular">Regular</option>
        <option value="bad">Mal</option>
      </select>
    </div>
    <div class="form-group">
        <label for="vehicleInterest">Vehículo de interés</label>
        <input type="text" id="vehicleInterest" placeholder="Ej. Nissan Versa">
    </div>
    <button class="btn" type="button">Guardar Cambios</button>
  </section>
</main>

<?php include 'includes/footer.php'; ?>