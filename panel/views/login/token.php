<?php 
include_once("./views/login/header.php");
?>
<form action="login.php?action=restablecer" method="post">
    <div class="mb-3 row">
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 form-label">Nueva contraseña</label>
            <div class="col-sm-10">
                <input name="contrasena" type="password" class="form-control" id="contrasena">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 form-label">Confirmar contraseña</label>
            <div class="col-sm-10">
                <input name="confirmar_contrasena" type="password" class="form-control" id="confirmar_contrasena">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <input name="token" type="hidden" class="form-control" id="token" value="<?php isset($peticion['token']) ? print($peticion['token']) : print($token)?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <input name="correo" type="hidden" class="form-control" id="correo" value="<?php isset($peticion['correo']) ? print($peticion['correo']) : print($correo)?>">
            </div>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Cambiar contraseña">
        </div>
    </div>
</form>
<a href="./login.php"><button class="btn btn-danger">Cancelar</button></a>

<?php 
include_once('./views/login/footer.php');
?>