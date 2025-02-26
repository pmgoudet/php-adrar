<!-- 
 Exercice 4 :
    Créer une fonction qui soustrait à $a la variable $b (2 paramètres en entrée),
    la fonction doit renvoyer le résultat de la soustraction $a-$b (return).

Exercice 5 :
    Créer une fonction qui prend en entrée un nombre à virgule (float),
    la fonction doit renvoyer l’arrondi (return) du nombre en entrée.  

Exercice 6 :
    Créer une fonction qui prend en entrée 3 valeurs et renvoie la somme des 3 valeurs.
                
Exercice 7 :
    Créer une fonction qui prend en entrée 3 valeurs et retourne la valeur moyenne des 3 valeurs (saisies en paramètre).
-->


<?php
function soustraction($a, $b)
{
    return $a - $b;
}

function arrondi($n)
{
    return round($n);
}

function somme($v1, $v2, $v3)
{
    return $v1 + $v2 + $v3;
}

function moyenne($v1, $v2, $v3)
{
    return (somme($v1, $v2, $v3)) / 3;
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
    <h2>Exo 4</h2>
    <?php
    echo "<p> a - b = " . soustraction(8, 7) . "</p>";
    ?>

    <h2>Exo 5</h2>
    <?php
    print "<p> Le arrondi est : " . arrondi(5.6) . "</p>";
    ?>

    <h2>Exo 6</h2>
    <?php
    echo "<p> Le somme des 3 numeros est de : " . somme(2, 4, 8) . "</p>";
    ?>

    <h2>Exo 7</h2>
    <?php
    echo "<p> La moyenne des 3 numeros est de : " . moyenne(2, 8, 8) . "</p>";
    ?>
</body>

</html>