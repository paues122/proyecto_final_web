<?php

include_once("models/sistemam.php");
$app = new Sistema();
$app->isAuth(); 


include 'includes/header.php'; 
?>

<section class="quotation-card card">
  <h1>Déjanos tus datos</h1>
  <h5>Te contactamos para apoyarte en tu proceso de compra</h5>

  <div class="form-group">
    <label for="vehicleBrandModel">Auto marca y modelo</label>
    <input type="text" id="vehicleBrandModel" placeholder="Ej. Toyota Corolla" required>
  </div>
  <div class="form-group">
    <label for="creditTerm">Plazo del crédito</label>
    <select id="creditTerm" required>
      <option value="">Selecciona una opción</option>
      <option value="54">54 meses</option>
      <option value="60">60 meses</option>
    </select>
  </div>
  <div class="form-group">
    <label for="averageEnrollment">Inscripción promedio</label>
    <input type="number" id="averageEnrollment" placeholder="Monto en pesos" step="0.01" required>
  </div>
  <div class="form-group">
    <label for="downPayment">Enganche disponible</label>
    <input type="number" id="downPayment" placeholder="Monto en pesos" step="0.01" required>
  </div>

  <button class="btn" type="button">Enviar</button>
</section>

<?php include 'includes/footer.php'; ?>
