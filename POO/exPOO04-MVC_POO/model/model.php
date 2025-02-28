<?php

class ModelUser
{
    private ?int $id;
    private ?string $nickname;
    private ?string $email;
    private ?string $password;
    private ?PDO $bdd;

    public function __construct()
    {
        $this->bdd = Connect();
    }

    /**
     * Get the value of id
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     * @param ?int $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nickname
     * @return ?string
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     * @param ?string $nickname
     * @return self
     */
    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * Get the value of email
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     * @param ?string $email
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of password
     * @return ?string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     * @param ?string $password
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of bdd
     * @return ?PDO
     */
    public function getBdd(): ?PDO
    {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     * @param ?PDO $bdd
     * @return self
     */
    public function setBdd(?PDO $bdd): self
    {
        $this->bdd = $bdd;
        return $this;
    }


    //METHOD
    public function add(): string
    {
        return "Message de confirmation, ou message d'erreur"; //! ============
    }

    public function getAll(?PDO $bdd): array | string
    {
        return "Elle renvoie soit un tableau d'utilisateur, soit une message d'erreur"; //! ==================
    }

    public function getByEmail(ModelUser $email): array | string
    {
        return "Elle renvoie soit un tableau correspondant à l'utilisateur, soit un message d'erreur"; //! ==================
    }
}
