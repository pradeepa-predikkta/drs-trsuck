<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemePage
{
	/**************************************************************************/

	function __construct()
	{

	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{
        add_meta_box('meta_box_page_general',__('Header Top','autospa'),array($this,'adminCreateMetaBoxPageGeneral'),'page','normal','default');
		add_meta_box('meta_box_page_header_top',__('Header Top','autospa'),array($this,'adminCreateMetaBoxPageHeaderTop'),'page','normal','default');
        add_meta_box('meta_box_page_header_bottom',__('Header Bottom','autospa'),array($this,'adminCreateMetaBoxPageHeaderBottom'),'page','normal','default');
        add_meta_box('meta_box_page_footer',__('Footer','autospa'),array($this,'adminCreateMetaBoxPageFooter'),'page','normal','default');
        
        add_filter('postbox_classes_page_meta_box_page_general',array($this,'adminCreateMetaBoxClass'));
        add_filter('postbox_classes_page_meta_box_page_header_top',array($this,'adminCreateMetaBoxClass'));
        add_filter('postbox_classes_page_meta_box_page_header_bottom',array($this,'adminCreateMetaBoxClass'));
        add_filter('postbox_classes_page_meta_box_page_footer',array($this,'adminCreateMetaBoxClass'));
	}
    
    /**************************************************************************/

    function adminCreateMetaBoxPageGeneral()
    {
 		global $post;

        $WidgetArea=new Autospa_ThemeWidgetArea();
        
		$data=array();
        
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
        
        $data['nonce']=wp_nonce_field('adminSaveMetaBox','autospa_meta_box_noncename',false,false);
				
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['widgetAreaLocation']=$WidgetArea->getWidgetAreaLocationDictionary();
        
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_page_general.php');
		echo $Template->output();	       
    }
    
    /**************************************************************************/
    
 	function adminCreateMetaBoxPageHeaderTop()
	{
		global $post;

        $Menu=new Autospa_ThemeMenu();
        
		$data=array();
        
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
        
        $data['dictionary']['menu']=$Menu->getMenuDictionary(true,true,false);
				
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_page_header_top.php');
		echo $Template->output();		
	}
    
    /**************************************************************************/
    
 	function adminCreateMetaBoxPageHeaderBottom()
	{
		global $post;

		$data=array();
        
        $Background=new Autospa_ThemeBackground();
        $RevolutionSlider=new Autospa_ThemeRevolutionSlider();
        
        $data['dictionary']['backgroundType']=$Background->getDictionary('backgroundType',false);
		$data['dictionary']['backgroundSize']=$Background->getDictionary('backgroundSize',false);
		$data['dictionary']['backgroundClip']=$Background->getDictionary('backgroundClip',false);
		$data['dictionary']['backgroundRepeat']=$Background->getDictionary('backgroundRepeat',false);
		$data['dictionary']['backgroundOrigin']=$Background->getDictionary('backgroundOrigin',false);
		$data['dictionary']['backgroundAttachment']=$Background->getDictionary('backgroundAttachment',false); 
        
        $data['dictionary']['revolutionSlider']=$RevolutionSlider->getSliderDictionary();
	
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
				
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_page_header_bottom.php');
		echo $Template->output();		
	}
    
    /**************************************************************************/
    
 	function adminCreateMetaBoxPageFooter()
	{
		global $post;

        $WidgetArea=new Autospa_ThemeWidgetArea();
        
		$data=array();
        
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
				
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary();
        
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_page_footer.php');
		echo $Template->output();		
	}
    
    
    /**************************************************************************/
    
    function adminCreateMetaBoxClass($class) 
    {
        array_push($class,'to-postbox-1');
        return($class);
    }
    
    /**************************************************************************/
	
	
	function adminCreateMetaBoxPageWidgetArea()
	{
		global $post;
		
		$WidgetArea=new Autospa_ThemeWidgetArea();
		
		$data=array();
	
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary(true,true,false);
		$data['dictionary']['widgetAreaLocation']=$WidgetArea->getWidgetAreaLocationDictionary(true,true,false);
		
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_page_widget_area.php');
		echo $Template->output();			
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta)
	{
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_logo_normal_src','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_logo_normal_width','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_logo_normal_height','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_logo_sticky_src','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_logo_sticky_width','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_logo_sticky_height','');  
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_menu_id','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_social_profile_enable','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_breadcrumb_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_revslider_alias','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_src','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_repat','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_position','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_size_1','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_size_2','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_origin','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_clip','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_background_type_image_attachment','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_footer_widget_area_1','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_footer_widget_area_2','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_footer_widget_area_3','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_widget_area_sidebar','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_widget_area_sidebar_location','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_content_margin_top','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_content_margin_bottom','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_menu_first_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_menu_first_level_item_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_menu_next_level_default_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_menu_next_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_menu_next_level_item_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_menu_first_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_menu_first_level_item_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_menu_next_level_default_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_menu_next_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_menu_next_level_item_hover_state_text_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_icon_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_icon_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_icon_normal_state_border_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_icon_hover_state_border_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_icon_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_icon_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_icon_normal_state_border_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_icon_hover_state_border_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_woocommerce_tooltip_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_woocommerce_tooltip_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_woocommerce_tooltip_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_woocommerce_tooltip_hover_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_woocommerce_tooltip_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_woocommerce_tooltip_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_woocommerce_tooltip_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_woocommerce_tooltip_hover_state_background_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_normal_normal_state_box_shadow_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_top_sticky_normal_state_box_shadow_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'page_header_bottom_normal_state_text_color','');
	}
	
	/**************************************************************************/
	
	function getImageClass()
	{
        global $autospaSidebar;
        
        switch($this->getCurrentTemplate())
        {
            case 'blog-small-image.php':
                
                return('autospa-image-460');
            
            default:
                
                if($autospaSidebar) return('autospa-image-750');
                return('autospa-image-1170');
        }
	}
	
	/**************************************************************************/
	
	function getCurrentTemplate()
	{
		global $autospaParentPost;
		
		if(!is_object($autospaParentPost->post)) return(null);
		
		return(get_post_meta($autospaParentPost->post->ID,'_wp_page_template',true));
	}
	
	/**************************************************************************/
	
	function getCurrentTemplateCSSClass()
	{
		$template=$this->getCurrentTemplate();
		
		$class=array();
		
		$class[]='page-template-'.preg_replace(array('/ /','/\./'),array('-','-'),$template);
		$class[]='page-template-'.preg_replace(array('/ /','/\.php/'),array('-',''),$template);
		
		return($class);
	}
	
	/**************************************************************************/
	
	function getPageDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$data=array();
		
		$page=get_pages(array('hierarchical'=>0));
		
		if($useNone) $data[0]=array(__('- None -','autospa'));
		if($useGlobal) $data[-1]=array(__('- Use global settings -','autospa'));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]','autospa'));

		foreach($page as $pageData)
			$data[$pageData->ID]=array($pageData->post_title);
		
		return($data);
	}
			
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/