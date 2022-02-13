<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Mentions Légales</title>
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
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a class="nav-link active text-white">Connexion / S'inscrire <i class="bi bi-person-circle fs-3"></i></a>
                </button>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Ex : balade le havre..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Valider</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="principalePictMentionsLegales">

    </div>

    <!-- DECRIPTION DU SITE----------------------------------------------------------------------------------------------------------------->

    <h1 class="text-center pt-5">Mentions Légales</h1>
    <div class="mt-5 row text-center m-0">
        <div class="row">
            <div class="col col-lg-12">
                <div class="pb-5">
                    <p>Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour
                        la
                        Confiance dans l’économie numérique, dite L.C.E.N., il est porté à la connaissance des
                        utilisateurs et
                        visiteurs, du site motopoto.fr, les présentes mentions légales. La connexion et la navigation
                        sur le Site par l’Utilisateur implique l'acceptation intégrale et sans réserve
                        des présentes mentions légales.Ces dernières sont accessibles sur le Site à la rubrique «
                        Mentions légales ».</p>
                </div>
                <div class="text-center pb-5 fw-bold"> ARTICLE 1 - L'EDITEUR :<br>
                    L’édition et la direction de la publication du Site est assurée par Maxime Roujolle, domicilié au
                    1295
                    Route du Hameau d'Enfer, dont le numéro de téléphone est 0660769121, et l'adresse e-mail
                    roujolle.maxime@gmail.com.</div>

                <div class="text-center  pb-5 fw-bold"> ARTICLE 2 - L'HEBERGEUR :<br>
                    L'hébergeur du Site est la société _______________, dont le siège social est situé au
                    _______________ , avec le numéro de téléphone : _______________ + adresse mail de contact</div>

                <div class="text-center  pb-5 fw-bold"> ARTICLE 3 - ACCES AU SITE :<br>
                    Le Site est accessible en tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption
                    programmée ou non et pouvant découlant d’une nécessité de maintenance.
                    En cas de modification, interruption ou suspension du Site, l'Editeur ne saurait être tenu
                    responsable.</div>

                <div class="text-center  pb-5 fw-bold"> ARTICLE 4 - COLLECTE DES DONNEES :<br>
                    Le Site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le
                    respect
                    de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux
                    fichiers
                    et aux libertés.
                    En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, l'Utilisateur dispose d'un
                    droit
                    d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur
                    exerce ce droit :
                    <li>par mail à l'adresse email roujolle.maxime@gmail.com;</li>
                    <li>via un formulaire de contact ;</li>
                    <li>via son espace personnel ;</li>
                    Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du
                    Site,
                    sans autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites
                    judiciaires
                    telles que notamment prévues par le Code de la propriété intellectuelle et le Code civil.
                    Pour plus d’informations, se reporter aux CGU du site motopoto.fr accessible à la rubrique "CGU"
                    Pour plus d'informations en matière de cookies, se reporter à la Charte en matière de cookies du
                    site
                    motopoto.fr accessible à la rubrique "Gestion des Cookies"
                </div>
                <p>
                    <a href="http://legalplace.fr">Rédigé sur legalplace</a>
                </p>
            </div>
        </div>
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
                    <a class="nav-link active text-white" aria-current="page" href="./contact.php">Contact</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="./cgu.php">Conditions génerales
                        d'utilisation</a>
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
</body>

</html>