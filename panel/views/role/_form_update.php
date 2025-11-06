<h1>Modificar Rol</h1>
<form method="POST"  action="role.php?action=update&id=<?php echo $id; ?>">
    <div class="mb-3">
        <label for="role" class="form-label">Nombre del rol</label>
        <input type="text" class="form-control" id="role" name="role" value="<?php echo isset($data['role']) ? $data['role'] : ''; ?>" placeholder="Rol" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>