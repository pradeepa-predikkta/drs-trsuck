<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeTemplate
{
	/**************************************************************************/

	function __construct($data,$path)
	{
		$this->data=$data;
		$this->path=$path;
	}

	/**************************************************************************/

	function output($format=false)
	{
		ob_start();
 		include($this->path);
		$value=ob_get_clean();
		if($format) $value=Autospa_ThemeHelper::formatCode($value);
		return($value);
	}

	/**************************************************************************/
	
	function outputWP($format=false)
	{
		ob_start();
		include(locate_template($this->path));
		$value=ob_get_clean();
		if($format) $value=Autospa_ThemeHelper::formatCode($value);
		return($value);		
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/