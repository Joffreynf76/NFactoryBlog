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


        mysqli_query($connexion,$requete);
        if($result=mysqli_query($connexion,$requete)){
            $row_cnt= mysqli_num_rows($result);
            echo($row_cnt);
            mysqli_free_result($result);
        }
        mysqli_close($connexion);
        session_start();
        $_SESSiON['email']=$email;
    }

} else {

    include("./include/login.php");
}

?>