<h1>Roles</h1>
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a href="role.php?action=create" class="btn btn-success">Nuevo</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Rol</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $role): ?>
    <tr>
      <th scope="row"><?php echo $role['id_role']; ?></th>
      <td><?php echo $role['role']; ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="role.php?action=update&id=<?php echo $role['id_role']; ?>" class="btn btn-warning">Editar</a>
            <a href="role.php?action=delete&id=<?php echo $role['id_role']; ?>"  class="btn btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>