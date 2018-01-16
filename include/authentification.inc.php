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
        $mdp=sha1($_POST['password']);
        $requete = "SELECT * FROM t_users WHERE USERMAIL='$email' AND USERPASSWORD='$mdp'";



        if($result=mysqli_query($connexion,$requete)){
            if(mysqli_num_rows($result) >0 ){
                $_SESSION['login']=1;

                echo ("<script>redirection(\"index.php?page=accueil\")</script>");
                echo "<a href=\"index.php?page=accueil\">Vous êtes bien identifié</a>";

            }
            else {
                $_SESSION['login']=0;

            }
        }
        mysqli_close($connexion);


    }

} else {

    include("./include/login.php");
}

?>