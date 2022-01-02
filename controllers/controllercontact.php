<?php

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,30}$/u";
// $rexgexMail = "/^([a-z.-]+)@([a-z]+).([a-z]){2,4}$/u";

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
    if (isset($_POST["select"])) {
        if (empty($_POST["select"]) || $_POST["select"] == 0) {
            $arrayError["select"] = "Veuillez saisir votre sujet";
        }
    }
    if (isset($_POST["story"])) {
        if (empty($_POST["story"])) {
            $arrayError["story"] = "Veuillez saisir votre sujet";
        }
    }

    if (!isset($_POST["checkBox"])) {
        $arrayError["checkBox"] = "Veuillez valider les CGU";
    }
}
