<?php
$articleList = '';

$bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
    $req = $bdd->prepare('SELECT nom_article, description_article, prix_article FROM article');
    $req->execute();
    $data = $req->fetchAll();

    foreach ($data as $article) {
        $articleList = $articleList . "<li><h2>Article: {$article['nom_article']}</h2> <p>Description: {$article['description_article']}<p></p><strong>Prix: {$article['prix_article']} €</strong></p>";
    }
} catch (EXCEPTION $e) {
    $articleList = $e->getMessage();
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
    <h1>Exo 22Bis</h2>
        <ul>
            <?= $articleList ?>
        </ul>
</body>

</html>