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

    echo("<form method='post' action='#'><input type='submit' value='Modifier' name='modifier'></form>");

    if(isset($_POST['modifier'])){
        echo ("<form method='post' action='#'>
            <label for='nom'>Nouveau nom : </label><input type='text' name='newNom'><br>
            <label for='prenom'>Nouveau prénom : </label><input type='text' name='newPrenom'><br>
            <label for='email'>Nouvelle adresse email : </label><input type='text' name='newEmail'><br>
            <label for='mdp'>Mot de passe : </label><input type='password' name='mdp'><br>
            <input type='submit' value='Modifier mes informations' name='newInfo'>
</form>");
    }
    if(isset($_POST['newInfo'])){
        $taberreur=array();
        $nom=$_POST['newNom'];
        $prenom=$_POST['newPrenom'];
        $email=$_POST['newEmail'];
        $mdp=$_POST['mdp'];

        if($nom==""){
            array_push($taberreur,"Veuillez saisir un nom");
        }
        if($prenom==""){
            array_push($taberreur,"Veuillez saisir un prénom");
        }
        if($email==""){
            array_push($taberreur,"Veuillez saisir un email");
        }
        if($mdp==""){
            array_push($taberreur,"Veuillez saisir votre mot de passe");
        }
        if(count($taberreur)!=0){
            $message="<ul>";
            for($i=0;$i<count($taberreur);$i++){
                $message .= "<li>".$taberreur[$i]."</li>";
            }
            $message .= "</ul>";
            echo($message);

        }else{
            $mdp=sha1($mdp);
            if($mdp!= $_SESSION['mdp']){
                echo "Erreur";
            }else {
                //$db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
                $requete = "UPDATE t_users SET USERNAME='$nom', USERFNAME='$prenom', USERMAIL='$email' WHERE ID_USER='$id'";
                $result = $db->query($requete);
            }
        }

    }
}
else {
    echo "Veuillez vous connecter";
}