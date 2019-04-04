<?php

function 	count_file($path)
{
	$nb_file = 0;
	$dir = opendir($path);
	while (false !== ($name_file = readdir($dir)))
		{
			if ($name_file[0] != '.')
				$nb_file++;
		}
	return ($nb_file);
}

function 	is_c_or_h($name)
{
	$i = strlen($name) - 2;

	if (strlen($name) > 2 && ord($name[$i]) == 46  && 
		(ord($name[$i+1]) == 99 || ord($name[$i+1]) == 104))
		return (TRUE);
	return (FALSE);
}

?>