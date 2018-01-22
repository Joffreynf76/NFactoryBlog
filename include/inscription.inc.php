<?php
echo("<h1>Inscription</h1>");
if(isset($_POST['formulaire'])){
    $tabErreur = array();
    $nom=trim($_POST["nom"]);
    $prenom=trim($_POST["prenom"]);
    $email=$_POST["email"];
    $mdp=$_POST["password"];

    if($_POST["nom"] == ""){
        array_push($tabErreur,"Veuillez saisir votre nom");
    }
    if($_POST["prenom"] == ""){
        array_push($tabErreur,"Veuillez saisir votre prénom");
    }
    if($_POST["email"] == "" || !filter_var($email,FILTER_VALIDATE_EMAIL)){
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
        $dsn = "mysql:dbname=NFactoryBlog;
        host=localhost;
        charset=utf8";
        $username = "root";
        $password = "";
        $db = new PDO($dsn,$username,$password);
        $requeteLogin=("SELECT * FROM t_users WHERE USERMAIL='$email'");
        if($result = $db -> query($requeteLogin)) {
            $count = $result -> rowCount();
            if ($count != 0) {
                echo "Votre email est déja utilisé";
            } else {

                $mdp = sha1($_POST['password']);
                $requete = "INSERT INTO t_users (ID_user, USERNAME, USERFNAME, USERMAIL, USERPASSWORD,USERDATEINS,T_ROLES_ID_ROLE) VALUES (NULL, '$nom', '$prenom','$email', '$mdp',NULL,5)";
                $db -> query($requete);
                unset($db);
            }
        }else{
            die($requeteLogin);
        }
    }
    
} else {
    include("./include/forminscription.php");
}

?>

