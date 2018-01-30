<main>
    <div class="recherche">
        <form method = "POST" action = "index.php?page=recherche">
            <input type="text" name="recherche"/>
            <input type="submit" value="Rechercher" />
        </form>
    </div>
<?php

echo("<h1 class='accueil'>Accueil</h1>");
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


 while ($donnees= $result -> fetch()){
     $articleId = $donnees['ID_ARTICLE'];
     echo"<div class='article'>";
     echo "<h2><a href=\"index.php?page=afficheArticle&amp;id=$articleId\" class='titre'>";
     echo (html_entity_decode($donnees['ARTTITRE']));
     echo "</a></h2>";
     echo("<h3 class='chapo'>");
     echo (html_entity_decode($donnees['ARTCHAPO']));
     echo("</h3>");
     echo $donnees['ARTDATE'];
     echo " ";
     if($donnees['CATLIBELLE']=='Web'){
         $id=2;
         echo("<p><a href='index.php?page=catArticle&amp;id=.$id.' class='web'>".$donnees['CATLIBELLE']."</a></p>");
     }
     else {
         $id=1;
         echo("<p><a href='index.php?page=catArticle&amp;id=.$id.' class='informatique'>".$donnees['CATLIBELLE']."</a></p>");

     }
     echo "</div>";
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
echo ("<a href='rss.php' class='flux'>Flux rss</a>");
unset($db);

?>
</main>