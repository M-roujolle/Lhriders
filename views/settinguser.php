<?php
require '../controllers/controller_settinguser.php';
include "../templates/header.php";
?>

<div class="principalePictModifUser">
    <div class="text-center pt-4">
        <h1>Modifie ton profil ici </h1>
    </div>
</div>

<div class="row m-0 p-0 justify-content-evenly">
    <div class="col-lg-4 mt-5 ">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mt-2">Modifier mon profil</h5>
            </div>
            <div class="card-body bg-dark text-white">
                <h5 class="card-title text-center pb-4 text-warning">Bonjour <?= $_SESSION["nom"] ?> <?= $_SESSION["prénom"] ?> </h5>
                <p class="card-title text-center pb-4 text-warning">Votre N° d'identification : <?= $_SESSION["id"] ?></p>

                <form action="settinguser.php" method="POST">
                    Pseudo :<label for="nom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["pseudo"] ?? " ";
                        ?>
                    </span><br>
                    <input class="input-group input-group-sm mb-4" type="text" name="pseudo" value="<?= $_SESSION["pseudo"] ?>">


                    Prénom : <input disabled class="input-group input-group-sm" type="text" value="<?= $_SESSION["prénom"] ?>">
                    <label for="prenom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? " ";
                        ?>
                    </span><br>

                    Nom : <input disabled class="input-group input-group-sm" type="text" value="<?= $_SESSION["nom"] ?>">
                    <label for="nom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span><br>

                    Mail : <label for="mail" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span><br>
                    <input class="input-group input-group-sm mb-3" type="text" name="mail" value="<?= $_SESSION["mail"] ?>">

                    <!-- Button trigger modal -->
                    <!-- on laisse un button type button ici, on recupere l'info plus bas -->
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Enregistrer
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body text-dark">
                                    Etes vous sur de vouloir enregistrer les modifications ?
                                </div>
                                <div class="modal-footer">
                                    <!-- l'input va recuperer les valeurs, le mettre en type submit et une value -->
                                    <form action="settinguser.php" method="POST">
                                        <input type="submit" value="Enregistrer" class="btn btn-success"></input>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title text-center mt-2">Modifier mes balades</h5>
                <?php foreach ($arrayShowRideId as $value) { ?>
                    <ul class="mt-4">
                        <li>
                            <a href="modifride.php?id=<?= $value["ride_id"] ?>" class="btn btn-primary"><?= $value["ride_title"] ?></a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <a class="btn btn-danger mt-5 mb-5 ms-2" href="home.php"><i class="bi bi-arrow-return-left"></i> Retour à l'accueil</a>
</div>


<?php
include "../templates/footer.php";
?>