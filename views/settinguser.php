<?php
require '../controllers/controller_settinguser.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modification profil</title>
</head>

<body>

    <!-- NAVBAR------------------------------------------------------------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-light sticky-top navColor">
        <div class="container-fluid">
            <img class="logo" src="../assets/img/logomoto.png">
            <a class="navbar-brand text-white ps-1" href="home.php">LH Riders</a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="home.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./ride.php">Balades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./advicemaintenance.php">Conseils / Entretien</a>
                    </li>
                    <?php if (isset($_SESSION["id"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="./createride.php">Créer son tracé</a>
                        </li>
                    <?php } ?>
                </ul>


                <?php if (isset($_SESSION["id"])) { ?>
                    <form action="" method="POST">
                        <a href="settinguser.php" class="fs-3 text-white mb-1 pe-2"><i class="bi bi-gear"></i></a>
                    </form>
                    <a class="abutton" href="logout.php">Se déconnecter</a>

                <?php } else { ?>

                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="nav-link active text-white ps-4">Connexion / Inscription <i class="bi bi-person-circle fs-3"></i></a>
                    </button>
                <?php } ?>

                <?php if (isset($_SESSION["id"]) && $_SESSION["role"] == "1") { ?>
                    <a class="bbutton" href="listusers.php">Panel admin</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="principalePictModifUser">
        <div class="text-center pt-4">
            <h1>Modifie ton profil ici </h1>
        </div>
    </div>


    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow bg-dark text-white" style="width: 50rem;">
            <div class="card-body">
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

    <div class="text-center">
        <a class="btn btn-danger mt-5 mb-5 ms-2" href="home.php"><i class="bi bi-arrow-return-left"></i> Retour à l'accueil</a>
    </div>
    <!-- FOOTER----------------------------------------------------------------------------------------------------------------------------------------->

    <footer>
        <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="../views/contact.php">Contact</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="../views/cgu.php">Conditions génerales d'utilisation</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="../views/legalnotice.php">Mentions Légales</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" href="./legislation.php">Législation</a>
                </li>
            </ul>
            <p class="copyright">©LH Riders 2022</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>