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

    //*Documentation du code abriter()
    /**
     * abriter() : afficher une string
     * @param : void
     * @return : void
     */
    public function  abriter(): void
    {
        echo "Je m'abrite dans " . $this->getNom() . ".";
    }
}
