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
    <title>Moto poto / Accueil</title>
</head>

<body>

    <!-- NAVBAR------------------------------------------------------------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-light sticky-top navColor">
        <div class="container-fluid">
            <img class="logo" src="assets/img/logomoto.png">
            <a class="navbar-brand text-white ps-1" href="#">MotoPoto</a>
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
    <div class="principalePict">
        <div class="text-center pt-4">
            <h1>Bienvenue sur le site MotoPoto</h1>
            <h2 class="text-white pt-5 ps-5 pe-5">
                Besoin d’évasion ? Notre site te fournira le nécessaire pour partir en roadtrip moto l’esprit tranquille ! Que tu cherches une balade d’une heure à la mer ou une virée de deux jours en Normandie, Moto Poto te met à disposition de nombreux itinériaires. Et si tu as l’âme d’un baroudeur-organisateur, tu peux créer ton propre itinéraire !
                Alors, prêt pour l’aventure avec Moto Poto ? </h2>
        </div>
    </div>

    <!-- DECRIPTION DU SITE----------------------------------------------------------------------------------------------------------------->

    <div class="mt-5 row text-center m-0">
        <div class="row">
            <div class="col col-lg-12">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae quisquam optio provident qui blanditiis assumenda sapiente excepturi cumque accusamus reiciendis. Placeat numquam nobis minima recusandae natus, corporis tempore necessitatibus totam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum doloremque quam libero id ab, animi minus repellat quae eum. Perspiciatis eaque vitae aspernatur minus veniam iure odit eveniet tempore tenetur! Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi illum fuga quod quibusdam provident, optio sit ipsam veniam. Aut amet reprehenderit ullam sequi perferendis blanditiis sint doloremque asperiores mollitia dolorem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia reiciendis, nesciunt consequatur sint autem aliquid dolorum voluptatem nam distinctio quos accusamus saepe eligendi corporis assumenda consectetur deleniti unde architecto dolorem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ut reprehenderit cum eveniet rerum mollitia provident perspiciatis sequi vero quod dolores, earum praesentium, velit animi veniam tempora esse id sed! Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem deserunt dolore architecto, illo facilis id iure, quam magnam similique possimus a facere atque sunt quidem hic adipisci aperiam. Officiis, vero! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa minus molestiae, in ullam tenetur, quod inventore voluptate veniam quas commodi at iste fugiat esse nostrum optio nulla repudiandae, voluptas reiciendis?</p>
            </div>
        </div>
    </div>

    <!-- CATEGORIES DE MOTARD ---------------------------------------------------------------------------------------------------------->

    <div class="row justify-content-evenly m-0">
        <?php foreach ($typeOfBikers as $key => $value) { ?>
            <div class="card mb-3 mt-5 border border-white" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $value["pictures"] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value["name"] ?></h5>
                            <p class="card-text"><?= $value["descriptif"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!----EXEMPLES DE SORTIES---------------------------------------------------------------------------------------------------------------------------->

    <div class="mt-5 m-0 embed-responsive embed-responsive-21by9 text-center">
        <div class="card mb-3 border border-white">
            <iframe class="embed-responsive-item ps-5 pe-5" src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d170283.30542303357!2d0.1723767354338723!3d49.61787872433235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e0!4m3!3m2!1d49.5198283!2d0.073906!4m3!3m2!1d49.706238899999995!2d0.206483!5e0!3m2!1sfr!2sfr!4v1640514599438!5m2!1sfr!2sfr" loading="lazy"></iframe>
            <div class="card-body">
                <h5 class="card-title">Le Havre - Etretat</h5>

                <!-- Button trigger modal1 -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal1">+ d'infos</button>

                <!-- Modal1 -->
                <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tracé Le Havre - Etretat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam est odio reiciendis animi praesentium blanditiis fugit eaque adipisci. Soluta aut hic quam corporis expedita inventore aspernatur sequi? Voluptas, cupiditate modi? </div>
                            <div class="modal-footer">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum itaque velit nobis dolore temporibus blanditiis suscipit cum iste incidunt eum rerum, fuga, architecto ipsum doloribus eaque provident doloremque aperiam fugit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 border border-white">
            <iframe class="embed-responsive-item ps-5 pe-5" src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d170283.30542303357!2d0.1723767354338723!3d49.61787872433235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e0!4m3!3m2!1d49.5198283!2d0.073906!4m3!3m2!1d49.706238899999995!2d0.206483!5e0!3m2!1sfr!2sfr!4v1640514599438!5m2!1sfr!2sfr" loading="lazy"></iframe>
            <div class="card-body">
                <h5 class="card-title">Le Havre - Yvetot</h5>

                <!-- Button trigger modal2 -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal2">+ d'infos</button>

                <!-- Modal2 -->
                <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tracé Le Havre - Yvetot</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                fgfg</div>
                            <div class="modal-body">
                                <p>hugg.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- SHOW YOUR BIKE --------------------------------------------------------------------------------------------------------------------------->

    <h1 class="text-center pb-5 selectColor pt-5">Montre nous ta moto ici !</h1>

    <div class="row justify-content-evenly gy-3 m-0 text-center">
        <?php
        foreach ($showYourBike as $key => $value) { ?>
            <div class="card border border-white" style="width: 20rem;">
                <img src="<?= $value["pictures"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?= $value["model"] ?></p>
                </div>
            </div>
        <?php } ?>

    </div>

    <!-- FOOTER----------------------------------------------------------------------------------------------------------------------------------------->

    <footer>
        <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5">

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