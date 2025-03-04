<?php

class ViewHome
{
    private ?string $message = '';
    private ?string $connectionMsg = '';
    private ?string $usersList = '';

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $newMessage): self
    {
        $this->message = $newMessage;
        return $this;
    }

    public function getConnectionMsg(): ?string
    {
        return $this->connectionMsg;
    }

    public function setConnectionMsg(?string $newConnectionMsg): self
    {
        $this->connectionMsg = $newConnectionMsg;
        return $this;
    }

    public function getUsersList(): ?string
    {
        return $this->usersList;
    }

    public function setUsersList(?string $newUsersList): self
    {
        $this->usersList = $newUsersList;
        return $this;
    }

    //METHOD
    public function displayView(): string
    {
        return ("
                <main>
                    <section>
                        <h3>Formulaire de Connexion</h3>
                        <form action='' method='post'>

                        <label for='email'>E-mail</label><br />
                        <input type='text' name='email' id='email' /><br /><br />

                        <label for='mdp'>Mot de Passe</label><br />
                        <input type='password' name='mdp' id='mdp' /><br /><br />

                        <input type='submit' name='submitConnection' value='Connexion' /><br />
                        </form>
                        <p>" . $this->getConnectionMsg() . "</p>
                        <hr>
                    </section>
                    <section>
                        <h3>Formulaire d'Inscription</h3>
                        <form action='' method='post'>
                        <label for='pseudo'>Pseudo</label><br />
                        <input type='text' name='pseudo' id='pseudo' /><br /><br />

                        <label for='email'>E-mail</label><br />
                        <input type='text' name='email' id='email' /><br /><br />

                        <label for='mdp'>Mot de Passe</label><br />
                        <input type='password' name='mdp' id='mdp' /><br /><br />

                        <input type='submit' name='submit' value='Enregistrer' /><br />
                        </form>
                        <p>" . $this->getMessage() . "</p>
                        <hr>
                    </section>
                    <section>
                        <ul>" . $this->getUsersList() . "</ul>
                    </section>
                </main>
        ");
    }
}
