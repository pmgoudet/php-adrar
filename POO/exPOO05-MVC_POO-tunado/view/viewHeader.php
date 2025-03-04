<?php

class ViewHeader
{
  public function displayView(): string
  {
    return ("
      <!DOCTYPE html>
      <html lang='en'>

      <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='./src/style/style.css'>
        <title>Ex005</title>
      </head>

      <body>
        <header>
          <nav>
            <ul>
              <li><a href='./controllerHome.php'>Home</a></li>
              <li><a href='./controllerCategory.php'>Categories</a></li>
              <li><a href='#'>Déconnexion</a></li>
            </ul>
          </nav>
        </header>
    ");
  }
}