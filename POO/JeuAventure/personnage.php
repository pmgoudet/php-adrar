<?php

// CLASS PERSONNAGE
class Personnage
{
    //ATTRIBUT
    //: ? antes de string é para poder ter o atributo null, caso a gente queira começar com ele vazio.
    private ?string $nom;
    private ?int $pointsDeVie; // 10 valor par default
    private ?string $description;
    // private ?int $pointsDeVie = 10; // 10 seria o valor par default


    //CONSTRUCTEUR
    // __construct c'est une méthode magique (sim, o termo é esse), qui existe en PHP pour toutes les classes
    // parametre par default sur points de vie = 10. Se for definido null é null, se for definido 4 é 4, se nada for definido é 10.
    public function __construct(?string $newNom, ?string $newDescription, ?int $newPointsDeVie = 10)
    {
        $this->nom = $newNom;
        $this->description = $newDescription;
        $this->pointsDeVie = $newPointsDeVie;
    }


    //GETTER E SETTER
    // getter sont les methodes que retournent la valeur d'un attribut
    // les setters eux, permettent de modifier les valeurs d'un attribut
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $newNom): Personnage
    {
        $this->nom = $newNom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $newDescription): Personnage
    {
        $this->description = $newDescription;
        return $this;
    }

    public function getPointsDeVie(): int | null //outro jeito de escrever o ?int - int OU null
    {
        return $this->pointsDeVie;
    }

    public function setPointsDeVie(?int $newPointsDeVie): Personnage
    {
        $this->pointsDeVie = $newPointsDeVie;
        return $this;
    }


    //METHOD
    public function parler(): string
    {
        return "Hello Bro! Je m'appelle " . $this->getNom() . ".";
    }
}
