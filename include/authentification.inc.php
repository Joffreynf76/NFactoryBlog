<?php
echo("<h1>Login</h1>");
if(isset($_POST['formulaire2'])){
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
        include("./include/login.php");
    }else {
        $connexion=mysqli_connect("localhost","root","","NFactoryBlog");
        $mdp=sha1($mdp);
        $requete = "SELECT * FROM t_users WHERE USERMAIL='$email' AND USERPASSWORD='$mdp'";

        mysqli_query($connexion,$requete);
        mysqli_close($connexion);
    }

} else {
    echo("Je viens d'ailleurs");
    include("./include/login.php");
}

?>