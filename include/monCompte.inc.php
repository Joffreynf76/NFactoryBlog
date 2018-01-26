<?php

if(isset($_SESSION['login'])){
    echo("<h1>Votre espace personel</h1>");
    $id=$_SESSION['id'];
    $db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
    $requete = "SELECT * FROM t_users WHERE ID_USER='$id'";
    $result =$db -> query($requete);

    while($donnees=$result->fetch()){
        echo("<p>Votre nom : ".$donnees['USERNAME']."</p>");
        echo("<p>Votre prénom : ".$donnees['USERFNAME']."</p>");
        echo("<p>Votre email : ".$donnees['USERMAIL']."</p>");

    }
}
else {
    echo "Veuillez vous connecter";
}