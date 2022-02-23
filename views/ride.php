<?php
require "../controllers/controller_ride.php";
require "../controllers/controller_users.php";
require "../data/data.php";
include "../templates/header.php";
?>

<div class="principalePictRide">
    <div class="text-center pt-4">
        <h1 class="text-center"> Plus qu’une balade : une aventure</h1>
    </div>
</div>

<!-- boucles roadMaps------------------------------------------------------------------------------------------------------------------------>

<h2 class="text-center pt-5 ms-5 me-5">
    Que diriez-vous d'une balade moto sur les plus belles routes de Normandie ? Pour une sortie improvisée ou longuement préparée, faites l'expérience de la liberté.</h2>

<div class="row justify-content-evenly m-0 pt-5 pb-5 text-center">

    <?php foreach ($roadMaps as $key => $value) { ?>
        <div class="col-lg-6">
            <div class="card mb-5 bg-secondary text-white">
                <div class="card-body">
                    <div class="container">
                        <?= $value["iframe"] ?>
                    </div>
                    <h5 class="card-title pt-3"><?= $value["name"] ?></h5>
                    <p class="card-text"><?= $value["description"] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>



<div class="d-flex justify-content-evenly">
    <div class="row m-0">
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>

        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
        <div class="card ms-5 me-5" style="width: 25rem;">
            <div class="card-body">
                <div class="container">
                    <?= $value["iframe"] ?>
                </div>
                <h5 class="card-title text-center mt-2"><?= $value["name"] ?></h5>
                <p class="card-text text-center mt-2"><?= $value["description"] ?></p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">Plus d'info</a>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <input class="mt-3 btn btn-outline-primary text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-evenly m-0 pt-5 pb-5 text-center">
    <?php foreach ($allRideArray as $ride) { ?>
        <div class="col-lg-6">
            <div class="card mb-5 bg-secondary text-white">
                <div class="card-body">
                    <div class="container">
                        <?= $ride["ride_iframe"] ?>
                    </div>
                    <h5 class="card-title pt-3"><?= $ride["ride_title"] ?></h5>
                    <p class="card-text"><?= $ride["ride_description"] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include "../templates/footer.php";
?>