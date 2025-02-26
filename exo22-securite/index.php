<?php

function nettoyage($data)
{
    return htmlentities(strip_tags(trim(stripslashes($data))));
}

$message = '';

// listener du submit
if (isset($_POST['submit'])) {

    // verification des champs nulls et vides
    if (isset($_POST['nom_article']) && !empty($_POST['nom_article']) && isset($_POST['contenu_article']) && !empty($_POST['contenu_article']) && isset($_POST['prix_article']) && !empty($_POST['prix_article'])) {
        if (filter_var($_POST['prix_article'], FILTER_VALIDATE_FLOAT)) {
            // nettoyage des variables avec la function nettoyage déclaré avant 
            $name = nettoyage($_POST['nom_article']);
            $content = nettoyage($_POST['contenu_article']);
            $prix = nettoyage($_POST['prix_article']);
            // communication avec la bdd
            $bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            try {
                $req = $bdd->prepare("INSERT INTO article (`nom_article`, `description_article`, `prix_article`) VALUE (?,?,?);");
                $req->bindParam(1, $name, PDO::PARAM_STR);
                $req->bindParam(2, $content, PDO::PARAM_STR);
                $req->bindParam(3, $prix, PDO::PARAM_STR);
                $req->execute();

                $message = "Yes! T'as réussi!";
            } catch (EXCEPTION $error) {
                $message = $error->getMessage();
            }
        } else {
            $message = "Le prix n'est pas au bon format";
        }
    } else {
        $message = "Veuillez remplir les champs obligatoires.";
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
    <h2>Exo 22</h2>
    <form action="" method="post">
        <input type="text" name="nom_article" placeholder="Nom de l'article" required> <br><br>
        <input type="text" name="contenu_article" placeholder="Contenu de l'article" required> <br><br>
        <input type="number" step="0.01" name="prix_article" placeholder="Prix de l'article" required> <br><br>
        <input type="submit" name="submit" value="Ajouter">
    </form>

    <p><?= $message ?></p>

</body>

</html>