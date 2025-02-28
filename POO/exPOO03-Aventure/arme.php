<?php

class Arme
{
    private ?string $nom;
    private ?int $degat;

    public function __construct(?string $newNom, ?int $newDegat)
    {
        $this->nom = $newNom;
        $this->degat = $newDegat;
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

    public function getDegat(): ?string
    {
        return $this->degat;
    }

    public function setDegat(?int $newDegat): ?self
    {
        $this->degat = $newDegat;
        return $this;
    }

    //METHOD
    public function attaquer(Personnage $enemi): void
    {
        $enemi->setPointsDeVie($enemi->getPointsDeVie() - rand(1, $this->getDegat()));
    }
}
