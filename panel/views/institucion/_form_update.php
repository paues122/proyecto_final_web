<h1>Modificar Institución</h1>
<form method="POST" enctype="multipart/form-data" action="institucion.php?action=update&id=<?php echo $id; ?>">
    <div class="text-center">
        <img src="../images/institucion/<?php echo $data['logotipo'];?>" width="75" height="75" class="rounded-circle" alt="logo">
    </div>
    <div class="mb-3">
        <label for="Institución" class="form-label">Nombre de la Institución</label>
        <input type="text" class="form-control" id="institucion" name="institucion" value="<?php echo isset($data['institucion']) ? $data['institucion'] : ''; ?>" placeholder="TecNM" required>
    </div>
    <div class="mb-3">
        <label for="Logotipo" class="form-label">Logotipo</label>
        <input type="file" class="form-control" id="logotipo" name="logotipo">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>