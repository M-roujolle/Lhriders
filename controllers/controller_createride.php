<?php
session_start();

require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';
require '../models/Rides.php';


var_dump($_POST);

/////////////////////////////////////////////////////////////////
// on verifie si post login, password et connexikon sont dispo
/////////////////////////////////////////////////////////////////
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
                $_SESSION = $user->getUser($_POST["login"]);
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

////////////////////////////////////////////
// controle de formulaire 
////////////////////////////////////////////

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/u";
$regexDescription = "/^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.&_ç'-=]{2,250}$/u";
$regexIframe = "/^(<iframe src=\"https:\/\/www\.google\.com\/maps\/embed\?pb=).+(<\/iframe>)$/";
$regexTime = "/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/";
$regexDate = "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/";
$arrayError = [];


if (!empty($_POST)) {

    if (isset($_POST["titre"])) {
        if (empty($_POST["titre"])) {
            $arrayError["titre"] = "Veuillez mettre un titre";
        } elseif (!preg_match($regexNom, $_POST["titre"])) {
            $arrayError["titre"] = "Format invalide";
        }
    }

    if (isset($_POST["description"])) {
        if (empty($_POST["description"])) {
            $arrayError["description"] = "Veuillez écrire un descriptif";
        } elseif (!preg_match($regexDescription, $_POST["description"])) {
            $arrayError["description"] = "Format invalide";
        }
    }

    if (isset($_POST["iframe"])) {
        if (empty($_POST["iframe"])) {
            $arrayError["iframe"] = "Veuillez insérer un iframe";
        } elseif (!preg_match($regexIframe, $_POST["iframe"])) {
            $arrayError["iframe"] = "Format invalide";
        }
    }

    if (isset($_POST["kilometre"])) {
        if (empty($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer le nombre de kilomètres";
        } elseif (!ctype_digit($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer un chiffre";
        }
    }

    if (isset($_POST["heure"])) {
        if (empty($_POST["heure"])) {
            $arrayError["heure"] = "Veuillez saisir une heure";
        } elseif (!preg_match($regexTime, $_POST["heure"])) {
            $arrayError["heure"] = "Format invalide";
        }
    }

    if (isset($_POST["select"])) {
        if (empty($_POST["select"]) || $_POST["select"] == 0) {
            $arrayError["select"] = "Veuillez saisir le nombre de participants";
        }
    }


    if (isset($_POST["rdv"])) {
        if (empty($_POST["rdv"])) {
            $arrayError["rdv"] = "Veuillez saisir un point de rendez-vous";
        } elseif (!preg_match($regexDescription, $_POST["rdv"])) {
            $arrayError["rdv"] = "Format invalide";
        }
    }


    if (isset($_POST["date"])) {
        if (empty($_POST["date"])) {
            $arrayError["date"] = "Veuillez saisir une date valide";
        } elseif (!preg_match($regexDate, $_POST["date"])) {
            $arrayError["date"] = "Format invalide";
        } elseif (time() >= strtotime($_POST["date"])) {
            $arrayError["date"] = "La date ne doit pas être antérieure";
        }
    }

    if (!isset($_POST["checkbox"])) {
        if (empty($_POST["checkbox"])) {
            $arrayError["checkbox"] = "Veuillez valider les CGU";
        }
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
        $iduser = $_SESSION["id"];

        // j'instancie un nouvel object selon la classe Rides afin d'utiliser ses méthodes
        $insert = new Rides;
        // j'utilise la methode insertride pour créer la balade
        $insert->insertRide($iframe, $titre, $description, $kilometre, $participants, $hours, $meeting, $date, $iduser);
        $alertride = "";
    }
}