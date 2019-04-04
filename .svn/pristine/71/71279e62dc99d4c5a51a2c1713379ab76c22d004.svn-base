<?php  

function line_break_after_declaration($doc)
{
  global $nbr_faute;
  $open = file_get_contents($doc);
  $split = preg_split("/\n/", $open);
  $counter = count($split);
  $i = 0;

while ($i < $counter)
  {
    $match = preg_match("([a-zA-Z0-9_]+\s[\*]*[\d\w]*;)", $split[$i]);
    while ($i < $counter && $match != 1)
      {
        $match = preg_match("([a-zA-Z0-9_]+\s[\*]*[\d\w]*;)", $split[$i]);
        $i++;
      }
    while ($i < $counter && $match == 1)
      {
        $match = preg_match("([a-zA-Z0-9_]+\s[\*]*[\d\w]*;)", $split[$i]);
        if (preg_match("([a-zA-Z0-9_]+\s[\*]*[\d\w]*;)", $split[$i]) != 1 && strlen($split[$i]) > 0)
          {
            $match = 0;
            $nbr_faute++;
            echo "\033[31m Erreur : \033[34m $doc ligne $i: \033[0m oubli de saut de ligne apres une declaration\n";
          }
         $i++;
      }
  }
}


?>