<?php

/******************************************************************************/
/******************************************************************************/

class WAData
{
	/**************************************************************************/
	
	static function create()
	{
		global $wa_data;
		
		if(!is_array($wa_data)) $wa_data=array();
		if(!array_key_exists('data',$wa_data)) $wa_data['data']=array();
	}
	
	/**************************************************************************/
	
	static function set($name,$value,$refresh=true)
	{
		global $wa_data;
		
		self::create();

		if((array_key_exists($name,$wa_data['data'])) && ($refresh===false)) return;
		
		$wa_data['data'][$name]=$value;
		
		return($wa_data['data'][$name]);
	}
	
	/**************************************************************************/
	
	static function get($name)
	{
		global $wa_data;
		
		self::create();
		
		if(!array_key_exists($name,$wa_data['data'])) return(false);
		
		return($wa_data['data'][$name]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/