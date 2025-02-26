<?php
include "./data.php";

$tabData = [];

array_push($tabData, $USERS_HUMAN, $USERS_PET, $USERS_XENO);
// print_r($tabData);

function displayHuman($t)
{
    echo "  
        <article style= 'border-bottom : 3px solid black '>
        <h2>nom : " . $t['name'] . "</h2>
        <p>email : " . $t['email'] . "</p>
        <p>age : " . $t['age'] . "</p>
        </article>
    ";
};


function displayPet($t)
{
    echo "  
        <article style= 'border-bottom : 3px solid black '>
        <h2>nom : " . $t['name'] . "</h2>
        <p>espece : " . $t['espece'] . "</p>
        <p>age : " . $t['age'] . "</p>
        <p>propriétaire : " . $t['propriétaire'] . "</p>
        </article>
    ";
};

function displayXeno($t)
{
    echo "  
        <article style= 'border-bottom : 3px solid black '>
        <h2>nom : " . $t['name'] . "</h2>
        <p>espece : " . $t['espece'] . "</p>
        <p>age : " . $t['age'] . "</p>
        <p>niveau de menace: " . $t['menace'] . "</p>
        </article>
    ";
};

function displayUser($t)
{
    foreach ($t as $i) {
        if ($i["type"] == "humain") {
            displayHuman($i);
        } else if ($i["type"] == "animal de compagnie") {
            displayPet($i);
        } else if ($i["type"] == "Xeno") {
            displayXeno($i);
        } else {
            echo "Type de Profil non Existant";
        }
    }
}

function displayAll($t)
{
    foreach ($t as $i) {
        displayUser($i);
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
    <?php
    // displayUser($USERS_HUMAN);
    // displayUser($USERS_PET);
    // displayUser($USERS_XENO);

    displayAll($tabData);
    ?>
</body>

</html>