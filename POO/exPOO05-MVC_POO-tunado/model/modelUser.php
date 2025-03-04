<?php

class ModelUser
{
    private ?int $id;
    private ?string $nickname;
    private ?string $email;
    private ?string $password;
    private PDO $bdd;

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

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
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
            $req = $this->getBdd()->prepare("INSERT INTO users (`nickname`, `email`, `psswrd`) VALUES (?,?,?);");

            $nickname = $this->getNickname();
            $email = $this->getEmail();
            $password = $this->getPassword();

            $req->bindParam(1, $nickname, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $password, PDO::PARAM_STR);
            $req->execute();

            return "L'enregistrement de $nickname, dont l'email est $email, a été effectué avec succès.";
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }

    public function getAll(): array | string
    {
        try {
            $req = $this->bdd->prepare('SELECT `nickname`, email FROM users');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (EXCEPTION $e) {
            return $e->getMessage();
        }
    }

    public function getByEmail(): array | string
    {
        try {
            $req = $this->bdd->prepare("SELECT id, `nickname`, email, psswrd FROM users WHERE email = ? LIMIT 1");
            $email = $this->getEmail();
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (EXCEPTION $e) {
            return $e->getMessage();
        }
    }
}
