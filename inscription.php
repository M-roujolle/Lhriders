<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Inscription</title>
</head>

<body>
    <a class="btn btn-danger mt-2 ms-2" href="index.php"><i class="bi bi-arrow-return-left"></i> Retour à l'accueil</a>

    <p class="text-center">Inscrivez vous ici pour pouvoir créer vos propres balades !</p>
    <!-- Formulaire de contact-------------------------------------------------------------------------------------------->

    <?php if (!empty($_POST) && empty($arrayError)) { ?>

        <div class="text-center pt-5 ms-5 me-5">
            <h1>Voici votre demande, nous vous en remercions. Nous allons vous contacter dans les plus bref délais :<h1><br>
                    <p>Votre nom : "<?= htmlspecialchars($_POST['nom']); ?>"</p>
                    <p>Votre prénom : "<?= htmlspecialchars($_POST['prenom']); ?>"</p>
                    <p>Votre mail : "<?= htmlspecialchars($_POST['mail']); ?>"</p>
                    <p>Votre demande : "<?= htmlspecialchars($_POST['select']); ?>"</p>
                    <p>Votre commentaire : "<?= htmlspecialchars($_POST['story']); ?>"</p>
                    <a class="btn btn-success mt-5" href="index.php">Retour à l'accueil</a>
        </div>

    <?php } else { ?>
        <div class="row m-0">
            <div class="d-flex justify-content-center">
                <div class=" col-lg-6 mt-5">
                    <div class="navColor text-white d-flex justify-content-center">
                        <form action="contact.php" method="POST" class="ps-3 pe-3">
                            <h1 class="text-center pt-3 mb-3">Inscription</h1>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom : </label><span class="text-danger">
                                    <?=
                                    $arrayError["nom"] ?? " ";
                                    ?>
                                </span>
                                <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control w-75" id="nom" placeholder="Ex : Dupont...">

                                <label for="prenom" class="form-label mt-1">Prénom : </label><span class="text-danger">
                                    <?=
                                    $arrayError["prenom"] ?? " ";
                                    ?>
                                </span>
                                <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control w-75" id="prenom" placeholder="Ex : Jean...">

                                <label for="mail" class="form-label mt-1">Mail : </label><span class="text-danger">
                                    <?=
                                    $arrayError["mail"] ?? " ";
                                    ?>
                                </span>
                                <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name=" mail" type="mail" class="form-control w-75" id="mail" placeholder="Ex : nom.prénom@mail.fr...">
                            </div>

                            <div class="mt-1">
                                <p>Veuillez décrire votre demande :</p>
                                <label for="inputPassword6" class="col-form-label"></label><span class="text-danger">
                                    <?=
                                    $arrayError["story"] ?? "";
                                    ?>
                                </span>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

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