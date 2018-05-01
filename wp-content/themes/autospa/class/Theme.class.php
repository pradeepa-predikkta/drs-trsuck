<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_Theme
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->themeDefaultOption=array
		(
			'blog_category_post_id'												=>	'0',
			'blog_archive_post_id'												=>	'0',
			'blog_search_post_id'												=>	'0',
			'blog_author_post_id'												=>	'0',
			'blog_sort_field'													=>	'post_date',
			'blog_sort_direction'												=>	'desc',		
			'blog_automatic_excerpt_length_1'									=>	'60',
			'blog_automatic_excerpt_length_2'									=>	'30',
			'page_404_page_id'													=>	'0',
			'logo_normal_src'													=>	'',
			'logo_normal_width'													=>	'',
			'logo_normal_height'												=>	'',
			'logo_sticky_src'													=>	'',
			'logo_sticky_width'													=>	'',
			'logo_sticky_height'												=>	'',
			'menu_animation_enable'												=>	'1',
			'menu_animation_speed_open'											=>	'200',
			'menu_animation_speed_close'										=>	'0',
			'menu_animation_delay'												=>	'0',
			'comment_automatic_excerpt_length'									=>	'25',
			'custom_js_code'													=>	'',
			'right_click_enable'												=>	'1',
			'copy_selection_enable'												=>	'1',
			'go_to_page_top_enable'												=>	'1',
			'go_to_page_top_hash'												=>	'up',
			'go_to_page_top_animation_enable'									=>	'1',
			'go_to_page_top_animation_duration'									=>	'500',
			'go_to_page_top_animation_easing'									=>	'easeInOutCubic',
			'page_widget_area_sidebar'											=>	'0',
			'page_widget_area_sidebar_location'									=>	'0',
            'page_header_top_enable'                                            =>  '1',
            'page_header_top_sticky_enable'                                     =>  '1',
            'page_header_top_logo_normal_src'                                   =>  '',
            'page_header_top_logo_normal_width'                                 =>  '185',
            'page_header_top_logo_normal_height'                                =>  '',
            'page_header_top_logo_sticky_src'                                   =>  '',
            'page_header_top_logo_sticky_width'                                 =>  '185',
            'page_header_top_logo_sticky_height'                                =>  '',
            'page_header_top_menu_id'                                           =>  '',
            'page_header_top_social_profile_enable'                             =>  '1',
            'page_header_bottom_enable'                                         =>  '1',
            'page_header_bottom_breadcrumb_enable'                              =>  '1',
            'page_header_bottom_background_type'                                =>  'image',
            'page_header_bottom_background_type_revslider_alias'                =>  '',
            'page_header_bottom_background_type_image_src'                      =>  '',
            'page_header_bottom_background_type_image_repeat'                   =>  'no-repeat',
            'page_header_bottom_background_type_image_position'                 =>  'center center',
            'page_header_bottom_background_type_image_size_1'                   =>  'cover',
            'page_header_bottom_background_type_image_size_2'                   =>  '',
            'page_header_bottom_background_type_image_origin'                   =>  'padding-box',
            'page_header_bottom_background_type_image_clip'                     =>  'border-box',
            'page_header_bottom_background_type_image_attachment'               =>  'scroll',
            'page_footer_widget_area_1'                                         =>  '0',
            'page_footer_widget_area_2'                                         =>  '0',
            'page_footer_widget_area_3'                                         =>  '0',
			'post_widget_area_sidebar'											=>	'0',
			'post_widget_area_sidebar_location'									=>	'2',
            'post_header_top_enable'                                            =>  '1',
            'post_header_top_sticky_enable'                                     =>  '1',
            'post_header_top_logo_normal_src'                                   =>  '',
            'post_header_top_logo_normal_width'                                 =>  '185',
            'post_header_top_logo_normal_height'                                =>  '',
            'post_header_top_logo_sticky_src'                                   =>  '',
            'post_header_top_logo_sticky_width'                                 =>  '185',
            'post_header_top_logo_sticky_height'                                =>  '',
            'post_header_top_menu_id'                                           =>  '',
            'post_header_top_social_profile_enable'                             =>  '1',
            'post_header_bottom_enable'                                         =>  '1',
            'post_header_bottom_breadcrumb_enable'                              =>  '1',
            'post_header_bottom_background_type'                                =>  'image',
            'post_header_bottom_background_type_revslider_alias'                =>  '',
            'post_header_bottom_background_type_image_src'                      =>  '',
            'post_header_bottom_background_type_image_repeat'                   =>  'no-repeat',
            'post_header_bottom_background_type_image_position'                 =>  'center center',
            'post_header_bottom_background_type_image_size_1'                   =>  'cover',
            'post_header_bottom_background_type_image_size_2'                   =>  '',
            'post_header_bottom_background_type_image_origin'                   =>  'padding-box',
            'post_header_bottom_background_type_image_clip'                     =>  'border-box',
            'post_header_bottom_background_type_image_attachment'               =>  'scroll',
            'post_footer_widget_area_1'                                         =>  '0',
            'post_footer_widget_area_2'                                         =>  '0',
            'post_footer_widget_area_3'                                         =>  '0',   
			'woocommerce_product_widget_area_sidebar'							=>	'0',
			'woocommerce_product_widget_area_sidebar_location'					=>	'2',
            'woocommerce_product_header_top_enable'                             =>  '1',
            'woocommerce_product_header_top_sticky_enable'                      =>  '1',
            'woocommerce_product_header_top_logo_normal_src'                    =>  '',
            'woocommerce_product_header_top_logo_normal_width'                  =>  '185',
            'woocommerce_product_header_top_logo_normal_height'                 =>  '',
            'woocommerce_product_header_top_logo_sticky_src'                    =>  '',
            'woocommerce_product_header_top_logo_sticky_width'                  =>  '185',
            'woocommerce_product_header_top_logo_sticky_height'                 =>  '',
            'woocommerce_product_header_top_menu_id'                            =>  '',
            'woocommerce_product_header_top_social_profile_enable'              =>  '1',
            'woocommerce_product_header_bottom_enable'                          =>  '1',
            'woocommerce_product_header_bottom_breadcrumb_enable'               =>  '1',
            'woocommerce_product_header_bottom_background_type'                 =>  'image',
            'woocommerce_product_header_bottom_background_type_revslider_alias' =>  '',
            'woocommerce_product_header_bottom_background_type_image_src'       =>  '',
            'woocommerce_product_header_bottom_background_type_image_repeat'    =>  'no-repeat',
            'woocommerce_product_header_bottom_background_type_image_position'  =>  'center center',
            'woocommerce_product_header_bottom_background_type_image_size_1'    =>  'cover',
            'woocommerce_product_header_bottom_background_type_image_size_2'    =>  '',
            'woocommerce_product_header_bottom_background_type_image_origin'    =>  'padding-box',
            'woocommerce_product_header_bottom_background_type_image_clip'      =>  'border-box',
            'woocommerce_product_header_bottom_background_type_image_attachment'=>  'scroll',
            'woocommerce_product_footer_widget_area_1'                          =>  '0',
            'woocommerce_product_footer_widget_area_2'                          =>  '0',
            'woocommerce_product_footer_widget_area_3'                          =>  '0',
			'fancybox_image_padding'											=>	'10',
			'fancybox_image_margin'												=>	'20',
			'fancybox_image_min_width'											=>	'100',
			'fancybox_image_min_height'											=>	'100',
			'fancybox_image_max_width'											=>	'9999',
			'fancybox_image_max_height'											=>	'9999',
			'fancybox_image_helper_button_enable'								=>	'1',
			'fancybox_image_autoresize'											=>	'1',
			'fancybox_image_autocenter'											=>	'1',
			'fancybox_image_fittoview'											=>	'1',
			'fancybox_image_arrow'												=>	'1',
			'fancybox_image_close_button'										=>	'1',
			'fancybox_image_close_click'										=>	'0',
			'fancybox_image_next_click'											=>	'0',
			'fancybox_image_mouse_wheel'										=>	'1',
			'fancybox_image_autoplay'											=>	'0',
			'fancybox_image_loop'												=>	'1',
			'fancybox_image_playspeed'											=>	'3000',
			'fancybox_image_animation_effect_open'								=>	'fade',
			'fancybox_image_animation_effect_close'								=>	'fade',
			'fancybox_image_animation_effect_next'								=>	'elastic',
			'fancybox_image_animation_effect_previous'							=>	'elastic',
			'fancybox_image_easing_open'										=>	'easeInQuad',
			'fancybox_image_easing_close'										=>	'easeInQuad',
			'fancybox_image_easing_next'										=>	'easeInQuad',
			'fancybox_image_easing_previous'									=>	'easeInQuad',
			'fancybox_image_speed_open'											=>	'250',
			'fancybox_image_speed_close'										=>	'250',
			'fancybox_image_speed_next'											=>	'250',
			'fancybox_image_speed_previous'										=>	'250',
			'maintenance_mode_enable'											=>	'0',
			'maintenance_mode_post_id'											=>	'0',
			'maintenance_mode_user_id'											=>	'0',
			'maintenance_mode_ip_address'										=>	'',
			'install'															=>	'1',	
		);
		
		$SocialProfile=new Autospa_ThemeSocialProfile();
		foreach($SocialProfile->socialProfile as $index=>$value)
		{
			$this->themeDefaultOption['social_profile_order_'.$index]=$value[3];
			$this->themeDefaultOption['social_profile_address_'.$index]=$value[2];
		}
        
        $Post=new Autospa_ThemePost();
        foreach($Post->element as $index=>$value)
            $this->themeDefaultOption['post_'.$index.'_enable']=1;
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
		$Skin=new Autospa_ThemeSkin();
		
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	AUTOSPA_THEME_URL_SCRIPT,
				'file'															=>	'',
				'in_footer'														=>	true,				
				'dependencies'													=>	array('jquery')
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	AUTOSPA_THEME_URL_STYLE,
				'file'															=>	'',
				'dependencies'													=>	array()
			)			
		);
		
		$this->library=array
		(
			'script'															=>	array
			(
				'jquery-ui-core'												=>	array
				(
                    'use'                                                       =>	3,
					'path'														=>	''
				),
				'jquery-ui-button'												=>	array
				(
					'path'														=>	'',
					'dependencies'												=>	array('jquery')
				),
				'jquery-ui-slider'												=>	array
				(
					'path'														=>	'',
					'dependencies'												=>	array('jquery')
				),
				'jquery-ui-tabs'												=>	array
				(
                    'use'														=>	3,
					'path'														=>	'',
					'dependencies'												=>	array('jquery')
				),
				'jquery-ui-accordion'											=>	array
				(
                    'use'														=>	2,
					'path'														=>	'',
					'dependencies'												=>	array('jquery')
				),
				'jquery-ui-autocomplete'										=>	array
				(
					'path'														=>	'',
					'dependencies'												=>	array('jquery')
				),
				'jquery-ui-selectmenu'  										=>	array
				(
                    'use'														=>	3,
					'path'														=>	'',
					'dependencies'												=>	array('jquery')
				),
				'jquery-bbq'													=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.bbq.min.js'
				),
				'jquery-easing'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.easing.js'
				),	
				'jquery-scrollTo'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.scrollTo.min.js'
				),	
				'jquery-mousewheel'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.mousewheel.js'
				),	
				'jquery-blockUI'												=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.blockUI.js'
				),
				'jquery-qtip'													=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.qtip.min.js'
				),
 				'jquery-countdown'                                              =>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.countdown.min.js'
				),
				'jquery-dropkick'												=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.dropkick.min.js'
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.js'
				),
				'jquery-infieldlabel'											=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.infieldlabel.min.js'
				),
				'jquery-caroufredsel'											=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.carouFredSel.packed.js'
				),
				'jquery-actual'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.actual.min.js'
				),
				'jquery-fancybox'                                               =>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox.js'
				),
				'jquery-fancybox-media'                                         =>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox-media.js'
				),                
				'jquery-fancybox-buttons'                                       =>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox-buttons.js'
				),                
				'jquery-fancybox-launch'                                        =>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox.launch.js'
				),
				'jquery-responsiveTable'                                        =>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.responsiveTable.js'
				),   
				'jquery-isotope'                                                =>	array
				(
					'use'														=>	2,
					'file'														=>	'isotope.pkgd.min.js'
				),    
				'jquery-gallery-masonry'                                        =>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.galleryMasonry.js'
				),  
				'jquery-windowDimensionListener'								=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.windowDimensionListener.js'
				),				
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.js'
				),
				'jquery-themeOptionElement'										=>	array
				(
					'file'														=>	'jquery.themeOptionElement.js'
				),
				'superfish'														=>	array
				(
					'use'														=>	2,
					'file'														=>	'superfish.js'
				),
				'jquery-waypoint'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.waypoints.min.js'
				),
				'jquery-responsiveElement'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.responsiveElement.js'
				),
				'autospa-comment'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.comment.js'
				),
				'autospa-header'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.header.js'
				),		
				'autospa-helper'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'Theme.Helper.class.js'
				),
				'autospa-public'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'public.js'
				),
				'autospa-admin'													=>	array
				(
					'file'														=>	'admin.js'
				)	
			),
			'style'																=>	array
			(
				'jquery-ui'														=>	array
				(
                    'use'                                                       =>  3,
					'file'														=>	'jquery.ui.min.css',
				),
				'google-font-admin'												=>	array
				(
					'path'														=>	'', 
					'file'														=>	add_query_arg(array('family'=>urlencode('Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i'),'subset'=>'cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese'),'//fonts.googleapis.com/css')
				),
				'google-font-public'											=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'path'														=>	'',
					'file'														=>	add_query_arg(array('family'=>urlencode('Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Lora:400,400i,700,700i|Playfair Display:400,400i,700,700i,900,900i'),'subset'=>'cyrillic,latin-ext'),'//fonts.googleapis.com/css'),
				),					
				'jquery-dropkick'												=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.dropkick.css',
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.css',
				),	
				'jquery-qtip'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.qtip.min.css',
				),
				'jquery-fancybox'                                               =>	array
				(
					'use'														=>	2,
					'file'														=>	'fancybox/jquery.fancybox.css',
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.css',
				),
				'jquery-themeOption-overwrite'									=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css',
				),	
				'autospa-admin'													=>	array
				(
					'file'														=>	'admin.css',
				),				
				'tf-frontend'													=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'TF.Frontend.css',
				),	
				'ts-frontend'													=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'TS.Frontend.css'
				),	
				'autospa-style'													=>	array
				(
					'use'														=>	2,
					'path'														=>	null,
					'file'														=>	get_stylesheet_uri(),
				),
				'autospa-woocommerce'											=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'woocommerce.css',
				),	
				'autospa-skin-style'											=>	array
				(
					'use'														=>	2,
					'path'														=>	null,
					'file'														=>	AUTOSPA_THEME_URL_CONFIG.$Skin->getSkin().'/style.css',
				),	
				'autospa-style-custom'											=>	array
				(
					'use'														=>	2,
					'path'														=>	AUTOSPA_THEME_URL_MULTISITE_SITE_STYLE,
					'file'														=>	'style.css',
				)
			)
		);
		
		foreach($this->library as $libraryType=>$libraryTypeData)
		{
			$library=array_keys($libraryTypeData);
			
			foreach($library as $libraryName)
				$this->library[$libraryType][$libraryName]=array_merge($this->libraryDefault[$libraryType],$this->library[$libraryType][$libraryName]);
		}
	}
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
		foreach($this->library[$type] as $index=>$data)
		{
			if(!$data['inc']) continue;
			
			if($data['use']!=3)
			{
				if($data['use']!=$use) continue;
			}
			
			if($type=='script')
			{
				wp_enqueue_script($index,$data['path'].$data['file'],$data['dependencies'],false,$data['in_footer']);
			}
			else 
			{
				wp_enqueue_style($index,$data['path'].$data['file'],$data['dependencies'],false);
			}
		}
	}

	/**************************************************************************/
	
	function includeLibrary($test,$script=array(),$style=array())
	{
		if($test!=1) return;

		foreach((array)$script as $value)
		{
			if(array_key_exists($value,$this->library['script']))
				$this->library['script'][$value]['inc']=true;
		}
		foreach((array)$style as $value)
		{
			if(array_key_exists($value,$this->library['style']))
				$this->library['style'][$value]['inc']=true;	
		}
	}
	
	/**************************************************************************/

	function adminInit()
	{
		$this->prepareLibrary();
        
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
	
	/**************************************************************************/
	
	function adminPrintScript()
	{

	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_action('admin_print_scripts',array($this,'adminPrintScript'));
		add_theme_page(__('Theme Options','autospa'),__('Theme Options','autospa'),'edit_theme_options','ThemeOptions',array($this,'adminOptionPanelCreate'));
	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{

	}
	
	/**************************************************************************/
	
	function adminSaveMetaBox($postId)
	{		
		if($_POST)
		{
			if(Autospa_ThemeHelper::checkSavePost($postId,'autospa_meta_box_noncename','adminSaveMetaBox')===false) return(false);

			$option=Autospa_ThemeHelper::getPostOption();
            
			update_post_meta($postId,AUTOSPA_THEME_OPTION_PREFIX,$option);
		}		
	}

	/**************************************************************************/
	
	function adminOptionPanelCreate()
	{
		wp_enqueue_media();
		
		$data=array();
		
		$CSS=new Autospa_ThemeCSS();
		$Menu=new Autospa_ThemeMenu();
		$Page=new Autospa_ThemePage();
        $Post=new Autospa_ThemePost();
		$Blog=new Autospa_ThemeBlog();
		$Easing=new Autospa_ThemeEasing();
		$Fancybox=new Autospa_ThemeFancybox();
		$WidgetArea=new Autospa_ThemeWidgetArea();
		$Background=new Autospa_ThemeBackground();
		$SocialProfile=new Autospa_ThemeSocialProfile();
        $ResponsiveMode=new Autospa_ThemeResponsiveMode();
		$RevolutionSlider=new Autospa_ThemeRevolutionSlider();
		
		$data['option']=Autospa_ThemeOption::getOptionObject();
				
		$data['dictionary']['easingType']=$Easing->easingType;
		$data['dictionary']['fancyboxTransitionType']=$Fancybox->transitionType;
		
		$data['dictionary']['fontStyle']=$CSS->fontStyle;
		$data['dictionary']['fontWeight']=$CSS->fontWeight;
		
		$data['dictionary']['page']=$Page->getPageDictionary(false,false,false);
		
		$data['dictionary']['sortDirection']=$Blog->sortDirection;
		$data['dictionary']['sortPostBlogField']=$Blog->sortPostBlogField;

		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary(true,false,false);
		$data['dictionary']['widgetAreaLocation']=$WidgetArea->getWidgetAreaLocationDictionary(true,false,false);
		
		$data['dictionary']['menu']=$Menu->getMenuDictionary(true,false,false);
		
        $data['dictionary']['backgroundType']=$Background->getDictionary('backgroundType',false,false,false);
		$data['dictionary']['backgroundSize']=$Background->getDictionary('backgroundSize',false,false,false);
		$data['dictionary']['backgroundClip']=$Background->getDictionary('backgroundClip',false,false,false);
		$data['dictionary']['backgroundRepeat']=$Background->getDictionary('backgroundRepeat',false,false,false);
		$data['dictionary']['backgroundOrigin']=$Background->getDictionary('backgroundOrigin',false,false,false);
		$data['dictionary']['backgroundAttachment']=$Background->getDictionary('backgroundAttachment',false,false,false);
		
		$data['dictionary']['responsive']=$ResponsiveMode->getDictionary(false,false,false);
		$data['dictionary']['responsiveMedia']=$ResponsiveMode->getMedia();
		
        $data['dictionary']['revolutionSlider']=$RevolutionSlider->getSliderDictionary();
        
		$data['dictionary']['responsiveMedia']=$ResponsiveMode->getMedia();
		
		$data['dictionary']['socialProfile']=$SocialProfile->socialProfile;
		
		$data['dictionary']['user']=get_users();
        
        $data['dictionary']['postElement']=$Post->element;
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/admin.php');
		echo $Template->output();			
	}
	
	/**************************************************************************/

	function setupTheme()
	{	
		global $content_width;
		if(!isset($content_width)) $content_width=1180;
		
		/***/
		
        $Blog=new Autospa_ThemeBlog();
		$Post=new Autospa_ThemePost();
		$Page=new Autospa_ThemePage();
		$Image=new Autospa_ThemeImage();
        $Comment=new Autospa_ThemeComment();
		$WidgetArea=new Autospa_ThemeWidgetArea();
        $WooCommerce=new Autospa_ThemeWooCommerce();
        $VisualComposer=new Autospa_ThemeVisualComposer();
		$MaintenanceMode=new Autospa_ThemeMaintenanceMode();
        $RevolutionSlider=new Autospa_ThemeRevolutionSlider();        
        
        $WidgetMenuList=new Autospa_ThemeWidgetMenuList();
        $WidgetPostRecent=new Autospa_ThemeWidgetPostRecent();
        $WidgetCallToAction=new Autospa_ThemeWidgetCallToAction();
        $WidgetPostMostComment=new Autospa_ThemeWidgetPostMostComment();
        
		/***/
		
		$Image->register();
		$WidgetArea->register();
        
        $WidgetMenuList->register();
        $WidgetPostRecent->register();
        $WidgetCallToAction->register();
        $WidgetPostMostComment->register();
        
        $VisualComposer->init();
        $RevolutionSlider->init();
        
		$WooCommerce->addFilter();
		$WooCommerce->addAction();
        
        /***/
		
		add_theme_support('menus');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails'); 
		add_theme_support('automatic-feed-links');
		
		add_theme_support('custom-header');
		add_theme_support('custom-background');
        
        add_theme_support('woocommerce');
        
		/***/
		
		if(function_exists('register_nav_menu')) register_nav_menu('header_top_menu','Top header menu');
		
		/***/
		
		add_filter('the_password_form',array($this,'passwordForm'));
		add_filter('image_size_names_choose',array($Image,'addImageSupport'));
        
		add_filter('excerpt_more',array($Blog,'filterExcerptMore'));
		add_filter('excerpt_length',array($Blog,'automaticExcerptLength'),999);
        
        add_filter('wpcf7_form_elements',array($this,'wpcf7FormElements'));

		/***/
		
		add_editor_style('editor-style.css');
		
		/***/
		
		add_action('save_post',array($this,'adminSaveMetaBox'));
		add_action('save_post',array($this,'adminSaveMetaBox'));
		add_action('add_meta_boxes',array($Page,'adminInitMetaBox'));
		add_action('add_meta_boxes',array($Post,'adminInitMetaBox'));
		add_action('add_meta_boxes',array($this,'adminInitMetaBox'));
		
		add_action('wp_ajax_comment_add',array($Comment,'addComment'));
		add_action('wp_ajax_nopriv_comment_add',array($Comment,'addComment'));
		add_action('wp_ajax_comment_get',array($Comment,'getComment'));
		add_action('wp_ajax_nopriv_comment_get',array($Comment,'getComment'));
		
		add_action('tgmpa_register',array($this,'addPlugin'));
		
		add_action('admin_notices',array($this,'adminNotice'));
		
		add_action('init',array($MaintenanceMode,'init'));
        
        add_action('wp_head',array($this,'addHeadCSSStyle'));
        
        add_action('init',array($this,'addMediaTaxonomy'));
        
		/***/

		load_theme_textdomain('autospa',AUTOSPA_THEME_PATH.'languages/');

		/***/
		
		$install=(int)Autospa_ThemeOption::getOption('install');
		if($install==1) return;
		
		$option=$this->themeDefaultOption;
		
		$ResponsiveMode=new Autospa_ThemeResponsiveMode();
		
		$media=$ResponsiveMode->getMedia();
		foreach($media as $index=>$value)
			$option['custom_css_responsive_'.$index]='';
		
		$optionCurrent=Autospa_ThemeOption::getOptionObject();
		
		$optionSave=array();
		foreach($option as $index=>$value)
		{
			if(!array_key_exists($index,$optionCurrent))
				$optionSave[$index]=$value;
		}
		
		$optionSave=array_merge((array)$optionSave,$optionCurrent);
		foreach($optionSave as $index=>$value)
		{
			if(!array_key_exists($index,$option))
				unset($optionSave[$index]);
		}

		$optionSave['install']=1;

		Autospa_ThemeOption::resetOption();
		Autospa_ThemeOption::updateOption($optionSave);
		
		$this->createCSSFile();
		
		/***/
		
		$argument=array
		(
			'post_type'							=>	array('post','page'),
			'post_status'						=>	'any',
			'posts_per_page'					=>	-1
		);
		
		$query=new WP_Query($argument);		
		if($query===false) return;

		foreach($query->posts as $value)
		{
			$meta=Autospa_ThemeOption::getPostMeta($value);
			if(is_array($meta)) continue;		
			
			update_post_meta($value->ID,AUTOSPA_THEME_OPTION_PREFIX,$meta);
		}
	}
	
	/**************************************************************************/
	
	function switchTheme()
	{
		Autospa_ThemeOption::updateOption(array('install'=>0));
	}
	
	/**************************************************************************/
	
	function adminOptionPanelSave()
	{
		$option=Autospa_ThemeHelper::getPostOption();
	
		Autospa_ThemeHelper::removeUIndex($option,'maintenance_mode_user_id');

		$response=array('global'=>array('error'=>1));
		
		$Blog=new Autospa_ThemeBlog();
		$Header=new Autospa_ThemeHeader();
		$Notice=new Autospa_ThemeNotice();
		$Easing=new Autospa_ThemeEasing();
		$FancyBox=new Autospa_ThemeFancybox();
		$Background=new Autospa_ThemeBackground();
		$Validation=new Autospa_ThemeValidation($Notice);
		$ResponsiveMode=new Autospa_ThemeResponsiveMode();
		
		$invalidValue=esc_html__('Invalid value','autospa');
		
		/* General settings / Blog */
		if(!in_array($option['blog_sort_field'],array_keys($Blog->sortPostBlogField)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('blog_sort_field',false),$invalidValue);		
		if(!in_array($option['blog_sort_direction'],array_keys($Blog->sortDirection)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('blog_sort_direction',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['blog_automatic_excerpt_length_1'],0,999),array(Autospa_ThemeHelper::getFormName('blog_automatic_excerpt_length_1',false),$invalidValue));
		$Validation->notice('isNumber',array($option['blog_automatic_excerpt_length_2'],0,999),array(Autospa_ThemeHelper::getFormName('blog_automatic_excerpt_length_2',false),$invalidValue));
		
		/* General settings / Page */
		
		/* General settings / Logo */
		$Validation->notice('isNumber',array($option['logo_normal_width'],0,9999,true),array(Autospa_ThemeHelper::getFormName('logo_normal_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['logo_normal_height'],0,9999,true),array(Autospa_ThemeHelper::getFormName('logo_normal_height',false),$invalidValue));
		$Validation->notice('isNumber',array($option['logo_sticky_width'],0,9999,true),array(Autospa_ThemeHelper::getFormName('logo_sticky_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['logo_sticky_height'],0,9999,true),array(Autospa_ThemeHelper::getFormName('logo_sticky_height',false),$invalidValue));
		
		/* General settings / Menu */
		$Validation->notice('isNumber',array($option['menu_animation_enable'],0,1),array(Autospa_ThemeHelper::getFormName('menu_animation_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_speed_open'],0,99999),array(Autospa_ThemeHelper::getFormName('menu_animation_speed_open',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_speed_close'],0,99999),array(Autospa_ThemeHelper::getFormName('menu_animation_speed_close',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_delay'],0,99999),array(Autospa_ThemeHelper::getFormName('menu_animation_delay',false),$invalidValue));
		
		/* General settings / Comment */
		$Validation->notice('isNumber',array($option['comment_automatic_excerpt_length'],0,999),array(Autospa_ThemeHelper::getFormName('comment_automatic_excerpt_length',false),$invalidValue));
		
		/* General settings / Social profiles */
		
		/* General settings / Custom JS code */
		
		/* General settings / Content copying */
		$Validation->notice('isNumber',array($option['right_click_enable'],0,1),array(Autospa_ThemeHelper::getFormName('right_click_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['copy_selection_enable'],0,1),array(Autospa_ThemeHelper::getFormName('copy_selection_enable',false),$invalidValue));
		
		/* General settings / Go to top of page */
		$Validation->notice('isNumber',array($option['go_to_page_top_enable'],0,1),array(Autospa_ThemeHelper::getFormName('go_to_page_top_enable',false),$invalidValue));
		$Validation->notice('isNotEmpty',array($option['go_to_page_top_hash']),array(Autospa_ThemeHelper::getFormName('go_to_page_top_hash',false),$invalidValue));
		$Validation->notice('isNumber',array($option['go_to_page_top_animation_enable'],0,1),array(Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['go_to_page_top_animation_duration'],0,99999),array(Autospa_ThemeHelper::getFormName('go_to_page_top_animation_duration',false),$invalidValue));
		if(!in_array($option['go_to_page_top_animation_easing'],array_keys($Easing->easingType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('go_to_page_top_animation_easing',false),$invalidValue);			

        /* Page */
        $Validation->notice('isNumber',array($option['page_widget_area_sidebar_location'],0,2),array(Autospa_ThemeHelper::getFormName('page_widget_area_sidebar_location',false),$invalidValue));
        $Validation->notice('isNumber',array($option['page_header_top_enable'],0,1),array(Autospa_ThemeHelper::getFormName('page_header_top_enable',false),$invalidValue));
        $Validation->notice('isNumber',array($option['page_header_top_sticky_enable'],0,1),array(Autospa_ThemeHelper::getFormName('page_header_top_sticky_enable',false),$invalidValue));
        $Validation->notice('isNumber',array($option['page_header_top_logo_normal_width'],0,9999,true),array(Autospa_ThemeHelper::getFormName('page_header_top_logo_normal_width',false),$invalidValue));
        $Validation->notice('isNumber',array($option['page_header_top_logo_normal_height'],0,9999,true),array(Autospa_ThemeHelper::getFormName('page_header_top_logo_normal_height',false),$invalidValue));
        $Validation->notice('isNumber',array($option['page_header_top_social_profile_enable'],0,1),array(Autospa_ThemeHelper::getFormName('page_header_top_social_profile_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['page_header_bottom_enable'],0,1),array(Autospa_ThemeHelper::getFormName('page_header_bottom_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['page_header_bottom_breadcrumb_enable'],0,1),array(Autospa_ThemeHelper::getFormName('page_header_bottom_breadcrumb_enable',false),$invalidValue));
        if(!in_array($option['page_header_bottom_background_type'],array_keys($Background->backgroundType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('page_header_bottom_background_type',false),$invalidValue);			
		if(!in_array($option['page_header_bottom_background_type_image_repeat'],array_keys($Background->backgroundRepeat)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('page_header_bottom_background_type_image_repeat',false),$invalidValue);	
		if(!in_array($option['page_header_bottom_background_type_image_size_1'],array_keys($Background->backgroundSize)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('page_header_bottom_background_type_image_size_1',false),$invalidValue);	        
 		if(!in_array($option['page_header_bottom_background_type_image_origin'],array_keys($Background->backgroundOrigin)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('page_header_bottom_background_type_image_origin',false),$invalidValue);	
 		if(!in_array($option['page_header_bottom_background_type_image_clip'],array_keys($Background->backgroundClip)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('page_header_bottom_background_type_image_clip',false),$invalidValue);	
 		if(!in_array($option['page_header_bottom_background_type_image_attachment'],array_keys($Background->backgroundAttachment)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('page_header_bottom_background_type_image_attachment',false),$invalidValue);	
        
        /* Post */
        $Validation->notice('isNumber',array($option['post_widget_area_sidebar_location'],0,2),array(Autospa_ThemeHelper::getFormName('post_widget_area_sidebar_location',false),$invalidValue));
        $Validation->notice('isNumber',array($option['post_header_top_enable'],0,1),array(Autospa_ThemeHelper::getFormName('post_header_top_enable',false),$invalidValue));
        $Validation->notice('isNumber',array($option['post_header_top_sticky_enable'],0,1),array(Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable',false),$invalidValue));
        $Validation->notice('isNumber',array($option['post_header_top_logo_normal_width'],0,9999,true),array(Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_width',false),$invalidValue));
        $Validation->notice('isNumber',array($option['post_header_top_logo_normal_height'],0,9999,true),array(Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_height',false),$invalidValue));
        $Validation->notice('isNumber',array($option['post_header_top_social_profile_enable'],0,1),array(Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable',false),$invalidValue));
        $Validation->notice('isNumber',array($option['post_header_bottom_enable'],0,1),array(Autospa_ThemeHelper::getFormName('post_header_bottom_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_header_bottom_breadcrumb_enable'],0,1),array(Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable',false),$invalidValue));
        if(!in_array($option['post_header_bottom_background_type'],array_keys($Background->backgroundType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('post_header_bottom_background_type',false),$invalidValue);			
		if(!in_array($option['post_header_bottom_background_type_image_repeat'],array_keys($Background->backgroundRepeat)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_repeat',false),$invalidValue);	
		if(!in_array($option['post_header_bottom_background_type_image_size_1'],array_keys($Background->backgroundSize)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_size_1',false),$invalidValue);	        
 		if(!in_array($option['post_header_bottom_background_type_image_origin'],array_keys($Background->backgroundOrigin)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_origin',false),$invalidValue);	
 		if(!in_array($option['post_header_bottom_background_type_image_clip'],array_keys($Background->backgroundClip)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_clip',false),$invalidValue);	
 		if(!in_array($option['post_header_bottom_background_type_image_attachment'],array_keys($Background->backgroundAttachment)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_attachment',false),$invalidValue);	
        
        if(Autospa_ThemePlugin::isActive('wooCommerce'))
        {
            $Validation->notice('isNumber',array($option['woocommerce_product_widget_area_sidebar_location'],0,2),array(Autospa_ThemeHelper::getFormName('woocommerce_product_widget_area_sidebar_location',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_top_enable'],0,1),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_top_enable',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_top_sticky_enable'],0,1),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_top_sticky_enable',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_top_logo_normal_width'],0,9999,true),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_top_logo_normal_width',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_top_logo_normal_height'],0,9999,true),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_top_logo_normal_height',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_top_social_profile_enable'],0,1),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_top_social_profile_enable',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_bottom_enable'],0,1),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_enable',false),$invalidValue));
            $Validation->notice('isNumber',array($option['woocommerce_product_header_bottom_breadcrumb_enable'],0,1),array(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_breadcrumb_enable',false),$invalidValue));
            if(!in_array($option['woocommerce_product_header_bottom_background_type'],array_keys($Background->backgroundType)))
                $Notice->addError(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_background_type',false),$invalidValue);			
            if(!in_array($option['woocommerce_product_header_bottom_background_type_image_repeat'],array_keys($Background->backgroundRepeat)))
                $Notice->addError(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_background_type_image_repeat',false),$invalidValue);	
            if(!in_array($option['woocommerce_product_header_bottom_background_type_image_size_1'],array_keys($Background->backgroundSize)))
                $Notice->addError(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_background_type_image_size_1',false),$invalidValue);	        
            if(!in_array($option['woocommerce_product_header_bottom_background_type_image_origin'],array_keys($Background->backgroundOrigin)))
                $Notice->addError(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_background_type_image_origin',false),$invalidValue);	
            if(!in_array($option['woocommerce_product_header_bottom_background_type_image_clip'],array_keys($Background->backgroundClip)))
                $Notice->addError(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_background_type_image_clip',false),$invalidValue);	
            if(!in_array($option['woocommerce_product_header_bottom_background_type_image_attachment'],array_keys($Background->backgroundAttachment)))
                $Notice->addError(Autospa_ThemeHelper::getFormName('woocommerce_product_header_bottom_background_type_image_attachment',false),$invalidValue);	            
        }
        
		/* Plugin / Fancybox for images */
		$Validation->notice('isNumber',array($option['fancybox_image_padding'],0,999),array(Autospa_ThemeHelper::getFormName('fancybox_image_padding',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_margin'],0,999),array(Autospa_ThemeHelper::getFormName('fancybox_image_margin',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_min_width'],1,9999),array(Autospa_ThemeHelper::getFormName('fancybox_image_min_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_min_height'],1,9999),array(Autospa_ThemeHelper::getFormName('fancybox_image_min_height',false),$invalidValue));		
		$Validation->notice('isNumber',array($option['fancybox_image_max_width'],1,9999),array(Autospa_ThemeHelper::getFormName('fancybox_image_max_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_max_height'],1,9999),array(Autospa_ThemeHelper::getFormName('fancybox_image_max_height',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_helper_button_enable'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_helper_button_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autoresize'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_autoresize',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autocenter'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_autocenter',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_fittoview'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_fittoview',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_arrow'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_arrow',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_close_button'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_close_button',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_close_click'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_close_click',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_next_click'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_next_click',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_mouse_wheel'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_mouse_wheel',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autoplay'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_autoplay',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_loop'],0,1),array(Autospa_ThemeHelper::getFormName('fancybox_image_loop',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_playspeed'],1,99999),array(Autospa_ThemeHelper::getFormName('fancybox_image_playspeed',false),$invalidValue));
		if(!in_array($option['fancybox_image_animation_effect_open'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_animation_effect_open',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_close'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_animation_effect_close',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_next'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_animation_effect_next',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_previous'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_animation_effect_previous',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_open'],array_keys($Easing->easingType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_easing_open',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_close'],array_keys($Easing->easingType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_easing_close',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_next'],array_keys($Easing->easingType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_easing_next',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_previous'],array_keys($Easing->easingType)))
			$Notice->addError(Autospa_ThemeHelper::getFormName('fancybox_image_easing_previous',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['fancybox_image_speed_open'],1,99999),array(Autospa_ThemeHelper::getFormName('fancybox_image_speed_open',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_close'],1,99999),array(Autospa_ThemeHelper::getFormName('fancybox_image_speed_close',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_next'],1,99999),array(Autospa_ThemeHelper::getFormName('fancybox_image_speed_next',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_previous'],1,99999),array(Autospa_ThemeHelper::getFormName('fancybox_image_speed_previous',false),$invalidValue));

		/* Plugin / Maintenance mode */
		$Validation->notice('isNumber',array($option['maintenance_mode_enable'],0,1),array(Autospa_ThemeHelper::getFormName('maintenance_mode_enable',false),$invalidValue));
	       
		if($Notice->isError())
		{
			$response['local']=$Notice->getError();
		}
		else
		{
			$response['global']['error']=0;
			Autospa_ThemeOption::updateOption($option);
			
			$this->createCSSFile();
		}

		$response['global']['notice']=$Notice->createHTML(AUTOSPA_THEME_PATH_TEMPLATE.'notice.php');

		echo json_encode($response);
		exit;
	}
	
	/**************************************************************************/
	
	function publicInit()
	{		
		global $autospaParentPost;
		
		$this->prepareLibrary();
        
		if(is_singular()) wp_enqueue_script('comment-reply');
		
		$this->includeLibrary(!Autospa_ThemePlugin::isActive('TSThemeStyle'),null,array('ts-frontend'));
		$this->includeLibrary(!Autospa_ThemePlugin::isActive('TFThemeFont'),null,array('tf-frontend','google-font-public'));
        
		$this->includeLibrary(Autospa_ThemePlugin::isActive('wooCommerce'),null,array('autospa-woocommerce'));
		
		if(Autospa_ThemePlugin::isActive('wooCommerce'))
			$this->library['style']['ts-frontend']['dependencies']=array('woocommerce-general-css');
        
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);
		
		$aPattern=array
		(
			'menu'					=>	'/^menu_/',
			'rightClick'			=>	'/^right_click_/',
			'selection'				=>	'/^copy_selection_/',
			'fancyboxImage'			=>	'/^fancybox_image_/',
			'goToPageTop'			=>	'/^go_to_page_top_/'
		);
		
		$option=Autospa_ThemeOption::getOptionObject();
		
		foreach($aPattern as $indexPattern=>$valuePattern)
		{
			foreach($option as $index=>$value)
			{
				if(preg_match($valuePattern,$index,$result))
				{
					$nIndex=preg_replace($valuePattern,'',$index);
					$data[$indexPattern][$nIndex]=$value;
				}
			}
		}
		
		$data['config']['theme_url']=AUTOSPA_THEME_URL;
		$data['config']['ajax_url']=admin_url('admin-ajax.php');
		
		$data['header']['sticky_enable']=Autospa_ThemeOption::getGlobalOption($autospaParentPost->post,'header_top_sticky_enable',Autospa_ThemeOption::getOptionPrefix($autospaParentPost->post));	
		
        $data['config']['woocommerce']['enable']=(int)Autospa_ThemePlugin::isActive('WooCommerce');
        
        $data['config']['text']['all']=__('All','autospa');
        
		$param=array
		(
			'l10n_print_after'=>'themeOption='.json_encode($data).';'
		);
			
		wp_localize_script('autospa-public','themeOption',$param);
	}
		
	/**************************************************************************/

	function addPlugin()
	{
		$plugin=array
		(
			array
			(
				'name'								=>	'Slider Revolution Responsive WordPress Plugin',
				'slug'								=>	'revslider',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'revslider.zip',
				'required'							=>	false,
				'version'							=>	'5.4.7.2',
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			),
			array
			(
				'name'								=>	'WPBakery Page Builder for WordPress (formerly Visual Composer)',
				'slug'								=>	'js_composer',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'js_composer.zip',
				'required'							=>	true,
				'version'							=>	'5.4.7',
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			),
			array
			(
				'name'								=>	'Contact Form 7',
				'slug'								=>	'contact-form-7',
				'required'							=>	false,
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			),
			array
			(
				'name'								=>	'Theme Styles',
				'slug'								=>	'theme-style',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'theme-style.zip',
				'required'							=>	true,
				'version'							=>	'3.7',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Theme Fonts',
				'slug'								=>	'theme-font',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'theme-font.zip',
				'required'							=>	true,
				'version'							=>	'1.8',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),			
			array
			(
				'name'								=>	'Widget Area',
				'slug'								=>	'widget-area',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'widget-area.zip',
				'required'							=>	false,
				'version'							=>	'1.8',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Theme Demo Data Installer',
				'slug'								=>	'theme-demo-data-installer',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'theme-demo-data-installer.zip',
				'required'							=>	false,
				'version'							=>	'3.7',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Mailchimp for WordPress',
				'slug'								=>	'mailchimp-for-wp',
				'required'							=>	false,
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			),           
			array
			(
				'name'								=>	'Car Wash Booking System for WordPress',
				'slug'								=>	'car-wash-booking-system',
				'source'							=>	AUTOSPA_THEME_PATH_SOURCE.'car-wash-booking-system.zip',
				'required'							=>	false,
				'version'							=>	'1.8',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),           
			array
			(
				'name'								=>	'Breadcrumb NavXT',
				'slug'								=>	'breadcrumb-navxt',
				'required'							=>	false,
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			),           
			array
			(
				'name'								=>	'Woocommerce',
				'slug'								=>	'woocommerce',
				'required'							=>	false,
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			)                 
		);
	
		$config=array
		(
			'default_path'							=>	'',                      
			'menu'									=>	'tgmpa-install-plugins', 
			'has_notices'							=>	true,
			'dismissable'							=>	true,
			'dismiss_msg'							=>	'',
			'is_automatic'							=>	true,
			'message'								=>	'', 
			'strings'								=>	array
			(
				'page_title'						=>	__('Install Required Plugins','autospa'),
				'menu_title'						=>	__('Install Plugins','autospa'),
				'installing'						=>	__('Installing Plugin: %s','autospa'),
				'oops'								=>	__('Something went wrong with the plugin API.','autospa'),
				'notice_can_install_required'		=>	_n_noop('This theme requires the following plugin: %1$s.','This theme requires the following plugins: %1$s.','autospa'),
				'notice_can_install_recommended'	=>	_n_noop('This theme recommends the following plugin: %1$s.','This theme recommends the following plugins: %1$s.','autospa'),
				'notice_cannot_install'				=>	_n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','autospa'),
				'notice_can_activate_required'		=>	_n_noop('The following required plugin is currently inactive: %1$s.','The following required plugins are currently inactive: %1$s.','autospa'),
				'notice_can_activate_recommended'	=>	_n_noop('The following recommended plugin is currently inactive: %1$s.','The following recommended plugins are currently inactive: %1$s.','autospa'),
				'notice_cannot_activate'			=>	_n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','autospa'),
				'notice_ask_to_update'				=>	_n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','autospa'),
				'notice_cannot_update'				=>	_n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','autospa'),
				'install_link'						=>	_n_noop('Begin installing plugin','Begin installing plugins','autospa'),
				'activate_link'						=>	_n_noop('Begin activating plugin','Begin activating plugins','autospa'),
				'return'							=>	__('Return to Required Plugins Installer','autospa'),
				'plugin_activated'					=>	__('Plugin activated successfully.','autospa'),
				'complete'							=>	__('All plugins installed and activated successfully. %s','autospa'),
				'nag_type'							=>	'updated'
			)
		);

		tgmpa($plugin,$config);
	}
	
	/**************************************************************************/
	
	function createCSSFile()
	{
		if($this->createMultisitePath()===false) return;
		
		$content=null;
		
		$Validation=new Autospa_ThemeValidation();
		$ResponsiveMode=new Autospa_ThemeResponsiveMode();
		
		Autospa_ThemeOption::refreshOption();

		$media=$ResponsiveMode->getMedia();
		
		foreach($media as $index=>$value)
		{
			if($Validation->isNotEmpty(Autospa_ThemeOption::getOption('custom_css_responsive_'.$index)))
			{
				if((array_key_exists('min-width',$value)) && (array_key_exists('max-width',$value)))
				{
					$content.=
					'
					@media only screen  and (min-width:'.$value['min-width'].'px) and (max-width:'.$value['max-width'].'px)
					{
					'.Autospa_ThemeOption::getOption('custom_css_responsive_'.$index).'
					}
					';
				}
				else
				{
					$content.=Autospa_ThemeOption::getOption('custom_css_responsive_'.$index);
				}
			}
		}
		
		$file=AUTOSPA_THEME_PATH_MULTISITE_SITE_STYLE.'style.css';
		
		$ThemeWPFileSystem=new Autospa_ThemeWPFileSystem();
		if($ThemeWPFileSystem->put_contents($file,$content,0755)===false) return(false);

		return(true);		
	}
		
	/**************************************************************************/
	
	function createMultisitePath()
	{
		$data=array
		(
			AUTOSPA_THEME_PATH_MULTISITE_SITE,
			AUTOSPA_THEME_PATH_MULTISITE_SITE_STYLE
		);
		
		foreach($data as $path)
		{
			if(!Autospa_ThemeFile::dirExist($path)) @mkdir($path);			
			if(!Autospa_ThemeFile::dirExist($path)) return(false);
		}
		
		return(true);
	}
	
	/**************************************************************************/
	
	function adminNotice()
	{
		global $current_user;

		if(array_key_exists('autospa-dismiss-notice-1',$_GET))
			add_user_meta($current_user->ID,'autospa-dismiss-notice-1','true',true);

		if(get_user_meta($current_user->ID,'autospa-dismiss-notice-1')) return; 
		
		$file=AUTOSPA_THEME_PATH_MULTISITE_SITE_STYLE.'style.css';

		if(!is_writable($file))
		{
			echo 
			'
				<div class="notice notice-error is-dismissible"> 
					<p>
						<strong>'.sprintf(__('<b>File %s cannot be created. Please make sure that this location is writeable.</b>','autospa'),str_replace('\\','/',$file)).'</strong>
						<a href="?autospa-dismiss-notice-1"><b>'.esc_html__('Dismiss','autospa').'</b></a>
					</p>
				</div>					
			';				
		}
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta,$part='all')
	{
		if(in_array($part,array('general','all')))
		{

		}
		
		if(in_array($part,array('header','all')))
		{

		}	
		
		if(in_array($part,array('footer','all')))
		{

		}	
	}
			
	/**************************************************************************/
	
	function passwordForm()
	{
		$html=
		'
			<form method="post" class="theme-post-password-form" action="'.wp_login_url().'?action=postpass">
				<div>'.esc_html__('This content is password protected. To view it please enter your password below:','autospa').'</div>
				<div><label for="pwbox-160" class="theme-infield-label">'.esc_html__('Password:','autospa').'</label><input type="password" size="20" id="pwbox-160" name="post_password"></div>
				<div class="aligncenter"><input class="theme-button theme-button-1" type="submit" name="Submit" value="'.esc_attr__('Submit','autospa').'"></div>
			</form>
		';
		
		return($html);
	}
    
    /**************************************************************************/
    
    function addHeadCSSStyle()
    {
        global $autospaParentPost;
        
        $style=null;
        $Validation=new Autospa_ThemeValidation();
        
        $rule=array
        (
            'header_top_normal_menu_first_level_item_default_state_text_color'  =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li>a',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_menu_first_level_item_hover_state_text_color'    =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li:hover>a,
                                                                                     .theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li.current-menu-item>a,
                                                                                     .theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li.current-menu-ancestor>a',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_menu_next_level_default_state_background_color'  =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul',
                'property'                                                      =>  'background-color'
            ),
            'header_top_normal_menu_next_level_item_default_state_text_color'   =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li>a',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_menu_next_level_item_hover_state_text_color'     =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li:hover>a,
                                                                                     .theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li.current-menu-item>a,
                                                                                     .theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li.current-menu-ancestor>a',
                'property'                                                      =>  'color'
            ),
            'header_top_sticky_menu_first_level_item_default_state_text_color'  =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li>a',
                'property'                                                      =>  'color'
            ),
            'header_top_sticky_menu_first_level_item_hover_state_text_color'    =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li:hover>a,
                                                                                     .theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li.current-menu-item>a,
                                                                                     .theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li.current-menu-ancestor>a',
                'property'                                                      =>  'color'
            ),
            'header_top_sticky_menu_next_level_default_state_background_color'  =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul',
                'property'                                                      =>  'background-color'
            ),
            'header_top_sticky_menu_next_level_item_default_state_text_color'   =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li>a',
                'property'                                                      =>  'color'
            ),
            'header_top_sticky_menu_next_level_item_hover_state_text_color'     =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li:hover>a,
                                                                                     .theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li.current-menu-item>a,
                                                                                     .theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li.current-menu-ancestor>a',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_icon_normal_state_text_color'                    =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list a',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_icon_hover_state_text_color'                     =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list a:hover',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_icon_normal_state_border_color'                  =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-menu',
                'property'                                                      =>  'border-color'
            ),
            'header_top_normal_icon_hover_state_border_color'                   =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-menu:hover',
                'property'                                                      =>  'border-color'
            ),
            'header_top_sticky_icon_normal_state_text_color'                    =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list a',
                'property'                                                      =>  'color'
            ),
            'header_top_sticky_icon_hover_state_text_color'                     =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list a:hover',
                'property'                                                      =>  'color'
            ),
            'header_top_sticky_icon_normal_state_border_color'                  =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-menu',
                'property'                                                      =>  'border-color'
            ),
            'header_top_sticky_icon_hover_state_border_color'                   =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-menu:hover',
                'property'                                                      =>  'border-color'
            ),
            'header_top_normal_normal_state_background_color'                   =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top',
                'property'                                                      =>  'background-color'
            ),
            'header_top_sticky_normal_state_background_color'                   =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top',
                'property'                                                      =>  'background-color'
            ),
            'header_bottom_normal_state_background_color'                       =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-bottom',
                'property'                                                      =>  'background-color'
            ),
            'header_bottom_normal_state_text_color'                             =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-bottom h1',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_normal_state_box_shadow_color'                   =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top',
                'property'                                                      =>  'box-shadow'
            ),            
            'header_top_sticky_normal_state_box_shadow_color'                   =>  array
            (
                'selector'                                                      =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top',
                'property'                                                      =>  'box-shadow'
            ),
            'header_top_normal_woocommerce_tooltip_normal_state_text_color'     =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart>span:first-child',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_woocommerce_tooltip_hover_state_text_color'      =>  array
            (
                'selector'                                                      =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart:hover>span:first-child',
                'property'                                                      =>  'color'
            ),
            'header_top_normal_woocommerce_tooltip_normal_state_background_color'   =>  array
            (
                'selector'                                                          =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart>span:first-child',
                'property'                                                          =>  'background-color'
            ),
            'header_top_normal_woocommerce_tooltip_hover_state_background_color'    =>  array
            (
                'selector'                                                          =>  '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart:hover>span:first-child',
                'property'                                                          =>  'background-color'
            ),
            'header_top_sticky_woocommerce_tooltip_normal_state_text_color'         =>  array
            (
                'selector'                                                          =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart>span:first-child',
                'property'                                                          =>  'color'
            ),
            'header_top_sticky_woocommerce_tooltip_hover_state_text_color'          =>  array
            (
                'selector'                                                          =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart:hover>span:first-child',
                'property'                                                          =>  'color'
            ),
            'header_top_sticky_woocommerce_tooltip_normal_state_background_color'  =>  array
            (
                'selector'                                                          =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart>span:first-child',
                'property'                                                          =>  'background-color'
            ),
            'header_top_sticky_woocommerce_tooltip_hover_state_background_color'    =>  array
            (
                'selector'                                                          =>  '.theme-page-header.theme-page-header-sticky .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart:hover>span:first-child',
                'property'                                                          =>  'background-color'
            )
        );
        
        $meta=Autospa_ThemeOption::getPostMeta($autospaParentPost->post);
        
        foreach($rule as $index=>$value)
        {
           $name=Autospa_ThemeOption::getOptionPrefix($autospaParentPost->post).'_'.$index; 
           
           if(!array_key_exists($name,$meta)) continue;
           if(!$Validation->isColor($meta[$name])) continue;
           
           switch($index)
           {
               case 'header_top_normal_normal_state_box_shadow_color':
               case 'header_top_sticky_normal_state_box_shadow_color':
                   
                   $style.=$value['selector'].' { '.$value['property'].':0 1px 5px 0 '.Autospa_ThemeColor::HEX2RGBA($meta[$name]).'; } ';
                   
               break;
           
               case 'header_top_normal_woocommerce_tooltip_normal_state_background_color':
               case 'header_top_normal_woocommerce_tooltip_hover_state_background_color':
               case 'header_top_sticky_woocommerce_tooltip_normal_state_background_color':
               case 'header_top_sticky_woocommerce_tooltip_hover_state_background_color':
                   
                   $style.=$value['selector'].' { '.$value['property'].':#'.$meta[$name].'; } ';
                   $style.=$value['selector'].'+span { border-top:solid 5px #'.$meta[$name].'; border-left:solid 5px transparent; border-right:solid 5px transparent; } ';
                   
               break;
           
               default:
               
                   $style.=$value['selector'].' { '.$value['property'].':#'.$meta[$name].'; } ';
           }
           
        }
        
        if($Validation->isNotEmpty($style))
            echo '<style type="text/css">'.$style.'</style>';
    }

	/**************************************************************************/
    
    function addMediaTaxonomy()
    {
        register_taxonomy_for_object_type('category','attachment');
    }
    
    /**************************************************************************/
    
    function wpcf7FormElements($form)
    {
        $form=do_shortcode(wpb_js_remove_wpautop($form));
        return($form);
    }
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/