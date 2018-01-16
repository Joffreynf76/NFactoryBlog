<?php

echo("<h1>Article</h1>");
if(isset($_SESSION['login'])) {
    if (isset($_POST['formulaire3'])) {
        $tabErreur = array();
        $titre = $_POST["titre"];
        $chapo = $_POST["chapo"];
        $contenu = $_POST["contenu"];
        $date = $_POST["date"];
        $auteur=$_POST["auteur"];



        if ($titre == "") {
            array_push($tabErreur, "Veuillez saisir un titre");
        }
        if ($chapo == "") {
            array_push($tabErreur, "Veuillez saisir un chapo");
        }
        if ($contenu == "") {
            array_push($tabErreur, "Veuillez saisir du contenu");
        }
        if ($date == "") {
            array_push($tabErreur, "Veuillez saisir une date");
        }
        if($auteur==""){
            array_push($tabErreur,"Veuillez saisir un auteur");
        }


        if (count($tabErreur) != 0) {
            $message = "<ul>";
            for ($i = 0; $i < count($tabErreur); $i++) {
                $message .= "<li>" . $tabErreur[$i] . "</li>";
            }
            $message .= "</ul>";
            echo($message);
            include("./include/formarticle.php");
        } else {
            $connexion = mysqli_connect("localhost", "root", "", "NFactoryBlog");
            $contenu= addslashes(htmlentities($contenu));
            $chapo=addslashes(utf8_decode(htmlentities($chapo)));
            $titre=addslashes(utf8_decode(htmlentities($titre)));
            $requete2 = "INSERT INTO t_articles (ID_ARTICLE, ARTTITRE, ARTCHAPO, ARTCONTENU,ARTAUTEUR, ARTDATE) VALUES (NULL, '$titre', '$chapo','$contenu','$auteur', NOW())";
            mysqli_query($connexion, $requete2);
            mysqli_close($connexion);
        }

    } else {

        include("./include/formarticle.php");
    }
}else {
    echo("Veuillez vous connecter");
}