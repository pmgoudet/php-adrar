<?php

class Personnage
{
    private ?string $nom;
    private ?string $description;
    private ?int $pointsDeVie;
    private ?Arme $arme;

    public function __construct(?string $newNom, ?string $newDescription, ?int $newPointsDeVie)
    {
        $this->nom = $newNom;
        $this->description = $newDescription;
        $this->pointsDeVie = $newPointsDeVie;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $newNom): ?self
    {
        $this->nom = $newNom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $newDescription): ?self
    {
        $this->description = $newDescription;
        return $this;
    }

    public function getPointsDeVie(): ?int
    {
        return $this->pointsDeVie;
    }

    public function setPointsDeVie(?int $newPointsDeVie): ?self
    {
        $this->pointsDeVie = $newPointsDeVie;
        return $this;
    }

    public function getArme(): ?Arme
    {
        return $this->arme;
    }

    public function setArme(?Arme $newArme): ?self
    {
        $this->arme = $newArme;
        return $this;
    }

    //METHOD
    public function parler(): string
    {
        return "Hello! Je m'appelle " . $this->getNom() . ".";
    }
}
