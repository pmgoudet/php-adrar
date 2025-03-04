<?php

class ViewAccount
{
  public function displayView(): string
  {
    return ("
      <main>
        <h2>Hello, " . $_SESSION['nickname'] . ".</h2>
        <p>" . $_SESSION['email'] . "</p>
      </main>
    ");
  }
}