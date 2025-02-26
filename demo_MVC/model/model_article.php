<?php
function articleAdd($bdd, $nom, $contenu, $prix)
{
    try {
        $req = $bdd->prepare("INSERT INTO article (`nom_article`, `description_article`, `prix_article`) VALUE (?,?,?);");

        $req->bindParam(1, $nom, PDO::PARAM_STR);
        $req->bindParam(2, $contenu, PDO::PARAM_STR);
        $req->bindParam(3, $prix, PDO::PARAM_STR);

        $req->execute();

        return "Nom: $nom - Contenu: $contenu ; a bien été ajouté à la BDD.";
    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}

function articleAll($bdd)
{
    try {
        $req = $bdd->prepare('SELECT nom_article, description_article, prix_article FROM article');

        $req->execute();
        $data = $req->fetchAll();

        $articleList = '';

        foreach ($data as $article) {
            $articleList = $articleList . "<li><h2>Article: {$article['nom_article']}</h2> <p>Description: {$article['description_article']}<p></p><strong>Prix: {$article['prix_article']} €</strong></p>";
        }
        return $articleList;
    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}
