<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeCarouFredSel
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->scrollFX=array
		(
			'none'                                                              =>	__('None','autospa'),
			'scroll'                                                            =>	__('Scroll','autospa'),
			'directscroll'                                                      =>	__('Directscroll','autospa'),
			'fade'                                                              =>	__('Fade','autospa'),
			'crossfade'                                                         =>	__('Crossfade','autospa'),
			'cover'                                                             =>	__('Cover','autospa'),
			'cover-fade'                                                        =>	__('Cover-fade','autospa'),
			'uncover'                                                           =>	__('Uncover','autospa'),
			'uncover-fade'                                                      =>	__('Uncover-fade','autospa')
		);
		
		$this->pauseOnHover=array
		(
			'resume'                                                            =>	__('Resume','autospa'),
			'immediate'                                                         =>	__('Immediate','autospa'),
			'immediate-resume'                                                  =>	__('Immediate and resume','autospa')
		);
		
		$this->direction=array
		(
			'left'                                                              =>	__('Left','autospa'),
			'right'                                                             =>	__('Right','autospa')
		);		
	}
    
    /**************************************************************************/
    
    function getPauseOnHover()
    {
        return($this->pauseOnHover);
    }
    
     /**************************************************************************/
    
    function getScrollFX()
    {
        return($this->scrollFX);
    }
    
    /**************************************************************************/
    
    function getDirection()
    {
        return($this->direction);
    }

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/