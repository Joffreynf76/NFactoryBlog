<?php
function connectionPDO($host,$dbname,$login,$mdp) {

    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname , $login , $mdp,$pdo_options);


    }
    catch (PDOException $e){
        echo ($e -> getMessage());
    }
    return $db;
}