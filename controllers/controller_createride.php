<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

var_dump($_POST);


$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/u";

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
        } elseif (!preg_match($regexNom, $_POST["description"])) {
            $arrayError["description"] = "Format invalide";
        }
    }

    if (isset($_POST["iframe"])) {
        if (empty($_POST["iframe"])) {
            $arrayError["iframe"] = "Veuillez insérer un iframe";
        } elseif (!preg_match($regexNom, $_POST["iframe"])) {
            $arrayError["iframe"] = "Format invalide";
        }
    }

    if (isset($_POST["kilometre"])) {
        if (empty($_POST["kilometre"])) {
            $arrayError["kilometre"] = "Veuillez indiquer le nombre de kilomètres";
        } elseif (!preg_match($regexNom, $_POST["kilometre"])) {
            $arrayError["kilometre"] = "Format invalide";
        }
    }

    if (isset($_POST["prix"])) {
        if (empty($_POST["prix"])) {
            $arrayError["prix"] = "Veuillez saisir le prix";
        } elseif (!preg_match($regexNom, $_POST["prix"])) {
            $arrayError["prix"] = "Format invalide";
        }
    }

    if (isset($_POST["heure"])) {
        if (empty($_POST["heure"])) {
            $arrayError["heure"] = "Veuillez saisir une heure";
        } elseif (!preg_match($regexNom, $_POST["heure"])) {
            $arrayError["heure"] = "Format invalide";
        }
    }

    if (isset($_POST["rdv"])) {
        if (empty($_POST["rdv"])) {
            $arrayError["rdv"] = "Veuillez saisir un point de rendez-vous";
        } elseif (!preg_match($regexNom, $_POST["rdv"])) {
            $arrayError["rdv"] = "Format invalide";
        }
    }

    if (isset($_POST["select"])) {
        if (empty($_POST["select"]) || $_POST["select"] == 0) {
            $arrayError["select"] = "Veuillez saisir le nombre de participants";
        }
    }

    if (!isset($_POST["checkbox"])) {
        if (empty($_POST["checkbox"])) {
            $arrayError["checkbox"] = "Veuillez valider les CGU";
        }
    }
}
