<?php

/******************************************************************************/
/******************************************************************************/

class TFData
{
	/**************************************************************************/
	
	static function create()
	{
		global $tf_data;
		
		if(!is_array($tf_data)) $tf_data=array();
		if(!array_key_exists('data',$tf_data)) $tf_data['data']=array();
	}
	
	/**************************************************************************/
	
	static function set($name,$value,$refresh=true)
	{
		global $tf_data;
		
		self::create();

		if((array_key_exists($name,$tf_data['data'])) && ($refresh===false)) return;
		
		$tf_data['data'][$name]=$value;
		
		return($tf_data['data'][$name]);
	}
	
	/**************************************************************************/
	
	static function get($name)
	{
		global $tf_data;
		
		self::create();
		
		if(!array_key_exists($name,$tf_data['data'])) return(false);
		
		return($tf_data['data'][$name]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/