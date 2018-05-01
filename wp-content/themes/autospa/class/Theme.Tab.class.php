<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeTab
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->heightStyle=array
		(
            'auto'                                                              =>  __('[Auto] All panels will be set to the height of the tallest panel','autospa'),
            'content'                                                           =>  __('[Content] Each panel will be only as tall as its content','autospa'),
            'fill'                                                              =>  __('[Fill] Expand to the available height based on the tabs\' parent height','autospa')
        );
	}
	
	/**************************************************************************/
	
	function getHeightStyle()
	{
        return($this->heightStyle);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/