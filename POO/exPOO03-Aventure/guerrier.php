<?php

class Guerrier extends Personnage
{
    private ?int $heroisme;

    public function __construct(?string $nom, ?string $description, ?int $pointsDeVie, ?int $newHeroisme)
    {
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setPointsDeVie($pointsDeVie);
        $this->heroisme = $newHeroisme;
    }

    public function getHeroisme(): ?string
    {
        return $this->heroisme;
    }

    public function setHeroisme(?int $newHeroisme): ?self
    {
        $this->heroisme = $newHeroisme;
        return $this;
    }

    //METHOD
    public function defoncerDesMurs(): string
    {
        if ($this->getHeroisme() > 0) {
            $this->setHeroisme($this->getHeroisme() - 1);
            return "<p>{$this->getNom()} passe à travers le mur comme dans du beurre !</p>";
        } else {
            return "<p>{$this->getNom()} est repoussé par le mur. Quelle disgrâce !</p>";
        }
    }
}
