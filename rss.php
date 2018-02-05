<?php
include_once ("./function/connectionPDO.php");
header('Content-Type: application/rss+xml');
$bdd = connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
$articles = $bdd->query('SELECT * FROM t_articles');

?>
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title>Example.org</title>
        <description>Ceci est un exemple de flux RSS 2.0</description>
        <lastBuildDate><?= date(DATE_RSS, strtotime($lastBuildDate)) ?></lastBuildDate>
        <link>http://www.example.org</link>
        <?php while($a = $articles->fetch()) { ?>
            <item>
                <title><?= $a['ARTTITRE'] ?></title>
                <description><?= $a['ARTCHAPO'] ?></description>


                <image>
                    <url>http://www.example.org/miniatures/<?= $a['id'] ?>.jpg</url>
                    <link>http://www.example.org/?id=<?= $a['id'] ?></link>
                </image>
            </item>
        <?php } ?>
    </channel>
</rss>