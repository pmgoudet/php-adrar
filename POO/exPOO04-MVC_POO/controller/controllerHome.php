<?php

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
        //btn submit
        if (isset($_POST['submit'])) {
            //variables not vides ou nulls
            if (
                isset($_POST['pseudo']) && !empty($_POST['pseudo'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['mdp']) && !empty($_POST['mdp'])
            ) {

                //validation adresse mail
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $nickname = sanitize($_POST['pseudo']);
                    $email = sanitize($_POST['email']);
                    $password = sanitize($_POST['mdp']);
                    $password = password_hash($password, PASSWORD_BCRYPT);

                    //verification du mail
                    try {
                        $data = $this->getModelUser()->setEmail($email)->getByEmail();

                        if (empty($data)) {
                            $this->getModelUser()->setNickname($nickname)->setEmail($email)->setPassword($password);
                            $this->getViewHome()->setMessage($this->getModelUser()->add());
                        } else {
                            return "Cet adresse mail existe déjà sur un autre compte.";
                        }
                    } catch (EXCEPTION $e) {
                        return $e->getMessage();
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
        $data = $this->getModelUser()->getAll();

        foreach ($data as $user) {
            $usersList = $usersList . "<li>{$user['nickname']} : {$user['email']}</li>";
        }
        return $usersList;
    }

    public function render(): void
    {
        $message = $this->signIn();
        $this->signIn();
        $this->getViewHome()->setUsersList($this->readUsers());
        echo $this->getViewHome()->setMessage($message)->displayView();
    }
}