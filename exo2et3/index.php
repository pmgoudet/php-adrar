<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Créer 2 variables $a et $b qui ont pour valeur 12 et 10,
    Stocker le résultat de l’addition de $a et $b dans une variable $total,
    Afficher le résultat (utilisez la fonction echo)
    (l'affichage se fera dans une page html) -->
    <h2>EXO2</h2>

    <?php
    $a = 12;
    $b = 10;
    $total = $a + $b;

    echo "<p>a = " . $a . "</p>";
    echo "<p>b = " . $b . "</p>";
    echo "<h3>a + b = " . $total . "</h3>";
    ?>

    <!-- Ecrire un programme qui prend le prix HT d’un article, le nombre d’articles et le taux de TVA, et qui fournit le prix total TTC correspondant.
    Afficher le prix HT, le nbr d’articles et le taux de TVA (utilisez la fonction echo),
    Afficher le résultat (utilisez la fonction echo).

    NB : le calcul du prixTTC est :   prixTTC = prixHT  * quantite * (1 + TVA)    (avec TVA en décimal)
    (l'affichage se fera dans une page html)  -->

    <h2 style="margin-top: 50px;">EXO3</h2>
    <?php
    $prixHT = 10.5;
    $qtt = 4;
    $prixTTC = number_format($prixHT  * $qtt * (1 + 0.2), 2, ',', '');

    echo "<p>Valeur du produit: " . $prixHT . "</p>";
    echo "<p>Quantité: " . $qtt . "</p>";
    echo "<h3>Prix TTC : " .  $prixTTC . "€ </h3>";
    ?>
</body>

</html>