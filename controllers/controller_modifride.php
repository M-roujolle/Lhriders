<?php
session_start();

require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';
require '../models/Rides.php';

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


$modifRideObj = new Rides;
$modifride = $modifRideObj->getOneRide($_GET["id"]);

////////////////////////////////////////////
// controle de formulaire 
////////////////////////////////////////////

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,60}$/u";
$regexDescription = "/^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,._!:;?()\/@&'-=]{2,500}$/u";
$regexIframe = "/^(<iframe src=\"https:\/\/www\.google\.com\/maps\/embed\?pb=).+(<\/iframe>)$/";
$regexTime = "/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/";
$regexDate = "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/";
$arrayError = [];


if (!empty($_POST)) {

    if (isset($_POST["titre"])) {
        if (empty($_POST["titre"])) {
            $arrayError["titre"] = "Veuillez mettre un titre";
            unset($_POST["titre"]);
        } elseif (!preg_match($regexNom, $_POST["titre"])) {
            $arrayError["titre"] = "Format invalide";
            unset($_POST["titre"]);
        }
    }

    if (isset($_POST["description"])) {
        if (empty($_POST["description"])) {
            $arrayError["description"] = "Veuillez écrire un descriptif";
            unset($_POST["description"]);
        } elseif (!preg_match($regexDescription, $_POST["description"])) {
            $arrayError["description"] = "Format invalide";
            unset($_POST["description"]);
        }
    }

    if (isset($_POST["iframe"])) {
        if (empty($_POST["iframe"])) {
            $arrayError["iframe"] = "Veuillez insérer un iframe";
            unset($_POST["iframe"]);
        } elseif (!preg_match($regexIframe, $_POST["iframe"])) {
            $arrayError["iframe"] = "Format invalide";
            unset($_POST["iframe"]);
        }
    }

    if (isset($_POST["kilometre"])) {
        if (empty($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer le nombre de kilomètres";
            unset($_POST["kilometre"]);
        } elseif (!ctype_digit($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer un chiffre";
            unset($_POST["kilometre"]);
        }
    }

    if (isset($_POST["heure"])) {
        if (empty($_POST["heure"])) {
            $arrayError["heure"] = "Veuillez saisir une heure";
            unset($_POST["heure"]);
        } elseif (!preg_match($regexTime, $_POST["heure"])) {
            $arrayError["heure"] = "Format invalide";
            unset($_POST["heure"]);
        }
    }

    if (isset($_POST["select"])) {
        if (empty($_POST["select"]) || $_POST["select"] === 0) {
            $arrayError["select"] = "Veuillez saisir le nombre de participants";
            unset($_POST["select"]);
        }
    }


    if (isset($_POST["rdv"])) {
        if (empty($_POST["rdv"])) {
            $arrayError["rdv"] = "Veuillez saisir un point de rendez-vous";
            unset($_POST["rdv"]);
        } elseif (!preg_match($regexDescription, $_POST["rdv"])) {
            $arrayError["rdv"] = "Format invalide";
            unset($_POST["rdv"]);
        }
    }


    if (isset($_POST["date"])) {
        if (empty($_POST["date"])) {
            $arrayError["date"] = "Veuillez saisir une date valide";
            unset($_POST["date"]);
        } elseif (!preg_match($regexDate, $_POST["date"])) {
            $arrayError["date"] = "Format invalide";
            unset($_POST["date"]);
        } elseif (time() >= strtotime($_POST["date"])) {
            $arrayError["date"] = "La date ne doit pas être antérieure";
            unset($_POST["date"]);
        }
    }

    $insert = new Rides;

    // si la méthode renvoie false, on ne continue pas le script, donc pas de modification via l'url
    if (!$insert->verifBelongRideUser($_POST["idride"], $_SESSION["id"])) {
        $arrayError["belong"] = "pas autorisé";
    }

    if (empty($arrayError)) {

        // je sécurise mes champs à l'aide d'un htmlspecialchars et j'enlève les espaces en trop avec trim avant de les stocker dans les variables
        $titre = htmlspecialchars(trim($_POST["titre"]));
        $description = htmlspecialchars(trim($_POST["description"]));
        $iframe = $_POST["iframe"];
        $kilometre = htmlspecialchars(trim($_POST["kilometre"]));
        $hours = htmlspecialchars(trim($_POST["heure"]));
        $participants = htmlspecialchars(trim($_POST["select"]));
        $meeting = htmlspecialchars(trim($_POST["rdv"]));
        $date = htmlspecialchars(trim($_POST["date"]));
        $id = $_POST["idride"];



        $insert = new Rides;
        $insert->modifRide($iframe, $titre, $description, $kilometre, $participants, $hours, $meeting, $date, $id);
        unset($_POST);
    }
}


$modifRideObj = new Rides;
$modifride = $modifRideObj->getOneRide($_GET["id"]);
