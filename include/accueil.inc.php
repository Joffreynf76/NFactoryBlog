<main>
<?php 
echo("<h1>Accueil</h1>");
 $connexion = mysqli_connect("localhost", "root", "", "NFactoryBlog");
 $reponse = mysqli_query($connexion,"SELECT * FROM t_articles ORDER BY ARTDATE DESC LIMIT 1,2");



 while ($donnees= mysqli_fetch_array($reponse)){
     echo "<h2>";
     echo (html_entity_decode($donnees['ARTTITRE']));
     echo "</h2>";
     echo("<h3>");
     echo (html_entity_decode($donnees['ARTCHAPO']));
     echo("</h3>");
     echo("<p>");
     echo (html_entity_decode($donnees['ARTCONTENU']));
     echo("</p>");
     echo ($donnees['ARTDATE']);
     echo " ";
     echo ($donnees['ARTAUTEUR']);
     echo("<hr>");

 }
mysqli_close($connexion);

?>
</main>