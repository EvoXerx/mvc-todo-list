<?php
use utils\sessionHelpers; ?>
<?php
if (SessionHelpers::getConnected()){ ?>
<div class="alert alert-success" role="alert">
Bonjour <?php echo SessionHelpers::getConnected() ?> et bienvenue sur le site !
</div>
<?php }
else { ?>
<div class="alert alert-warning" role="alert">
Bonjour pas d'utilisateur connecté - bienvenue sur le site !
</div>
<?php } ?>








<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
            <img src = "https://media.tenor.com/r5gE4j3C37MAAAAM/chicken-cluck.gif">
                <h3>Site de démonstration</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, commodi delectus eaque eos esse ex illum laboriosam laborum modi, molestias necessitatibus non provident quidem quis repellat soluta tempore, veritatis vitae.
                </p>

                <ul>
                    <li><a href="/exemple">Lien d'exemple 1</a></li>
                    <li><a href="/exemple2/votre_parametre">Lien d'exemple 2</a></li>
                </ul>
                <?php
                if (SessionHelpers::getConnected()){ ?>
                <div class="d-grid gap-2 col-4 mx-auto">

                    <button type="button" class="btn btn-info" >
                    <i class="bi bi-person-square"></i>
                    <a href="/auth/sedeconnecter">Se deconnecter</a></button>
                </div>
                    
                <?php } ?>
                <?php
                if (SessionHelpers::getConnected()){ ?>
                <div class="d-grid gap-2 col-4 mx-auto">

                    <button type="button" class="btn btn-light" >
                    <i class="bi bi-card-checklist"></i>
                    <a href="/todos/liste">Liste des tâches</a>
                    </button>
                </div>
                <?php } ?>

                <div class="d-grid gap-2 col-4 mx-auto">

                    <button type="button" class="btn btn-danger" >
                    <i class="bi bi-person-circle"></i>
                    <a href="/auth/seconnecter">Se connecter</a>
                </div>
                <style>
            .card-body {
                background-image: url("https://media.tenor.com/r5gE4j3C37MAAAAM/chicken-cluck.gif");
} 
        </style>
                
                

                <div class="text-center">Page générée le <?= $date ?></div>
                
            </div>
        
        </div>
    </div>
   
</div>
