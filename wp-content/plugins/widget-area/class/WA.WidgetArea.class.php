<?php

/******************************************************************************/
/******************************************************************************/

class WAWidgetArea
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_WIDGET_AREA_SCRIPT_URL,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_WIDGET_AREA_STYLE_URL,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
		$this->library=array
		(
			'script'															=>	array
			(
				'jquery'														=>	array
				(
					'path'														=>	'',
					'in_footer'													=>	false,
					'dependencies'												=>	array()
				),
				'jquery-ui-core'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-autocomplete'										=>	array
				(
					'path'														=>	''
				),
				'jquery-bbq'													=>	array
				(
					'file'														=>	'jquery.bbq.min.js'
				),	
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.js'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.js'
				),
				'jquery-blockUI'												=>	array
				(
					'file'														=>	'jquery.blockUI.js'
				),	
				'jquery-sticky-kit'												=>	array
				(
                    'use'                                                       =>  3,
					'file'														=>	'jquery.sticky-kit.min.js'
				),	
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.js'
				),
                'jquery-themeOptionElement'										=>	array
                (
					'file'														=>	'jquery.themeOptionElement.js'
				)
			),
			'style'																=>	array
			(
				'jquery-ui'														=>	array
				(
					'file'														=>	'jquery.ui.min.css'
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.css'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.css'
				),
				'google-font-open-sans'											=>	array
				(
					'path'														=>	'',
					'file'														=>	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.css'
				),
				'jquery-themeOption-rtl'										=>	array
				(
					'inc'														=>	false,
					'file'														=>	'jquery.themeOption.rtl.css'
				),
				'wa-jquery-themeOption-overwrite'								=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css'
				)
			)
		);
	}
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
		foreach($this->library[$type] as $index=>$value)
			$this->library[$type][$index]=array_merge($this->libraryDefault[$type],$value);
		
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
	
	function pluginActivation()
	{
		$option=array();
		
		WAData::create();
		
		global $wa_data;
	
		foreach($wa_data['data'] as $dataName=>$dataValue)
		{
			$optionName=$dataName;
			$optionValue=WAOption::getOption($optionName);
			
			$option[$optionName]=$optionValue===false ? $dataValue : $optionValue;
		}

		WAOption::updateOption($option);
	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}
	
	/**************************************************************************/
	
	function register()
	{
		if(!function_exists('register_sidebar')) return;
		
		$Validation=new WAValidation();
		
		$data=$this->getWidgetArea();

		foreach($data as $value)
		{
			$meta=$this->getPostMeta($value['id']);
			
			$argument=array
			(
				'id'															=>	$this->createWidgetAreaId($value['id']),
				'name'															=>	$value['title']
			);
			
			$field=array
			(
				'class'															=>	'register_sidebar_argument_class',
				'before_widget'													=>	'register_sidebar_argument_widget_start',
				'after_widget'													=>	'register_sidebar_argument_widget_stop',
				'before_title'													=>	'register_sidebar_argument_title_start',
				'after_title'													=>	'register_sidebar_argument_title_stop'			
			);
			
			foreach($field as $fieldIndex=>$fieldValue)
			{
				$argument[$fieldIndex]=$meta[$fieldValue];
				if($Validation->isEmpty($argument[$fieldIndex]))
					$argument[$fieldIndex]=WAOption::getOption($fieldValue);
			}
            
            if($meta['smart_sidebar_enable']==1)
                $argument['before_widget']=sprintf($argument['before_widget'],'%1$s','%2$s theme-widget-in-smart-sidebar');

			register_sidebar($argument);		
		}	
	}
	
	/**************************************************************************/
	
	function getWidgetArea()
	{
		$data=array();
		
		$argument=array
		(
			'post_type'															=>	PLUGIN_WIDGET_AREA_CONTEXT.'_widget_area',
			'posts_per_page'													=>	-1,
			'orderby'															=>	'title',
			'order'																=>	'asc'
		);
		
		$query=new WP_Query($argument);
		if($query===false) return($data);
		
		foreach($query->posts as $value)
			$data[]=array('id'=>$value->ID,'title'=>$value->post_title);
		
		return($data);
	}
	
	/**************************************************************************/
	
	function createWidgetAreaId($slug)
	{
		return(PLUGIN_WIDGET_AREA_CONTEXT.'_'.$slug);
	}
	
	/**************************************************************************/
	
	function init()
	{
        add_action('wp_footer',array($this,'wpFooter'));
        
		register_post_type
		(
			PLUGIN_WIDGET_AREA_CONTEXT.'_widget_area',
			array
			(
				'labels'=>array
				(
					'name'														=>	__('Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),
					'singular_name'												=>	__('Widgets Areas',PLUGIN_WIDGET_AREA_DOMAIN),
					'add_new'													=>	__('Add New',PLUGIN_WIDGET_AREA_DOMAIN),
					'add_new_item'												=>	__('Add New Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),
					'edit_item'													=>	__('Edit Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),
					'new_item'													=>	__('New Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),
					'all_items'													=>	__('All Widgets Areas',PLUGIN_WIDGET_AREA_DOMAIN),
					'view_item'													=>	__('View Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),
					'search_items'												=>	__('Search Widgets Areas',PLUGIN_WIDGET_AREA_DOMAIN),
					'not_found'													=>	__('No Widgets Areas Found',PLUGIN_WIDGET_AREA_DOMAIN),
					'not_found_in_trash'										=>	__('No Widgets Areas Found in Trash',PLUGIN_WIDGET_AREA_DOMAIN), 
					'parent_item_colon'											=>	'',
					'menu_name'													=>	__('Widgets Areas',PLUGIN_WIDGET_AREA_DOMAIN)
				),	
				'public'														=>	false,  
				'show_ui'														=>	true,  
				'capability_type'												=>	'post',
				'hierarchical'													=>	false,  
				'rewrite'														=>	true,  
				'supports'														=>	array('title','page-attributes')  
			)
		);		
		
		$this->register();
	}
	
	/**************************************************************************/
	
	function publicInit()
	{
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);		
	}
	
	/**************************************************************************/
	
	function adminInit()
	{		
		$this->includeLibrary(is_rtl(),array(),array('jquery-themeOption-rtl'));
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_theme_page(__('Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),__('Widget Area',PLUGIN_WIDGET_AREA_DOMAIN),'edit_theme_options','widget_area_edit',array($this,'adminCreatePluginOption'));
	}
	
	/**************************************************************************/

	function adminCreatePluginOption()
	{
		$data=array();
		
		$data['option']=WAOption::getOption();
				
		$Template=new WATemplate($data,PLUGIN_WIDGET_AREA_TEMPLATE_PATH.'admin/plugin_option.php');
		echo $Template->output();	
	}

	/**************************************************************************/

	function adminSavePluginOption()
	{
		$temp=array();
		$option=array();
		$response=array('global'=>array('error'=>1),'local'=>array());
		
		parse_str(WAHelper::stripslashesPOST($_POST['value']),$temp);
		
		foreach($temp as $index=>$value)
		{
			$index=preg_replace('/'.PLUGIN_WIDGET_AREA_CONTEXT.'_/',null,$index);
			$option[$index]=$value;
		}	
	
		$response['global']['error']=(bool)count($response['local']);
		
		if($response['global']['error'])
		{
			$response['global']['notice']=
			'
				<div class="to-notice to-notice-error">
					<span></span>
					<h4>'.__('Error',PLUGIN_WIDGET_AREA_DOMAIN).'</h4>
					<h6>'.__('Changes can not be saved.',PLUGIN_WIDGET_AREA_DOMAIN).'</h6>
				</div>
			';
		}
		else
		{
			$response['global']['notice']=
			'
				<div class="to-notice to-notice-success">
					<span></span>
					<h4>'.__('Success',PLUGIN_WIDGET_AREA_DOMAIN).'</h4>
					<h6>'.__('All changes have been saved.',PLUGIN_WIDGET_AREA_DOMAIN).'</h6>
				</div>
			';		
			
			WAOption::updateOption($option);
		}

		echo json_encode($response);
		exit;		
	}
	
	/**************************************************************************/
	
	function adminManageEditColumn($column)
	{
		$column=array
		(  
			'cb'			=> '<input type="checkbox"/>',
			'title'			=> __('Title',PLUGIN_WIDGET_AREA_DOMAIN)
		);    

		return $column;  
	}  
	
	/**************************************************************************/
	
	function adminManageEditSortableColumn($column)
	{
		$column['title']='title';
		return($column);
	}
	
	/**************************************************************************/
	
	function adminManageColumn($column)
	{

	}

	/**************************************************************************/
	
	function adminInitMetaBox()
	{
		add_meta_box(PLUGIN_WIDGET_AREA_CONTEXT.'_meta_box_general',__('General',PLUGIN_WIDGET_AREA_DOMAIN),array($this,'adminCreateMetaBox'),PLUGIN_WIDGET_AREA_CONTEXT.'_widget_area','normal','high');	
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBox() 
	{
		global $post;
		
		$data=array();

		$data['nonce']=wp_nonce_field('adminSaveMetaBox',PLUGIN_WIDGET_AREA_CONTEXT.'_meta_box_general_noncename',false,false);
		
		$data['option']=$this->getPostMeta($post->ID);
		
		$data['dictionary']['layout']=array();
		
		foreach(WAData::get('layout') as $index=>$value)
			$data['dictionary']['layout'][$index]=$value[0];
		
		$Template=new WATemplate($data,PLUGIN_WIDGET_AREA_TEMPLATE_PATH.'admin/meta_box_general.php');
		echo $Template->output();
	}
	
	/**************************************************************************/
	
	function adminSaveMetaBox($postId) 
	{
		if($_POST)
		{
			if(WAHelper::checkSavePost($postId,PLUGIN_WIDGET_AREA_CONTEXT.'_meta_box_general_noncename','adminSaveMetaBox')===false) return(false);
			
			$option=WAHelper::getPostOption();
			update_post_meta($postId,PLUGIN_WIDGET_AREA_CONTEXT,$option);
		}
	}
	
	/**************************************************************************/
	
	function getPostMeta($postId)
	{
		$data=get_post_meta($postId,PLUGIN_WIDGET_AREA_CONTEXT,false);
		if(isset($data[0])) $data=$data[0];

		WAHelper::setDefaultOption($data,'layout','100');
        WAHelper::setDefaultOption($data,'smart_sidebar_enable','0');
		WAHelper::setDefaultOption($data,'register_sidebar_argument_class','');
		WAHelper::setDefaultOption($data,'register_sidebar_argument_widget_start','');
		WAHelper::setDefaultOption($data,'register_sidebar_argument_widget_stop','');
		WAHelper::setDefaultOption($data,'register_sidebar_argument_title_start','');
		WAHelper::setDefaultOption($data,'register_sidebar_argument_title_stop','');	
		
		return($data);
	}
    
    /**************************************************************************/
    
    function wpFooter()
    {
        $html=
        '
            <script type="text/javascript">
                jQuery(document).ready(function($) 
                {
                    $(\'.theme-widget-in-smart-sidebar\').parent().stick_in_parent();
                    $(\'.theme-widget-in-smart-sidebar\').removeClass(\'theme-widget-in-smart-sidebar\');
                });
            </script>
        ';
        
        echo $html;
    }
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/