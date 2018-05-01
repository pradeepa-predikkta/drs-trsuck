<?php

/******************************************************************************/
/******************************************************************************/

class TSFile
{
	/**************************************************************************/
	
	static function scanDir($dir)
	{
		if(!is_dir($dir)) return(false);
		
		$file=scandir($dir);
		
		unset($file[0],$file[1]);
		
		return($file);
	}
	
	/**************************************************************************/
	
	static function fileExist($path)
	{
		return(is_file($path) && file_exists($path));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/