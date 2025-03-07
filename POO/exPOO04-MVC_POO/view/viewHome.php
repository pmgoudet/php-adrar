<?php

class viewHome
{
    private ?string $message = '';
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
            <!DOCTYPE html>
            <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Document</title>
                </head>
                <body>
                <header></header>
                <main>
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
                        <p>" . $this->getMessage() . "</p>
                    </section>
                    <section>
                        <ul>" . $this->getUsersList() . "</ul>
                    </section>
                </main>
                <footer></footer>
            </body>
            </html>
        ");
    }
}
