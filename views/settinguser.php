<?php
require '../controllers/controller_settinguser.php';
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
    <title>Modification d'un utilisateur</title>
</head>

<body>
    <h1 class="text-center mb-5 mt-2">Modifier votre profil</h1>


    <div class="container d-flex justify-content-center">
        <div class="card shadow bg-dark text-white" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title text-center pb-4 text-warning">Bonjour <?= $_SESSION["nom"] ?> <?= $_SESSION["prénom"] ?> </h5>
                <p class="card-title text-center pb-4 text-warning">N° de id utilisateur : <?= $_SESSION["id"] ?></p>

                <form action="settinguser.php" method="POST">
                    Pseudo : <input class="input-group input-group-sm mb-3" type="text" name="pseudo" value="<?= $_SESSION["pseudo"] ?>">
                    <label for="nom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["pseudo"] ?? " ";
                        ?>
                    </span><br>

                    Prénom : <input disabled class="input-group input-group-sm mb-3" type="text" value="<?= $_SESSION["prénom"] ?>">
                    <label for="prenom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? " ";
                        ?>
                    </span><br>

                    Nom : <input disabled class="input-group input-group-sm mb-3" type="text" value="<?= $_SESSION["nom"] ?>">
                    <label for="nom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span><br>

                    Mail : <input class="input-group input-group-sm mb-3" type="text" name="mail" value="<?= $_SESSION["mail"] ?>">-
                    <label for="mail" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span><br>


                    <!-- Button trigger modal -->
                    <!-- on laisse un button type button ici, on recupere l'info plus bas -->
                    <div class="text-center">
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

    <div class="text-center">
        <a class="btn btn-danger mt-5 mb-5 ms-2" href="home.php"><i class="bi bi-arrow-return-left"></i> Retour à l'accueil</a>
    </div>


</body>

</html>