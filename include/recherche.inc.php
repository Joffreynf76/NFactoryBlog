<?php

$recherche = $_POST['recherche'];
// var_dump($recherche);
if($recherche == "") {
    echo "Veuillez remplir le champ";
}
else {
    //   var_dump($e);
    $db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
    $requete ="SELECT * FROM t_articles WHERE ARTCONTENU LIKE '%" . $recherche . "%' ORDER BY ARTTITRE ASC ";
    // die($requete);
    $result = $db ->query($requete);
    if(isset($_POST['recherche'])) {
        while ($donnees = $result ->fetch())
        {
            echo ("<div class='affichart'><h2 class='titre1'>".html_entity_decode($donnees['ARTTITRE'])."</h2>");
            echo ("<h3 class='chapo'>".html_entity_decode($donnees['ARTCHAPO'])."</h3>");
            echo ("<p class='contenu'>".html_entity_decode($donnees['ARTCONTENU'])."</p></div>");
        }
    }
}
?>