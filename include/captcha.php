<?php
function motListe()
{
    $liste = file('./include/liste_francais.txt');
    return trim($liste[array_rand($liste)]);
}

function captcha()
{
    $mot=motListe();
    $_SESSION['captcha']=$mot;
    return $mot;
}
