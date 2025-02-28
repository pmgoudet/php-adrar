<?php

class Maison
{
    private ?string $nom;
    private ?float $longueur;
    private ?float $largeur;
    private ?int $nbrEtage;


    //CONSTRUCTOR
    public function __construct(?string $newNom, ?float $newLongueur, ?float $newLargeur, ?int $newNbrEtage)
    {
        $this->nom = $newNom;
        $this->longueur = $newLongueur;
        $this->largeur = $newLargeur;
        $this->nbrEtage = $newNbrEtage;
    }


    //GETTER ET SETTER
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $newNom): Maison
    {
        $this->nom = $newNom;
        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(?float $newLongueur): Maison
    {
        $this->longueur = $newLongueur;
        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(?float $newLargeur): Maison
    {
        $this->largeur = $newLargeur;
        return $this;
    }

    public function getNbrEtage(): ?float
    {
        return $this->nbrEtage;
    }

    public function setNbrEtage(?float $newNbrEtage): Maison
    {
        $this->nbrEtage = $newNbrEtage;
        return $this;
    }

    // METHOD
    public function calculArea(): string
    {
        return "<p>La surface de " . $this->getNom() . " est égale à " . $this->getLongueur() * $this->getLargeur() * ($this->getNbrEtage() + 1) . "m²</p>";
    }
}
