<?php

class viewHome
{
    private ?string $message = '';
    private ?array $usersList = '';

    public function getMessage(): ?int
    {
        return $this->message;
    }

    public function setMessage(?string $newMessage): self
    {
        $this->message = $newMessage;
        return $this;
    }

    public function getUsersList(): ?int
    {
        return $this->usersList;
    }

    public function setUsersList(?string $newUsersList): self
    {
        $this->usersList = $newUsersList;
        return $this;
    }

    //METHOD
    public function displayView($message, $usersList): string
    {
        return (`
            <section>
                <h3>Formulaire d'inscription</h3>
                <form action='' method='post'>
                    <label for='pseudo'>Pseudo</label><br />
                    <input type='text' name='pseudo' id='pseudo' /><br /><br />

                    <label for='email'>E-mail</label><br />
                    <input type='text' name='email' id='email' /><br /><br />

                    <label for='mdp'>Mot de Passe</label><br />
                    <input type='password' name='mdp' id='mdp' /><br /><br />

                    <input type='submit' name='submit' value='Enregistrer' /><br />
                </form>
                <p><?= $message ?></p>
</section>
<section>
    <ul>
        <?= $usersList ?>
    </ul>
</section>
`);
    }
}
