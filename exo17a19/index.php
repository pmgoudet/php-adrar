<!-- Exercice 17 :
Créer une fonction qui affiche chaque case d'un tableau
___
Exercice 18 :
Créer une fonction qui prend un tableau contenant des tableau.
Par exemple : $bigTab = [[1,2,3],[4,5,6],[7,8,9]]
La fonction affichera chaque petit tableau grâce à un print_r()
___
Exercice 19 :
Reprenez le gros tableau précédent ($bigTab)
Créer une fonction qui affiche chaque nombre contenu dans chaque petit tableau -->


<?php
$array17 = ["Maçã", "Banana", "Cereja", "Damasco", "Manga"];
function casesTab($t)
{
    foreach ($t as $e) {
        echo "<p>" . $e . "</p>";
    }
}

$bigTab = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
function ptTab($t)
{
    foreach ($t as $e) {
        print_r($e);
        echo "<br>";
    }
}

function ptTab19($t)
{
    foreach ($t as $e) {
        foreach ($e as $el) {
            print_r($el);
            echo "<br>";
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
    <h2>Exo 17</h2>
    <?php
    casesTab($array17);
    ?>

    <h2>Exo 18</h2>
    <?php
    ptTab($bigTab);
    ?>

    <h2>Exo 19</h2>
    <?php
    ptTab19($bigTab)
    ?>
</body>

</html>