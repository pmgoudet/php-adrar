<?php

class Vehicule
{
    private ?string $nomVehicule;
    private ?int $nbrRoue;
    private ?int $vitesse;

    public function __construct(?string $newNomVehicule, ?int $newNbrRoue, ?int $newVitesse)
    {
        $this->nomVehicule = $newNomVehicule;
        $this->nbrRoue = $newNbrRoue;
        $this->vitesse = $newVitesse;
    }

    public function getNomVehicule(): ?string
    {
        return $this->nomVehicule;
    }

    public function setNomVehicule(?string $newNomVehicule): Vehicule
    {
        $this->nomVehicule = $newNomVehicule;
        return $this;
    }

    public function getNbrRoue(): ?string
    {
        return $this->nbrRoue;
    }

    public function setNbrRoue(?string $newNbrRoue): Vehicule
    {
        $this->nbrRoue = $newNbrRoue;
        return $this;
    }

    public function getVitesse(): ?string
    {
        return $this->vitesse;
    }

    public function setVitesse(?string $newVitesse): Vehicule
    {
        $this->vitesse = $newVitesse;
        return $this;
    }


    //METHOD 

    public function detect(): string
    {
        if ($this->nbrRoue == 4) {
            return "Voiture";
        } else {
            return "Moto";
        }
    }

    public function boost(): void
    {
        $this->setVitesse($this->getVitesse() + 50);
    }

    public function plusRapide(Vehicule $autre): Vehicule | string
    {
        if ($this->getVitesse() > $autre->getVitesse()) {
            return $this;
        } else if ($this->getVitesse() < $autre->getVitesse()) {
            return $autre;
        } else {
            return "<p>Les deux vehicules ont la même vitesse.</p>";
        }
    }
}
