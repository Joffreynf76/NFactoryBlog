<?php
echo("<h1>Inscription</h1>");
if(isset($_POST['formulaire'])){
    $tabErreur = array();
    $email=$_POST["email"];
    $mdp=$_POST["password"];


    if($_POST["email"] == ""){
        array_push($tabErreur,"Veuillez saisir votre email");
    }
    if($_POST["password"] == ""){
        array_push($tabErreur,"Veuillez saisir votre mot de passe");
    }
    if(count($tabErreur)!=0){
        $message="<ul>";
        for($i=0;$i<count($tabErreur);$i++){
            $message .= "<li>".$tabErreur[$i]."</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/login.inc.php");
    }else {
        $connexion=mysqli_connect("localhost","root","","NFactoryBlog");
        $requete = "";
        mysqli_query($connexion,$requete);
        mysqli_close($connexion);
    }

} else {
    echo("Je viens d'ailleurs");
    include("./include/login.inc.php");
}

?>