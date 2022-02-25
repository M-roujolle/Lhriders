<?php
require "../controllers/controller_createride.php";
require "../data/data.php";
include "../templates/header.php";
?>

<div class="principalePictCreateRide">
    <div class="text-center pt-4">
        <h1 class="text-center"> Créer ton propre tracé</h1>
    </div>
</div>


<!-- formulaire creation de tracé ------------------------------------>
<?php if (isset($_SESSION["id"])) { ?>
    <div class="d-flex justify-content-center">
        <div class="navColor text-white col-lg-6 ps-5 pe-5 pb-5 mt-5 shadow">
            <h2 class="text-center mt-3 selectColor">Création du tracé</h2>


            <form action="createride.php" method="POST">


                <div class="mb-3 mt-5">
                    <label for="titre" class="form-label">Titre :</label><span class="text-danger">
                        <?=
                        $arrayError["titre"] ?? " ";
                        ?>
                    </span>
                    <input name="titre" value="<?= isset($_POST["titre"]) ? htmlspecialchars($_POST["titre"]) : "" ?>" type="text" class="form-control" id="titre" placeholder="Ex: Le Havre - Fécamp">
                    <p id="titre" class="form-text text-white">Indique ton point de départ et d'arrivée</p>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label><span class="text-danger">
                        <?=
                        $arrayError["description"] ?? " ";
                        ?>
                    </span>
                    <textarea name="description" rows="9" cols="33" type="text" class="form-control" id="description" placeholder="Ex : Route variée, avec de la petite route avec des beaux virages et de belles vues sur la mer, petite pause à Etretat pour observer les falaises, et direction Le Havre en passant par la plage. "><?= isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : "" ?></textarea>
                    <div id="emailHelp" class="form-text text-white">Décris en quelques mots ton tracé. Points d'intérets, types de routes, temps de route etc...</div>
                </div>

                <div class="mb-3">
                    <label for="iframe" class="form-label">Iframe :</label><span class="text-danger">
                        <?=
                        $arrayError["iframe"] ?? " ";
                        ?>
                    </span>
                    <input name="iframe" type="text" value="<?= isset($_POST["iframe"]) ? htmlspecialchars($_POST["iframe"]) : "" ?>" class="form-control" id="iframe" aria-describedby="emailHelp" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d165407.58526710264!2d0.128765300210693!3d49.626152441086234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x47e02f2395218b7d%3A0x5bc1867aaf33af12!2sLe%20Havre!3m2!1d49.494369999999996!2d0.107929!4m5!1s0x47e06b69133e1681%3A0x57434975e5d89613!2zRsOpY2FtcA!3m2!1d49.755601!2d0.380774!5e0!3m2!1sfr!2sfr!4v1645183233975!5m2!1sfr!2sfr' width='600' height='450' style='border:0;' allowfullscreen=' loading='lazy'></iframe>">
                    <div id="iframe" class="form-text text-white"><a href="https://alphadesign.fr/blog/comment-creer-une-google-map-responsive-pour-n-importe-quel-site.html"> Comment recupérer un iframe sur google ?</a></div>
                </div>

                <div class="row g-2">
                    <div class="col-md text-dark">
                        <div class="form-floating">
                            <input name="kilometre" type="number" class="form-control" id="kilometre" placeholder="Ex : 24 km" value="<?= isset($_POST["kilometre"]) ? htmlspecialchars($_POST["kilometre"]) : "" ?>">
                            <label for="kilometre">Kilomètres :</label><span class="text-danger">
                                <?=
                                $arrayError["kilometre"] ?? " ";
                                ?>
                            </span>
                            <div id="kilometre" class="form-text text-white"> Indique le kilometrage du tracé</div>
                        </div>
                    </div>
                    <div class="col-md text-dark">
                        <div class="form-floating">
                            <input name="heure" type="time" class="form-control" id="heure" placeholder="10h30" value="<?= isset($_POST["heure"]) ? htmlspecialchars($_POST["heure"]) : "" ?>">
                            <label for="heure">Heure de départ :</label><span class="text-danger">
                                <?=
                                $arrayError["heure"] ?? " ";
                                ?>
                            </span>
                            <div id="heure" class="form-text text-white"> Indique l'heure de départ de ta balade</div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="select">Choix du nombre de participants (min 2 - max 50) :</label><span class="text-danger">
                        <?=
                        $arrayError["select"] ?? " ";
                        ?>
                    </span>
                    <select name="select" class="form-select form-select-sm mt-4 mb-4" aria-label="form-select-sm example">
                        <option selected value="0">Nombre de participants</option>
                        <option>De 2 à 5</option>
                        <option>De 5 à 10</option>
                        <option>De 10 à 20</option>
                        <option>De 20 à 30</option>
                        <option>De 30 à 40</option>
                        <option>De 40 à 50 </option>
                    </select>
                </div>

                <div class="row g-2">
                    <div class="col-md text-dark">
                        <div class="form-floating">
                            <input name="rdv" value="<?= isset($_POST["rdv"]) ? htmlspecialchars($_POST["rdv"]) : "" ?>" type="text" class="form-control" id="rdv" placeholder="Ex : Stade océane">
                            <label for="rdv">Point de rendez-vous :</label><span class="text-danger">
                                <?=
                                $arrayError["rdv"] ?? " ";
                                ?>
                            </span>
                            <div id="rdv" class="form-text text-white"> Indique aux membres où se rendre</div>
                        </div>
                    </div>
                    <div class="col-md text-dark">
                        <div class="form-floating">

                            <input name="date" value="<?= isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : "" ?>" type="date" class="form-control" id="titre" placeholder="Ex: Le Havre - Fécamp">
                            <p id="date" class="form-text text-white">Indique une date de départ</p>
                            <label for="date" class="form-label"></label><span class="text-danger">
                                <?=
                                $arrayError["date"] ?? " ";
                                ?>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="mb-3 form-check mt-3">
                    <input name="checkbox" type="checkbox" class="form-check-input" id="checkbox" <?= isset($_POST["checkbox"]) ? "checked" : "" ?>>
                    <label class="form-check-label" for="checkbox">Valider les CGU</label>
                    <span class="text-danger">
                        <?=
                        $arrayError["checkbox"] ?? " ";
                        ?>
                    </span>
                </div>


                <button type="submit" class="btn btn-primary col-12">Créer</button>

            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="row text-center justify-content-center mt-5 mb-5 m-0 p-0">
        <div class="card border border-white shadow" style="width: 50rem;">
            <img src="../assets/img/etreinscri.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-text mt-2">Vous devez vous inscrire pour pouvoir créer votre tracé !</h4>
                <a class="btn btn-primary mt-4" type="button" href="../views/registration.php">S'inscrire</a>
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
                    <input class="mt-3 btn btn-outline-primary text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
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