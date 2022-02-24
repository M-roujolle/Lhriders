<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Users.php';

session_start();
if ($_SESSION["role"] != 1 || !isset($_SESSION["id"])) {
    header('Location: home.php');
}

$usersObj = new Users;
var_dump($_POST);

// on verifie si idvalider et valider existe
if (isset($_POST["idvalider"], $_POST["valider"], $_POST["userstatus"])) {
    // on verifie si l'id posté est bien un entier
    if (ctype_digit($_POST["idvalider"])) {
        // si c'est le cas, on le stock dans une variable $id
        $iduser = $_POST["idvalider"];
        // en appelant la méthose de mon objet, on utilise la variable $id
        $status = $_POST["userstatus"] == 0 ? 1 : 0;
        $usersObj->changeStatusUser($iduser, $status);
    }
}
$allUsersArray = $usersObj->getAllUsers();

if (isset($_POST["user_id"], $_POST["idsupp"])) {
    $usersObj->deleteUser($_POST["user_id"]);
    $allUsersArray = $usersObj->getAllUsers(); // permet d'actualiser la page une fois la suppression faite
}
