<?php

$bdd = DBconnect();

function addCategory($bdd, $category)
{
    try {
        $req = $bdd->prepare("INSERT INTO categories (`name_category`) VALUES (?);");
        $req->bindParam(1, $category, PDO::PARAM_STR);
        $req->execute();
        return "Registration completed.<br> $category";
        // header('Refresh:0');
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}

function checkCategory($bdd, $category)
{
    $req = $bdd->prepare("SELECT `name_category` FROM categories WHERE name_category = ? LIMIT 1");
    $req->bindParam(1, $category, PDO::PARAM_STR);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function showCategories($bdd)
{
    try {
        $req = $bdd->prepare('SELECT `id_category`, `name_category` FROM categories;');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}

function categoryList($bdd)
{
    $data = showCategories($bdd);

    print_r($data);

    $categoriesList = '';

    foreach ($data as $category) {
        $categoriesList = $categoriesList . "<option value=\"{$category['id_category']}\">{$category['name_category']}</option>";;
    }

    return $categoriesList;
}
