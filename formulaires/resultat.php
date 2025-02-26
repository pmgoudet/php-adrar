<?php
if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
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
    <h1><?= $prenom . " " . $nom ?></h1>
</body>

</html>