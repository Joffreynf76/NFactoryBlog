<?php
//readfile("./test.txt");

$var ="phrase";
if(file_put_contents("toto.txt",$var))
    echo "ok";
else
    echo"erreur";

$fp =fopen("fichier.txt","wb");
fwrite($fp,"toto");