<?php
include_once('./views/header.php');
?>
<main class="container mt-5">
    
    <h2>Artículos de Interés</h2>

    <div class="card p-4 mt-4">
        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#articulo1" aria-expanded="false" aria-controls="articulo1">Artículo 1</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#articulo2" aria-expanded="false" aria-controls="articulo2">Artículo 2</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#articulo3" aria-expanded="false" aria-controls="articulo3">Artículo 3</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#articulo4" aria-expanded="false" aria-controls="articulo4">Artículo 4</button>
        </p>

        <div class="row">
            <div class="col-12">
                <div class="collapse" id="articulo1">
                    <div class="card card-body bg-primary text-white mb-2">
                        <strong>BBC (2025):</strong> La inteligencia artificial cambiará el mercado laboral...
                        <a href="https://www.bbc.com/mundo/articles/cxxxnn5ge0wo" target="_blank" class="text-white text-decoration-underline">Leer más</a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="collapse" id="articulo2">
                    <div class="card card-body bg-primary text-white mb-2">
                        <strong>Business Insider (2025):</strong> Salesforce reemplazó 4,000 empleos de soporte con IA...
                        <a href="https://www.businessinsider.mx/salesforce-despidos-ia/" target="_blank" class="text-white text-decoration-underline">Leer más</a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="collapse" id="articulo3">
                    <div class="card card-body bg-primary text-white mb-2">
                        <strong>El País (2024):</strong> Expertos indican que la IA obligará a rediseñar las estructuras...
                        <a href="https://elpais.com/economia/2024/05/08/actualidad/ia-trabajo.html" target="_blank" class="text-white text-decoration-underline">Leer más</a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="collapse" id="articulo4">
                    <div class="card card-body bg-primary text-white mb-2">
                        <strong>Forbes México (2025):</strong> El mercado TI demanda más especialistas en IA...
                        <a href="https://forbes.com.mx/impacto-ia-trabajo-mexico-2025/" target="_blank" class="text-white text-decoration-underline">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
   <?php
include_once('./views/footer.php');
?>