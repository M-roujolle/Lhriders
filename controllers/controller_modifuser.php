<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
}
// var_dump($_POST);

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,30}$/u";
$regexPseudo = "/^([a-zA-Z0-9-_]{2,36})$/u";

$modifUser = new Users;
$arrayError = [];

if (isset($_GET["id"])) {
    $oneUser = $modifUser->getOneUser($_GET["id"]);
}


if (isset($_POST["iduser"])) {
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

        if (isset($_POST["mail"])) {
            if (empty($_POST["mail"])) {
                $arrayError["mail"] = "Veuillez saisir votre mail";
            } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {;
                $arrayError["mail"] = "Format invalide";
            }
        }


        if (isset($_POST["motdepasse"])) {
            if (empty($_POST["motdepasse"])) {
                $arrayError["motdepasse"] = "Veuillez saisir votre mot de passe";
            } elseif (!preg_match($regexPseudo, $_POST["motdepasse"])) {
                $arrayError["motdepasse"] = "Format invalide / Caractères spéciaux interdit";
            }
        }

        if (empty($arrayError)) {
            $insert = new Users;
            $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
            $prenom = htmlspecialchars(trim($_POST["prenom"]));
            $nom = htmlspecialchars(trim($_POST["nom"]));
            $mail = htmlspecialchars(trim($_POST["mail"]));
            $motdepasse = htmlspecialchars(trim($_POST["motdepasse"]));
        }
    }

    if (empty($arrayError)) {
        $insert = new Users;
        $insert->modifyUser($pseudo, $prenom, $nom, $mail, $motdepasse, $_POST["iduser"]);
        $modification = 1;
    }
    $oneUser = $modifUser->getOneUser($_GET["id"]);
}
