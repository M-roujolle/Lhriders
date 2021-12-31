<?php
require("controllers/controllerIndexPageContact.php");
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
    <title>Contact</title>
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

    <!-- image de fond------------------------------------------------------------------------------------------------->
    <div class="principalePictContact">
    </div>

    <!-- Formulaire de contact-------------------------------------------------------------------------------------------->

    <?php if (!empty($_POST) && empty($arrayError)) { ?>

        <div class="text-center pt-5">
            <h1>Voici votre demande, nous vous en remercions. Nous allons vous contacter dans les plus bref délais :<h1><br>
                    <p>Votre nom : "<?= htmlspecialchars($_POST['nom']); ?>"</p>
                    <p>Votre prénom : "<?= htmlspecialchars($_POST['prenom']); ?>"</p>
                    <p>Votre mail : "<?= htmlspecialchars($_POST['mail']); ?>"</p>
                    <p>Votre demande : "<?= htmlspecialchars($_POST['select']); ?>"</p>
                    <p>Votre commentaire : "<?= htmlspecialchars($_POST['story']); ?>"</p>
                    <a class="btn btn-success mt-5" href="index.php">Retour à l'accueil</a>
        </div>



    <?php } else { ?>
        <div class="row justify-content-center">
            <div class=" col-lg-6 mt-5">
                <div class="navColor text-white">
                    <h1 class="text-center pt-5 mb-5">Formulaire de Contact</h1>


                    <form action="indexPageContact.php" method="POST" class="ps-3 pe-3">

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom : </label><span class="text-danger">
                                <?=
                                $arrayError["nom"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control w-50" id="nom" placeholder="Ex : Dupont...">

                            <label for="prenom" class="form-label mt-1">Prénom : </label><span class="text-danger">
                                <?=
                                $arrayError["prenom"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control w-50" id="prenom" placeholder="Ex : Jean...">

                            <label for="mail" class="form-label mt-1">Mail : </label><span class="text-danger">
                                <?=
                                $arrayError["mail"] ?? " ";
                                ?>
                            </span>
                            <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control w-50" id="mail" placeholder="Ex : monmail@mail.fr...">

                            <div class="mt-1">
                                <label for="inputPassword6" class="col-form-label">Sujet :</label><span class="text-danger">
                                    <?=
                                    $arrayError["select"] ?? "";
                                    ?>
                                </span>
                                <select for="select" name="select" required class="form-select w-50">
                                    <option selected value="0">Selectionner votre sujet</option>
                                    <option value="1">Un problème sur le site ?</option>
                                    <option value="2">Besoin d'informations ?</option>
                                    <option value="3">Autres</option>
                                </select>

                                <div class="mt-1">
                                    <p>Veuillez décrire votre demande :</p>
                                    <label for="inputPassword6" class="col-form-label"></label><span class="text-danger">
                                        <?=
                                        $arrayError["story"] ?? "";
                                        ?>
                                    </span>

                                    <textarea id="story" name="story" required rows="10" cols="45"><?= isset($_POST["story"]) ? htmlspecialchars($_POST["story"]) : "" ?></textarea>
                                </div>
                                <div class="mb-3 form-check ms-1">
                                    <input type="checkbox" class="form-check-input" name="checkBox" id="checkBox">
                                    <label class="form-check-label" for="checkBox">Accepter les CGU</label><span class="text-danger">
                                        <?=
                                        $arrayError["checkBox"] ?? " ";
                                        ?>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary mb-5 ms-1">Envoyer</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        <?php } ?>



        <!-- FOOTER----------------------------------------------------------------------------------------------------------------------------------------->

        <footer>
            <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5">

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="nav-link active text-white" aria-current="page" href="indexPageContact.php">Contact -</a>
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