<?php
/* 
Plugin Name: Widget Areas
Plugin URI: http://quanticalabs.com
Description: Widget Areas allows manage widget areas (sidebars) in themes from QuanticaLabs.
Author: QuanticaLabs
Version: 1.8
Author URI: http://quanticalabs.com
*/

require_once(plugin_dir_path(__FILE__).'include.php');

load_plugin_textdomain(PLUGIN_WIDGET_AREA_DOMAIN,false,dirname(plugin_basename(__FILE__)).'/languages/');

/******************************************************************************/

$WidgetArea=new WAWidgetArea();

WAInclude::includeFile(get_template_directory().'/wa_config.php');

$WidgetArea->prepareLibrary();

register_activation_hook(__FILE__,array($WidgetArea,'pluginActivation'));

add_action('init',array($WidgetArea,'init')); 

add_action('admin_init',array($WidgetArea,'adminInit'));
add_action('admin_menu',array($WidgetArea,'adminMenuInit'));

add_action('wp_ajax_'.PLUGIN_WIDGET_AREA_CONTEXT.'_save',array($WidgetArea,'adminSavePluginOption'));

add_action('save_post',array($WidgetArea,'adminSaveMetaBox'));
add_action('add_meta_boxes',array($WidgetArea,'adminInitMetaBox'));
add_filter('manage_edit-'.PLUGIN_WIDGET_AREA_CONTEXT.'_widget_area_columns',array($WidgetArea,'adminManageEditColumn')); 
add_action('manage_'.PLUGIN_WIDGET_AREA_CONTEXT.'_widget_area_posts_custom_column',array($WidgetArea,'adminManageColumn'));
add_filter('manage_edit-'.PLUGIN_WIDGET_AREA_CONTEXT.'_widget_area_sortable_columns',array($WidgetArea,'adminManageEditSortableColumn'));

if(!is_admin()) 	 
	add_action('wp_enqueue_scripts',array($WidgetArea,'publicInit'));

/******************************************************************************/
/******************************************************************************/