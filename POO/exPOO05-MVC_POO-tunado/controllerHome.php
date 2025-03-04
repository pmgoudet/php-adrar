<?php

include "./utils/utils.php";
include "./model/modelUser.php";
include "./view/viewHome.php";
include "./genericController.php";

class ControllerHome extends GenericController
{
    private ?ViewHome $viewHome;
    private ?ModelUser $modelUser;

    public function __construct(?ViewHome $newViewHome, ?ModelUser $newModelUser)
    {
        $this->viewHome = $newViewHome;
        $this->modelUser = $newModelUser;
    }

    public function getViewHome(): ?ViewHome
    {
        return $this->viewHome;
    }

    public function setViewHome(?ViewHome $viewHome): self
    {
        $this->viewHome = $viewHome;
        return $this;
    }

    public function getModelUser(): ?ModelUser
    {
        return $this->modelUser;
    }

    public function setModelUser(?ModelUser $ModelUser): self
    {
        $this->modelUser = $ModelUser;
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

    public function signUp(): string
    {
        $connectionMsg = '';

        session_start();

        //btn submit
        if (isset($_POST['submitConnection'])) {

            //variables not vides ou nulls
            if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['mdp'])) {

                //validation adresse mail
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $email = sanitize($_POST['email']);
                    $password = sanitize($_POST['mdp']);

                    //verification du mail
                    $this->getModelUser()->setEmail($email);
                    $data = $this->getModelUser()->getByEmail();
                    if (!empty($data)) {
                        if (password_verify($password, $data[0]['psswrd'])) {
                            $_SESSION['id'] = $data[0]['id'];
                            $_SESSION['nickname'] = $data[0]['nickname'];
                            $_SESSION['email'] = $data[0]['email'];

                            header('Location:controllerAccount.php');
                        } else {
                            $connectionMsg = "Email et/ou mdp incorrect(s).";
                        }
                    } else {
                        $connectionMsg = "Email et/ou mdp incorrect(s).";
                    }
                } else {
                    $connectionMsg = "Le mail n'est pas au bon format.";
                }
            } else {
                $connectionMsg = 'Veuillez remplir les champs obligatoires.';
            }
        }

        return $connectionMsg;
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
        echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

        $this->getViewHome()->setUsersList($this->readUsers());
        echo $this->getViewHome()->setMessage($this->signIn())->setConnectionMsg($this->signUp())->displayView();

        echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
    }
}

$home = new ControllerHome(new ViewHome, new ModelUser);
$home->render();
