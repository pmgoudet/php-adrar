<?php

// Je démarre ma $_SESSION pour pouvoir y accéder
session_start();

//je définis ma variable d'affichage
$message = "bonjour, utilisateur non connecté";

// je vérifie qu'il y a une session et que le login dans session n'est pas vide
if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {

    // peux modifier ma variable d'affichage
    $message = $_SESSION['login'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="page1.php">Accueil</a>
    <a href="page2.php">Compte Utilisateur</a>
    <a href="deco.php">Déconnexion</a>

    <h1><?= $message ?></h1>


</body>

</html>