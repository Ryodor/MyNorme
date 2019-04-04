<?php

function line_break_after_declaration($doc, $fault)
{
  $open = file_get_contents($doc);
  $split = preg_split("/\n/", $open);
  $counter = count($split);
  $i = 0;
  $len = 0;

  $match = preg_match("([a-zA-Z0-9_]+\s[\*]*[\d\w]*;)", $split[$i]);

while ($i < $counter)
  {
  	$len = strlen($split[$i]);
  	echo "$i : ";
  	echo "$len\n";
  	$match = preg_match("([a-zA-Z0-9_]+\s[\*]*[\d\w]*;)", $split[$i]);
  	$i++;
  }

}

line_break_after_declaration($argv[1], 0)
?>