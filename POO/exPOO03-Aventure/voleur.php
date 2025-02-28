<?php

class Voleur extends Personnage
{
    // public function __construct(?string $nom, ?string $description, ?int $pointsDeVie)
    // {
    //     $this->setNom($nom);
    //     $this->setDescription($description);
    //     $this->setPointsDeVie($pointsDeVie);
    // } //!AQUI NAO PRECISAVA DO CONSTRUCTOR

    //METHOD
    public function devenirInvisible(): string
    {
        return "<p>" . $this->getNom() . " devient une ombre.</p>";
    }
}