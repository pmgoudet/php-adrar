<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo Tasks</title>
    <link rel="stylesheet" href="./src/style/style.css">

    <!-- <script src="../src/script/main.js" defer></script> -->
</head>

<body>

    <header>
        <h1 class="main-title">My Todo List</h1>
        <nav>
            <ul class="nav-bar">
                <li><a href="./controller_home.php">Home</a></li>
                <?= $nav ?>
            </ul>
        </nav>
    </header>

    <h2 class="subtitle"><?= $title ?></h2>