<?php

$message = '';
$emailList = '';
$usersList = '';

function nettoyage($data)
{
    return htmlentities(strip_tags(trim(stripslashes($data))));
}

// Créer l'objet de connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try {
    // Créer une requête préparée SELECT
    $req2 = $bdd->prepare('SELECT `name_user`, firstname_user, email_user FROM users');

    // Exécuter la requête
    $req2->execute();

    // Récupérer la réponse dans une variable $data
    $data2 = $req2->fetchAll();

    // Faire une boucle sur $data pour générer le <li> de chaque utilisateur
    foreach ($data2 as $user) {
        $usersList = $usersList . "<li><h3>{$user['firstname_user']} {$user['name_user']}</h3> <h4>{$user['email_user']}</h4></li>";
    }
} catch (EXCEPTION $e) {
    $usersList = $e->getMessage();
}


// Vérifier que l'on reçoit le formulaire d'inscription
if (isset($_POST['submit'])) {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['firstname']) && !empty($_POST['firstname']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['passwordConf']) && !empty($_POST['passwordConf'])
    ) {
        // Vérifier que l'email a un format d'email
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

                // Vérifier si l'utilisateur existe déjà en BDD.
                // Créer l'objet de connexion à la BDD
                $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                //Créer une requête préparée SELECT avec une condition WHERE sur l'email
                try {
                    $req = $bdd->prepare("SELECT `email_user` FROM users WHERE email_user = ? LIMIT 1");
                    // Faire du Binding de Param pour relier l'email entré dans le formulaire au ? de la requête
                    $req->bindParam(1, $email, PDO::PARAM_STR);
                    // Exécuter la requête
                    $req->execute();
                    // Récupérer la réponse
                    $data = $req->fetchAll();
                    // Vérifier si la réponse est vide. 
                    if (empty($data)) {
                        //Si l'utilisateur peut s'inscrire, alors on prépare la requête d'INSERT INTO (à partir de l'objet de connexion déjà créé)
                        $req = $bdd->prepare("INSERT INTO users (`name_user`, `firstname_user`, `email_user`, `mpd_user`) VALUES (?,?,?,?);");
                        // Faire le Binding de Param pour insérer les données dans la requête (name, firstname, email, mdp)
                        $req->bindParam(1, $name, PDO::PARAM_STR);
                        $req->bindParam(2, $firstname, PDO::PARAM_STR);
                        $req->bindParam(3, $email, PDO::PARAM_STR);
                        $req->bindParam(4, $password, PDO::PARAM_STR);
                        $req->execute();

                        $message = "Registration completed. $firstname $name - $email.";
                        header('Refresh:0');
                    } else {
                        $message = "This email address is already registered.";
                    }
                } catch (EXCEPTION $e) {
                    $emailList = $e->getMessage();
                }
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            list-style-type: none;
        }

        body {
            width: 500px;
            display: flex;
            justify-content: space-between;
            margin: auto;
            margin-top: 50px;
        }

        li {
            border: 2px solid black;
            margin-bottom: 20px;
            padding: 5px;
        }

        ul {
            padding: 0;
            width: 200px;
        }
    </style>
</head>

<body>
    <div>
        <h2>Inscription</h2>
        <form action="" method="post">
            <label for="name">Last name</label><br>
            <input type="text" name="name" id="name" required><br><br>
            <label for="firstname">First name</label><br>
            <input type="text" name="firstname" id="firstname" required><br><br>
            <label for="email">E-mail</label><br>
            <input type="email" name="email" id="email" required><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br><br>
            <label for="passwordConf">Confirm your password</label><br>
            <input type="password" name="passwordConf" id="passwordConf" required><br><br>
            <input type="submit" name="submit" value="Inscription">
        </form>
        <p><?= $message ?></p>
    </div>

    <ul><?= $usersList ?></ul>

</body>

</html>