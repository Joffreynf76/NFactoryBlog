<?php
$dsn = "mysql:dbname=NFactoryBlog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";

//$db = new PDO($dsn,$username,$password);
try {
    $db = new PDO($dsn,$username,$password);
    var_dump($db);
}
catch (PDOException $e) {
    echo($e -> getMessage());
}



$sql = "SELECT * FROM t_articles";

$resultat = $db -> query($sql);
while(($article = $resultat -> fetch())){
    echo html_entity_decode($article['ARTCONTENU']);
}

// Requete insertion
$sql= "INSERT INTO t_articles";
$nbrLignes = $db -> exec($sql);
echo $nbrLignes;
unset($db);

////////////////////////////////////

$db = new PDO($dsn,$username,$password);
// Formatage par defaut
$db -> setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);

// Formatage pour un jeu de resultat
$resultat = $db -> query("SELECT *...");
$resultat -> setFetchMode(PDO::FETCH_ASSOC);
while($article=$resultat -> fetch()){
    var_dump($article);
}

// A chaque appel
$resultat=$db -> query("SELECT*...");
while($article = $resultat -> fetch(PDO::FETCH_ASSOC)){
    var_dump($article);
}