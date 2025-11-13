<h1>Nuevo Rol</h1>
<form method="POST"  action="role.php?action=create">
    <div class="mb-3">
        <label for="role" class="form-label">Nombre del rol</label>
        <input type="text" class="form-control" id="role" name="role" placeholder="Role" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>
<a href="./role.php"><button class="btn btn-danger">Cancelar</button></a>