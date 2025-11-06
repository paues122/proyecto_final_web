<?php include_once('./views/header.php'); ?>

<main class="container py-5">
    <h2 class="text-center mb-4">Ponte en contacto con nosotros</h2>

    <div class="row g-4">
        <!-- Columna Izquierda: Contacto, Redes, FAQ -->
        <div class="col-lg-6">
            <!-- Información de Contacto -->
            <div class="card shadow-sm mb-4 h-100">
                <div class="card-body">
                    <h5 class="card-title">Información de contacto</h5>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="images/general/email.png" alt="Email" width="24">
                        <a href="mailto:redinvestigadores@tecnm.mx" class="text-decoration-none">redinvestigadores@tecnm.mx</a>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="images/general/telefono-movil.png" alt="Tel" width="24">
                        <a href="tel:+524613540060" class="text-decoration-none">+52 (461) 354 0060</a>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="images/general/ubicacion.png" alt="Ubicación" width="24">
                        <a href="https://www.google.com/maps/place/TecNM+Celaya" target="_blank" class="text-decoration-none">TecNM Celaya</a>
                    </div>
                </div>
            </div>

            <!-- Redes Sociales -->
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3">Síguenos</h5>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="text-primary fs-3" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-info fs-3" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-danger fs-3" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Preguntas Frecuentes (Acordeón) -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Preguntas frecuentes</h5>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    ¿Cómo puedo colaborar?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Contáctanos por correo o formulario indicando tu área de interés.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    ¿Quién puede participar?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Estudiantes, docentes y profesionales interesados en astronomía.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    ¿Dónde estamos?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sede principal: <strong>TecNM Celaya</strong>, con colaboradores nacionales.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Formulario + Mapa -->
        <div class="col-lg-6">
            <!-- Formulario -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Envíanos un mensaje</h5>
                    <form action="enviar_contacto.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nombre completo" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Correo electrónico" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" required>
                                <option value="">Asunto</option>
                                <option>Duda</option>
                                <option>Queja</option>
                                <option>Sugerencia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Tu mensaje" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
                    </form>
                </div>
            </div>

            <!-- Mapa -->
            <div class="card shadow-sm">
                <div class="card-body p-0 overflow-hidden rounded">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.2659735434504!2d-100.82085082460478!3d20.536295680992698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cba943545fcd7%3A0x2bdea6d8bac6a00e!2sTecnologico%20Nacional%20De%20Mexico%20En%20Celaya!5e0!3m2!1ses!2smx!4v1757306595968!5m2!1ses!2smx" 
                        width="100%" 
                        height="250" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once('./views/footer.php'); ?>