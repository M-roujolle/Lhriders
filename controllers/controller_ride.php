<?php
require "../config.php";
require "../models/DataBase.php";
require "../models/Users.php";
require "../models/Rides.php";

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


$rideObj = new Rides;
$arrayride = $rideObj->showRide();

// var_dump($arrayride);
