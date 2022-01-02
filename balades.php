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
    <title>Balades</title>
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
    <div class="principalePictBalades">
        <div class="text-center pt-4">
            <h1 class="text-center"> Plus qu’une balade : une aventure</h1>
        </div>
    </div>

    <!-- boucles roadMaps------------------------------------------------------------------------------------------------------------------------>

    <h2 class="text-center pb-5 pt-5"">
        Que diriez-vous d'une balade moto sur les plus belles routes de Normandie ? Pour une sortie improvisée ou longuement préparée, faites l'expérience de la liberté.</h2>
    <div class=" mt-5 m-0 embed-responsive embed-responsive-21by9 text-center">
        <?php foreach ($roadMaps as $key => $value) { ?>
            <div class="card mb-3 border border-white">
                <p><?= $value["iframe"] ?></p>
                <div class="card-body">
                    <h5 class="card-title"><?= $value["name"] ?></h5>

                    <!-- Button trigger modal1 -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal1">+ d'infos</button>

                    <!-- Modal1 -->
                    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $value["name"] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?= $value["description"] ?> <div class="modal-footer">
                                        <p><?= $value["information"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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