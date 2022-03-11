<?php
require "../controllers/controller_advicemaintenance.php";
require "../controllers/controller_users.php";
require "../data/data.php";
include "../templates/header.php";
?>


<div class="principalePictAdvicemaintenance d-none d-lg-block">
    <div class="text-center pt-4 text-white">


    </div>
</div>

<h1 class="selectColor pt-3 pb-3 text-center">Conseils pour bien débuter et entretien</h1>
<p class="pt-5 ps-5 pe-5 pb-5 fs-4 text-center text-white">Tout motard qui se respect menage sa monture ! Tu trouveras ici des astuces et conseils pour organiser, préparer et anticiper au mieux tes promenades. N'oublies jamais que le risque zéro n'existe pas ! </p>

<h2 class="text-center pt-2 pb-2 selectColor">10 conseils pour rouler serein</h2>
<div class="row justify-content-evenly gy-5 m-0 text-center">
    <?php foreach ($consEnt as $key => $value) { ?>
        <div class="card shadow pt-2" style="width: 18rem;">
            <img src="../<?= $value["pictures"] ?>" class="card-img-top" alt="numéro conseils">
            <div class="card-body">
                <h5 class="card-title"><?= $value["name"] ?></h5>
                <p class="card-text"><?= $value["description"] ?></p>
            </div>
        </div>
    <?php } ?>
</div>
<p class="text-center pt-5">
    <a href="https://www.motoblouz.com/enjoytheride/conseils-moto/10459-conseils-jeune-permis-moto-2017-04-14">Source: Motoblouz</a>
</p>

<h3 class="text-center mt-5 pt-2 pb-2 selectColor">Sélections de vidéos présentées par High Side</h3>


<div class="row justify-content-evenly m-0 pt-5 pb-2 text-center">
    <?php foreach ($vidConsEnt as $key => $value) { ?>
        <div class="col-lg-4">
            <div class="card mb-5">
                <div class="card-body shadow">
                    <div class="containeriframe">
                        <?= $value["iframe"] ?> </div>
                    <h5 class="card-title pt-3"><?= $value["name"] ?></h5>
                    <p class="card-text"><?= $value["description"] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<p class="text-center">
    <a href="https://www.youtube.com/c/HighSide-officiel">Source: High side</a>
</p>

<!-- MODAL ------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Connexion / Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="text" class="form-control" placeholder="Pseudo" name="login">
                    <input type="password" class="form-control mt-3" placeholder="Mot de passe" name="password">
                    <input class="mt-3 buttondark text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="buttonorange text-white position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>