<main>
<?php 
echo("<h1>Accueil</h1>");
 $connexion = mysqli_connect("localhost", "root", "", "NFactoryBlog");
 $reponse = mysqli_query($connexion,"SELECT * FROM t_articles");
 while ($donnees= mysqli_fetch_array($reponse)){

     echo (html_entity_decode($donnees['ARTCONTENU']));
     echo (html_entity_decode($donnees['ARTTITRE']));
 }


?>
</main>