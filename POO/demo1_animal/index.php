<?php

class Animal
{
    //ATTRIBUTS
    public ?string $nom;
    private ?string $couleur;
    public ?float $taille;
    public ?int $age;

    //CONSTRUCTEUR
    //fonction pour pouvoir créer un Animal, en lui donnant les attributs
    public function __construct(?string $nom, ?string $couleur, ?float $taille, ?int $age)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->taille = $taille;
        $this->age = $age;
    }

    //GETTER ET SETTER
    public function getCouleur(): ?string
    {
        return $this->couleur;
    }



    //METHOD
    public function seNourrir(?string $aliment): string | array
    {
        if ($aliment == 'poison') {
            return "Mange pas ça, tu vas mourir !";
        } else {
            return [$aliment, "il a bon goût !", $this->nom . " a aimé son repas!"];
        }
    }
}


$chien = new Animal('chien', 'noir', 1.10, 5);
echo "<p>$chien->nom</p>";
echo "<p>" . $chien->getCouleur() . "</p>";

// echo "J'ai un " . $chien->nom . ". Il est de couleur " . $chien->couleur . " . Et il a " . $chien->age . " ans.";

// $reponse = $chien->seNourrir('viande');
// if (gettype($reponse) == 'string') {
//     echo "<p>$reponse</p>";
// } else {
//     echo "<p>{$reponse[2]}</p>";
// }