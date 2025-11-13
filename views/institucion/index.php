<h1>Instituciones</h1>
    <div class="container text-center">
        <div class="row">
        <?php foreach ($instituciones as $institucion):?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./images/institucion/<?php echo $institucion['logotipo']; ?>" class="card-img-top" alt="..." style="height: 300px; width:300px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $institucion['institucion']; ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        </div>
    </div> 

    