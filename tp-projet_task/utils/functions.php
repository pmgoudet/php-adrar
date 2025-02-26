<?php

function nettoyage($data)
{
    return htmlentities(strip_tags(trim(stripslashes($data))));
}


function DBconnect()
{
    $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'pmgoudet', 'senhabdd', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function prettyPrintArray($array)
{
    echo "<pre style='background: #f4f4f4; padding: 10px; border-radius: 5px; border: 1px solid #ccc;'>";
    print_r($array);
    echo "</pre>";
}
