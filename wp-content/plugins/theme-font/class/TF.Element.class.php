<?php

/******************************************************************************/
/******************************************************************************/

class TFElement
{
	/**************************************************************************/
	
	static function add($id,$label,$attribute,$selector)
	{
		global $tf_element;
		
		self::create();
		
		$attribute=self::setDefaultAttribute($attribute);
		
		$tf_element[$id]=array('label'=>$label,'attribute'=>$attribute,'selector'=>$selector);
	}
	
	/**************************************************************************/
	
	static function setDefaultAttribute($attr)
	{
		$attribute=array
		(
			'enable'					=>	1,
			'font_family_google'		=>	'',
			'font_family_system'		=>	'',
			'font_size'					=>	array(),
			'font_style'				=>	'-1',
			'font_weight'				=>	'-1',
			'text_transform'			=>	'-1',
			'line_height'				=>	'',
			'letter_spacing'			=>	''
		);
		
		foreach($attribute as $index=>$value)
		{
			if(array_key_exists($index,$attr))
				$attribute[$index]=$attr[$index];
		}
		
		return($attribute);
	}
	
	/**************************************************************************/
	
	static function create()
	{
		global $tf_element;
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/