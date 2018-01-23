<main>
<?php

echo("<h1>Accueil</h1>");
$db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
$requete = "SELECT * FROM t_articles LEFT JOIN t_categories_has_t_articles
 ON t_articles.ID_ARTICLE=t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE LEFT JOIN t_categories ON t_categories_has_t_articles.T_CATEGORIEs_ID_CATEGORIE=t_categories.ID_CATEGORIE";
$result = $db->query($requete);




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

     echo("<p>".$donnees['CATLIBELLE']."</p>");
     echo("<hr>");

 }
unset($db);

?>
</main>