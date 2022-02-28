<?php
session_start();

require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';
require '../models/Rides.php';

$arrayError = [];

$modifRideObj = new Rides;
$modifride = $modifRideObj->getOneRide($_GET["id"]);

// var_dump($modifride);

// if (empty($arrayError)) {
//     // je sécurise mes champs à l'aide d'un htmlspecialchars et j'enlève les espaces en trop avec trim avant de les stocker dans les variables
//     $iframe = $_POST["iframe"];
//     $titre = htmlspecialchars(trim($_POST["titre"]));
//     $description = htmlspecialchars(trim($_POST["description"]));
//     $kilometre = htmlspecialchars(trim($_POST["kilometre"]));
//     $participants = htmlspecialchars(trim($_POST["select"]));
//     $hours = htmlspecialchars(trim($_POST["heure"]));
//     $meeting = htmlspecialchars(trim($_POST["rdv"]));
//     $date = htmlspecialchars(trim($_POST["date"]));
//     $id = htmlspecialchars(trim($_POST["id"]));

//     $modifRideObj = new Rides;
//     $modifride = $modifRideObj->modifRide($iframe, $titre, $description, $kilometre, $participants, $hours, $meeting, $date, $id);
// }
