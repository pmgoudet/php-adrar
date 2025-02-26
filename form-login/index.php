<?php

/*
$_POST = [
    'login' => 'Test',
    'password' => '12345',
    'submit' => 'submit'
]
*/

$login = "";
$message = "";

if (isset($_POST['submitConnexion'])) {
    //verification de 1: isset() se o campo não é null -> 2: !empty() se não tá vazio
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
    }
}

if (isset($_POST['submitInscription'])) {
    //verification de 1: isset() se o campo não é null -> 2: !empty() se não tá vazio
    if (isset($_POST['loginInscription']) && !empty($_POST['loginInscription']) && isset($_POST['passwordInscription']) && !empty($_POST['passwordInscription'])) {
        $message = "Inscription effectuée avec succès.";
    }
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
    <h3><?= $login ?></h3>
    <h2>Connexion</h2>
    <form action="" method="post">
        <input type="text" name="login"><br><br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="submitConnexion"><br><br><br>
    </form>

    <h2>Inscription</h2>
    <form action="" method="post">
        <input type="text" name="loginInscription"><br><br>
        <input type="password" name="passwordInscription"><br><br>
        <input type="submit" name="submitInscription">
        <p><?= $message ?></p>
    </form>

    <?php
    var_dump($_POST);
    ?>


</body>

</html>