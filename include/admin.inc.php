<?php
if($_SESSION['admin']==1) {
    $connexion=mysqli_connect("localhost","root","","NFactoryBlog");
    $requete = "SELECT * FROM t_users";
    $result= mysqli_query($connexion,$requete);
    echo"<table>";
    while ($donnees=mysqli_fetch_array($result)){
        echo("<tr><td>".$donnees['USERNAME']."</td>"."<td>".$donnees['USERFNAME']."</td>"."<td>".$donnees['USERMAIL']."</td>"."</tr>");
    }
    echo("</table>");
} else {
    echo "erreur";
}