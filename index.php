<?php
include_once('./views/header.php');
?>

<div class="container mt-5">
    <h2>Datos curiosos</h2>
    <div class="row text-center mt-4 g-4">
        <div class="col-md-4">
            <div class="card shadow">
                <img src="./images/img1.png" class="card-img-top object-cover" alt="Dato 1">
                <div class="card-body">
            <h5 class="card-title">Dato 1</h5>
            <p class="card-text">Especialista en inteligencia artificial aplicada al análisis de datos.</p>
            <a href="https://www.nationalgeographic.com.es/tecnologia/40-profesiones-que-van-a-desaparecer-por-culpa-chatgpt_25974" class="btn btn-outline-primary">Ver más</a>
          </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="./images/img4.png" class="card-img-top object-cover" alt="Dato 2">
                <div class="card-body">
                    <h5 class="card-title">Dato 2</h5>
                    <p class="card-text">Experto en ética de la tecnología y transformación digital.</p>
                    <a href="https://www.gradomania.com/noticias_universitarias/estas-son-las-40-profesiones-que-pueden-desaparecer-por-culpa-de-la-ia-org-8835.html" class="btn btn-outline-primary">Ver más</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="./images/img3.png" class="card-img-top object-cover" alt="Dato 3">
                <div class="card-body">
                    <h5 class="card-title">Dato 3</h5>
                    <p class="card-text">Investigaciones sobre impacto social de la automatización.</p>
                    <a href="https://www.redseguridad.com/actualidad/empleos-inteligencia-artificial-ia_20250113.html" class="btn btn-outline-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <h2>¿Qué trabajos se van a salvar?</h2>
    <h5>Sábado 30 de agosto de 2025</h5>
    <div class="row mt-4">

        <div class="col-md-8">
            <img src="./images/extra.png" class="img-fluid rounded mb-3" alt="IA en trabajos">
            <p>
                Podemos predecir qué trabajos reemplazará la IA, aunque no con certeza absoluta. Sin embargo, es posible
                identificar el impacto potencial en el mercado laboral:
            </p>
            <ul>
                <li>Desplazamiento de puestos de trabajo por automatización.</li>
                <li>Crecimiento de empleos en sectores tecnológicos.</li>
                <li>Búsqueda de experiencia en IA por parte de empleadores.</li>
                <li>Riesgos de disparidad salarial en industrias automatizadas.</li>
                <li>Impactos económicos según el sector.</li>
            </ul>
            <p>
                Entre las profesiones menos afectadas están aquellas que requieren trabajo físico o habilidades manuales.
            </p>
        </div>

        <div class="col-md-4">
            <aside>
                <h5>Top 10 empleos en riesgo</h5>
                <ul>
                    <li>Matemáticos</li>
                    <li>Asesores fiscales</li>
                    <li>Analistas financieros</li>
                    <li>Burócratas judiciales</li>
                    <li>Secretarios y administrativos</li>
                    <li>Diseñadores informáticos</li>
                    <li>Traductores</li>
                    <li>Analistas demoscópicos</li>
                    <li>Relaciones públicas</li>
                    <li>Ingenieros</li>
                </ul>
            </aside>
        </div>
    </div>

    <form action="pregunta" method="post" class="bg-primary text-white p-3 rounded mt-4">
        <p>¿Crees que desaparecerán estos empleos próximamente?</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="si" name="si">
            <label class="form-check-label" for="si">Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="no" name="no">
            <label class="form-check-label" for="no">No</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="idk" name="idk">
            <label class="form-check-label" for="idk">Ni lo leí completo</label>
        </div>

    </form>

     <p><strong>Conclusión:</strong> La inteligencia artificial transformará muchas profesiones, pero aún queda mucho
      para una sustitución total. La creatividad y la toma de decisiones humanas seguirán siendo claves.</p>
</div>
        

    <?php
include_once('./views/footer.php');
?>
    