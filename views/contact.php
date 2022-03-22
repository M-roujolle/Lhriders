<?php
require "../controllers/controller_contact.php";
require "../controllers/controller_users.php";
include "../templates/header.php";
?>

<div class="principalePictContact d-none d-lg-block">
</div>

<h1 class="text-center text-white mt-5">Contact</h1>
<form action="" method="POST">
    <div class="container mt-5 colorBlack">

        <div class="row register-form">
            <div class="col-md-6">
                <div class="form-group">
                    <!-- nom -->
                    <label for="nom" class="form-label text-white">Nom : </label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control" id="nom" placeholder="Ex : Dupont">
                </div>
                <div class="form-group">
                    <!--  prenom -->
                    <label for="prenom" class="form-label text-white">Prénom : </label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control" id="prenom" placeholder="Ex : Jean">
                </div>
                <div class="form-group">
                    <!-- mail -->
                    <label for="mail" class="form-label mt-1 text-white">Mail : </label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control" id="mail" placeholder="Ex : nom.prénom@mail.fr">
                </div>
            </div>

            <div class="col-md-6">
                <label for="comment" class="form-label text-white">Commentaire :</label><span class="text-danger">
                    <?=
                    $arrayError["comment"] ?? " ";
                    ?>
                </span>
                <textarea name="comment" class="form-label" rows="9" id="comment" type="text" aria-describedby="emailHelp" placeholder="Veuillez décrire votre demande"><?= isset($_POST["comment"]) ? htmlspecialchars($_POST["comment"]) : "" ?></textarea>
            </div>

            <div class="d-flex justify-content-center">
                <span class="text-danger">
                    <?=
                    $arrayError["reCaptcha"] ?? " ";
                    ?>
                </span>
                <div class="g-recaptcha mt-3" data-sitekey="6LdvTZkeAAAAAODC1ihzB7MWwJZZ9vyhzVI59Q9P"></div>
            </div>
            <div class="text-center">
                <button type="submit" name="idsubmit" class="buttondark col-2 mt-4 mb-3">Envoyer</button>
            </div>
        </div>
    </div>
</form>

<!-- modal connexion -->

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