<?php

// Je démarre ma $_SESSION pour pouvoir y accéder
session_start();

// je detruis ma session : j'efface ce que j'avais enregistré dans $_SESSION
session_destroy();

// redirection vers l'accueil
header('Location:controller_home.php');
