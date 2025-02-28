<?php

//    Mise en place du Controller

// 4. la classe va posséder les méthodes suivantes :

//    render() : cette méthode, va, dans l'ordre, effectuer le traitement des données en appelant les signIn() et readUsers(). Puis, elle va insérer ce que retourne signIn() dans l'attribut message de viewHome (utiliser le Setter), et insérer ce que retourne readUsers() dans l'attribut usersList de viewHome. Enfin, elle va demander à viewHome de lancer sa méthode displayView().

//    Exécution du script

//    1. A la racine du projet, créer le fichier index.php
//    2. faite un include des autres dans le bon ordre :
//    utils.php
//    modelUser.php
//    viewHome.php
//    controllerHome.php
//    3. instancier un nouvel objet $home de la class ControllerHome
//    4. demander à $home de lancer sa méthode render() -->