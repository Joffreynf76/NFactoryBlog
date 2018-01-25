<main>
<?php

echo("<h1>Accueil</h1>");
$db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
$articleParPage=3;
$retourTotal= $db -> query("SELECT COUNT(*) AS total FROM t_articles");
$donneesTotal = $retourTotal -> fetch(PDO::FETCH_ASSOC);
$total = $donneesTotal['total'];
$nombrePage = ceil($total/$articleParPage);


if(isset($_GET['debut'])){
    $pageActuelle = intval($_GET['debut']);

    if($pageActuelle>$nombrePage){
        $pageActuelle=$nombrePage;
    }
}
else {
    $pageActuelle=1;
}

$premiereEntree = ($pageActuelle-1)*$articleParPage;
$requete = "SELECT * FROM t_articles LEFT JOIN t_categories_has_t_articles
ON t_articles.ID_ARTICLE=t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE LEFT JOIN t_categories ON t_categories_has_t_articles.T_CATEGORIEs_ID_CATEGORIE=t_categories.ID_CATEGORIE LIMIT $premiereEntree,$articleParPage";
$result = $db->query($requete);
//$retourArticle = $db ->query("SELECT * FROM t_articles LIMIT 0,5");

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
echo '<p align="center">Page : ';
for($i=1; $i<=$nombrePage; $i++)
{

    if($i==$pageActuelle)
    {
        echo ' [ '.$i.' ] ';
    }
    else
    {
        echo ' <a href="index.php?page=accueil&amp;debut='.$i.'">'.$i.'</a> ';
    }
}
echo '</p>';
unset($db);

?>
</main>