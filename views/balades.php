<?php

require '../controllers/controller_users.php';
require "../data/data.php";
session_start();
// on verifie si post login, password et connexikon sont dispo
if (isset($_POST["login"], $_POST["password"], $_POST["connexion"])) {

    // si login et password ne sont pas vide
    if (!empty($_POST["login"]) && !empty($_POST["password"])) {
        $user = new Users;

        $existUser = $user->verifUserExist($_POST["login"])["utilisateur"];

        if ($existUser === "1") {

            // on stock notre mdp dans $userPassword
            $userPassword = $user->verifPassword($_POST["login"])["user_password"];

            // function php qui verfie le mdp avec le mdp hashé
            if (password_verify($_POST["password"], $userPassword)) {
                $_SESSION = $user->getUser($_POST["login"]);
                // var_dump($_SESSION);
            } else {
                $errormessage = "Pseudo ou mot de passe invalide";
                $errorConnect = true;
            }
        } else {
            $errormessage = "Pseudo ou mot de passe invalide";
            $errorConnect = true;
        }
    } else {
        $errormessage = "Veuillez remplir les champs 'login' et 'password'";
        $errorConnect = true;
    }
}
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Balades</title>
</head>

<body>

    <!-- NAVBAR------------------------------------------------------------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-light sticky-top navColor">
        <div class="container-fluid">
            <img class="logo" src="../assets/img/logomoto.png">
            <a class="navbar-brand text-white ps-1" href="home.php">MotoPoto</a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="home.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./balades.php">Balades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./legislation.php">Législation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./conseils.php">Conseils / Entretien</a>
                    </li>
                    <?php if (isset($_SESSION["id"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="./create_ride.php">Créer son tracé</a>
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
                    <a href="listusers.php">MODE ADMIN</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="principalePictBalades">
        <div class="text-center pt-4">
            <h1 class="text-center"> Plus qu’une balade : une aventure</h1>
        </div>
    </div>

    <!-- boucles roadMaps------------------------------------------------------------------------------------------------------------------------>

    <h2 class="text-center pt-5 ms-5 me-5">
        Que diriez-vous d'une balade moto sur les plus belles routes de Normandie ? Pour une sortie improvisée ou longuement préparée, faites l'expérience de la liberté.</h2>

    <div class="row justify-content-evenly m-0 pt-5 pb-5 text-center">

        <?php foreach ($roadMaps as $key => $value) { ?>
            <div class="col-lg-6">
                <div class="card mb-5 bg-secondary text-white">
                    <div class="card-body">
                        <div class="container">
                            <?= $value["iframe"] ?>
                        </div>
                        <h5 class="card-title pt-3"><?= $value["name"] ?></h5>
                        <p class="card-text"><?= $value["description"] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

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
                        <input class="mt-3 btn btn-outline-primary text-center" type="submit" value="Connexion" name="connexion">
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success position-absolute top-100 start-50 translate-middle" href="./inscription.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-evenly m-0 pt-5 pb-5 text-center">
        <?php foreach ($allRideArray as $ride) { ?>
            <div class="col-lg-6">
                <div class="card mb-5 bg-secondary text-white">
                    <div class="card-body">
                        <div class="container">
                            <?= $ride["ride_iframe"] ?>
                        </div>
                        <h5 class="card-title pt-3"><?= $ride["ride_title"] ?></h5>
                        <p class="card-text"><?= $ride["ride_description"] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>



    <!-- FOOTER----------------------------------------------------------------------------------------------------------------------------------------->

    <footer>
        <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5">

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="./contact.php">Contact</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="./cgu.php">Conditions génerales d'utilisation</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="./mentionslegales.php">Mentions Légales</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="./cookies.php">Cookies</a>
                </li>
            </ul>
            <p class="copyright">©Moto Poto 2022</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        if (<?= $errorConnect ?? false ?>)
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $errormessage ?>',
            })
    </script>
</body>

</html>