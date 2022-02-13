<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

// var_dump($_POST);


$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,30}$/u";
$regexPseudo = "/^([a-zA-Z0-9-_]{2,36})$/u";
// $rexgexMail = "/^([a-z.-]+)@([a-z]+).([a-z]){2,4}$/u";

$arrayError = [];

if (!empty($_POST)) {


    if (isset($_POST["prenom"])) {
        if (empty($_POST["prenom"])) {
            $arrayError["prenom"] = "Veuillez saisir votre prenom";
        } elseif (!preg_match($regexNom, $_POST["prenom"])) {
            $arrayError["prenom"] = "Format invalide";
        }
    }

    if (isset($_POST["nom"])) {
        if (empty($_POST["nom"])) {
            $arrayError["nom"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_POST["nom"])) {
            $arrayError["nom"] = "Format invalide";
        }
    }

    if (isset($_POST["motdepasse"])) {
        if (empty($_POST["motdepasse"])) {
            $arrayError["motdepasse"] = "Veuillez saisir votre mot de passe";
        } elseif (!preg_match($regexPseudo, $_POST["motdepasse"])) {
            $arrayError["motdepasse"] = "Format invalide / Caractères spéciaux interdit";
        }
    }

    if (!isset($_POST["checkBox"])) {
        $arrayError["checkBox"] = "Veuillez valider les CGU";
    }
    if (empty($_POST['g-recaptcha-response'])) {
        $arrayError['reCaptcha'] = 'Veuillez valider le reCAPTCHA';
    } else {
        // Mise en place des paramètres pour l'analyse du reCaptcha
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey = '6Ld6tnQeAAAAAA5ef5UsHVUD3fPw-SfVNf71G3_f';
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            $arrayError['reCaptcha'] = 'Bots interdit sur ce site';
        }
    }

    $userMail = new Users();
    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $arrayError["mail"] = "Veuillez saisir votre mail";
        } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {;
            $arrayError["mail"] = "Format invalide";
        } elseif (!$userMail->checkFreeMail($_POST['mail'])) {
            $arrayError["mail"] = "Cette adresse mail est déjà utilisée";
        }
    }

    $userPseudo = new Users();
    if (isset($_POST["pseudo"])) {
        if (empty($_POST["pseudo"])) {
            $arrayError["pseudo"] = "Veuillez saisir votre pseudo";
        } elseif (!preg_match($regexPseudo, $_POST["pseudo"])) {;
            $arrayError["pseudo"] = "Format invalide";
        } elseif (!$userMail->checkFreePseudo($_POST['pseudo'])) {
            $arrayError["pseudo"] = "Ce pseudo est déjà utilisé";
        }
    }

    if (empty($arrayError)) {
        $insert = new Users;
        $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
        $prenom = htmlspecialchars(trim($_POST["prenom"]));
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $mail = htmlspecialchars(trim($_POST["mail"]));
        $motdepasse = htmlspecialchars(trim($_POST["motdepasse"]));
        $insert->insertUser($_POST["pseudo"], $_POST["prenom"], $_POST["nom"], $_POST["mail"], $_POST["motdepasse"]);
        $alert = "";
    }
}
