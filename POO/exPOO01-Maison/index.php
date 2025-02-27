<?php
include "./maison.php";

$maisonBlanche = new Maison('Maison Blanche', 600, 50.21, 4);

echo $maisonBlanche->calculArea();
