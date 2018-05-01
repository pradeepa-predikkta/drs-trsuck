<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeOption
{
	/**************************************************************************/
	
	static function createOption($refresh=false)
	{
		$GlobalData=new Autospa_ThemeGlobalData();
		return($GlobalData->setGlobalData(AUTOSPA_THEME_OPTION_GLOBAL_ARRAY_KEY,array('Autospa_ThemeOption','createOptionObject'),$refresh));				
	}
	
	/**************************************************************************/
	
	static function createOptionObject()
	{	
		return((array)get_option(AUTOSPA_THEME_OPTION_PREFIX));
	}
	
	/**************************************************************************/
	
	static function refreshOption()
	{
		return(self::createOption(true));
	}
	
	/**************************************************************************/
	
	static function getOption($name)
	{
		global $Autospa_globalData;

		self::createOption();

		if(!array_key_exists($name,$Autospa_globalData[AUTOSPA_THEME_OPTION_GLOBAL_ARRAY_KEY])) return(null);
		return($Autospa_globalData[AUTOSPA_THEME_OPTION_GLOBAL_ARRAY_KEY][$name]);		
	}
	
	/**************************************************************************/
	
	static function getGlobalOption($post,$name,$prefix=null,$emptyValue=false)
	{
		self::createOption();

		if(!is_null($prefix)) $name=$prefix.'_'.$name;

		$value=0;
        if(self::getOptionPrefix($post)=='woocommerce_product')
        {
            $value=self::getOption($name);
        }
        else
        {
            if(is_object($post)) 
            {
                $option=self::getPostMeta($post);
                $Validation=new Autospa_ThemeValidation();

                if(array_key_exists($name,(array)$option)) $value=$option[$name];
                if($value==-1) $value=self::getOption($name);
                elseif(($emptyValue) && ($Validation->isEmpty($value)))
                {
                    $value=self::getOption($name);
                }
            }
            else $value=self::getOption($name);
        }
        
		return($value);
	}
	
	/**************************************************************************/
	
	static function getOptionObject()
	{
		global $Autospa_globalData;
		return($Autospa_globalData[AUTOSPA_THEME_OPTION_GLOBAL_ARRAY_KEY]);
	}
	
	/**************************************************************************/
	
	static function updateOption($option)
	{
		$nOption=array();
		foreach($option as $index=>$value) $nOption[$index]=$value;
		
		$oOption=self::refreshOption();

		update_option(AUTOSPA_THEME_OPTION_PREFIX,array_merge($oOption,$nOption));
		
		self::refreshOption();
	}
	
	/**************************************************************************/
	
	static function resetOption()
	{
		update_option(AUTOSPA_THEME_OPTION_PREFIX,array());
		self::refreshOption();		
	}
	
	/**************************************************************************/
	
	static function getPostMeta($post)
	{
		$id=is_object($post) ? $post->ID : (int)$post;
		
		$meta=get_post_meta($id,AUTOSPA_THEME_OPTION_PREFIX,false);
        
        if(!is_array($meta)) $meta=array();
        if(isset($meta[0])) $meta=$meta[0];
		
		$postType=get_post_type($id);
		
		$Theme=new Autospa_Theme();
		$Post=new Autospa_ThemePost();
		$Page=new Autospa_ThemePage();
        
		$Theme->setPostMetaDefault($meta,'all');

		switch($postType)
		{
			case 'post':
				$Post->setPostMetaDefault($meta);
			break;
			case 'page':
				$Page->setPostMetaDefault($meta);
			break;
		}
		
		return($meta);
	}
	
	/**************************************************************************/
	
	static function getOptionPrefix($post)
	{
        switch(get_post_type($post))
        {
            case 'post':
                
                return('post');
                
            case 'product':
                
                return('woocommerce_product');
                
            default:
                
                return('page');
        }
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/