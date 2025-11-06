<main class="container mt-5">
    
    <h2 class="mb-4">INvestigadores</h2>

    <div id="carouselInvestigadores" class="carousel slide card" data-bs-ride="carousel">
        <div class="carousel-inner rounded">

            <?php 
            // ---- INICIO DE TU CÓDIGO PHP (Código 2) ----
            
            // Variable para marcar solo el primer item como 'active'
            $is_first = true; 
            ?>

            <?php foreach ($investigadores as $investigador) : ?>
                
                <div class="carousel-item <?php echo ($is_first) ? 'active' : ''; ?>">
                    
                    <div class="row g-0">
                        
                        <div class="col-md-5">
                            <img src="images/investigadores/<?php echo $investigador['fotografia']; ?>" 
                                 class="d-block w-100 object-cover" 
                                 style="height: 450px;" alt="<?php echo $investigador['nombre']; ?>">
                        </div>
                        
                        <div class="col-md-7 p-4 d-flex align-items-center">
                            <div>
                                <h3><?php echo $investigador['nombre'] . ' ' . $investigador['primer_apellido']; ?></h3>
                                
                                <p class="text-muted">• Especialidad: Astrobiología</p>

                                <p class="mt-3"><?php echo $investigador['semblanza']; ?></p>
                                
                                <div class="mt-4">
                                    <a href="#" class="icon facebook"></a>
                                    <a href="#" class="icon instagram"></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <?php 
                // Después del primero, todos los demás no son 'active'
                $is_first = false; 
                ?>
                <h2 class="section-header">Investigadores participantes</h2>

<div class="container mt-4">
    <div class="row">
        <?php 
        // Verificamos si hay investigadores antes de intentar mostrarlos
        if (!empty($investigadores)): 
            
            // Iteramos sobre cada investigador
            foreach ($investigadores as $investigador): 
                
                // Asumo que estos son los nombres de tus columnas en la BD.
                // ¡Ajústalos si se llaman diferente!
                $nombre = $investigador['nombre'] ?? 'Nombre no disponible';
                $foto = $investigador['foto'] ?? 'default.jpg'; // Foto por defecto
                $especialidad = $investigador['especialidad'] ?? 'Especialidad no especificada';
                $publicacion = $investigador['publicacion'] ?? 'Sin publicaciones destacadas';
                $institucion = $investigador['institucion'] ?? 'Institución no especificada';
        ?>

        <div class="col-md-10 mx-auto"> <div class="card-miembro">
                
                <img src="./images/investigadores/<?php echo htmlspecialchars($foto); ?>" 
                     alt="Foto de <?php echo htmlspecialchars($nombre); ?>" 
                     class="card-miembro-img">
                
                <div class="card-miembro-info">
                    <h3><?php echo htmlspecialchars($nombre); ?></h3>
                    <ul>
                        <li class="especialidad">
                            <strong>Especialidad:</strong> <?php echo htmlspecialchars($especialidad); ?>
                        </li>
                        <li class="publicacion">
                            <strong>Publicación destacada:</strong> <?php echo htmlspecialchars($publicacion); ?>
                        </li>
                        <li class="institucion">
                            <strong>Institución:</strong> <?php echo htmlspecialchars($institucion); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php 
            endforeach; 
        else: 
        ?>
            <div class="col-12">
                <p class="text-center text-muted">No hay investigadores para mostrar en este momento.</p>
            </div>
        <?php 
        endif; 
        ?>
    </div>
</div>

            <?php endforeach; ?>
            </div> <button class="carousel-control-prev" type="button" data-bs-target="#carouselInvestigadores" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselInvestigadores" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    
</main>