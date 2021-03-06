<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeBorder
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->style=array
		(
			'none'																=>	__('None','autospa'),
			'hidden'															=>	__('Hidden','autospa'),
			'dotted'															=>	__('Dotted','autospa'),
			'dashed'															=>	__('Dashed','autospa'),
			'solid'																=>	__('Solid','autospa'),
			'double'															=>	__('Double','autospa'),
			'groove'															=>	__('Groove','autospa'),
			'ridge'																=>	__('Ridge','autospa'),
			'inset'																=>	__('Inset','autospa'),
			'outset'															=>	__('Outset','autospa'),
			'inherit'															=>	__('Inherit','autospa')
		);
	}
    
    /**************************************************************************/
    
    function getStyle()
    {
        return($this->style);
    }
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/