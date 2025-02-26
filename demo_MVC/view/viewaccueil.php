<main>
    <h2>Ajouter un Article</h2>
    <form action="" method="post">
        <input type="text" name="nom_article" placeholder="Nom de l'article" required> <br><br>
        <input type="text" name="contenu_article" placeholder="Contenu de l'article" required> <br><br>
        <input type="number" step="0.01" name="prix_article" placeholder="Prix de l'article" required> <br><br>
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <p><?= $message ?></p>
</main>