<?php
if($_SESSION['admin']==1) {
    echo("<table><thead><tr><td>Nom</td><td>Prénom</td><td>Adresse email</td><td>Rôle</td></tr></thead>");

} else {
    echo "erreur";
}