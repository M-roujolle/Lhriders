<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Rides.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
}

$rideObj = new Rides;
$arrayride = $rideObj->getAllRides();

// if (isset($_POST["ride_id"], $_POST["idsupp"])) {
//     $usersObj->deleteUser($_POST["user_id"]);
//     $allUsersArray = $usersObj->getAllUsers(); // permet d'actualiser la page une fois la suppression faite
// }
