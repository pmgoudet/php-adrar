<?php

include './utils/functions.php';
include './model/model_user.php';

$title = '';
$userName = 'Login to access.';
$userEmail = '';

session_start();


if (isset($_SESSION['firstname']) && !empty($_SESSION['firstname']) && isset($_SESSION['name']) && !empty($_SESSION['name']) && isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $userName = $_SESSION['firstname'] . " " . $_SESSION['name'];
    $userEmail = $_SESSION['email'];
    $title = 'Connecté !';
}




include './controller_header.php';
include './view/viewUserAccount.php';
include './view/footer.php';
