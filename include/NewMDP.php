<?php
function generationMdp()
{
    $longueurKey = 14;
    $aleatoire = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    shuffle($aleatoire);
    $key="";
    for ($i = 0; $i <= $longueurKey; ++$i) {
        $key .= $aleatoire[$i];
    }

    return $key;
}