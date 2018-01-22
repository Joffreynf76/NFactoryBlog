<?php
$dsn = "mysql:dbname=NFactoryBlog;
        host=localhost;
        charset=utf-8";

$username = "root";
$password = "";

//$db = new PDO($dsn,$username,$password);
try {
    $db = new PDO($dsn,$username,$password);
}
catch (PDOException $e) {
    echo($e -> getMessage());
}

unset($db);