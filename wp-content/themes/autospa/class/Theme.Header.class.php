<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeHeader
{
	/**************************************************************************/
	
	function __construct()
	{
    
	}
	
	/**************************************************************************/
	
	function getDictionary($useNone=true,$useGlobal=true,$useLeftUnchanged=false,$type='backgroundType')
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
    
    function createLogo($post,$type='normal')
    {
        $Validation=new Autospa_ThemeValidation();
        
        $html=null;
        $style=array();
        $class=array('theme-page-header-top-logo-'.$type);
        $prefix=Autospa_ThemeOption::getOptionPrefix($post);
        
        $src=Autospa_ThemeOption::getGlobalOption($post,'header_top_logo_'.$type.'_src',$prefix,true);
        
		$width=Autospa_ThemeOption::getGlobalOption($post,'header_top_logo_'.$type.'_width',$prefix,true);
		$height=Autospa_ThemeOption::getGlobalOption($post,'header_top_logo_'.$type.'_height',$prefix,true);
		
        if($Validation->isNotEmpty($width)) $style['max-width']=(int)$width.'px';
		if($Validation->isNotEmpty($height)) $style['max-height']=(int)$height.'px';
        
        if($Validation->isNotEmpty($src))
        {
           $html=
           '
                <a href="'.esc_url(get_home_url()).'" title="'.get_bloginfo('name').'">
                    <img src="'.esc_url($src).'"'.Autospa_ThemeHelper::createClassAttribute($class).Autospa_ThemeHelper::createStyleAttribute($style).' alt="'.esc_attr(get_bloginfo('name')).'"/>
                </a>               
           ';
        }
        else 
        {
            $html=
            '
                <div'.Autospa_ThemeHelper::createClassAttribute($class).Autospa_ThemeHelper::createStyleAttribute($style).'>
                    <h6>
                        <a href="'.esc_url(get_home_url()).'" title="'.get_bloginfo('name').'">
                            '.esc_html(get_bloginfo('name')).'
                        </a>
                    </h6>
                </div>

            ';
        }
            
        return($html);
    }
    
    /**************************************************************************/
    
    function createTitle($post)
    {
        $Validation=new Autospa_ThemeValidation();
        
        $html=null;
        $style=array();
        $prefix=Autospa_ThemeOption::getOptionPrefix($post);

        if(Autospa_ThemeOption::getGlobalOption($post,$prefix.'_header_bottom_enable')!=1) return($html);
        
  		$backgroundType=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type',$prefix);
        
        $title=get_the_title($post);
        
        if($Validation->isNotEmpty($title))
            $title='<h1>'.$title.'</h1>';
        
        if(is_front_page())
        {
            $Page=new Autospa_ThemePage();
            if($Page->getCurrentTemplate()=='') $title=null;
        }
        
        if(function_exists('bcn_display'))
        {
            if(Autospa_ThemeOption::getGlobalOption($post,'header_bottom_breadcrumb_enable',$prefix)==1)
                $title.='<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">'.bcn_display(true).'</div>';
        }
    
		if($backgroundType=='image')
		{
            $style=array();
            
			$backgroundTypeImageSrc=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_src',$prefix,true);
            
			if($Validation->isNotEmpty($backgroundTypeImageSrc))
			{
				$style['background-image']='url(\''.esc_url($backgroundTypeImageSrc).'\')';
				
				$style['background-repeat']=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_repeat',$prefix);
				
				$backgroundTypeImagePosition=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_position',$prefix,true);
                
				if($Validation->isNotEmpty($backgroundTypeImagePosition))
					$style['background-position']=$backgroundTypeImagePosition;
			
				$backgroundTypeImageSize=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_size_1',$prefix);
				if(in_array($backgroundTypeImageSize,array('percentage','length')))
					$style['background-size']=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_size_2',$prefix);
				else $style['background-size']=$backgroundTypeImageSize;
				
				$style['background-origin']=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_origin',$prefix);
				$style['background-clip']=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_clip',$prefix);
				$style['background-attachment']=Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_image_attachment',$prefix);
			}
            
            $html=
            '	
                <div class="theme-page-header-bottom-type-image"'.Autospa_ThemeHelper::createStyleAttribute($style).'><div class="theme-main">'.$title.'</div></div>
            ';
		}
		elseif($backgroundType=='revslider')
		{
			$html=
			'	
				<div class="theme-page-header-bottom-type-revslider">
                    '.do_shortcode('[rev_slider alias="'.Autospa_ThemeOption::getGlobalOption($post,'header_bottom_background_type_revslider_alias',$prefix).'"]').'
                </div>
			';			
		}
        elseif($backgroundType=='none')
        {
            $html=
			'	
				<div class="theme-page-header-bottom-type-none"'.Autospa_ThemeHelper::createStyleAttribute($style).'><div class="theme-main">'.$title.'</div></div>
			';            
        }
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createSocialList($post)
    {
        $html=null;
        
        $Plugin=new Autospa_ThemePlugin();
        
        if($Plugin->isActive('WooCommerce'))
        {
            global $woocommerce;
            $html='<a href="'.get_permalink(wc_get_page_id('cart')).'" class="theme-icon-meta-cart"><span>'.(int)$woocommerce->cart->cart_contents_count.'</span><span></span></a>';            
        }
        
        $html=
        '
            <div>'.Autospa_ThemePlugin::doShortcode('Vc_Manager','[vc_autospa_theme_social_profile_list use_data_from_theme_option="1"][/vc_autospa_theme_social_profile_list]').'</div>
            '.$html.'
            <a href="#" class="theme-icon-meta-search"></a>
            <a href="#" class="theme-icon-meta-menu"></a>
        ';
        
        $prefix=Autospa_ThemeOption::getOptionPrefix($post);
        
        if(!Autospa_ThemeOption::getGlobalOption($post,$prefix.'_header_top_social_list_enable')!=1) return($html);
        
        return($html);
    }
    
	/**************************************************************************/
	
	function create($post)
	{
		$htmlTop=array(null,array(null,null),null);
		
		$Menu=new Autospa_ThemeMenu();
		$Validation=new Autospa_ThemeValidation();
        
        $prefix=Autospa_ThemeOption::getOptionPrefix($post);
		
		/***/
        
        if(Autospa_ThemeOption::getGlobalOption($post,$prefix.'_header_top_enable')==1)
        {
            $htmlTop[0]=$this->createLogo($post,'normal').$this->createLogo($post,'sticky');
        }
        
        if(Autospa_ThemeOption::getGlobalOption($post,$prefix.'_header_top_enable')==1)
        {
            $htmlTop[1]=$Menu->create();
        }
        
        if(Autospa_ThemeOption::getGlobalOption($post,$prefix.'_header_top_enable')==1)
        {
            if(Autospa_ThemeOption::getGlobalOption($post,$prefix.'_header_top_social_profile_enable')==1)
            {
                $htmlTop[2]=$this->createSocialList($post);
            }
        }
        
        $html=
        '
            <div class="theme-page-header-top theme-clear-fix">
                <div class="theme-page-header-top-logo">
                    '.$htmlTop[0].'
                </div>
                <div class="theme-page-header-top-menu theme-page-header-top-menu-default">
                    '.$htmlTop[1][0].'
                </div>
                <div class="theme-page-header-top-menu theme-page-header-top-menu-responsive">
                    '.$htmlTop[1][1].'
                </div>
                <div class="theme-page-header-top-social-list">
                    '.$htmlTop[2].'
                </div>
            </div>
            <div class="theme-page-header-bottom theme-clear-fix">
                '.$this->createTitle($post).'
            </div>
        ';
       
		/***/
	
		return
		'
			<div class="theme-page-header">
				'.$html.'
			</div>				
		';
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/