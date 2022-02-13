<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

$usersObj = new Users;
if (isset($_GET["id"])) {
    $usersObj->deleteUser($_GET["id"]);
}

$allUsersArray = $usersObj->getAllUsers();
