<?php

require '../controllers/controller_createride.php';
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
    <title>Créer son tracé</title>
</head>

<body">

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
                            <a class="nav-link active text-white" href="./conseils.php">Créer son tracé</a>
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
    <div class="principalePictCreateRide">
        <div class="text-center pt-4">
            <h1 class="text-center"> Créer ton propre tracé</h1>
        </div>
    </div>


    <!-- formulaire creation de tracé ------------------------------------>

    <div class="d-flex justify-content-center">
        <div class="navColor text-white col-lg-6 ps-5 pe-5 pb-5 mt-5 shadow">
            <h2 class="text-center mt-3 selectColor">Création du tracé</h2>


            <form action="create_ride.php" method="POST">


                <div class="mb-3 mt-5">
                    <label for="titre" class="form-label">Titre</label><span class="text-danger">
                        <?=
                        $arrayError["titre"] ?? " ";
                        ?>
                        <input name="titre" value="<?= isset($_POST["titre"]) ? htmlspecialchars($_POST["titre"]) : "" ?>" type="text" class="form-control" id="titre" placeholder="Ex: Le Havre - Fécamp">
                        <p id="titre" class="form-text text-white">Indique ton point de départ et d'arrivée</p>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label><span class="text-danger">
                        <?=
                        $arrayError["description"] ?? " ";
                        ?>
                        <textarea name="description" value="<?= isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : "" ?>" rows="9" cols="33" type="text" class="form-control" id="description" placeholder="Ex : Route variée, avec de la petite route avec des beaux virages et de belles vues sur la mer, petite pause à Etretat pour observer les falaises, et direction Le Havre en passant par la plage. "></textarea>
                        <div id="emailHelp" class="form-text text-white">Décris en quelques mots ton tracé. Points d'intérets, types de routes, temps de route etc...</div>
                </div>

                <div class="mb-3">
                    <label for="iframe" class="form-label">Iframe</label><span class="text-danger">
                        <?=
                        $arrayError["iframe"] ?? " ";
                        ?>
                        <input name="iframe" type="text" value="<?= isset($_POST["iframe"]) ? htmlspecialchars($_POST["iframe"]) : "" ?>" class="form-control" id="iframe" aria-describedby="emailHelp" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d165407.58526710264!2d0.128765300210693!3d49.626152441086234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x47e02f2395218b7d%3A0x5bc1867aaf33af12!2sLe%20Havre!3m2!1d49.494369999999996!2d0.107929!4m5!1s0x47e06b69133e1681%3A0x57434975e5d89613!2zRsOpY2FtcA!3m2!1d49.755601!2d0.380774!5e0!3m2!1sfr!2sfr!4v1645183233975!5m2!1sfr!2sfr' width='600' height='450' style='border:0;' allowfullscreen=' loading='lazy'></iframe>">
                        <div id="iframe" class="form-text text-white"><a href="https://alphadesign.fr/blog/comment-creer-une-google-map-responsive-pour-n-importe-quel-site.html"> Comment recupérer un iframe sur google ?</a></div>
                </div>

                <div class="row g-2">
                    <div class="col-md text-dark">
                        <div class="form-floating">
                            <input name="kilometre" type="number" class="form-control" id="kilometre" placeholder="Ex : 24 km" value="<?= isset($_POST["kilometre"]) ? htmlspecialchars($_POST["kilometre"]) : "" ?>">
                            <label for="kilometre">Kilomètres</label><span class="text-danger">
                                <?=
                                $arrayError["kilometre"] ?? " ";
                                ?>
                                <div id="kilometre" class="form-text text-white"> Indique le kilometrage du tracé</div>
                        </div>
                    </div>

                    <div class="col-md text-dark">
                        <div class="form-floating">
                            <input name="prix" class="form-control" id="prix" placeholder="Ex : 8€" value="<?= isset($_POST["prix"]) ? htmlspecialchars($_POST["prix"]) : "" ?>">
                            <label for="prix">Prix carburant (estimation)</label><span class="text-danger">
                                <?=
                                $arrayError["prix"] ?? " ";
                                ?>
                                <div id="prix" class="form-text text-white"> Indique le coût de carburant du tracé</div>
                        </div>
                    </div>
                </div>

                <label for="select"></label><span class="text-danger">
                    <?=
                    $arrayError["select"] ?? " ";
                    ?>
                    <select name="select" class="form-select form-select-sm mt-4 mb-4" aria-label="form-select-sm example">
                        <option selected value="0">Choisi ton nombre de participants (min 2 - max 50)</option>
                        <option value="1">De 2 à 5</option>
                        <option value="2">De 5 à 10</option>
                        <option value="3">De 10 à 20</option>
                        <option value="4">De 20 à 30</option>
                        <option value="5">De 30 à 40</option>
                        <option value="6">De 40 à 50 </option>
                    </select>

                    <div class="row g-2">
                        <div class="col-md text-dark">
                            <div class="form-floating">
                                <input name="heure" type="time" class="form-control" id="heure" placeholder="10h30" value="<?= isset($_POST["heure"]) ? htmlspecialchars($_POST["heure"]) : "" ?>">
                                <label for="heure">Heure de départ</label><span class="text-danger">
                                    <?=
                                    $arrayError["heure"] ?? " ";
                                    ?>
                                    <div id="heure" class="form-text text-white"> Indique l'heure de départ de ta balade</div>
                            </div>
                        </div>

                        <div class="col-md text-dark">
                            <div class="form-floating">
                                <input name="rdv" type="text" class="form-control" id="rdv" placeholder="Ex : Stade océane" value="<?= isset($_POST["rdv"]) ? htmlspecialchars($_POST["rdv"]) : "" ?>">
                                <label for="rdv">Point de rendez-vous</label><span class="text-danger">
                                    <?=
                                    $arrayError["rdv"] ?? " ";
                                    ?>
                                    <div id="rdv" class="form-text text-white"> Indique aux membres où se rendre</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 form-check mt-3">
                        <input name="checkbox" type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Valider les CGU</label>
                        <span class="text-danger">
                            <?=
                            $arrayError["checkbox"] ?? " ";
                            ?>
                    </div>

                    <button type="submit" class="btn btn-primary col-12">Créer</button>

            </form>
        </div>
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


    </body>

</html>