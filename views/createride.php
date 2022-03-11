<?php
require "../controllers/controller_createride.php";
require "../data/data.php";
include "../templates/header.php";
?>

<div class="principalePictCreateRide d-none d-lg-block">
</div>

<h1 class="selectColor pt-3 pb-3 text-center"> Créer ton propre tracé</h1>

<!-- formulaire creation de tracé ------------------------------------>
<?php if (isset($_SESSION["id"])) { ?>
    <div class="row m-0">
        <div class="col-lg-6">
            <form class=" form-style-9" action="createride.php" method="POST">
                <h2 class="text-center">Création du tracé</h2>
                <ul>
                    <li>
                        <label for="titre" class="form-label">Titre :</label><span class="text-danger">
                            <?=
                            $arrayError["titre"] ?? " ";
                            ?>
                        </span>
                        <input name="titre" value="<?= isset($_POST["titre"]) ? htmlspecialchars($_POST["titre"]) : "" ?>" type="text" class="form-control" id="titre" placeholder="Ex: Le Havre - Fécamp">
                        <p id="titre" class="form-text ">Indique ton point de départ et d'arrivée</p>

                    </li>
                    <li>
                        <label for="description" class="form-label">Description :</label><span class="text-danger">
                            <?=
                            $arrayError["description"] ?? " ";
                            ?>
                        </span>
                        <textarea name="description" rows="9" cols="33" type="text" class="form-control" id="description" placeholder="Ex : Route variée, avec de la petite route avec des beaux virages et de belles vues sur la mer, petite pause à Etretat pour observer les falaises, et direction Le Havre en passant par la plage. "><?= isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : "" ?></textarea>
                        <div id="emailHelp" class="form-text ">Décris en quelques mots ton tracé. Points d'intérets, types de routes, temps de route etc...</div>
                    </li>
                    <li>
                        <label for="iframe" class="form-label">Iframe :</label><span class="text-danger">
                            <?=
                            $arrayError["iframe"] ?? " ";
                            ?>
                        </span>
                        <input name="iframe" type="text" value="<?= isset($_POST["iframe"]) ? htmlspecialchars($_POST["iframe"]) : "" ?>" class="form-control" id="iframe" aria-describedby="emailHelp" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d165407.58526710264!2d0.128765300210693!3d49.626152441086234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x47e02f2395218b7d%3A0x5bc1867aaf33af12!2sLe%20Havre!3m2!1d49.494369999999996!2d0.107929!4m5!1s0x47e06b69133e1681%3A0x57434975e5d89613!2zRsOpY2FtcA!3m2!1d49.755601!2d0.380774!5e0!3m2!1sfr!2sfr!4v1645183233975!5m2!1sfr!2sfr' width='600' height='450' style='border:0;' allowfullscreen=' loading='lazy'></iframe>">
                        <div id="iframe" class="form-text "><a href="https://alphadesign.fr/blog/comment-creer-une-google-map-responsive-pour-n-importe-quel-site.html" target="_blank"> Comment recupérer un iframe sur google ?</a></div>
                    </li>
                    <li> <label for="kilometre">Kilomètres :</label><span class="text-danger">
                            <?=
                            $arrayError["kilometre"] ?? " ";
                            ?>
                        </span>
                        <input name="kilometre" type="number" class="form-control" id="kilometre" placeholder="Ex : 24 km" value="<?= isset($_POST["kilometre"]) ? htmlspecialchars($_POST["kilometre"]) : "" ?>">
                        <div id="kilometre" class="form-text "> Indique le kilometrage du tracé</div>
                    </li>
                    <li>
                        <label for="heure">Heure de départ :</label><span class="text-danger">
                            <?=
                            $arrayError["heure"] ?? " ";
                            ?>
                        </span>
                        <input name="heure" type="time" class="form-control" id="heure" placeholder="10h30" value="<?= isset($_POST["heure"]) ? htmlspecialchars($_POST["heure"]) : "" ?>">
                        <div id="heure" class="form-text "> Indique l'heure de départ de ta balade</div>
                    </li>
                    <li>
                        <label for="select">Choix du nombre de participants (min 2 - max 50) :</label><span class="text-danger">
                            <?=
                            $arrayError["select"] ?? " ";
                            ?>
                        </span>
                        <select name="select" class="form-select form-select-sm" aria-label="form-select-sm example">
                            <option selected value="0">Nombre de participants</option>
                            <option>De 2 à 5</option>
                            <option>De 5 à 10</option>
                            <option>De 10 à 20</option>
                            <option>De 20 à 30</option>
                            <option>De 30 à 40</option>
                            <option>De 40 à 50 </option>
                        </select>
                    </li>
                    <li>
                        <label for="rdv">Point de rendez-vous :</label><span class="text-danger">
                            <?=
                            $arrayError["rdv"] ?? " ";
                            ?>
                        </span>
                        <input name="rdv" value="<?= isset($_POST["rdv"]) ? htmlspecialchars($_POST["rdv"]) : "" ?>" type="text" class="form-control" id="rdv" placeholder="Ex : Stade océane">
                        <div id="rdv" class="form-text "> Indique aux membres où se rendre</div>
                    </li>
                    <li><label for="date" class="form-label">Date de départ :</label><span class="text-danger">
                            <?=
                            $arrayError["date"] ?? " ";
                            ?>
                        </span>
                        <input name="date" value="<?= isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : "" ?>" type="date" class="form-control" id="titre" placeholder="Ex: Le Havre - Fécamp">
                        <p id="date" class="form-text ">Indique une date de départ</p>

                    </li>
                    <li>
                        <input name="checkbox" type="checkbox" class="form-check-input" id="checkbox" <?= isset($_POST["checkbox"]) ? "checked" : "" ?>>
                        <label class="form-check-label" for="checkbox">Valider les CGU</label>
                        <span class="text-danger">
                            <?=
                            $arrayError["checkbox"] ?? " ";
                            ?>
                        </span>
                    </li>
                    <li>
                        <button type="submit" class="buttondark col-12 ">Créer</button>
                </ul>
            </form>
        </div>
        <div class="col-lg-6 d-none d-lg-block mt-5">
            <div class="card mt-5 border border-dark" style="width: 100%">
                <img src="../assets/img/return.jpeg" class="card-img-top" alt="motard">
            </div>
        </div>
    </div>

<?php } else { ?>
    <div class="row text-center justify-content-center mt-5 mb-5 m-0 p-0">
        <div class="card border border-white shadow pt-2" style="width: 50rem;">
            <img src="../assets/img/etreinscri.jpeg" class="card-img-top" alt="inscription">
            <div class="card-body">
                <h4 class="card-text mt-2">Vous devez vous inscrire pour pouvoir créer votre tracé !</h4>
                <a class="buttondark " type="button" href="../views/registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
<?php } ?>

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
                <a class="buttonorange  position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>

<?php if (isset($alertride)) { ?>
    <span id="alertride"></span>
<?php } ?>

<?php
include "../templates/footer.php";
?>