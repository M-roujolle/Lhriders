<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

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
                $uservalidate = $user->getUser($_POST["login"])["validation"];
                if ($uservalidate == 0) {
                    header('Location: ../views/redirectioninscription.php');
                    exit();
                }
                $_SESSION = $user->getUser($_POST["login"]);
                $alert = "";
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

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,30}$/u";
$regexCommentaire = "/^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,._!:;?()\/@&'-=]{2,500}$/u";
$arrayError = [];

if (!empty($_POST)) {

    if (isset($_POST["nom"])) {
        if (empty($_POST["nom"])) {
            $arrayError["nom"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_POST["nom"])) {
            $arrayError["nom"] = "Format invalide";
        }
    }

    if (isset($_POST["prenom"])) {
        if (empty($_POST["prenom"])) {
            $arrayError["prenom"] = "Veuillez saisir votre prenom";
        } elseif (!preg_match($regexNom, $_POST["prenom"])) {
            $arrayError["prenom"] = "Format invalide";
        }
    }

    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $arrayError["mail"] = "Veuillez saisir votre mail";
        } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {;
            $arrayError["mail"] = "Format invalide";
        }
    }

    if (isset($_POST["comment"])) {
        if (empty($_POST["comment"])) {
            $arrayError["comment"] = "Veuillez saisir un commentaire";
        } elseif (!preg_match($regexCommentaire, $_POST["comment"])) {
            $arrayError["comment"] = "Format invalide";
        }
    }
    if (empty($_POST['g-recaptcha-response'])) {
        $arrayError['reCaptcha'] = 'Veuillez valider le reCAPTCHA';
    } else {
        // Mise en place des paramètres pour l'analyse du reCaptcha
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey = '6LdvTZkeAAAAAKJBUWNwAayKhV4SxH8jV1C7rX7V';
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            $arrayError['reCaptcha'] = 'Bots interdit sur ce site';
        }
    }
    if (empty($arrayError)) {
        // je sécurise mes champs à l'aide d'un htmlspecialchars et j'enlève les espaces en trop avec trim avant de les stocker dans les variables
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $prenom = htmlspecialchars(trim($_POST["prenom"]));
        $mail = htmlspecialchars(trim($_POST["mail"]));
        $comment = htmlspecialchars(trim($_POST["comment"]));
    }
}
