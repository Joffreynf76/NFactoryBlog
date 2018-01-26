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
        $db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
        $mdp=sha1($_POST['password']);
        $requete = "SELECT * FROM t_users WHERE USERMAIL='$email' AND USERPASSWORD='$mdp'";



        if($result= $db -> query($requete)){
            $count= $result -> rowCount();
            if($count >0 ){


                $_SESSION['login']=1;

                while($donnees= $result -> fetch()){

                    if($donnees['T_ROLES_ID_ROLE']==1 || $donnees['T_ROLES_ID_ROLE']==2){
                        echo ("<script>redirection(\"index.php?page=admin\")</script>");
                        $_SESSION['admin']=1;
                    }
                    if($donnees['T_ROLES_ID_ROLE']==4){
                        echo ("<script>redirection(\"index.php?page=accueil\")</script>");
                        $_SESSION['admin']=2;
                    }
                    else {
                        echo ("<script>redirection(\"index.php?page=accueil\")</script>");
                        //$_SESSION['admin']=0;
                    }
                    $_SESSION['id']=$donnees['ID_USER'];
                    $_SESSION['mdp']=$donnees['USERPASSWORD'];
                }

                echo "<a href=\"index.php?page=accueil\">Vous êtes bien identifié</a>";

            }
            else {
                //$_SESSION['login']=0;
                echo("erreur");

            }

        }
        unset($db);


    }

} else {

    include("./include/login.php");
}

?>