<h1>Modificar Investigador</h1>
<form method="POST" enctype="multipart/form-data" action="investigador.php?action=update&id=<?php echo $id; ?>">
    <div class="text-center">
        <img src="../images/investigadores/<?php echo $data['fotografia'];?>" width="75" height="75" class="rounded-circle" alt="logo">
    </div>
    <div class="mb-3">
        <label for="Primer_apellido" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo isset($data['primer_apellido']) ? $data['primer_apellido'] : ''; ?>" placeholder="Primer apellido" required>
    </div>
    <div class="mb-3">
        <label for="Segundo_apellido" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?php echo isset($data['segundo_apellido']) ? $data['segundo_apellido'] : ''; ?>" placeholder="Segundo apellido" required>
    </div>
    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($data['nombre']) ? $data['nombre'] : ''; ?>" placeholder="Nombre" required>
    </div>
    <div class="mb-3">
        <label for="Fotografia" class="form-label">Fotografía</label>
        <input type="file" class="form-control" id="fotografia" name="fotografia">
    </div>
    <div class="mb-3">
        <label for="Semblanza" class="form-label">Semblanza</label>
        <input type="text" class="form-control" id="semblanza" name="semblanza" value="<?php echo isset($data['semblanza']) ? $data['semblanza'] : ''; ?>" placeholder="Semblanza">
    </div>
    <div class="mb-3">
        <label for="Id_institucion" class="form-label">Institución</label>
        <select name="id_institucion" id="id_institucion" class="form-select" required>
            <option value="" disabled selected>Seleccione una institución</option>
            <?php foreach ($instituciones as $institucion): 
                $selected = "";
                if ($data['id_institucion'] == $institucion['id_institucion']) {
                    $selected = "selected";
                }
                ?>
                <option <?php echo $selected;?> value="<?php  echo($institucion['id_institucion']) ?>">
                    <?php echo($institucion['institucion']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="Id_tratamiento" class="form-label">Tratamiento</label>
        <select name="id_tratamiento" id="id_tratamiento" class="form-select" required>
            <option value="" disabled selected>Seleccione un tratamiento</option>
            <?php foreach ($tratamientos as $tratamiento): 
                $selected = "";
                if ($data['id_tratamiento'] == $tratamiento['id_tratamiento']) {
                    $selected = "selected";
                }
                ?>
                <option <?php echo $selected; ?> value="<?php  echo($tratamiento['id_tratamiento']) ?>">
                    <?php echo($tratamiento['tratamiento']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>