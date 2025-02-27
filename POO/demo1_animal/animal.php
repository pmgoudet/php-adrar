<?php
class Animal
{
    //ATTRIBUTS
    private ?string $nom;
    private ?string $couleur;
    private ?float $taille;
    private ?int $age;
    private ?Abris $abris;

    //CONSTRUCTEUR
    //fonction pour pouvoir créer un Animal, en lui donnant les attributs
    public function __construct(?string $nom, ?string $couleur, ?float $taille, ?int $age)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->taille = $taille;
        $this->age = $age;
    }


    //GETTER ET SETTER
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $newNom): self
    {
        $this->nom = $newNom;
        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $newCouleur): self
    {
        $this->couleur = $newCouleur;
        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $newTaille): self
    {
        $this->taille = $newTaille;
        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $newAge): self
    {
        $this->age = $newAge;
        return $this;
    }

    public function getAbris(): ?string
    {
        return $this->abris;
    }

    public function setAbris(?Abris $newAbris): self
    {
        $this->abris = $newAbris;
        return $this;
    }


    //METHOD
    public function seNourrir(?string $aliment): string | array
    {
        if ($aliment == 'poison') {
            return "Mange pas ça, tu vas mourir !";
        } else {
            return [$aliment, "il a bon goût !", $this->nom . " a aimé son repas!"];
        }
    }

    public function seMultiplier(Animal $partenaire): void
    {
        echo "Je me multiplie grâce à {$partenaire->getNom()}";
    }
}
