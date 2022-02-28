<?php
require '../controllers/controller_modifride.php';
include "../templates/header.php";
?>


<form action="" method="POST">

    <p><?= $arrayError["belong"] ?? "" ?></p>

    <p class="text-center mt-5 border border-dark">Balade numéro <?= $modifride['ride_id'] ?> </p>

    <div class="row g-2 justify-content-evenly m-0">
        <div class="col-lg-4">
            <div class="form-control mb-3 shadow">
                <label for="titre" class="form-label">Titre :</label>
                <input name="titre" value="<?= $modifride['ride_title'] ?>" type="text" class="form-control" id="titre">
            </div>
            <div class="form-control mb-3 shadow">
                <label for="iframe" class="form-label">Iframe :</label>
                <textarea name="iframe" class="form-control" id="iframe" aria-describedby="emailHelp"><?= $modifride['ride_iframe'] ?></textarea>
            </div>
            <div class="form-control mb-3 shadow">
                <label for="kilometre">Kilomètres :</label>
                <input name="kilometre" type="number" class="form-control" id="kilometre" value="<?= $modifride['ride_kilometre'] ?>">
            </div>
            <div class="form-control mb-3 shadow">
                <label for="select">Choix du nombre de participants (min 2 - max 50) :</label>
                <input class="form-control mb-5" type="text" name="select" value="<?= $modifride['ride_participants'] ?>">
            </div>
            <div class="form-control mb-3 shadow">
                <label for="rdv">Point de rendez-vous :</label>
                <input name="rdv" type="text" class="form-control" id="rdv" value="<?= $modifride['ride_meeting'] ?>">
            </div>
            <div class="form-control mb-3 shadow">
                <label for="date" class="form-label">Date de départ</label>
                <input name="date" value="<?= $modifride['ride_date'] ?>" type="date" class="form-control" id="titre">
            </div>
            <div class="form-control mb-3 shadow">
                <label for="heure">Heure de départ :</label>
                <input name="heure" type="time" class="form-control" id="heure" value="<?= $modifride['ride_hours'] ?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-control shadow">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" rows="9" cols="33" type="text" class="form-control" id="description"><?= $modifride['ride_description'] ?></textarea>
            </div>
            <div class="card-body">
                <div class="row">
                    <?= $modifride["ride_iframe"] ?>
                </div>
            </div>
        </div>



        <!-- Button trigger modal -->
        <!-- on laisse un button type button ici, on recupere l'info plus bas -->
        <div class="text-center">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                        <form action="" method="POST">
                            <input type="submit" value="Enregistrer" class="btn btn-success"></input>
                            <input type="hidden" name="idride" value="<?= $_GET["id"] ?>"></input>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</form>

<div class="text-center">
    <a class="btn btn-danger mt-5 mb-5 ms-2" href="settinguser.php"></i>Retour au profil</a>
</div>

<?php
include "../templates/footer.php";
?>