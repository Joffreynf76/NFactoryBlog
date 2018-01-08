<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    
    <title>Blog</title>
    <link rel="stylesheet" href="../../../../xampp/htdocs/HTML-CSS-JS/HTML-CSS-JS/PHP/PHP/PHP6/assets/css/normalize.css">
    <link rel="stylesheet" href="../../../../xampp/htdocs/HTML-CSS-JS/HTML-CSS-JS/PHP/PHP/PHP6/assets/css/style.css">
   
</head>
<body>
    <div id="main">
    <?php
    include_once("./include/header.php");
        if (isset($_GET['page']) && $_GET['page'] != "") {
            $page = $_GET['page'];    
        }
        
        else {
            $page = "default";
        }
        
        $page = "./include/" . $page . ".inc.php";
        $incFiles=glob("./include/*.inc.php");
        if(in_array($page,$incFiles)){
            include($page);
        } else {
            include("./include/default.inc.php");
        }
        
        
        include_once("./include/footer.php");
        
    ?>
    </div>
</body>
</html>