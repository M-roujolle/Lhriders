<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Rides.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
    exit();
}


$rideObj = new Rides;

// on verifie si idvalider et valider existe
if (isset($_POST["idvalider"], $_POST["valider"], $_POST["ridestatus"])) {
    // on verifie si l'id posté est bien un entier
    if (ctype_digit($_POST["idvalider"])) {
        // si c'est le cas, on le stock dans une variable $id
        $idride = $_POST["idvalider"];
        // en appelant la méthose de mon objet, on utilise la variable $id
        $status = $_POST["ridestatus"] == 0 ? 1 : 0;
        $rideObj->changeStatusRide($idride, $status);
    }
}

$arrayride = $rideObj->getAllRides();

if (isset($_POST["ride_id"], $_POST["idsupp"])) {
    $rideObj->deleteRide($_POST["ride_id"]);
    $arrayride = $rideObj->getAllRides(); // permet d'actualiser la page une fois la suppression faite
}
