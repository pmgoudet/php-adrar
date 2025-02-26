<?php

function nettoyage($data)
{
    return htmlentities(strip_tags(trim(stripslashes($data))));
}

function DBconnect()
{
    $bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
