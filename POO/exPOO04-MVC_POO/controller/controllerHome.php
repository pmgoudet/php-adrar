<?php

include "../view/viewHome.php";

class ControllerHome
{
    private ?ViewHome $viewHome;
    private ?ModelUser $ModelUser;

    public function __construct(?ViewHome $newViewHome, ?ModelUser $newModelUser)
    {
        $this->viewHome = $newViewHome;
        $this->ModelUser = $newModelUser;
    }

    /**
     * Get the value of viewHome
     * @return ?viewHome
     */
    public function getViewHome(): ?ViewHome
    {
        return $this->viewHome;
    }

    /**
     * Set the value of viewHome
     * @param ?viewHome $viewHome
     * @return self
     */
    public function setViewHome(?ViewHome $viewHome): self
    {
        $this->viewHome = $viewHome;
        return $this;
    }

    /**
     * Get the value of ModelUser
     * @return ?ModelUser
     */
    public function getModelUser(): ?ModelUser
    {
        return $this->ModelUser;
    }

    /**
     * Set the value of ModelUser
     * @param ?ModelUser $ModelUser
     * @return self
     */

    public function setModelUser(?ModelUser $ModelUser): self
    {
        $this->ModelUser = $ModelUser;
        return $this;
    }


    //METHOD
    public function signIn(): string
    {
        if (isset($form['submit'])) {
            if (
                isset($form['pseudo']) && !empty($form['pseudo'])
                && isset($form['email']) && !empty($form['email'])
                && isset($form['mdp']) && !empty($form['mdp'])
            ) {
                if (filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
                    $pseudo = sanitize($form['login']);
                    $email = sanitize($form['email']);
                    $mdp = sanitize($form['mdp']);
                    $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                    $bdd = Connect();

                    //!VERIFICAR SE O E-MAIL JÁ EXISTE

                    try {
                        $req = $bdd->prepare("INSERT INTO users (`nickname`, `email`, `psswrd`) VALUES (?,?,?);");
                        $req->bindParam(1, $pseudo, PDO::PARAM_STR);
                        $req->bindParam(2, $email, PDO::PARAM_STR);
                        $req->bindParam(3, $mdp, PDO::PARAM_STR);
                        $req->execute();

                        return "L'enregistrement de $pseudo, dont l'email est $email, a été effectué avec succès.";
                    } catch (EXCEPTION $error) {
                        return $error->getMessage();
                    }
                } else {
                    return "Le mail n'est pas au bon format";
                }
            } else {
                return "Veuillez remplir les champs obligatoires.";
            }
        }
        return '';
    }


    public function readUsers(): string
    {
        $usersList = '';
        $bdd = Connect();

        try {
            $req = $bdd->prepare('SELECT `nickname`, email FROM users');
            $req->execute();
            $data = $req->fetchAll();
            // print_r($data);

            foreach ($data as $user) {
                $usersList = $usersList . "<li>{$user['pseudo']} : {$user['email']}</li>";
            }
        } catch (EXCEPTION $e) {
            $usersList = $e->getMessage();
        }

        return $usersList;
    }

    public function render(): void
    {
        $temp = $this->signIn();
        $this->readUsers();
        // $this->setViewHome($this->viewHome)-> ;
    }
}



//    render() : cette méthode, va, dans l'ordre, effectuer le traitement des données en appelant les signIn() et readUsers(). 

// Puis, elle va insérer ce que retourne signIn() dans l'attribut message de viewHome (utiliser le Setter), et insérer ce que retourne readUsers() dans l'attribut usersList de viewHome. Enfin, elle va demander à viewHome de lancer sa méthode displayView().