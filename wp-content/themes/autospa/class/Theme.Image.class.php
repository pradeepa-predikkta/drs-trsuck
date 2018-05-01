<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeImage
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->image=array
		(
			'autospa-image-1170-779'											=>	array(1170,779,__('Full width','autospa'),1,true),
            'autospa-image-760-506'                                             =>	array(1170,779,__('Full width','autospa'),1,true),
            'autospa-image-460-306'                                             =>	array(1170,779,__('Full width','autospa'),2,true)
		);
	}
	
	/**************************************************************************/
	
	function register()
	{
		foreach($this->image as $index=>$data)
			add_image_size($index,$data[0],$data[1],$data[3]);
	}
	
	/**************************************************************************/
	
	function addImageSupport($size)
	{
		$addsize=array();
		foreach($this->image as $index=>$data)
			$addsize[$index]=$data[2];
		
		return(array_merge($size,$addsize));
	}
	
	/**************************************************************************/
	
	function getImageDimension($id)
	{
		return(array($this->image[$id][0],$this->image[$id][1]));
	}
	
	/**************************************************************************/
	
	function itemExist($id)
	{
		return((bool)$this->image[$id]);
	}
	
	/**************************************************************************/
	
	function getImageNameByColumnCount($columnCount)
	{
		foreach($this->image as $index=>$value)
		{
			if($value[4]==$columnCount) return($index);
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/