<?php
if(isset($_POST['contact'])){
    $tabErreur = array();
    $email=$_POST["email"];
    $sujet=$_POST["sujet"];
    $message=$_POST["message"];


    if($email == ""){
        array_push($tabErreur,"Veuillez saisir votre email");
    }
    if($sujet == ""){
        array_push($tabErreur,"Veuillez saisir votre mot de passe");
    }
    if($message == ""){
        array_push($tabErreur,"Veuillez saisir votre message");
    }

    if(count($tabErreur)!=0) {
        $message = "<ul>";
        for ($i = 0; $i < count($tabErreur); $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/formContact.php");
    }else {

    }
} else {
    include("./include/formContact.php");
}