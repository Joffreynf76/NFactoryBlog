<?php
$_SESSION['login']=0;
session_destroy();
echo ("<a href=\"index.php?page=accueil\">Retour accueil</a>");
?>