<?php
echo("<h1>Inscription</h1>");
if(isset($_POST['formulaire'])){
    $tabErreur = array();
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $mdp=$_POST["password"];

    if($_POST["nom"] == ""){
        array_push($tabErreur,"Veuillez saisir votre nom");
    }
    if($_POST["prenom"] == ""){
        array_push($tabErreur,"Veuillez saisir votre prénom");
    }
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
        include("./include/forminscription.php");
    }else {
        $connexion=mysqli_connect("localhost","root","","blog2");
        $requete = INSERT INTO `t_users` (`ID_users`, `Nom`, `Prenom`, `Email`, `Password`) VALUES (NULL, $nom, $prenom, $email, $mdp);
    }
    
} else {
    echo("Je viens d'ailleurs");
    include("./include/forminscription.php");
}

?>

