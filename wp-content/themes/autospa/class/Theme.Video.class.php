<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeVideo
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->videoSource=array
		(
			'vimeo'																=>	array(__('Vimeo','autospa')),
			'youtube'															=>	array(__('YouTube','autospa'))
		);
	}

	/**************************************************************************/
	
	function getVideoSource()
	{
		return($this->videoSource);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/