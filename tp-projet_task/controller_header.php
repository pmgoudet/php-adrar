<?php
$nav = '';

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $nav = '<li><a href="./controller_account.php">My Account</a></li><li><a href="./controller_disconnect.php">Disconnect</a></li>';
} else {
    $nav = '<li><a href="./controller_connection.php">Connection</a></li>';
}

include './view/header.php';
