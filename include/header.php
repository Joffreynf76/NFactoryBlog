<?php

?>
<header>
    <ul>
        <li><a href="index.php?page=accueil">Accueil</a></li>
        <li><a href="index.php?page=inscription">Inscription</a></li>
        <li><a href="index.php?page=authentification">Login</a></li>
    </ul>
<?php
session_start();
$message="Bienvenue ";
$message .= $_SESSION['email'];
echo($message);

?>
</header>