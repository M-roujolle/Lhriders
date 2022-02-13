<?php
require '../controllers/controller_inscription.php'
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/script.js"></script>




    <title>Inscription</title>
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
                    <a class="nav-link active text-white ps-4">Connexion / S'inscrire <i class="bi bi-person-circle fs-3"></i></a>
                </button>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Ex : Le havre" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Valider</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="principalePictInscription">
        <div class="text-center pt-4">
            <h1>Inscrivez vous ici pour pouvoir créer vos propres balades !</h1>
        </div>
    </div>
    <a class="btn btn-danger mt-2 ms-2" href="listusers.php"><i class="bi bi-arrow-return-left"></i>liste utilisateur</a>

    <!-- Formulaire de contact-------------------------------------------------------------------------------------------->

    <div class="row m-0">
        <div class="d-flex justify-content-center">
            <div class=" col-lg-6 mt-5">
                <div class="navColor text-white d-flex justify-content-center">
                    <form action="inscription.php" method="POST" class="ps-3 pe-3">
                        <h1 class="text-center pt-3 mb-3">Inscription</h1>
                        <div class="mb-3">

                            <!-- pseudo -->
                            <label for="pseudo" class="form-label">Pseudo : </label><span class="text-danger">
                                <?=
                                $arrayError["pseudo"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["pseudo"]) ? htmlspecialchars($_POST["pseudo"]) : "" ?>" name="pseudo" type="text" class="form-control col-12" id="pseudo" placeholder="Ex : Jean414">


                            <!-- prenom -->
                            <label for="prenom" class="form-label mt-1">Prénom : </label><span class="text-danger">
                                <?=
                                $arrayError["prenom"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control col-12" id="prenom" placeholder="Ex : Jean">

                            <!-- nom -->
                            <label for="nom" class="form-label">Nom : </label><span class="text-danger">
                                <?=
                                $arrayError["nom"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control col-12" id="nom" placeholder="Ex : Dupont">

                            <!-- mail -->
                            <label for="mail" class="form-label mt-1">Mail : </label><span class="text-danger">
                                <?=
                                $arrayError["mail"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control col-12" id="mail" placeholder="Ex : nom.prénom@mail.fr">

                            <!-- mot de passe -->
                            <label for="motdepasse" class="form-label mt-1">Mot de passe : </label><span class="text-danger">
                                <?=
                                $arrayError["motdepasse"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["motdepasse"]) ? htmlspecialchars($_POST["motdepasse"]) : "" ?>" name=" motdepasse" type="mail" class="form-control col-12" id="motdepasse" placeholder="Saisissez votre mot de passe">
                        </div>
                        <div class="mb-3 form-check ms-1">
                            <input type="checkbox" class="form-check-input" name="checkBox" id="checkBox">
                            <label class="form-check-label" for="checkBox">Accepter les CGU</label><span class="text-danger">
                                <?=
                                $arrayError["checkBox"] ?? " ";
                                ?>
                            </span>
                        </div>
                        <span class="text-danger">
                            <?=
                            $arrayError["reCaptcha"] ?? " ";
                            ?>
                        </span>
                        <div class="g-recaptcha" data-sitekey="6Ld6tnQeAAAAACk-h0TnuIFs3Sme7aOPunAlqFyN"></div>
                        <button type="submit" class="btn btn-success mb-5 mt-3 col-12 ">Valider</button>
                    </form>
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

    <?php if (isset($alert)) { ?>
        <span id="alertconfirm"></span>
    <?php } ?>

</body>

</html>