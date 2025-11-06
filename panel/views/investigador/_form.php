<h1>Nuevo Investigador</h1>
<form method="POST" enctype="multipart/form-data" action="investigador.php?action=create">
    <div class="mb-3">
        <label for="Primer_apellido" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido" required>
    </div>
    <div class="mb-3">
        <label for="Segundo_apellido" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido" required>
    </div>
    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
    </div>
    <div class="mb-3">
        <label for="Fotografia" class="form-label">Fotografía</label>
        <input type="file" class="form-control" id="fotografia" name="fotografia" placeholder="Fotografía" required>
    </div>
    <div class="mb-3">
        <label for="Semblanza" class="form-label">Semblanza</label>
        <input type="text" class="form-control" id="semblanza" name="semblanza" placeholder="Semblanza">
    </div>
    <div class="mb-3">
        <label for="Id_institucion" class="form-label">Institución</label>
        <select name="id_institucion" id="id_institucion" class="form-select" required>
            <option value="" disabled selected>Seleccione una institución</option>
            <?php foreach ($instituciones as $institucion): ?>
                <option value="<?php  echo($institucion['id_institucion']) ?>">
                    <?php echo($institucion['institucion']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="Id_tratamiento" class="form-label">Tratamiento</label>
        <select name="id_tratamiento" id="id_tratamiento" class="form-select" required>
            <option value="" disabled selected>Seleccione un tratamiento</option>
            <?php foreach ($tratamientos as $tratamiento): ?>
                <option value="<?php  echo($tratamiento['id_tratamiento']) ?>">
                    <?php echo($tratamiento['tratamiento']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>