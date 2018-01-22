<main>
<?php 
echo("<h1>Accueil</h1>");
$dsn = "mysql:dbname=NFactoryBlog;
        host=localhost;
        charset=utf8";
$username = "root";
$password = "";
$db = new PDO($dsn,$username,$password);
$requete = "SELECT * FROM t_articles ORDER BY ARTDATE DESC LIMIT 1,2";
$result = $db -> query($requete);



 while ($donnees= $result -> fetch()){
     echo "<h2>";
     echo (html_entity_decode($donnees['ARTTITRE']));
     echo "</h2>";
     echo("<h3>");
     echo (html_entity_decode($donnees['ARTCHAPO']));
     echo("</h3>");
     echo("<p>");
     echo (html_entity_decode($donnees['ARTCONTENU']));
     echo("</p>");
     echo $donnees['ARTDATE'];
     echo " ";
     echo ($donnees['ARTAUTEUR']);
     echo("<hr>");

 }
unset($db);

?>
</main>