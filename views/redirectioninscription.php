<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';
require "../controllers/controller_redirectioninscription.php";
include "../templates/header.php";
?>
<div class="principalePictRedirection">
</div>

<h1 class=" selectColor pt-3 pb-3 text-center"> En attente</h1>
<div class="row m-0 p-0 justify-content-center text-center">
    <div class="card mt-5" style="width: 50rem;">
        <h5 class="card-header">VOTRE COMPTE EST EN COURS DE VALIDATION</h5>
        <div class="card-body">
            <p class="card-text">Veuillez recommencer ultérieurement.</p>
            <a href="../views/home.php" class="buttondark text-white">Retour à l'accueil</a>
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
                    <input class="mt-3 buttondark text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="buttonorange position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>


















<?php
include "../templates/footer.php";
?>