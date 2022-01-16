<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Cookies</title>
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
                    <a class="nav-link active text-white">Connexion / S'inscrire <i class="bi bi-person-circle fs-3"></i></a>
                </button>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Ex : balade le havre..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Valider</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="principalePictCookies">

    </div>

    <!-- DECRIPTION DU SITE----------------------------------------------------------------------------------------------------------------->

    <h1 class="text-center pt-5">Cookies</h1>
    <div class="mt-5 row text-center m-0">
        <div class="row">
            <div class="col col-lg-12">
                <div class="text-center pb-5 fw-bold"> ARTICLE 1 - COOKIES <br>
                    L’Utilisateur est informé que lors de ses visites sur le site, un cookie peut s’installer automatiquement
                    sur son logiciel de navigation.
                    Les cookies sont de petits fichiers stockés temporairement sur le disque dur de l’ordinateur de
                    l’Utilisateur par votre navigateur et qui sont nécessaires à l’utilisation du site http://motopoto.fr/. Les
                    cookies ne contiennent pas d’information personnelle et ne peuvent pas être utilisés pour identifier
                    quelqu’un. Un cookie contient un identifiant unique, généré aléatoirement et donc anonyme. Certains
                    cookies expirent à la fin de la visite de l’Utilisateur, d’autres restent.
                    L’information contenue dans les cookies est utilisée pour améliorer le site http://motopoto.fr/.
                    En naviguant sur le site, L’Utilisateur les accepte.
                    L’Utilisateur doit toutefois donner son consentement quant à l’utilisation de certains cookies.
                    A défaut d’acceptation, l’Utilisateur est informé que certaines fonctionnalités ou pages risquent de lui
                    être refusées.
                    L’Utilisateur pourra désactiver ces cookies par l’intermédiaire des paramètres figurant au sein de son
                    logiciel de navigation.</div>

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
        <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="contact.php">Contact</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link active text-white" aria-current="page" href="cgu.php">Conditions génerales
                        d'utilisation</a>
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