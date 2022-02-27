<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';
require '../models/Rides.php';

session_start();
var_dump($_SESSION);


$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,30}$/u";
$regexPseudo = "/^([a-zA-Z0-9-_]{2,36})$/u";


$arrayError = [];


if (!empty($_POST)) {

    $insert = new Users;

    if ($_SESSION["pseudo"] != $_POST["pseudo"]) {
        if (isset($_POST["pseudo"])) {
            if (empty($_POST["pseudo"])) {
                $arrayError["pseudo"] = "Veuillez saisir votre pseudo";
            } elseif (!preg_match($regexPseudo, $_POST["pseudo"])) {;
                $arrayError["pseudo"] = "Format invalide";
            } elseif (!$insert->checkFreePseudo($_POST['pseudo'])) {
                $arrayError["pseudo"] = "Ce pseudo est déjà utilisé";
            }
        }
    }

    if ($_SESSION["mail"] != $_POST["mail"]) {
        if (isset($_POST["mail"])) {
            if (empty($_POST["mail"])) {
                $arrayError["mail"] = "Veuillez saisir votre mail";
            } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {;
                $arrayError["mail"] = "Format invalide";
            } elseif (!$insert->checkFreeMail($_POST['mail'])) {
                $arrayError["mail"] = "Ce mail est déjà utilisé";
            }
        }
    }


    if (empty($arrayError)) {

        $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
        $mail = htmlspecialchars(trim($_POST["mail"]));


        if ($insert->insertSettingUser($pseudo, $mail, $_SESSION["id"])) {
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["mail"] = $mail;
        }
    }
}



if (empty($arrayError)) {

    $id = $_SESSION["id"];
    $rideObj = new Rides;
    $arrayShowRideId = $rideObj->showRideById($id);
    var_dump($arrayShowRideId);
}
