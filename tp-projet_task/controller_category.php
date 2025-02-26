<?php

include './utils/functions.php';
include './model/model_category.php';

$message = '';
$categoriesList = '';
$title = "Add a new category";


if (isset($_POST['submit'])) {
    if (
        isset($_POST['category']) && !empty($_POST['category'])
    ) {
        // Nettoyer les données
        $category = nettoyage($_POST['category']);
        $bdd = DBconnect();

        $data = checkCategory($bdd, $category);

        if (empty($data)) {
            $message = addCategory($bdd, $category);
        } else {
            $message = "This category already exists.";
        }
    } else {
        $message = "Please fill in the required fields.";
    }
}

$bdd = DBconnect();

$data = showCategories($bdd);

foreach ($data as $category) {
    $categoriesList = $categoriesList . "<li><h3>{$category['name_category']}</h3></li>";
}

include './controller_header.php';
include './view/viewCategories.php';
include './view/footer.php';
