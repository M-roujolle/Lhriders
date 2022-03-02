<?php
require "../controllers/controller_contact.php";
require "../controllers/controller_users.php";
include "../templates/header.php";
?>

<div class="principalePictContact">
</div>

<!-- Formulaire de contact-------------------------------------------------------------------------------------------->

<?php if (!empty($_POST) && empty($arrayError)) { ?>

    <div class="text-center pt-5 ms-5 me-5">
        <h1>Voici votre demande, nous vous en remercions. Nous allons vous contacter dans les plus bref délais :<h1><br>
                <p>Votre nom : "<?= htmlspecialchars($_POST['nom']); ?>"</p>
                <p>Votre prénom : "<?= htmlspecialchars($_POST['prenom']); ?>"</p>
                <p>Votre mail : "<?= htmlspecialchars($_POST['mail']); ?>"</p>
                <p>Votre demande : "<?= htmlspecialchars($_POST['select']); ?>"</p>
                <p>Votre commentaire : "<?= htmlspecialchars($_POST['story']); ?>"</p>
                <a class="btn btn-success mt-5" href="index.php">Retour à l'accueil</a>
    </div>

<?php } else { ?>

    <h1 class="text-center pt-3 mb-3">Formulaire de Contact</h1>
    <div class="row m-0">
        <div class="d-flex justify-content-center">
            <div class=" col-lg-6 mt-5">
                <div class="navColor text-white d-flex justify-content-center">

                    <form action="contact.php" method="POST" class="ps-3 pe-3">


                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom : </label><span class="text-danger">
                                <?=
                                $arrayError["nom"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control w-75" id="nom" placeholder="Ex : Dupont...">

                            <label for="prenom" class="form-label mt-1">Prénom : </label><span class="text-danger">
                                <?=
                                $arrayError["prenom"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control w-75" id="prenom" placeholder="Ex : Jean...">

                            <label for="mail" class="form-label mt-1">Mail : </label><span class="text-danger">
                                <?=
                                $arrayError["mail"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control w-75" id="mail" placeholder="Ex : nom.prénom@mail.fr...">
                        </div>



                        <button type="submit" class="buttondark col-6 mb-5 ms-1">Envoyer</button>
                    </form>
                </div>
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
                <a class="buttonorange text-white position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>