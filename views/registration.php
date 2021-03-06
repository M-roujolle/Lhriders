<?php
require "../controllers/controller_registration.php";
include "../templates/header.php";
?>



<div class="principalePictRegistration d-none d-lg-block">
</div>
<h1 class=" selectColor pt-3 pb-3 text-center">Inscription</h1>

<!-- Formulaire de contact-------------------------------------------------------------------------------------------->
<form action="registration.php" method="POST" class="ps-3 pe-3">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <h3 class="colorOrange">Bienvenue</h3>
                <p class="">Créer votre profil pour partager votre balade !</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading mt-2"></h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- pseudo -->
                                    <label for="pseudo" class="form-label">Pseudo* : </label><span class="text-danger">
                                        <?=
                                        $arrayError["pseudo"] ?? " ";
                                        ?>
                                    </span>
                                    <input value="<?= isset($_POST["pseudo"]) ? htmlspecialchars($_POST["pseudo"]) : "" ?>" name="pseudo" type="text" class="form-control" id="pseudo" placeholder="Ex : Pierre24">
                                </div>
                                <div class="form-group">
                                    <!--  prenom -->
                                    <label for="prenom" class="form-label mt-1">Prénom* : </label><span class="text-danger">
                                        <?=
                                        $arrayError["prenom"] ?? " ";
                                        ?>
                                    </span>
                                    <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control" id="prenom" placeholder="Ex : Jean">
                                </div>
                                <div class="form-group">
                                    <!-- nom -->
                                    <label for="nom" class="form-label">Nom* : </label><span class="text-danger">
                                        <?=
                                        $arrayError["nom"] ?? " ";
                                        ?>
                                    </span>
                                    <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control" id="nom" placeholder="Ex : Dupont">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- mail -->
                                    <label for="mail" class="form-label mt-1">Mail* : </label><span class="text-danger">
                                        <?=
                                        $arrayError["mail"] ?? " ";
                                        ?>
                                    </span>
                                    <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control" id="mail" placeholder="Ex : nom.prénom@mail.fr">
                                </div>
                                <div class="form-group mt-4">

                                    <!-- mot de passe -->
                                    <label for="motdepasse" class="form-label">Mot de passe* : </label><span class="text-danger">
                                        <?=
                                        $arrayError["motdepasse"] ?? " ";
                                        ?>
                                    </span>
                                    <input value="<?= isset($_POST["motdepasse"]) ? htmlspecialchars($_POST["motdepasse"]) : "" ?>" name=" motdepasse" type="password" class="form-control" id="motdepasse" placeholder="Mot de passe">

                                    <!-- confirmation mot de passe -->
                                    <label for="confmotdepasse" class="form-labe mt-4">Confirmation mot de passe* : </label><span class="text-danger">
                                        <?=
                                        $arrayError["confmotdepasse"] ?? " ";
                                        ?>
                                    </span>
                                    <input value="<?= isset($_POST["confmotdepasse"]) ? htmlspecialchars($_POST["confmotdepasse"]) : "" ?>" name=" confmotdepasse" type="password" class="form-control mt-2" id="confmotdepasse" placeholder="Confirmez votre mot de passe">
                                </div>
                                <div class="form-check ms-1 mt-3">
                                    <input type="checkbox" class="form-check-input" name="checkBox" id="checkBox">
                                    <label class="form-check-label" for="checkBox">Accepter les CGU*</label><span class="text-danger">
                                        <?=
                                        $arrayError["checkBox"] ?? " ";
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <span class="text-danger">
                                <?=
                                $arrayError["reCaptcha"] ?? " ";
                                ?>
                            </span>
                            <div class="d-flex justify-content-center">
                                <div class="g-recaptcha mt-3" data-sitekey="6LdvTZkeAAAAAODC1ihzB7MWwJZZ9vyhzVI59Q9P"></div>
                            </div>


                            <button type="submit" class="buttongreen text-white mt-4 ms-4 col-11">Valider</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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




<?php if (isset($alertregistration)) { ?>
    <span id="alertconfirm"></span>

<?php } ?>


<?php
include "../templates/footer.php";
?>