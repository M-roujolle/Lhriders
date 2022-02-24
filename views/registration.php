<?php
require "../controllers/controller_registration.php";
include "../templates/header.php";
?>



<div class="principalePictRTegistration">
    <div class="text-center pt-4">
        <h1>Inscrivez vous ici pour pouvoir créer vos propres balades !</h1>
    </div>
</div>



<!-- Formulaire de contact-------------------------------------------------------------------------------------------->

<div class="row m-0">
    <div class="d-flex justify-content-center">
        <div class=" col-lg-6 mt-5">
            <div class="navColor text-white d-flex justify-content-center">
                <form action="registration.php" method="POST" class="ps-3 pe-3">
                    <h1 class="text-center pt-3 mb-3">Inscription</h1>
                    <div class="mb-3">

                        <!-- pseudo -->
                        <label for="pseudo" class="form-label">Pseudo : </label><span class="text-danger">
                            <?=
                            $arrayError["pseudo"] ?? " ";
                            ?>
                        </span>
                        <input value="<?= isset($_POST["pseudo"]) ? htmlspecialchars($_POST["pseudo"]) : "" ?>" name="pseudo" type="text" class="form-control col-12" id="pseudo" placeholder="Ex : Jean414">


                        <!-- prenom -->
                        <label for="prenom" class="form-label mt-1">Prénom : </label><span class="text-danger">
                            <?=
                            $arrayError["prenom"] ?? " ";
                            ?>
                        </span>
                        <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control col-12" id="prenom" placeholder="Ex : Jean">

                        <!-- nom -->
                        <label for="nom" class="form-label">Nom : </label><span class="text-danger">
                            <?=
                            $arrayError["nom"] ?? " ";
                            ?>
                        </span>
                        <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control col-12" id="nom" placeholder="Ex : Dupont">

                        <!-- mail -->
                        <label for="mail" class="form-label mt-1">Mail : </label><span class="text-danger">
                            <?=
                            $arrayError["mail"] ?? " ";
                            ?>
                        </span>
                        <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control col-12" id="mail" placeholder="Ex : nom.prénom@mail.fr">

                        <!-- mot de passe -->
                        <label for="motdepasse" class="form-label mt-1">Mot de passe : </label><span class="text-danger">
                            <?=
                            $arrayError["motdepasse"] ?? " ";
                            ?>
                        </span>
                        <input value="<?= isset($_POST["motdepasse"]) ? htmlspecialchars($_POST["motdepasse"]) : "" ?>" name=" motdepasse" type="password" class="form-control col-12" id="motdepasse" placeholder="Saisissez votre mot de passe">
                    </div>
                    <div class="mb-3 form-check ms-1">
                        <input type="checkbox" class="form-check-input" name="checkBox" id="checkBox">
                        <label class="form-check-label" for="checkBox">Accepter les CGU</label><span class="text-danger">
                            <?=
                            $arrayError["checkBox"] ?? " ";
                            ?>
                        </span>
                    </div>
                    <span class="text-danger">
                        <?=
                        $arrayError["reCaptcha"] ?? " ";
                        ?>
                    </span>
                    <div class="g-recaptcha" data-sitekey="6LdvTZkeAAAAAODC1ihzB7MWwJZZ9vyhzVI59Q9P"></div>
                    <button type="submit" class="btn btn-success mb-5 mt-3 col-12 ">Valider</button>
                </form>
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

<?php if (isset($alertregistration)) { ?>
    <span id="alertconfirm"></span>

<?php } ?>


<?php
include "../templates/footer.php";
?>