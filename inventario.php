<?php
// Incluimos la seguridad y el nuevo modelo de inventario
require_once 'includes/auth_check.php';
require_once 'models/inventario.php';

// Creamos una instancia de nuestro inventario
$inventario = new Inventario();

// Lógica para manejar el formulario (agregar o eliminar)
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
    // Redirigimos para limpiar el POST y evitar reenvíos
    header('Location: inventario.php');
    exit;
}

if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar' && isset($_GET['id'])) {
    $inventario->delete($_GET['id']);
    header('Location: inventario.php');
    exit;
}

// Leemos todos los autos de la base de datos
$autos = $inventario->read();

// Incluimos el header al final para que las redirecciones funcionen
include 'includes/header.php';
?>

<section class="container card mt-4 p-4">
    <h2>Agregar Auto al Inventario</h2>
    <form action="inventario.php" method="POST">
        <input type="hidden" name="accion" value="agregar">
        <div class="row g-3">
            <div class="col-md-6"><input type="text" name="nombre" class="form-control" placeholder="Nombre (Ej. Versa)" required></div>
            <div class="col-md-6"><input type="text" name="modelo" class="form-control" placeholder="Modelo (Ej. Sense)" required></div>
            <div class="col-md-6"><input type="text" name="marca" class="form-control" placeholder="Marca (Ej. Nissan)" required></div>
            <div class="col-md-6"><input type="number" name="anio" class="form-control" placeholder="Año (Ej. 2024)" required></div>
            <div class="col-md-4"><input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio" required></div>
            <div class="col-md-4"><input type="number" step="0.01" name="mensualidad" class="form-control" placeholder="Mensualidad" required></div>
            <div class="col-md-4"><input type="number" step="0.01" name="enganche" class="form-control" placeholder="Enganche" required></div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Agregar Vehículo</button>
    </form>
</section>

<h2 class="page-title mt-5">Inventario Mensual</h2>
<section class="inventory-container container">
    <div class="row g-4">
        <?php foreach ($autos as $auto): ?>
            <div class="col-lg-4 col-md-6">
                <article class="inventory-card card h-100">
                    <div class="image-placeholder"></div>
                    <h3><?php echo htmlspecialchars($auto['nombre']); ?></h3>
                    <p><strong>Modelo:</strong> <?php echo htmlspecialchars($auto['modelo']); ?></p>
                    <p><strong>Marca:</strong> <?php echo htmlspecialchars($auto['marca']); ?></p>
                    <p><strong>Año:</strong> <?php echo htmlspecialchars($auto['anio']); ?></p>
                    <p><strong>Precio:</strong> $<?php echo number_format($auto['precio'], 2); ?></p>
                    <p><strong>Mensualidad:</strong> $<?php echo number_format($auto['mensualidad'], 2); ?></p>
                    <p><strong>Enganche:</strong> $<?php echo number_format($auto['enganche'], 2); ?></p>
                    
                    <a href="inventario.php?accion=eliminar&id=<?php echo $auto['id_vehiculo']; ?>" 
                       class="btn btn-danger mt-auto" 
                       onclick="return confirm('¿Estás seguro de que quieres eliminar este vehículo?');">
                       Eliminar
                    </a>
                </article>
            </div>
        <?php endforeach; ?>
        
        <?php if (empty($autos)): ?>
            <p class="text-center">No hay vehículos en el inventario.</p>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>