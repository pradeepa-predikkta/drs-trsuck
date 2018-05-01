<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeGoogleMap
{
	/**************************************************************************/

	function __construct() 
	{ 
        $this->zoomControlStyle=array
		(
			'DEFAULT'															=>	__('Default','autospa'),
			'SMALL'																=>	__('Small','autospa'),
			'LARGE'																=>	__('Large','autospa')
		);

		$this->mapTypeControlStyle=array
		(
			'DEFAULT'															=>	__('Default','autospa'),
			'HORIZONTAL_BAR'													=>	__('Horizontal Bar','autospa'),
			'DROPDOWN_MENU'														=>	__('Dropdown Menu','autospa')
		);

		$this->position=array
		(
			'TOP_CENTER'														=>	__('Top center','autospa'),
			'TOP_LEFT'															=>	__('Top left','autospa'),
			'TOP_RIGHT'															=>	__('Top right','autospa'),
			'LEFT_TOP'															=>	__('Left top','autospa'),
			'RIGHT_TOP'															=>	__('Right top','autospa'),
			'LEFT_CENTER'														=>	__('Left center','autospa'),
			'RIGHT_CENTER'														=>	__('Right center','autospa'),
			'LEFT_BOTTOM'														=>	__('Left bottom','autospa'),
			'RIGHT_BOTTOM'														=>	__('Right bottom','autospa'),
			'BOTTOM_CENTER'														=>	__('Bottom center','autospa'),
			'BOTTOM_LEFT'														=>	__('Bottom left','autospa'),
			'BOTTOM_RIGHT'														=>	__('Bottom right','autospa')	
		);

		$this->mapTypeId=array
		(
			'ROADMAP'															=>	__('Roadmap','autospa'),
			'SATELLITE'															=>	__('Satellite','autospa'),
			'HYBRID'															=>	__('Hybrid','autospa'),
			'TERRAIN'															=>	__('Terrain','autospa'),
			'CUSTOM_MAP'														=>	__('Custom styled map','autospa')
		);	
	}
    
    /**************************************************************************/
    
    function getZoomControlStyle()
    {
        return($this->zoomControlStyle);
    }
    
    /**************************************************************************/
    
    function getMapTypeControlStyle()
    {
        return($this->mapTypeControlStyle);
    }
   
     /**************************************************************************/
    
    function getPosition()
    {
        return($this->position);
    }
    
    /**************************************************************************/
    
    function getMapTypeId()
    {
        return($this->mapTypeId);
    }

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/