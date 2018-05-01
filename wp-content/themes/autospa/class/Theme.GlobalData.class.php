<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeGlobalData
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function setGlobalData($name,$functionCallback,$refresh=false)
	{
		global $Autospa_globalData;
		
		if(isset($Autospa_globalData[$name]) && (!$refresh)) return($Autospa_globalData[$name]);
		
		$Autospa_globalData[$name]=call_user_func($functionCallback);
		
		return($Autospa_globalData[$name]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/