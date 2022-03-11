<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Rides.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
    exit();
}

$oneRideObj = new Rides;
$oneride = $oneRideObj->getOneRide($_GET["id"]);
