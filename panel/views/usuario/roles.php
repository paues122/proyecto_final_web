<h1>Roles del usuario</h1>
<a href="./role.php"><button class="btn btn-warning">Administrar roles</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $role): ?>
    <tr>
      <th scope="row"><?php echo $role['id_role']; ?></th>
      <th scope="row"><?php echo $role['role']; ?></th>
      <td> 
        <div>
          <input
            <?php 
              $user_role_names = array_column($user_role, 'role');
              $isSelected = in_array($role['role'], $user_role_names, true);
            ?>
            type="checkbox"
            class="js-select"
            id="<?php echo $role['id_role']?>"
            <?= $isSelected ? 'checked' : '';?>
            disabled
          >
        </div>
        <div>
          <form method="post" action=<?= $isSelected
            ? 'usuario.php?action=deleteRole&id_usuario='.$id_usuario.'&id_role='.$role['id_role']
            : 'usuario.php?action=insertRole&id_usuario='.$id_usuario.'&id_role='.$role['id_role'];
          ?>>
            <button type="submit" id='enviar' name='enviar' class="btn btn-sm btn-primary"> <?= $isSelected ? 'Quitar' : 'Asignar';?></button>
          </form>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="./usuario.php"><button class="btn btn-success">Regresar</button></a>