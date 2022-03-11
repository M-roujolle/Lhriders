<?php
require '../controllers/controller_modifuser.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Modification d'un utilisateur</title>
</head>

<body>
    <h1 class="selectColor pt-3 pb-3 text-center">Modification d'un utilisateur</h1>

    <div class="container d-flex justify-content-center mt-5">
        <div class="col-lg-4">
            <h5 class="card-title text-center pb-1 colorOrange">N°d'id: <?= $oneUser["user_id"] ?></h5>
            <div class="center border border-dark">
                <form action="" method="POST">
                    Pseudo: <label for="nom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["pseudo"] ?? " ";
                        ?>
                    </span>
                    <div class="inputbox">
                        <br>
                        <input class="input-group input-group-sm mb-3" type="text" name="pseudo" value="<?= $oneUser["user_pseudo"] ?>">
                    </div>
                    Prénom: <label for="prenom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? " ";
                        ?>
                    </span><br>
                    <div class="inputbox">
                        <br>
                        <input class="input-group input-group-sm mb-3" type="text" name="prenom" value="<?= $oneUser["user_firstname"] ?>">
                    </div>
                    Nom: <label for="nom" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span><br>
                    <div class="inputbox">
                        <br>
                        <input class="input-group input-group-sm mb-3" type="text" name="nom" value="<?= $oneUser["user_lastname"] ?>">
                    </div>
                    Mail: <label for="mail" class="form-label"></label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span><br>
                    <div class="inputbox">
                        <br>
                        <input class="input-group input-group-sm mb-3" type="text" name="mail" value="<?= $oneUser["user_mail"] ?>">
                        <input type="hidden" name="iduser" value="<?= $oneUser["user_id"] ?>">
                    </div>


                    <!-- !-- Button trigger modal -->
                    <!-- on laisse un button type button ici, on recupere l'info plus bas -->
                    <div class="text-center">
                        <button type="button" class="buttonblue mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                        <input type="submit" value="Enregistrer" class="buttongreen text-white"></input>
                                        <button type="button" class="buttondelete" data-bs-dismiss="modal">Annuler</button>
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
        <a class="buttondark mt-5 mb-5 ms-2" href="listusers.php"><i class="bi bi-arrow-return-left"></i> Retour à la liste des utilisateurs</a>
    </div>


</body>

</html>