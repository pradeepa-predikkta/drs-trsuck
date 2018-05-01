<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_CBS_Vehicle_Package
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('cbs_vehicle_package',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        $VisualComposer=new Autospa_ThemeVisualComposer();
        
        $Location=new CBSLocation();
        $location=$Location->getDictionary();
        
        $dictionary=array();
        
        foreach($location as $index=>$value)
            $dictionary[$index]=$value['post']->post_title;  
        
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'cbs_vehicle_package',
                'name'                                                          =>  __('Vehicle and packages list','autospa'),
                'description'                                                   =>  __('[Car Wash Booking System] Creates list of vehicles and related packages','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'package_button_url',
                        'heading'                                               =>  __('URL address','autospa'),
                        'description'                                           =>  __('URL address of packages button.','autospa'),
                    ),                    
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'location_id',
                        'heading'                                               =>  __('Location','autospa'),
                        'description'                                           =>  __('Select location.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($dictionary),
                        'admin_label'                                           =>  true
                    )   
                )
            )
        );         
    } 
    
    /**************************************************************************/
     
    public function vcHTML($attr) 
    {
        
    } 
    
    /**************************************************************************/
} 

if(Autospa_ThemePlugin::isActive('CBSPlugin'))
    new WPBakeryShortCode_CBS_Vehicle_Package(); 