<?php
require '../controllers/controller_showride.php';
// var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Modification d'une sortie</title>
</head>

<body>
    <h1 class="text-center mb-5 mt-2">Modification d'une balade MODE ADMIN</h1>


    <form action="" method="POST">

        <div class="container bg-danger">
            <p class="text-center">Id de la balade <?= $oneride['ride_id'] ?> </p>
            <div class="mb-3 mt-5">
                <label for="titre" class="form-label">Titre :</label>
                <input disabled name="titre" value="<?= $oneride['ride_title'] ?>" type="text" class="form-control" id="titre">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea disabled name="description" rows="9" cols="33" type="text" class="form-control" id="description"><?= $oneride['ride_description'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="iframe" class="form-label">Iframe :</label>
                <textarea disabled name="iframe" class="form-control" id="iframe" aria-describedby="emailHelp"><?= $oneride['ride_iframe'] ?></textarea>
                <div class="text-center mt-3">
                    <?= $oneride['ride_iframe'] ?>
                </div>
            </div>

            <div class="row g-2">
                <div class="col-md text-dark">
                    <div class="form-floating">
                        <input disabled name="kilometre" type="number" class="form-control" id="kilometre" value="<?= $oneride['ride_kilometre'] ?>">
                        <label for="kilometre">Kilomètres :</label>

                    </div>
                </div>
                <div class="col-md text-dark">
                    <div class="form-floating">
                        <input disabled name="heure" type="time" class="form-control" id="heure" value="<?= $oneride['ride_hours'] ?>">
                        <label for="heure">Heure de départ :</label>

                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="select">Choix du nombre de participants (min 2 - max 50) :</label>
                <input disabled class="form-control mb-5" type="text" name="select" value="<?= $oneride['ride_participants'] ?>">
            </div>

            <div class="row g-2">
                <div class="col-md text-dark">
                    <div class="form-floating">
                        <input disabled name="rdv" type="text" class="form-control" id="rdv" value="<?= $oneride['ride_meeting'] ?>">
                        <label for="rdv">Point de rendez-vous :</label>
                    </div>
                </div>
                <div class="col-md text-dark">
                    <div class="form-floating mb-5">
                        <input disabled name="date" value="<?= $oneride['ride_date'] ?>" type="date" class="form-control" id="titre">
                        <label for="date" class="form-label">Date de départ</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="text-center">
        <a class="btn btn-danger mt-5 mb-5 ms-2" href="listusers.php"><i class="bi bi-arrow-return-left"></i> Retour à la liste des utilisateurs</a>
    </div>
</body>

</html>