<?php

/******************************************************************************/
/******************************************************************************/

class WAOption
{
	/**************************************************************************/
	
	static function updateOption($option)
	{
		update_option(PLUGIN_WIDGET_AREA_OPTION_NAME,$option);
		self::refreshOption();
	}

	/**************************************************************************/
	
	static function getOption($name=null)
	{
		global $wa_option;
		
		if(!is_array($wa_option))
			self::refreshOption();
		
		if(is_null($name)) return($wa_option);
		if(array_key_exists($name,$wa_option)) return($wa_option[$name]);
		
		return(false);
	}
	
	/**************************************************************************/
	
	static function refreshOption()
	{
		global $wa_option;
		$wa_option=(array)get_option(PLUGIN_WIDGET_AREA_OPTION_NAME);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/