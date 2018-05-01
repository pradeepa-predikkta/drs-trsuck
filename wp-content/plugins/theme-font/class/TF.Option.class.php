<?php

/******************************************************************************/
/******************************************************************************/

class TFOption
{
	/**************************************************************************/
	
	static function updateOption($option)
	{
		update_option(PLUGIN_THEME_FONT_OPTION_NAME,$option);
		self::refreshOption();
	}

	/**************************************************************************/
	
	static function getOption($name=null)
	{
		global $tf_option;
		
		if(!is_array($tf_option))
			self::refreshOption();
		
		if(is_null($name)) return($tf_option);
		if(array_key_exists($name,$tf_option)) return($tf_option[$name]);
		
		return(false);
	}
	
	/**************************************************************************/
	
	static function refreshOption()
	{
		global $tf_option;
		$tf_option=(array)get_option(PLUGIN_THEME_FONT_OPTION_NAME);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/