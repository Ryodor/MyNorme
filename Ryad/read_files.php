<?php

require('security.php');

function	read_files($path)
{
	if (file_is_good($name) == FALSE)
		{
			//error_code();
			echo "There is an error on the file.\n";
			return (0);
		}

	$in_file = file_get_contents("$name");
	echo $in_file;
}

function 	master($path)
{
	$my_box = null;
	if (dir_is_good($path) == 1)
		return (0);
	$dir = opendir($path);
	while (false !== ($name_file = readdir($dir)))
		{
			if (is_dir($name_file) == TRUE && $name_file != "." && $name_file != "..")
				master(realpath($name_file));
			else if (file_is_good(realpath($name_file)) != 1)
			{
				echo "in my\n";
				$my_box->name_file = name_file;
				$my_box->path_file = realpath(name_file);
				$my_box->file_get_contents($name_file);
			}
		}
	//closedir($path);	
}

master($argv[1]);

?>