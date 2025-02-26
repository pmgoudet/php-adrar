<!-- Exercice 20 :
Créer une page de formulaire dans laquelle on aura 2 champs de formulaire de type nombre.
Afficher dans cette même page la somme des 2 champs avec un affichage du style :
La somme est égale à : valeur.
___
Exercice 21 :
Créer une page de formulaire dans laquelle on aura 3 champs de formulaire de type
nombre :
1 champ de formulaire qui demande un prix HT d’un article,
1 champ de formulaire qui demande le nombre d’article,
1 champ de formulaire qui demande le taux de TVA,

Afficher dans cette même page le prix TTC (prix HT, taux TVA, quantité) avec un affichage du style :
Le prix TTC est égal à : valeur €. -->

<?php
$reponse = "";
if (isset($_POST['submit'])) {
    if (isset($_POST['n1']) && is_numeric($_POST['n1']) && isset($_POST['n2']) && is_numeric($_POST['n2'])) {
        $valeur = $_POST['n1'] + $_POST['n2'];
        $reponse = "<p>La somme est égale à : $valeur</p>";
    }
}

$reponse2 = "";
if (isset($_POST['submit21'])) {
    if (isset($_POST['nu1']) && !empty($_POST['nu1']) && isset($_POST['nu2']) && is_numeric($_POST['nu2']) && isset($_POST['nu3']) && !empty($_POST['nu3'])) {
        $prix = $_POST['nu1'] * $_POST['nu2'] * (1 + ($_POST['nu3'] / 100));
        $reponse2 = "<p>Le prix TTC est égal à : $prix € </p>";
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
    <h2>Exo 20</h2>
    <form action="" method="post">
        <input type="number" name="n1"><br><br>
        <input type="number" name="n2"><br><br>
        <input type="submit" name="submit" value="Somme!"><br><br>
    </form>

    <?= $reponse ?>


    <h2>Exo 21</h2>
    <form action="" method="post">
        <label for="prix">Prix:</label><br>
        <input type="number" name="nu1" id="prix"><br><br>
        <label for="qtt">Quantité</label><br>
        <input type="number" name="nu2" id="qtt"><br><br>
        <label for="tva">Taux TVA</label><br>
        <input type="number" name="nu3" id="tva"><br><br>
        <input type="submit" name="submit21" value="Prix TTC"><br><br>
    </form>

    <?= $reponse2 ?>

</body>

</html>