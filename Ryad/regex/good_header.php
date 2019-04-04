<?php 

function 	good_header($doc)
{
	global $nbr_faute;
 	$open = file_get_contents($doc);
  	$split = preg_split("/\n/", $open);
  	$counter = count($split);
  	$i = 0;

	if (preg_match("(\/\*
\*\* [a-z0-9_\.]+ for[ ]*[a-zA-Z0-9_\.]* in .*
\*\*
\*\* Made by [A-Z]+ [A-Za-z]+
\*\* Login   <[\w.]+@etna-alternance\.net>
\*\*
\*\* Started on  [A-Za-z]{3} [A-Za-z]{3}  [0-9]{1,2} [0-9]{2}:[0-9]{2}:[0-9]{2} [0-9]{4} [A-Z]+ [A-Za-z]+
\*\* Last update [A-Za-z]{3} [A-Za-z]{3}  [0-9]{1,2} [0-9]{2}:[0-9]{2}:[0-9]{2} [0-9]{4} [A-Z]+ [A-Za-z]+
\*\/)", $open))
		{ 
 			while (strlen($split[$i]) == 0 && $i < $counter)
  				$i++;
			if ($split[$i] != "/*")
				echo "ligne $i: Il y à quelque chose au dessus du header\n";
		}
 	else 
 	{
 		$nbr_faute++;
    	echo "TRICHE !!! $doc : Mauvais header.\n";
 	}
}

?>