<?php
require "../data/data.php";
require "../controllers/controller_home.php";
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
    <title>Moto poto / Accueil</title>
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
                </ul>


                <?php if (isset($_SESSION["id"])) { ?>
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
    <div class="principalePict">
        <div class="text-center pt-4">
            <h1>Bienvenue sur le site MotoPoto</h1>
        </div>
    </div>

    <!-- DECRIPTION DU SITE----------------------------------------------------------------------------------------------------------------->

    <div class="mt-5 row text-center m-0">
        <h2 class="pt-5 ps-5 pe-5 pb-5">
            Besoin d’évasion ? Notre site te fournira le nécessaire pour partir en roadtrip moto l’esprit tranquille ! Que tu cherches une balade d’une heure à la mer ou une virée de deux jours en Normandie, Moto Poto te met à disposition de nombreux itinériaires. Et si tu as l’âme d’un baroudeur-organisateur, tu peux créer ton propre itinéraire !
            Alors, prêt pour l’aventure avec Moto Poto ? </h2>
    </div>

    <!-- CATEGORIES DE MOTARD ---------------------------------------------------------------------------------------------------------->
    <h3 class="text-center pb-3 selectColor pt-3">A qui s'adresse ce site ? </h3>
    <div class="row justify-content-evenly m-0">
        <?php foreach ($typeOfBikers as $key => $value) { ?>
            <div class="card mb-3 mt-5 border border-white shadow" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../<?= $value["pictures"] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><?= $value["name"] ?></h4>
                            <p class="card-text"><?= $value["descriptif"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!----EXEMPLES DE SORTIES---------------------------------------------------------------------------------------------------------------------------->

    <h2 class="text-center pb-3 selectColor pt-3 mt-5">Les meilleures balades du mois !</h2>

    <div class="row justify-content-evenly m-0 pt-5 pb-5 text-center">
        <div class="col-lg-6">
            <div class="card me-3 shadow">
                <div class="card-body">
                    <div class="container">
                        <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d165494.3020424753!2d0.005009196031334846!3d49.600606928838886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x47e017c3893f4e43%3A0x40c14484fb684d0!2zw4l0cmV0YXQ!3m2!1d49.707006899999996!2d0.2055978!4m5!1s0x47e02f2395218b7d%3A0x5bc1867aaf33af12!2sLe%20Havre!3m2!1d49.494369999999996!2d0.107929!5e0!3m2!1sfr!2sfr!4v1641322911920!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <h5 class="card-title pt-3">Le Havre - Etretat</h5>
                    <p class="card-text">Départ du Volcan direction Etretat. Principalement de la nationale pour arriver à Etretat.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body pb-1 shadow">
                    <div class="container">
                        <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d96754.84563822209!2d0.11648729571700778!3d49.36730581701161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x47e1d4bac4578671%3A0x40c14484fbcf150!2sDeauville!3m2!1d49.353975999999996!2d0.075122!4m5!1s0x47e02f2395218b7d%3A0x5bc1867aaf33af12!2sLe%20Havre!3m2!1d49.494369999999996!2d0.107929!5e0!3m2!1sfr!2sfr!4v1641323825931!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <h5 class="card-title pt-3">Le Havre - Deauville</h5>
                    <p class="card-text">Départ du stade Océane direction Deauville. Passage par Honfleur et Cricqueboeuf.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- SHOW YOUR BIKE --------------------------------------------------------------------------------------------------------------------------->

    <h2 class="text-center pb-3 selectColor pt-3 mb-5">Montre nous ta moto ici !</h2>

    <div class="row justify-content-evenly gy-3 m-0 text-center">
        <?php
        foreach ($showYourBike as $key => $value) { ?>
            <div class="card border border-white" style="width: 20rem;">
                <img src="../<?= $value["pictures"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?= $value["model"] ?></p>
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
                    <a class="nav-link active text-white" aria-current="page" href="../views/mentionslegales.php">Mentions Légales</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="../views/cookies.php">Cookies</a>
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