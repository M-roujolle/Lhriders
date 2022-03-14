<?php
require '../controllers/controller_settinguser.php';
include "../templates/header.php";
?>

<div class="principalePictModifUser d-none d-lg-block">
</div>

<h1 class="text-center selectColor pt-3 pb-3 mb-5">Modifier son profil</h1>

<div class="row m-0 p-0 justify-content-evenly">
    <div class="col-lg-4">
        <div class="center border border-dark">
            <h1>Bonjour <?= $_SESSION["pseudo"] ?></h1>
            <p>Votre N° d'identification : <?= $_SESSION["id"] ?></p>

            <form action="settinguser.php" method="POST">
                Pseudo: <label for="nom" class="form-label"></label><span class="text-danger">
                    <?=
                    $arrayError["pseudo"] ?? " ";
                    ?>
                </span>
                <div class="inputbox">
                    <br>
                    <input class="input-group input-group-sm" type="text" name="pseudo" value="<?= $_SESSION["pseudo"] ?>">
                </div>
                Mail : <label for="mail" class="form-label"></label><span class="text-danger">
                    <?=
                    $arrayError["mail"] ?? " ";
                    ?>
                </span><br>
                <div class="inputbox">
                    <br>
                    <input class="input-group input-group-sm" type="text" name="mail" value="<?= $_SESSION["mail"] ?>">
                </div>


                <!-- !-- Button trigger modal -->
                <!-- on laisse un button type button ici, on recupere l'info plus bas -->
                <div class="mt-5">
                    <button type="button" class="buttondark text-white mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Modifier
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
                                    <input type="submit" name="saveuser" value="Enregistrer" class="buttongreen text-white"></input>
                                    <button type="button" class="buttonreturn" data-bs-dismiss="modal">Retour</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card border border-dark">
            <div class="card-body">
                <h5 class="card-title text-center mt-2">Modifier mes balades</h5>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <?php foreach ($arrayShowRideId as $value) { ?>
                        <tbody>
                            <th scope="row"><a href="modifride.php?id=<?= $value["ride_id"] ?>" class="buttondark text-white"><?= $value["ride_title"] ?></a></th>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalsupp<?= $value["ride_id"] ?>">
                                    <i class="bi bi-trash"></i> </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modalsupp<?= $value["ride_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes vous certain de vouloir supprimer ce tracé ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="settinguser.php" method="POST">
                                                    <input type="hidden" value="<?= $value["ride_id"] ?>" name="rideid">
                                                    <button type="submit" name="suppride" class="buttondelete">Supprimer</button>
                                                </form>
                                                <a href="settinguser.php" class="buttonreturn text-white">Retour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>


    <div class="text-center">
        <a class="buttondark text-white mt-5 ms-2" href="home.php">Retour à l'accueil</a>
    </div>


    <?php
    include "../templates/footer.php";
    ?>