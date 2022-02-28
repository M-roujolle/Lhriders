<?php
require "../controllers/controller_ride.php";
require "../controllers/controller_users.php";
include "../templates/header.php";
// var_dump($arrayride);
?>

<div class="principalePictRide">
    <div class="text-center pt-4">
        <h1 class="text-center"> Plus qu’une balade : une aventure</h1>
    </div>
</div>


<h2 class="text-center pt-5 ms-5 me-5">
    Que diriez-vous d'une balade moto sur les plus belles routes de Normandie ? Pour une sortie improvisée ou longuement préparée, faites l'expérience de la liberté.</h2>

<!-- boucles ------------------------------------------------------------------------------------------------------------------------>


<div class="row m-0">
    <?php foreach ($arrayride as $value) { ?>
        <div class="d-flex justify-content-evenly col-lg-4">
            <div class="card mt-5 shadow">
                <div class="card-body">
                    <div class="row p-0">
                        <?= $value["ride_iframe"] ?>
                    </div>
                    <h5 class="card-title text-center mt-2"><?= $value["ride_title"] ?></h5>
                    <p class="card-text text-center mt-2">Démarre à <?= $value["ride_hours"] ?> le <?= $value["ride_date"] ?>, <?= $value["ride_kilometre"] ?> kilomètres </p>
                    <div class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-<?= $value["ride_id"] ?>">
                            Plus d'infos
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-<?= $value["ride_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p class="modal-title mt-5" id="exampleModalLabel"><?= $value["ride_description"] ?></p>
                                        <p class="modal-title mt-5" id="exampleModalLabel">Point de départ : <?= $value["ride_meeting"] ?></p>
                                        <p class="modal-title mt-5" id="exampleModalLabel">Nombre de participants: <?= $value["ride_participants"] ?></p>
                                        <button type="button" class="btn btn-secondary mt-5" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
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




<?php
include "../templates/footer.php";
?>