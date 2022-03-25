<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Users.php';
require_once '../models/Rides.php';


// je créer un nouvel objet selon la class Users
$usersObj = new Users();
$rideObj = new Rides();
// je créer un tableau à l'aide de la methode getAllUser de mon objet
$allUsersArray = $usersObj->getAllUsers();
$allRideArray = $rideObj->showRide();
