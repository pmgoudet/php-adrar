<?php


class ModelCategory
{
  private ?int $id;
  private ?string $name;
  private ?PDO $bdd;

  public function __construct()
  {
    $this->bdd = connect();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(?int $id): self
  {
    $this->id = $id;
    return $this;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(?string $name): self
  {
    $this->name = $name;
    return $this;
  }

  public function getBdd(): ?PDO
  {
    return $this->bdd;
  }

  public function setBdd(?PDO $bdd): self
  {
    $this->bdd = $bdd;
    return $this;
  }


  //METHOD
  public function add(): string
  {
    try {
      $req = $this->getBdd()->prepare("INSERT INTO category (`name`) VALUES (?);");

      $name = $this->getName();
      $req->bindParam(1, $name, PDO::PARAM_STR);
      $req->execute();

      return "L'enregistrement de $name a été effectué avec succès.";
    } catch (EXCEPTION $error) {
      return $error->getMessage();
    }
  }

  public function getAll(): array | string
  {
    try {
      $req = $this->bdd->prepare('SELECT id, `name` FROM category');
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  public function getByName(): array | string
  {
    try {
      $req = $this->bdd->prepare("SELECT id, `name` FROM category WHERE `name` = ? LIMIT 1");
      $name = $this->getName();
      $req->bindParam(1, $name, PDO::PARAM_STR);
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }
}
