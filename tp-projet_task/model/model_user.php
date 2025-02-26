<?php

$bdd = DBconnect();

function addUser($bdd, $name, $firstname, $email, $password)
{
    try {
        $req = $bdd->prepare("SELECT `email_user` FROM users WHERE email_user = ? LIMIT 1");
        $req->bindParam(1, $email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        if (empty($data)) {
            $req = $bdd->prepare("INSERT INTO users (`name_user`, `firstname_user`, `email_user`, `mdp_user`) VALUES (?,?,?,?);");
            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $firstname, PDO::PARAM_STR);
            $req->bindParam(3, $email, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);
            $req->execute();
            return "Registration completed. $firstname $name - $email.";
            header('Refresh:0');
        } else {
            return "This email address is already registered.";
        }
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}

function showUsers($bdd)
{
    try {
        $req = $bdd->prepare('SELECT `name_user`, `firstname_user`, `email_user` FROM users;');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}

function userList($bdd)
{
    $data = showUsers($bdd);
    $usersList = '';

    foreach ($data as $user) {
        $usersList = $usersList . "<option>{$user['name_user']}</option>";
    }

    return $usersList;
}

function readUserByEmail($bdd, $email)
{
    try {
        $req = $bdd->prepare("SELECT `id_user`,`name_user`, `firstname_user`, `email_user`, `mdp_user` FROM users WHERE email_user = ? LIMIT 1");
        $req->bindparam(1, $email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}
