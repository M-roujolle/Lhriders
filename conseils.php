<?php
require "data/data.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Conseils / Entretien</title>
</head>

<body>

    <!-- NAVBAR------------------------------------------------------------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-light sticky-top navColor">
        <div class="container-fluid">
            <img class="logo" src="assets/img/logomoto.png">
            <a class="navbar-brand text-white ps-1" href="index.php">MotoPoto</a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="balades.php">Balades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="legislation.php">Législation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="conseils.php">Conseils / Entretien</a>
                    </li>
                </ul>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a class="nav-link active text-white"><i class="bi bi-person-circle fs-3"></i></a>
                </button>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Ex : balade le havre..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Valider</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="principalePictConsEnt">
        <div class="text-center pt-4 text-white">
            <h1>Conseils pour bien débuter et entretien</h1>
            <p>Tout motard qui se respect menage sa monture ! Tu trouveras ici des astuces et conseils pour organiser, préparer et anticiper au mieux tes promenades. N'oublies jamais que le risque zéro n'existe pas ! </p>

        </div>
    </div>
    <h2 class="text-center pt-5 pb-5">10 conseils pour rouler serein</h2>


    <div class="row justify-content-evenly gy-5 m-0 text-center">
        <?php foreach ($consEnt as $key => $value) { ?>
            <div class="card" style="width: 18rem;">
                <img src="<?= $value["pictures"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $value["name"] ?></h5>
                    <p class="card-text"><?= $value["description"] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <p class="text-center pt-5">
        <a href="https://www.motoblouz.com/enjoytheride/conseils-moto/10459-conseils-jeune-permis-moto-2017-04-14">Source: Motoblouz</a>
    </p>

    <h3 class="text-center mt-5 pt-3 pb-3 selectColor">Sélections de vidéos présentées par High Side</h3>


    <div class="row justify-content-evenly m-0 pt-5 pb-2 text-center">
        <?php foreach ($vidConsEnt as $key => $value) { ?>
            <div class="col-lg-4">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container">
                            <?= $value["iframe"] ?> </div>
                        <h5 class="card-title pt-3"><?= $value["name"] ?></h5>
                        <p class="card-text"><?= $value["description"] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <p class="text-center">
        <a href="https://www.youtube.com/c/HighSide-officiel">Source: High side</a>
    </p>

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
                        <div class="pt-2">
                            <label for="checkbox">Se souvenir de moi</label> <input value="1" id="checkbox" type="checkbox" name="checkbox">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success position-absolute top-100 start-50 translate-middle" href="inscription.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER----------------------------------------------------------------------------------------------------------------------------------------->

    <footer>
        <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5 foot">

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="contact.php">Contact</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="cgu.php">Conditions génerales d'utilisation</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="mentionslegales.php">Mentions Légales</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="cookies.php">Cookies</a>
                </li>
            </ul>
            <p class="copyright">©Moto Poto 2022</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>