<?php
require '../controllers/controller_modifride.php';
include "../templates/header.php";
?>

<div class="principalePictModifride d-none d-lg-block">
</div>

<h1 class="selectColor pt-3 pb-3 text-center">Modification du tracé</h1>

<div class="container mt-5">
    <form action="" method="POST">

        <p><?= $arrayError["belong"] ?? "" ?></p>

        <label for="titre" class="form-label colorOrange">Titre :</label><span class="text-danger">
            <?=
            $arrayError["titre"] ?? " ";
            ?>
        </span>
        <input name="titre" value="<?= $modifride['ride_title'] ?>" type="text" class="form-control" id="titre">

        <label for="iframe" class="form-label colorOrange">Iframe :</label><span class="text-danger">
            <?=
            $arrayError["iframe"] ?? " ";
            ?>
        </span>
        <textarea name="iframe" class="form-label" id="iframe" aria-describedby="emailHelp"><?= $modifride['ride_iframe'] ?></textarea>

        <label for="kilometre" class="form-label colorOrange">Kilomètres :</label><span class="text-danger">
            <?=
            $arrayError["kilometre"] ?? " ";
            ?>
        </span>
        <input name="kilometre" type="number" class="form-control" id="kilometre" value="<?= $modifride['ride_kilometre'] ?>">

        <label for="select" class="form-label colorOrange mt-3">Choix du nombre de participants (min 2 - max 50) :</label><span class="text-danger">
            <?=
            $arrayError["select"] ?? " ";
            ?>
        </span>

        <select name="select" class="form-select form-select" aria-label="form-select-sm example">
            <option selected value="0" class="form-label colorOrange">Nombre de participants</option>
            <option <?= $modifride['ride_participants'] == "De 2 à 5" ? "selected" : "" ?>>De 2 à 5</option>
            <option <?= $modifride['ride_participants'] == "De 5 à 10" ? "selected" : "" ?>>De 5 à 10</option>
            <option <?= $modifride['ride_participants'] == "De 10 à 20" ? "selected" : "" ?>>De 10 à 20</option>
            <option <?= $modifride['ride_participants'] == "De 20 à 30" ? "selected" : "" ?>>De 20 à 30</option>
            <option <?= $modifride['ride_participants'] == "De 30 à 40" ? "selected" : "" ?>>De 30 à 40</option>
            <option <?= $modifride['ride_participants'] == "De 40 à 50" ? "selected" : "" ?>>De 40 à 50 </option>
        </select>

        <label for="rdv" class="form-label colorOrange">Point de rendez-vous :</label><span class="text-danger">
            <?=
            $arrayError["rdv"] ?? " ";
            ?>
        </span>
        <input name="rdv" type="text" class="form-control" id="rdv" value="<?= $modifride['ride_meeting'] ?>">

        <label for="date" class="form-label colorOrange">Date de départ</label><span class="text-danger">
            <?=
            $arrayError["date"] ?? " ";
            ?>
        </span>
        <input name="date" value="<?= $modifride['ride_date'] ?>" type="date" class="form-control" id="titre">

        <label for="heure" class="form-label colorOrange mt-3">Heure de départ :</label><span class="text-danger">
            <?=
            $arrayError["heure"] ?? " ";
            ?>
        </span>
        <input name="heure" type="time" class="form-control" id="heure" value="<?= $modifride['ride_hours'] ?>">

        <label for="description" class="form-label colorOrange mt-3">Description :</label><span class="text-danger">
            <?=
            $arrayError["description"] ?? " ";
            ?>
        </span>
        <textarea name="description" rows="9" cols="33" type="text" class="form-control" id="description"><?= $modifride['ride_description'] ?></textarea>

        <div class="row">
            <?= $modifride["ride_iframe"] ?>
        </div>

        <!-- Button trigger modal -->
        <!-- on laisse un button type button ici, on recupere l'info plus bas -->
        <div class="text-center mt-5">
            <button type="button" class="buttongreen text-white col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Modifier
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body text-dark">
                        Vos modifications seront de nouveau soumise à un contrôle êtes vous sur de vouloir enregistrer les modifications ?
                    </div>
                    <div class="modal-footer">
                        <form action="" method="POST">
                            <input type="submit" value="Enregistrer" class="buttongreen"></input>
                            <input type="hidden" name="idride" value="<?= $_GET["id"] ?>"></input>
                            <button type="button" class="buttondelete text-white" data-bs-dismiss="modal">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

















<div class="text-center">
    <a class="buttondark text-white mt-5 mb-5" href="settinguser.php"></i>Retour au profil</a>
</div>

<?php
include "../templates/footer.php";
?>