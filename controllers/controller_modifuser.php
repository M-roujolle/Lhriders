<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
    exit();
}


////////////////////////////////////////////
// controle de modification d'un utilisateur 
////////////////////////////////////////////
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

        if (empty($arrayError)) {
            $insert = new Users;
            $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
            $prenom = htmlspecialchars(trim($_POST["prenom"]));
            $nom = htmlspecialchars(trim($_POST["nom"]));
            $mail = htmlspecialchars(trim($_POST["mail"]));
        }
    }

    if (empty($arrayError)) {
        $insert = new Users;
        $insert->modifyUser($pseudo, $prenom, $nom, $mail, $_POST["iduser"]);
        $modification = 1;
    }
    $oneUser = $modifUser->getOneUser($_GET["id"]);
}
