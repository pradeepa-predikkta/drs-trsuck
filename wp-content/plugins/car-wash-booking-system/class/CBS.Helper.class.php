<?php

/******************************************************************************/
/******************************************************************************/

class CBSHelper
{
	/**************************************************************************/
	
	static function createNonceField($name)
	{
		return(wp_nonce_field('savePost',$name.'_noncename',false,false));
	}
	
	/**************************************************************************/
	
	static function setDefault(&$data,$index,$value)
	{	
		if(array_key_exists($index,(array)$data)) return;
		$data[$index]=$value;		
	}
	
	/**************************************************************************/
	
	static function getFormName($name,$display=true)
	{
		if(!$display) return(PLUGIN_CBS_CONTEXT.'_'.$name);
		echo PLUGIN_CBS_CONTEXT.'_'.$name;
	}
	
	/**************************************************************************/
	
	static function checkSavePost($post_id,$name,$action=null)
	{
		if((defined('DOING_AUTOSAVE')) && (DOING_AUTOSAVE)) return(false);

		if(!array_key_exists($name,$_POST)) return(false);
		
		if(!wp_verify_nonce($_POST[$name],$action)) return(false);

		unset($_POST[$name]);
		
		if(!current_user_can('edit_post',$post_id)) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	static function getPostValue($name,$prefix=true)
	{
		if($prefix) $name=PLUGIN_CBS_CONTEXT.'_'.$name;
		
		if(!array_key_exists($name,$_POST)) return(null);
		
		return($_POST[$name]);
	}
	
	/**************************************************************************/
	
	static function getGetValue($name,$prefix=true)
	{
		if($prefix) $name=PLUGIN_CBS_CONTEXT.'_'.$name;
		
		if(!array_key_exists($name,$_GET)) return(null);
		
		return($_GET[$name]);
	}
	
	/**************************************************************************/
	
	static function displayIf($value,$testValue,$text,$display=true)
	{
		if(is_array($value))
		{
			foreach($value as $v)
			{
				if(strcmp($v,$testValue)==0) 
				{
					if($display) echo $text;
					else return($text);
					return;
				}	
			}
		}
		else 
		{
			if(strcmp($value,$testValue)==0) 
			{
				if($display) echo $text;
				else return($text);
			}
		}
	}
	
	/**************************************************************************/
	
	static function disabledIf($value,$testValue,$display=true)
	{
		return(self::displayIf($value,$testValue,' disabled ',$display));
	}
	
	/**************************************************************************/

	static function checkedIf($value,$testValue=1,$display=true)
	{
		return(self::displayIf($value,$testValue,' checked ',$display));
	}
	
	/**************************************************************************/
	
	static function selectedIf($value,$testValue=1,$display=true)
	{
		return(self::displayIf($value,$testValue,' selected ',$display));
	}
	
	/**************************************************************************/
	
	static function getMySQLTableName($name)
	{
		global $wpdb;
		return($wpdb->prefix.strtolower(PLUGIN_CBS_CONTEXT).'_'.$name);
	}
		
	/**************************************************************************/

	static function createId($prefix=null)
	{
		return((is_null($prefix) ? null : $prefix.'_').strtoupper(md5(microtime().rand())));
	}
	
	/**************************************************************************/
	
	static function createCSSClassAttribute($class)
	{
		$Validation=new CBSValidation();
		
		if(!is_array($class)) $class=func_get_args();
		
		$class=esc_attr(join(' ',$class));
		
		if($Validation->isNotEmpty($class)) return(' class="'.$class.'"');
		
		return(null);
	}
	
	/**************************************************************************/
	
	static function displayCSSClassAttribute($class)
	{
		if(!is_array($class)) $class=func_get_args();
		
		echo self::createCSSClassAttribute($class);	
	}
	
	/**************************************************************************/
	
	static function getColumnWidth($columnsPerRow,$optionalFields)
	{
		$counts=array_count_values($optionalFields);
		$absentFields=(isset($counts[0]) ? $counts[0] : 0);
		$columnCount=$columnsPerRow-$absentFields;
		return ($columnCount ? floor(100/$columnCount) : 0);
	}
	
	/**************************************************************************/
	
	static function createJSONResponse($response)
	{
		//ob_clean();
		echo json_encode($response);
		die();
	}
	
	/**************************************************************************/
	
	static function preservePost(&$post,&$bPost,$action=1)
	{
		if(!is_object($post)) return;
		
		if($action==1) $bPost=$post;
		else 
		{
			if(!is_object($bPost)) return;
			
			$post=$bPost;
			setup_postdata($post); 
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/