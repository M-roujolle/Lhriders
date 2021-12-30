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
    <title>Conseils / Entretient</title>
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
                        <a class="nav-link active text-white" href="conseils.php">Conseils / Entretient</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Ex : balade le havre..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Valider</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="principalePictConsEnt">
        <div class="text-center pt-4 text-white">
            <h1>Conseils pour bien débuter et entretient</h1>
            <p>Tout motard qui se respect menage sa monture ! Tu trouveras ici des astuces et conseils pour organiser, préparer et anticiper au mieux tes promenades. N'oublies jamais que le risque zéro n'existe pas ! </p>

        </div>
    </div>
    <h2 class="text-center selectColor pt-5 pb-5">Nos 10 conseils pour rouler serein</h2>


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

    <h3 class="text-center mt-5 pt-5 pb-5 selectColor">Sélections de vidéos présenté par Hight Side</h3>

    <?php foreach ($vidConsEnt as $key => $value) { ?>

        <div class="d-flex justiy-content-end">
            <div class="card mb-3 embed-responsive embed-responsive-16by9 mt-5" style="max-width: 900px;">
                <iframe class="embed-responsive-item" src="<?= $value["iframe"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title"><?= $value["name"] ?></h5>
                    <p class="card-text"><?= $value["description"] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- FOOTER----------------------------------------------------------------------------------------------------------------------------------------->

    <footer>
        <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5 foot">

            <ul class="list-inline">
                <li class="list-inline-item">
                    <p>Contact -</p>
                </li>
                <li class="list-inline-item">
                    <p>Conditions génerales d'utilisation -</p>
                </li>
                <li class="list-inline-item">
                    <p> Mentions Légales -</p>
                </li>
                <li class="list-inline-item">
                    <p> Donées personnelles -</p>
                </li>
                <li class="list-inline-item">
                    <p> Gestion des cookies -</p>
                </li>
            </ul>
            <p class="copyright">©Moto Poto 2022</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>