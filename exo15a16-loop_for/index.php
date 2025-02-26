<!-- Exercice 15 :
Créer un script qui affiche les nombres de 1 -> 5 (méthode echo).
___
Exercice 16 :
Ecrire une fonction qui prend un nombre en paramètre (variable $nbr), et qui ensuite affiche les dix
nombres suivants. Par exemple, si la valeur de nbr équivaut à : 17, la fonction affichera les nombres
de 18 à 27 (méthode echo). 
-->

<?php
function nbrSuivants($nbr)
{
    echo "<p> Le numéro est: " . $nbr . "</p>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<p>" . $nbr + $i . "</p>";
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
    <h2>Exo 15</h2>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "<p>" . $i . "</p>";
    }
    ?>

    <h2>Exo 16</h2>
    <?php
    nbrSuivants(7);
    nbrSuivants(17);
    nbrSuivants(0);
    ?>
</body>

</html>