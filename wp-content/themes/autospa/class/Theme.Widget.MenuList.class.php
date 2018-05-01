<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeWidgetMenuList extends Autospa_ThemeWidget 
{
	
	/**************************************************************************/
	
    function __construct() 
	{
		parent::__construct('autospa_widget_menu_list',sprintf(__('(%s theme) List menu','autospa'),AUTOSPA_THEME_NAME),array('description'=>__('Displays menu as simple list of links.','autospa')),array());
    }
	
	/**************************************************************************/
	
    function widget($argument,$instance) 
	{
		$argument['_data']['file']='widget_menu_list.php';
		parent::widget($argument,$instance);
    }
	
	/**************************************************************************/
	
    function update($new_instance,$old_instance)
	{
		$instance=array();
		$instance['title']=$new_instance['title'];
		$instance['menu_id']=(int)$new_instance['menu_id'];
		return($instance);
    }
	
	/**************************************************************************/
	
	function form($instance) 
	{	
		$instance['_data']['file']='widget_menu_list.php';
		$instance['_data']['field']=array('title','menu_id');
		parent::form($instance);
	}
	
	/**************************************************************************/
	
	function register($class=null)
	{
		parent::register(is_null($class) ? get_class() : $class);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/