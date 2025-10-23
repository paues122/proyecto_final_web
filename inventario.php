<?php

include 'includes/header.php'; 

require_once 'models/inventariom.php';

$esAdmin = (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin');

$inventario = new Inventario();

if ($esAdmin) {
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == 'agregar') {
            $data = [
                'nombre' => $_POST['nombre'],
                'modelo' => $_POST['modelo'],
                'marca' => $_POST['marca'],
                'anio' => $_POST['anio'],
                'precio' => $_POST['precio'],
                'mensualidad' => $_POST['mensualidad'],
                'enganche' => $_POST['enganche']
            ];
            $inventario->create($data);
        }
    
        header('Location: inventario.php');
        exit;
    }

    if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar' && isset($_GET['id'])) {
        $inventario->delete($_GET['id']);
        header('Location: inventario.php');
        exit;
    }
}

$autos = $inventario->read();

?>
<?php if ($esAdmin): ?>
<section class="container card mt-4 p-4">
    <h2>Agregar Auto al Inventario</h2>
    <form action="inventario.php" method="POST">
        <input type="hidden" name="accion" value="agregar">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre del Vehículo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="col-md-4">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            <div class="col-md-2">
                <label for="anio" class="form-label">Año</label>
                <input type="number" class="form-control" id="anio" name="anio" required>
            </div>
            <div class="col-md-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="col-md-3">
                <label for="mensualidad" class="form-label">Mensualidad</label>
                <input type="number" step="0.01" class="form-control" id="mensualidad" name="mensualidad">
            </div>
            <div class="col-md-3">
                <label for="enganche" class="form-label">Enganche</label>
                <input type="number" step="0.01" class="form-control" id="enganche" name="enganche">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Vehículo</button>
            </div>
        </div>
    </form>
</section>
<?php endif;  ?>


<section class="container mt-4">
    <h2>Inventario Disponible</h2>
    <div class="row g-4">
        
        <?php foreach ($autos as $auto): ?>
            <div class="col-lg-4 col-md-6">
                <article class="inventory-card card h-100 p-3">
                   
                    <!-- <img src="images/<?php echo htmlspecialchars($auto['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($auto['nombre']); ?>"> -->
                    <div class="image-placeholder card-img-top"></div>
                    
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title"><?php echo htmlspecialchars($auto['nombre']); ?></h3>
                        <p class="card-text mb-1"><strong>Modelo:</strong> <?php echo htmlspecialchars($auto['modelo']); ?></p>
                        <p class="card-text mb-1"><strong>Marca:</strong> <?php echo htmlspecialchars($auto['marca']); ?></p>
                        <p class="card-text mb-1"><strong>Año:</strong> <?php echo htmlspecialchars($auto['anio']); ?></p>
                        <hr>
                        <p class="card-text mb-1"><strong>Precio:</strong> $<?php echo number_format($auto['precio'], 2); ?></p>
                        <p class="card-text mb-1"><strong>Mensualidad:</strong> $<?php echo number_format($auto['mensualidad'], 2); ?></p>
                        <p class="card-text mb-1"><strong>Enganche:</strong> $<?php echo number_format($auto['enganche'], 2); ?></p>
                     
                        <?php if ($esAdmin): ?>
                            <a href="inventario.php?accion=eliminar&id=<?php echo $auto['id_vehiculo']; ?>" 
                               class="btn btn-danger mt-auto" 
                               onclick="return confirm('¿Estás seguro de que quieres eliminar este vehículo?');">
                               Eliminar
                            </a>
                        <?php endif; ?>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
        
        <?php if (empty($autos)): ?>
            <p class="text-center">No hay vehículos en el inventario.</p>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

