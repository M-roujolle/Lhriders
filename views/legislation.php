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
    <title>Législation</title>
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
                        <a class="nav-link active text-white" aria-current="page" href="./home.php">Accueil</a>
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

            </div>
        </div>
    </nav>

    <div class="principalePictLegis">
        <h1 class="text-center pt-3 pb-3"> Pourquoi connaitre la législation Française ?</h1>
    </div>


    <p class="text-center ms-5 me-5 fw-bold pt-5">Chez Moto Poto nous savons très bien que tu ne vas pas tout lire... Libre à toi de lire ou non ces conditions, nous te conseillons vivement de prendre connaissance de ces articles et nous te rappelons que Moto Poto se décharge de toute responsabilités en cas de problèmes... Et comme tu l'as déja entendu : "Nul n'est censé ignorer la Loi". C'est pourquoi nous t'avons fait un condensé des règles primordiales à connaitre ;)</p>
    <p style="color: red" class="ms-5 me-5 fw-bold text-center">En bref :</p>

    <div class="text-center pb-5 fw-bold">
        <div class="card border border-danger">
            <div class="card-body">
                <li>Aucune déclaration nécessaire pour une sortie de moins de 50 motos (on parle bien ici de moto et non de participants).</li>
                <li>Pour les rassemblements de 50 motos et plus :</li>
                <li>Le dossier doit être envoyé au préfet, au moins deux mois avant la date de la concentration.</li>
                <li>Si celle-ci se déroule sur plusieurs départements, le dossier doit être adressé en 3 exemplaires à chaque préfet concerné.</li>
                <li>Si la balade se déroule sur plus de 20 départements, la déclaration doit être faite au ministère de l’Intérieur.</li>
            </div>
        </div>
    </div>

    <p class="text-center ms-5 me-5">Le rassemblement entre deux roues et les balades motos organisées sur route sont incontournables dans le cercle des motards. Ces balades en groupe renforcent la fraternité et l’expérience des pilotes de deux roues. Toutefois, la concentration de véhicules terrestres occasionne des difficultés de circulation pour les autres automobilistes. De ce fait, l’organisateur de la sortie à plusieurs cylindrés doit déclarer ou demander une autorisation aux préfectures concernant par l’itinéraire emprunté.
        Mais attention, une randonnée à moto en groupe nécessite une organisation pointue et une déclaration administrative, et non pas uniquement pour le plaisir de rouler.
        Faut-il déclarer une balade en groupe à moto ? À qui déclarer sa virée à moto à plusieurs ? Dans quels cas déclarer son road trip avec plusieurs pilotes est-ce une obligation ?</p>

    <?php foreach ($legis as $key => $value) { ?>
        <div class="card mb-3 ms-5 me-5 border border-success" style="max-width: 50 rem;">
            <div class="row g-0 pt-5">
                <div class="col-md-4">
                    <img src="../<?= $value["pictures"] ?>" class="img-fluid rounded-start ms-5 pb-5" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value["name"] ?></h5>
                        <p class="card-text pt-5"><?= $value["description"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


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
    <p class="text-center">
        <a href="https://balades-moto.com/declarer-balade-moto-quels-cas/#:~:text=La%20d%C3%A9claration%20est%20obligatoire%20pour,tout%20simplement%20g%C3%AAner%20la%20circulation."> Source: balades-moto.com </a>
    </p>

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