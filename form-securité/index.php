<?php
$message = "";

// FUNÇÃO PRA SIMPLIFICAR A LIMPEZA DE CÓDIGO
// 4 function natives PHP pour nettoyage (LÁ EM BAIXO UM EXEMPLO DE CADA)
// htmlentities() strip_tags() trim()  stripslashes()
function nettoyage($data)
{
    return htmlentities(strip_tags(trim(stripslashes($data))));
}

// verifier que le form est submit
if (isset($_POST['submit'])) {
    // Etape de sécurité 1: verifier si les champs sont vides ni nulls isset() !empty()
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['mdp'])) {
        // Etape de sécurité 2: verifier le format des données
        //voir si l'email a le bon format et si l'age est un INT (selon cet exercise) -> filter_var() vérifie le format de données
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            if ((isset($_POST['age']) && !empty($_POST['age']) && filter_var(($_POST['age']), FILTER_VALIDATE_INT)) || (empty($_POST['age']))) {
                // Etape de sécurité 3: nettoyer -> enlever tout code malveillants
                $login = nettoyage($_POST['login']);
                $email = nettoyage($_POST['email']);
                $mdp = nettoyage($_POST['mdp']);
                // pour l'age on voit si ça existe car ça peut etre vide
                if (!empty($_POST['age'])) {
                    $age = nettoyage($_POST['age']);
                }
                // Etape de sécurité 4 BONUS DANS LE CAS DE INSCRIPTION EN BDD: cripter le mot de passe -> password_hash()
                $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                // Cest bon, on peut envoyer les données en BDD


                // CODES DE COMMUNICATION AVEC LA BDD -------------------------------------------------------------------------------------

                // Étape 1: Instanciation de l'objet de connexion à la BDD
                //$bdd = new PDO('host;dbname', 'nom d'utilisateur', 'mot de passe', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                // try catch pour gérer les erreurs
                try {
                    // Étape 2: envoi de requete SQL
                    //! version simplifiée: mauvaise manière (PASSOIRE À INJECTIONS SQL)
                    //! $req = $bdd->query("INSERT INTO users (`login`, `email`, `mdp`, `age`) VALUES ('$login', '$email', '$mdp', '$age');");

                    //todo JEITO CERTO! Requête SQL préparée
                    //Étape 2.1 => prepare()
                    $req = $bdd->prepare("INSERT INTO users (`login`, `email`, `mdp`, `age`) VALUES (?,?,?,?);");

                    //Étape 2.2 => completer les ? avec un binding de parametre
                    //$req->bindParam(numero de ordem da interrogação escolhida, variável que a gente quer mandar, outra couche de securité)
                    $req->bindParam(1, $login, PDO::PARAM_STR);
                    $req->bindParam(2, $email, PDO::PARAM_STR);
                    $req->bindParam(3, $mdp, PDO::PARAM_STR);
                    $req->bindParam(4, $age, PDO::PARAM_INT);

                    //Étape 2.3 => executer la requete avec execute()
                    $req->execute();

                    //Étape BONUS, si retour de la BDD: récupérer la réponse de la BDD
                    //ce sera un array avec les enregistrements sous forme de tableau associatif (ou d'objet)
                    //$data = $req->fetchAll();
                    // nao serve pra inscrição mas pra outras utilizações sim.

                    // message de reussite
                    $message = "L'enregistrement de $login, dont l'email est $email, a été effectué avec succès.";
                } catch (EXCEPTION $error) {
                    //en cas de problème, je récupère le message d'erreur et je l'affiche
                    $message = $error->getMessage();
                }
                // ------------------------------------------------------------------------------------------------------------------------

            } else { //gérer erreur du format de l'age
                $message = "L'age n'est pas au bon format";
            }
        } else { //gérer erreur du format du mail
            $message = "Le mail n'est pas au bon format";
        }
    } else { //gérer erreur de données non remplies
        $message = "Veuillez remplir les champs obligatoires, irmão.";
    }
}

//EXEMPLOS DAS 4 FUNÇÕES DE LIMPEZA PHP DE CÓDIGOS MALVEILLANTS

// htmlentities() => transforme les balises html en texte, evita surpresa de <script>
// echo htmlentities("<script>alert('TE PEGUEI MALANDRO')</script>");

// strip_tags() => supprime les balises html et php
// echo strip_tags("<script>alert('TE PEGUEI MALANDRO')</script>");

// trim() => supprime les espaces en debut et fin des chaines de caractere
// $test = '   Hello World !        ';
// echo $test . 'Espace';
// echo "<br>";
// echo trim($test) . 'Espace';

// stripslashes() => supprime les \ backslash
// echo "C\'est parti !";
// echo "<br>";
// echo stripslashes("C\'est parti !");

// password_hash()  => permet de hasher le mdp
// $mdpTest = "1234";
// echo $mdpTest;
// echo "<br>";
// $mdpTest = password_hash($mdpTest, PASSWORD_BCRYPT);
// echo $mdpTest;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="login">Login</label><br>
        <input type="text" name="login" id="login" required><br><br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" required><br><br>
        <label for="age">Age</label><br>
        <input type="number" name="age" id="age"><br><br>
        <label for="mdp">Mot de Passe</label><br>
        <input type="text" name="mdp" id="mdp" required><br><br>
        <input type="submit" name="submit" value="S'inscrire!"><br><br>
    </form>
    <p><?= $message ?></p>
</body>

</html>