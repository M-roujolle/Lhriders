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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/script.js"></script>
    <title>LHRiders</title>
</head>

<body class="backgroundheader">

    <!-- NAVBAR------------------------------------------------------------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-light sticky-top navColor">
        <div class="container-fluid">
            <img class="logo" src="../assets/img/lhr.png">
            <a class="navbar-brand text-white ps-1" href="home.php">LHRiders</a>
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
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./createride.php">Créer son tracé</a>
                    </li>
                </ul>

                <!-- <?php if (isset($_SESSION["id"])) { ?>
                    <p class="text-white mt-3 me-1 d-none d-lg-block">Bonjour <?= $_SESSION["pseudo"] ?></p>
                <?php } ?> -->
                <?php if (isset($_SESSION["id"])) { ?>
                    <form action="" method="POST">
                        <a href="settinguser.php" class="fs-3 text-white mb-1 pe-1 ms-5"><i class="bi bi-person-circle"></i></a>
                    </form>
                    <?php if (isset($_SESSION["id"]) && $_SESSION["role"] == "1") { ?>
                        <a class="text-white fs-3 ms-2" href="admincontrol.php"><i class="bi bi-gear"></i></a>
                    <?php } ?>
                    <a class="buttonred text-white ms-1" href="logout.php"><i class="bi bi-power"></i></a>

                <?php } else { ?>

                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="nav-link active text-white ms-2 ps-4">Connexion / Inscription</a>
                    </button>


                <?php } ?>

                <!-- <?php if (isset($_SESSION["id"]) && $_SESSION["role"] == "1") { ?>
                <?php } ?> -->
            </div>
        </div>
    </nav>