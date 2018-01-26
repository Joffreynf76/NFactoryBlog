<?php

session_start();
if (isset($_COOKIE['visite'])) {
    setCookie('visite', $_COOKIE['visite'] + 1,time()+ 3600);
} else {
    setCookie('visite', 1);

}
echo ($_COOKIE['visite']);
include_once("./function/callPage.php");
include_once("./function/connectionPDO.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    
    <title>Blog</title>



    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/function.js"></script>
    <script type="text/javascript" src="./assets/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            forced_root_block : "",
            selector: 'textarea'
        });
    </script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
</head>
<body>
    <div id="main">
    <?php
    callPage();



        
    ?>
    </div>
</body>
</html>