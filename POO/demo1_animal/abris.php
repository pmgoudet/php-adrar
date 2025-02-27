<?php

class Abris
{
    private ?string $nom;

    public function __construct(?string $nom)
    {
        $this->nom = $nom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function  abriter(): void
    {
        echo "Je m'abrite dans " . $this->getNom() . ".";
    }
}
