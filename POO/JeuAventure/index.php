<?php
// ICI C'EST LE FICHIER D'EXECUTION
include './personnage.php';


// Créer nouveau personnage
//? $personnage = new Personnage("Yoann", "Le formateur DEV", 15);
$personnage = new Personnage("Yoann", "Le formateur DEV");

// Voir l'objet
var_dump($personnage);

// afficher une phrase en récupérant les valeurs des attributs
echo "<p>{$personnage->getNom()}, {$personnage->getDescription()}, possède {$personnage->getPointsDeVie()} points de vie</p>";

// modifier les valeurs de mon objet et afficher la phrase
$personnage->setNom('Mathieu')->setPointsDeVie(18);
echo "<p>{$personnage->getNom()}, {$personnage->getDescription()}, possède {$personnage->getPointsDeVie()} points de vie</p>";

// tester la methode parler()
echo "<p>{$personnage->parler()}</p>";
