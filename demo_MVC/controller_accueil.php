<?php
// import des ressources
include './utils/functions.php';
include './model/model_article.php';

// declararer variables d'affichage
$message = '';
$title = "Ajouter un nouvel article";

// listener du submit
if (isset($_POST['submit'])) {

    // verification des champs nulls et vides
    if (isset($_POST['nom_article']) && !empty($_POST['nom_article']) && isset($_POST['contenu_article']) && !empty($_POST['contenu_article']) && isset($_POST['prix_article']) && !empty($_POST['prix_article'])) {
        if (filter_var($_POST['prix_article'], FILTER_VALIDATE_FLOAT)) {
            // nettoyage des variables avec la function nettoyage déclaré avant 
            $nom = nettoyage($_POST['nom_article']);
            $contenu = nettoyage($_POST['contenu_article']);
            $prix = nettoyage($_POST['prix_article']);

            $bdd = DBconnect();
        } else {
            $message = "Le prix n'est pas au bon format";
        }
    } else {
        $message = "Veuillez remplir les champs obligatoires.";
    }
}

// include des vues

include './view/header.php';
include './view/viewaccueil.php';
include './view/footer.php';
