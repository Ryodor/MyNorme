#!/usr/bin/env php
<?php
// char_per_line.php for my_norme in /home/gailhard/Documents
// 
// Made by GAILHARD Paul
// Login   <gailha_p@etna-alternance.net>
// 
// Started on  Mon Jan  2 13:12:51 2017 GAILHARD Paul
// Last update Mon Jan  2 16:58:05 2017 GAILHARD Paul
//

function char_number($doc, $nbr_faute)
{
    $open = file_get_contents($doc);
    $split = preg_split("/\n/", $open);
    $counter = count($split);
    $i = 0;

    while ($i < $counter){
        $nbr = strlen($split[$i]);
        if ($nbr > 80){
        $line = $i + 1;
        $nbr_faute = $nbr_faute + 1;
        echo "\033[31myou have an error at line ".$line.":\033[0m more than 80 characters\n";
        }
        $i++;
    }
    return $nbr_faute;
}

function sp_end_line($doc, $nbr_faute) {
    $open = file_get_contents($doc);
    $split = preg_split("/\n/", $open);
    $counter = count($split);
    $i = 0;

    While ($i < $counter){
        $match = preg_match("/ $/", $split[$i]);
        if ($match == 1){
        $line = $i + 1;
        echo "\033[31myou have an error at line ".$line.":\033[0m you got spaces at the end of syntax\n";
        $nbr_faute = $nbr_faute + 1;
        }
        $i++;
    }
    return $nbr_faute;
}

function include_norme($doc, $nbr_faute) {
    $open = file_get_contents($doc);
    $split = preg_split("/\n/", $open);
    $counter = count($split);
    $i = 0;

    While ($i < $counter) {
        $match = preg_match('/#include (<.*>|".*")/',$split[$i]);
        if ((preg_match('/#include/',$split[$i]) == 1) &&
            preg_match('/("|\/)(.*)#include(.*)("|\/|)/', $split[$i]) == 0){
            if ($match == 0){
                $line = $i + 1;
                echo "\033[31myou Error at line ".$line.":\033[0m wrong include syntax\n";
                $nbr_faute = $nbr_faute + 1;
            }
        }
        $i++;
    }
    return $nbr_faute;
}

function keywords($doc, $nbr_faute){
    $open = file_get_contents($doc);
    $split = preg_split("/\n/", $open);
    $counter = count($split);
    $i = 0;

    While ($i < $counter) {
        $match = preg_match_all('/\bauto\b|\bcase\b|\bchar\b|\bconst\b|\bdo\b|\bdouble\b|\belse\b|\benum\b|\bextern\b|\bfloat\b|\bfor\b|\bgoto\b|\bif\b|\bint\b|\blong\b|\bregister\b|\breturn\b|\bshort\b|\bsigned\b|\bsizeof\b|\bstatic\b|\bstruct\b|\btypedef\b|\bunion\b|\bunsigned\b|\bvoid\b|\bvolatile\b|\bwhile\b|\=|\+|\-|\*/', $split[$i]);
        $match2 = preg_match_all('/\bauto\b |\bcase\b |\bchar\b |\bconst\b |\bdo\b |\bdouble\b |\belse\b |\benum\b |\bextern\b |\bfloat\b |\bfor\b |\bgoto\b |\bif\b |\bint\b |\blong\b |\bregister\b |\breturn\b |\bshort\b |\bsigned\b |\bsizeof\b |\bstatic\b |\bstruct\b |\btypedef\b |\bunion\b |\bunsigned\b |\bvoid\b |\bvolatile\b |\bwhile\b | \= | \+ | \- | \* /', $split[$i]);
        $increm = preg_match_all('/\+{2}|\-{2}/', $split[$i]) * 2;
        $annul = preg_match_all('/\*[a-zA-Z]/', $split[$i]);
        $total = $match - $increm - $annul;
        if ($match2 < $total){
            $line =$i + 1;
            echo "\033[31mError at line ".$line.":\033[0m space after a key word\n";
            $nbr_faute = $nbr_faute + $total - $match2;
        }
        $i++;
    }
    return $nbr_faute;
}