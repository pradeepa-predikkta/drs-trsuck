<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeEasing
{
	/**************************************************************************/
	
	function __construct()
	{		
		$this->easingType=array
		(
            'swing'                                                             =>	__('swing','autospa'),
			'easeInQuad'														=>	__('easeInQuad','autospa'),
			'easeOutQuad'														=>	__('easeOutQuad','autospa'),
			'easeInOutQuad'														=>	__('easeInOutQuad','autospa'),
			'easeInCubic'														=>	__('easeInCubic','autospa'),
			'easeOutCubic'														=>	__('easeOutCubic','autospa'),
			'easeInOutCubic'													=>	__('easeInOutCubic','autospa'),
			'easeInQuart'														=>	__('easeInQuart','autospa'),
			'easeOutQuart'														=>	__('easeOutQuart','autospa'),
			'easeInOutQuart'													=>	__('easeInOutQuart','autospa'),
			'easeInOutQuart'													=>	__('easeInOutQuart','autospa'),
			'easeInQuint'														=>	__('easeInQuint','autospa'),
			'easeOutQuint'														=>	__('easeOutQuint','autospa'),
			'easeInOutQuint'													=>	__('easeInOutQuint','autospa'),
			'easeInSine'														=>	__('easeInSine','autospa'),
			'easeOutSine'														=>	__('easeOutSine','autospa'),
			'easeInOutSine'														=>	__('easeInOutSine','autospa'),
			'easeInExpo'														=>	__('easeInExpo','autospa'),
			'easeOutExpo'														=>	__('easeOutExpo','autospa'),
			'easeInOutExpo'														=>	__('easeInOutExpo','autospa'),
			'easeInCirc'														=>	__('easeInCirc','autospa'),
			'easeOutCirc'														=>	__('easeOutCirc','autospa'),
			'easeInOutCirc'														=>	__('easeInOutCirc','autospa'),
			'easeInElastic'														=>	__('easeInElastic','autospa'),
			'easeOutElastic'													=>	__('easeOutElastic','autospa'),
			'easeInOutElastic'													=>	__('easeInOutElastic','autospa'),
			'easeInBack'														=>	__('easeInBack','autospa'),
			'easeOutBack'														=>	__('easeOutBack','autospa'),
			'easeInOutBack'														=>	__('easeInOutBack','autospa'),
			'easeInBounce'														=>	__('easeInBounce','autospa'),
			'easeOutBounce'														=>	__('easeOutBounce','autospa'),
			'easeInOutBounce'													=>	__('easeInOutBounce','autospa')
		);	
	}
    
    /**************************************************************************/
    
    function getEasingType()
    {
        return($this->easingType);
    }
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/