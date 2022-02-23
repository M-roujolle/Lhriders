<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

var_dump($_POST);
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

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/u";
$regexDescription = "/^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.&_ç'-=]{2,250}$/u";

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

    // if (isset($_POST["iframe"])) {
    //     if (empty($_POST["iframe"])) {
    //         $arrayError["iframe"] = "Veuillez insérer un iframe";
    //     } elseif (!preg_match($regexNom, $_POST["iframe"])) {
    //         $arrayError["iframe"] = "Format invalide";
    //     }
    // }

    if (isset($_POST["kilometre"])) {
        if (empty($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer le nombre de kilomètres";
        } elseif (!ctype_digit($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer un chiffre";
        }
    }

    // if (isset($_POST["heure"])) {
    //     if (empty($_POST["heure"])) {
    //         $arrayError["heure"] = "Veuillez saisir une heure";
    //     } elseif (!preg_match($regexNom, $_POST["heure"])) {
    //         $arrayError["heure"] = "Format invalide";
    //     }
    // }

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
            $arrayError["date"] = "Veuillez indiquer une date de départ";
        }
    }

    if (!isset($_POST["checkbox"])) {
        if (empty($_POST["checkbox"])) {
            $arrayError["checkbox"] = "Veuillez valider les CGU";
        }
    }
}
