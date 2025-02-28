<?php

include "./arme.php";
include "./personnage.php";
include "./guerrier.php";
include "./voleur.php";

$robinHood = new Voleur("Robin Hood", "Prends des riches, donne aux pauvres", 10);
print_r($robinHood);
echo $robinHood->devenirInvisible();

$xena = new Guerrier("Xena", "Princesse Guerrière", 15, 10);
print_r($xena);
echo $xena->defoncerDesMurs();
print_r($xena);

echo "<br><br>";
echo $robinHood->parler();

echo "<br><br>";
echo $xena->parler();

$dague = new Arme("Dague", 10);
$robinHood->setArme($dague);

echo "<br><br>";

echo "<p>" . $xena->getNom() . " avait " . $xena->getPointsDeVie() . " points de vie.</p>";

$robinHood->getArme()->attaquer($xena);

echo "<p>Après l'attaque, " . $xena->getNom() . " a " . $xena->getPointsDeVie() . " points de vie.</p>";
