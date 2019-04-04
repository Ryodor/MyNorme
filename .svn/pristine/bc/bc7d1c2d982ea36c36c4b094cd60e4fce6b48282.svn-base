<?php
function defineinc($file, $name){
  global $nbr_faute;

  preg_match_all("/#define/", $file, $result);
  if (isset($result[0])) {
    $i = 0;
    while (isset($result[0][$i])) {
      echo "\033[31mErreur : \033[34m".$name." :\033[0m Pas de define dans un .c\n";
      $nbr_faute++;
      $i++;
    }
  }
}


function Nbfunc($file, $name){
  global $nbr_faute;

  preg_match_all("/\w+([\r\t\f ])[\w]{1,}\((([\w]{1,} [\*]*\w+,* *)*)\)\s{/", $file, $result);
  if (isset($result[0])) {
    $i = 0;
    while (isset($result[0][$i])) {
      if ($i > 5) {
        echo "\033[31mErreur : \033[34m".$name." :\033[0m Plus de 5 fonctions (".$i."ème).\n";
        $nbr_faute++;
      }
    $i++;
    }
  }
}

function Nbparam($file, $name){
  global $nbr_faute;

  preg_match_all("/\w+([\r\t\f ])[\w]{1,}\((([\w]{1,} [\*]*\w+,* *)*)\)\s{/", $file, $result);
  if (isset($result[2])) {
    $i = 0;
    while (isset($result[2][$i])) {
      $out = preg_split("/,[\r\t\f ]+/", $result[2][$i]);
      $j = 0;
      while (isset($out[$j])) {
        if ($j > 3) {
          $e = $j + 1;
          echo "\033[31mErreur : \033[34m".$name." :\033[0m Plus de 4 parametres pour la meme fonction (".$e."ème).\n";
          $nbr_faute++;
        }
        $j++;
      }
      $i++;
    }
  }
}

function tabfunc($file, $name){
  global $nbr_faute;

  preg_match_all("/\w+([\r\t\f ])[\w]{1,}\((([\w]{1,} [\*]*\w+,* *)*)\)\s{/", $file, $result);
  if (isset($result[1])) {
    $i = 0;
    while (isset($result[1][$i])) {
      if ($result[1][$i] != "\t") {
        echo "\033[31mErreur : \033[34m".$name." :\033[0m Erreur de tabulation.\n";
        $nbr_faute++;
      }
    $i++;
    }
  }
}

function Nblignes($file, $name){
  global $nbr_faute;

  preg_match_all("/{\n((.|\n[^}])*)/", $file, $result);
  if (isset($result[1])) {
    $i = 0;
    while (isset($result[1][$i])) {
      preg_match_all("/\n/", $result[1][$i], $out);
      $j = 0;
      while (isset($out[0][$j])) {
        if ($j > 24) {
          $e = $j + 1;
          echo "\033[31mErreur : \033[34m".$name." :\033[0m Plus de 25 lignes dans la fonction (".$e." lignes).\n";
          $nbr_faute++;
        }
        $j++;
      }
      $i++;
    }
  }
}

function doublestligne($file, $name){
  global $nbr_faute;

  preg_match_all("/((.)*)\n([\r\t\f ]*[\n\v])+/", $file, $out);
  $i = 0;
  while (isset($out[1][$i])) {
    if (preg_match_all("/\w+\t\w+;/",$out[1][$i]) == false &&
    preg_match_all("/^}[\r\t\f ]*/",$out[1][$i]) == false &&
    preg_match_all("/^\*\/[\r\t\f ]*/",$out[1][$i]) == false &&
    preg_match_all("/\#include.+/",$out[1][$i]) == false &&
    preg_match_all("/\#define.+/",$out[1][$i]) == false) {
      echo "\033[31mErreur : \033[34m".$name." :\033[0m Double sauts de lignes.\n";
      $nbr_faute++;
    }
    $i++;
  }
}

function decnaff($file, $name){
  global $nbr_faute;

  preg_match_all("/\w+[\r\t\f ]+\w+[\r\t\f ]*[=][\r\t\f ]*\w+;/", $file, $out);
  $i = 0;
  while (isset($out[0][$i])) {
    echo "\033[31mErreur : \033[34m".$name." :\033[0m Déclaration et affectation sur la même ligne.\n";
    $nbr_faute++;
    $i++;
  }
}

function tabindec($file, $name){
  global $nbr_faute;

  preg_match_all("/(\w+)([\r\t\f ]+)\w+;/", $file, $out);
  $i = 0;
  while (isset($out[0][$i])) {
    if ($out[1][$i] != "return") {
      if ($out[2][$i] != "\t") {
        echo "\033[31mErreur : \033[34m".$name." :\033[0m Pas de tabulation dan la declaration.\n";
        $nbr_faute++;
      }
    }
    $i++;
  }
}
