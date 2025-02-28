<?php
class Chien extends Animal
{
    private ?string $poil;
    private ?int $nbrPatte;

    //CONSTRUCTEUR
    public function __construct(?string $nom, ?string $couleur, ?float $taille, ?int $age, ?string $newPoil, ?int $newNbrPatte)
    {
        $this->setNom($nom);
        $this->setCouleur($couleur);
        $this->setTaille($taille);
        $this->setAge($age);
        $this->poil = $newPoil;
        $this->nbrPatte = $newNbrPatte;
    }

    //GETTER ET SETTER
    public function getPoil(): ?string
    {
        return $this->poil;
    }

    public function setPoil(?string $newPoil): self
    {
        $this->poil = $newPoil;
        return $this;
    }

    public function getNbrPatte(): ?string
    {
        return $this->nbrPatte;
    }

    public function setNbrPatte(?int $newNbrPatte): self
    {
        $this->nbrPatte = $newNbrPatte;
        return $this;
    }

    //METHOD
    public function accoucher(): void
    {
        echo "<p>Je me bâs.</p>";
    }

    //*Documentation du code seMultiplier()
    /**
     * seMultiplier() : appel la méthode accoucher() rédéfinie dans la classe chien
     * @param : $partenaire de tupe Animal
     * @return : void
     */
    public function seMultiplier(Animal $partenaire): void
    {
        // on ne peut pas avoir un return parce que, grace au parent, le retour est toujour void. Ça ce change pas.
        $this->accoucher();
    }

    public function mettreAuMonde(): void
    {
        // :: oppérateur de résolution de portée - on n'utilise pas la methode du chien mais si celle de son parent
        parent::seMultiplier($this);
    }
}
