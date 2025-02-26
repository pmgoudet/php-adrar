<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <h2>Form1</h2>
  <form action="resultat.php" method="post">
    <p>Écris ton nom, frère.</p>
    <input type="text" name="nom" id="nom" /><br />
    <p>Prénom.</p>
    <input type="text" name="prenom" id="prenom" /><br /><br />
    <input type="submit" value="Envoyer" />
  </form>

  <br /><br />
  <h2>Form2</h2>
  <form action="" method="post">
    <p><input type="checkbox" name="box[]" value="1" />1</p>
    <p><input type="checkbox" name="box[]" value="2" />2</p>
    <p><input type="checkbox" name="box[]" value="3" />3</p>
    <p><input type="checkbox" name="box[]" value="4" />4</p>
    <input type="submit" name="submit" value="Envoyer" />
  </form>

  <?php
  // traitement du formulaire
  if (isset($_POST['submit'])) {
    if (isset($_POST['box'])) {
      //loop pra percorrer cada um
      foreach ($_POST['box'] as $value) {
        echo "<p>Id de la Box: $value</p>";
      }
    } else {
      echo "<p>Veuillez cocher une ou plusieurs cases.</p>";
    }
  }

  ?>


</body>

</html>