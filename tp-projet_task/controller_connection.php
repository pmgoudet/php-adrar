<?php

include './utils/functions.php';
include './model/model_user.php';

$title = 'Connect';
$connectionMsg = '';

session_start();

if (isset($_POST['submitConnection'])) {
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
        if (filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
            $login = nettoyage($_POST['login']);
            $password = nettoyage($_POST['password']);
            $bdd = DBconnect();
            $data = readUserByEmail($bdd, $login);
            if (!empty($data)) {
                if (password_verify($password, $data[0]['mdp_user'])) {
                    $_SESSION['id'] = $data[0]['id_user'];
                    $_SESSION['name'] = $data[0]['name_user'];
                    $_SESSION['firstname'] = $data[0]['firstname_user'];
                    $_SESSION['email'] = $data[0]['email_user'];

                    header('Location:controller_account.php');
                } else {
                    $connectionMsg = "Login and/or Password Incorrect(s).";
                }
            } else {
                $connectionMsg = "Login and/or Password Incorrect(s).";
            }
        } else {
            $connectionMsg = "The email address is not in the correct format.";
        }
    } else {
        $connectionMsg = 'Fill in all the fields.';
    }
}

include './controller_header.php';
include './view/viewConnection.php';
include './view/footer.php';
