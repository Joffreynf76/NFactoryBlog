<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    
    <title>Blog</title>



    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
>>>>>>> Stashed changes
   
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