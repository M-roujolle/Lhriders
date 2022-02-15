<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
}

$usersObj = new Users;
$allUsersArray = $usersObj->getAllUsers();

if (isset($_POST["user_id"], $_POST["idsupp"])) {
    $usersObj->deleteUser($_POST["user_id"]);
    $allUsersArray = $usersObj->getAllUsers(); // permet d'actualiser la page une fois la suppression faite
}
