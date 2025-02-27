<?php

include "./vehicule.php";

$v1 = new Vehicule('Mercedes CLK', 4, 250);
$v2 = new Vehicule('Honda CBR', 2, 280);

echo "<p>" . $v1->getNomVehicule() . " est une " . $v1->detect() . "</p>";
echo "<p>" . $v2->getNomVehicule() . " est une " . $v2->detect() . "</p>";


echo "<p>Avant la vitesse de " . $v1->getNomVehicule() . " était de " . $v1->getVitesse() . "km/h.</p>";
echo "<p>Boosted! " . $v1->boost();
echo "<p> Après la vitesse est passée à " . $v1->getVitesse() . "km/h.</p>";

if (gettype($v1->plusRapide($v2)) == 'object') {
    echo "<p>" . $v1->plusRapide($v2)->getNomVehicule() . " est la plus rapide.</p>";
} else {
    echo $v1->plusRapide($v2);
}
