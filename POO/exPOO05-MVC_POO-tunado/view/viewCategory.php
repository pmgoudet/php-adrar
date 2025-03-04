<?php

class ViewCategory
{
  private ?string $message = "";
  private ?string $categoriesList = "";


  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $message): self
  {
    $this->message = $message;
    return $this;
  }

  public function getCategoriesList(): ?string
  {
    return $this->categoriesList;
  }

  public function setCategoriesList(?string $categoriesList): self
  {
    $this->categoriesList = $categoriesList;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {
    return ("
      <main>
        <div>
          <h3>Formulaire de Catégories</h3>
          <form action='' method='post'>
            <label for='category'>Category</label><br>
            <input type='text' name='category' id='category' required><br><br>

            <input type='submit' name='submit' value='Save'><br><br>
          </form>" . $this->getMessage() . "<hr>
        </div>

        <ul>" . $this->getCategoriesList() . "</ul>
      </main>
    ");
  }
}