<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeWidgetCallToAction extends Autospa_ThemeWidget 
{
	
	/**************************************************************************/
	
    function __construct() 
	{
		parent::__construct('autospa_widget_call_to_action',sprintf(__('(%s theme) Call To Action','autospa'),AUTOSPA_THEME_NAME),array('description'=>__('Displays call to action.','autospa')),array());
    }
	
	/**************************************************************************/
	
    function widget($argument,$instance) 
	{
		$argument['_data']['file']='widget_call_to_action.php';
		parent::widget($argument,$instance);
    }
	
	/**************************************************************************/
	
    function update($new_instance,$old_instance)
	{
        $instance=array();
        
        $name=array('header','subheader','content','button_label','button_url');
        
        foreach($name as $value)
            $instance[$value]=$new_instance[$value];

		return($instance);
    }
	
	/**************************************************************************/
	
	function form($instance) 
	{	
		$instance['_data']['file']='widget_call_to_action.php';
		$instance['_data']['field']=array('header','subheader','content','button_label','button_url');
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