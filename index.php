<?php
session_start();
include_once("./function/callPage.php");


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

   
</head>
<body>
    <div id="main">
    <?php
    callPage();

        
    ?>
    </div>
</body>
</html>