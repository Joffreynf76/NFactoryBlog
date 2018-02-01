<?php
$db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
$requete = $db -> prepare("SELECT * FROM t_categories_has_t_articles LEFT JOIN t_articles ON t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE=t_articles.ID_ARTICLE WHERE T_CATEGORIES_ID_CATEGORIE=?");
$requete -> execute(array($_GET['id']));

while($donnees = $requete ->fetch()) {
    echo "<div class='affichart'><h2 class='titre1'>";
    echo (html_entity_decode($donnees['ARTTITRE']));
    echo "</h2>";
    echo("<h3 class='chapo'>");
    echo (html_entity_decode($donnees['ARTCHAPO']));
    echo("</h3>");
    echo("<p>");
    echo (html_entity_decode($donnees['ARTCONTENU']));
    echo("</p>");
    echo $donnees['ARTDATE'];
    echo " ";
    echo ($donnees['ARTAUTEUR']);
    echo("</div>");
}