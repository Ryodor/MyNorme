<?php

require('utile.php');

function    dir_is_good($path)
{
	echo "$path\n";
	if (file_exists($path) == FALSE)
		{
			echo "\033[31m Erreur : \033[0m Le dossier n'existe pas\n";
			return (1);
		}
	else if (is_dir($path) == FALSE)
		{
			echo "\033[31m Erreur : \033[0m Ce n'est pas un dossier\n";
			return (1);
		}
	else if (count_file($path) == 0)
		{
			echo "\033[31m Erreur : \033[0m Le dossier est vide\n";
			return (1);
		}
	return (0);
}

function   file_is_good($filename)
{
	if (ord($filename[0]) == 46)
		return (1);
	else if (is_c_or_h($filename) == FALSE)
		return (1);
	else if (is_readable($filename) == FALSE)
		{
			echo "\033[31m Erreur : \033[0m $filename n'est pas accesible\n";//error_code();
			return (1);
		}
	return (0);
}

?>