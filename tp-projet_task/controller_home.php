<?php

session_start();

include './utils/functions.php';
include './model/model_user.php';

$message = '';
$usersList = '';
$title = "Create an account!";



if (isset($_POST['submit'])) {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['firstname']) && !empty($_POST['firstname']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['passwordConf']) && !empty($_POST['passwordConf'])
    ) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Vérifier que les 2 mots de passes sont identiques
            if (($_POST['password']) === ($_POST['passwordConf'])) {
                // Nettoyer les données
                $name = nettoyage($_POST['name']);
                $firstname = nettoyage($_POST['firstname']);
                $email = nettoyage($_POST['email']);
                $password = nettoyage($_POST['password']);
                // Hasher le mot de passe
                $password = password_hash($password, PASSWORD_BCRYPT);

                $bdd = DBconnect();

                $message = addUser($bdd, $name, $firstname, $email, $password);
            } else {
                $message = "The password and confirmation password do not match.";
            }
        } else {
            $message = "The email address is not in the correct format.";
        }
    } else {
        $message = "Please fill in the required fields.";
    }
}

$bdd = DBconnect();

$data = showUsers($bdd);

foreach ($data as $user) {
    $usersList = $usersList . "<li class='task-item'><h3>{$user['firstname_user']} {$user['name_user']} - {$user['email_user']}</h3></li>";
}

include './controller_header.php';
include './view/viewUsers.php';
include './view/footer.php';
