<?php

include "./abris.php";
include "./animal.php";
include "./chien.php";

// créons un chien
$chien = new Chien("Medor", "Noir", 1.2, 5, "Noir", 4);

print_r($chien);
echo "<br><br>";
$chien->seMultiplier($chien);
echo "<br><br>";
$chien->mettreAuMonde();
echo "<br><br>";

//donnons un abris a notre chien
$chien->setAbris(new Abris("Ma Niche"));
echo "<br><br>";

print_r($chien);
