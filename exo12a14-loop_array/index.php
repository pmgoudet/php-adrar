<!-- Exercice 12 :
Créer une fonction qui affiche la valeur la plus grande du tableau.
___
Exercice 13 :
Créer une fonction qui affiche la moyenne du tableau.
___
Exercice 14 :
Créer une fonction qui affiche la valeur la plus petite du tableau -->


<?php
$t1 = [1, 61, 7, 98, 4];
$t2 = [5, 6, 8, 97, -98];
$t3 = [2, 8, 988, -54, -187, 5];
$t4 = [2, 2, 55, -4, -2, -2];

function biggest($t)
{
    $temp = $t[0];
    foreach ($t as $num) {
        if ($num > $temp) {
            $temp = $num;
        }
    }
    return $temp;
}

function moyenne($t)
{
    $temp = 0;
    foreach ($t as $num) {
        $temp += $num;
    }
    return $temp / count($t);
}

function smallest($t)
{
    $temp = $t[0];
    foreach ($t as $num) {
        if ($num < $temp) {
            $temp = $num;
        }
    }
    return $temp;
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
    <h2>Exo 12</h2>
    <?php
    echo biggest($t1);
    echo "<br>";
    echo biggest($t2);
    echo "<br>";
    echo biggest($t3);
    echo "<br>";
    ?>

    <h2>Exo 13</h2>
    <?php
    echo moyenne($t1);
    echo "<br>";
    echo moyenne($t2);
    echo "<br>";
    echo moyenne($t3);
    echo "<br>";
    echo moyenne($t4);
    echo "<br>";
    ?>

    <h2>Exo 13</h2>
    <?php
    echo smallest($t1);
    echo "<br>";
    echo smallest($t2);
    echo "<br>";
    echo smallest($t3);
    echo "<br>";
    ?>
</body>

</html>