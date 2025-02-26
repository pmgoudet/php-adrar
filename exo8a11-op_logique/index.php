<!-- Exercice 8 :
Créer une fonction qui teste si un nombre est positif ou négatif (echo dans la page web).
Si c'est égal à 0, faire que ça affiche que c'est positif et négatif à la fois
___
Exercice 9 :
Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus grand (echo
dans la page web).

Exercice 10 :
    Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus petit (echo
    dans la page web).
Exercice 11 :
    Créer une fonction qui prend en entrée 1 valeur (l’âge d’un enfant). Ensuite, elle informe de sa
    catégorie (echo dans la page web) :
    • "Poussin" de 6 à 7 ans
    • "Pupille" de 8 à 9 ans
    • "Minime" de 10 à 11 ans
    • "Cadet" après 12 ans
    Bonus : Refaire l’exercice en utilisant le switch case.

-->


<?php

function posOuNeg($n)
{
    if (gettype($n) != "integer" && gettype($n) != "double") {
        echo "<p>Mais c'est pas possible là ¬¬ </p>";
    } else if ($n < 0) {
        echo "<p>" . $n . " est négatif. </p>";
    } else  if ($n > 0) {
        echo "<p>" . $n . " est positif. </p>";
    } else {
        echo "<p>" . $n . " est positif et négatif à la fois.</p>";
    }
}

function comparerMax($n1, $n2, $n3)
{
    if ((gettype($n1) != "integer" && (gettype($n1) != "double")) or (gettype($n2) != "integer" && (gettype($n2) != "double")) or (gettype($n3) != "integer" && (gettype($n3) != "double"))) {
        return "NaN";
    } else if ($n1 >= $n2 && $n1 >= $n3) {
        return $n1;
    } else if ($n2 >= $n1 && $n2 >= $n3) {
        return $n2;
    } else {
        return $n3;
    }
}

function comparerMin($n1, $n2, $n3)
{
    if ((gettype($n1) != "integer" && (gettype($n1) != "double")) or
        (gettype($n2) != "integer" && (gettype($n2) != "double")) or
        (gettype($n3) != "integer" && (gettype($n3) != "double"))
    ) {
        return "NaN";
    } else if ($n1 <= $n2 && $n1 <= $n3) {
        return $n1;
    } else if ($n2 <= $n1 && $n2 <= $n3) {
        return $n2;
    } else {
        return $n3;
    }
}

function ageEnfant($n1)
{
    if (gettype($n1) != "integer" && (gettype($n1) != "double")) {
        return "BUG BUG BUG";
    } else {
        switch (true) {
            case ($n1 >= 6 && $n1 < 8):
                return "Poussin";
                break;
            case ($n1 >= 8 && $n1 < 10):
                return "Pupille";
                break;
            case ($n1 >= 10 && $n1 < 12):
                return "Minime";
                break;
            default:
                if ($n1 >= 12) {
                    return "Cadet";
                    break;
                }
        }
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
    <h2>Exo 8</h2>
    <?php
    posOuNeg("Jão");
    posOuNeg([1, 2, 4, 5, 'ae']);
    posOuNeg(-5);
    posOuNeg(0);
    posOuNeg(5);
    ?>

    <h2>Exo 9</h2>
    <?php
    echo "<p> Le número le plus grand c'est le " . comparerMax(2, 21, 21) . ".</p>";
    ?>

    <h2>Exo 10</h2>
    <?php
    echo "<p> Le número le plus petit c'est le " . comparerMin(25, 251, 21) . ".</p>";
    echo "<p> Le número le plus petit c'est le " . comparerMin(25, "13", 21) . ".</p>";
    ?>

    <h2>Exo 11</h2>
    <?php
    echo "Un enfant de DOUZE ans est un " . ageEnfant("12") . ".</p>";
    echo "Un enfant de 6 ans est un " . ageEnfant(6) . ".</p>";
    echo "Un enfant de 7 ans est un " . ageEnfant(7) . ".</p>";
    echo "Un enfant de 8 ans est un " . ageEnfant(8) . ".</p>";
    echo "Un enfant de 8 ans et demi est un " . ageEnfant(8.5) . ".</p>";
    echo "Un enfant de 9 ans est un " . ageEnfant(9) . ".</p>";
    echo "Un enfant de 9 ans et demi est un " . ageEnfant(9.5) . ".</p>";
    echo "Un enfant de 10 ans est un " . ageEnfant(10) . ".</p>";
    echo "Un enfant de 11 ans est un " . ageEnfant(11) . ".</p>";
    echo "Un enfant de 12 ans est un " . ageEnfant(12) . ".</p>";
    echo "Un enfant de 13 ans est un " . ageEnfant(13) . ".</p>";
    echo "Un enfant de 14 ans est un " . ageEnfant(14) . ".</p>";
    ?>
</body>

</html>