<?php
//declaration des variables d'affichage
$usersList = '';

//1er étape : création de l'objet de connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// try... catch()
try {
    //2eme étape: preparer la requete SELECT
    $req = $bdd->prepare('SELECT `login`, email, age FROM users');

    //3eme étape: exécution de la requete
    $req->execute();

    //4eme étape: récupérer les données de la BDD
    $data = $req->fetchAll();
    // print_r($data);

    // pour afficher les data, on fait une boucle sur le tableau. un <li> par enregistrement
    foreach ($data as $user) {
        $usersList = $usersList . "<li>{$user['login']} : {$user['email']} - {$user['age']} ans.</li>";
    }
} catch (EXCEPTION $e) {
    $usersList = $e->getMessage();
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
    <h1>Liste des Utilisateurs</h1>
    <ul>
        <?= $usersList ?>
    </ul>
</body>

</html>