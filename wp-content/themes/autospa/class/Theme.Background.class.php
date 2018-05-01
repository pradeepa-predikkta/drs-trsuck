<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeBackground
{
	/**************************************************************************/

	function __construct() 
	{ 
 		$this->backgroundType=array
		(
			'none'																=>	array(__('None','autospa')),
			'image'																=>	array(__('Image','autospa')),
			'revslider'															=>	array(__('Revolution slider','autospa'))
		);
        
		$this->backgroundRepeat=array
		(
			'no-repeat'															=>	array(__('no-repeat','autospa')),
			'repeat-y'															=>	array(__('repeat-y','autospa')),
			'repeat-x'															=>	array(__('repeat-x','autospa')),
			'repeat'															=>	array(__('repeat','autospa')),
			'inherit'															=>	array(__('inherit','autospa'))
		);
		
		$this->backgroundSize=array
		(
			'auto'																=>	array(__('auto','autospa')),
			'length'															=>	array(__('length','autospa')),
			'percentage'														=>	array(__('percentage','autospa')),
			'cover'																=>	array(__('cover','autospa')),
			'contain'															=>	array(__('contain','autospa')),
			'initial'															=>	array(__('initial','autospa')),
			'inherit'															=>	array(__('inherit','autospa'))
		);	
		
		$this->backgroundOrigin=array
		(
			'padding-box'														=>	array(__('padding-box','autospa')),
			'border-box'														=>	array(__('border-box','autospa')),
			'content-box'														=>	array(__('content-box','autospa')),	
			'initial'															=>	array(__('initial','autospa')),	
			'inherit'															=>	array(__('inherit','autospa'))
		);	
		
		$this->backgroundClip=array
		(
			'border-box'														=>	array(__('border-box','autospa')),
			'padding-box'														=>	array(__('padding-box','autospa')),
			'content-box'														=>	array(__('content-box','autospa')),
			'initial'															=>	array(__('initial','autospa')),
			'inherit'															=>	array(__('inherit','autospa')),
		);	
		
		$this->backgroundAttachment=array
		(
			'scroll'															=>	array(__('scroll','autospa')),
			'fixed'																=>	array(__('fixed','autospa')),
			'local'																=>	array(__('local','autospa')),
			'initial'															=>	array(__('initial','autospa')),
			'inherit'															=>	array(__('inherit','autospa'))
		);
	}
	
	/**************************************************************************/
	
	function getDictionary($type,$useNone=true,$useGlobal=true,$useLeftUnchanged=false)
	{
		$temp=array();
		
		if($useNone) $data[0]=array(__('- None -','autospa'));
		if($useGlobal) $data[-1]=array(__('- Use global settings -','autospa'));
		if($useLeftUnchanged) $data[-10]=array(__('[Left unchanged]','autospa')); 
		
		foreach($this->{$type} as $index=>$value)
            $temp[$index]=$value[0];
			
		asort($temp);
		
		foreach($temp as $index=>$value)
            $data[$index]=array($value);
		
		return($data);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/