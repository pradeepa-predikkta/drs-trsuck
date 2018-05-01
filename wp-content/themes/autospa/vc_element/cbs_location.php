<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_CBS_Location
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
       add_shortcode('cbs_location',array($this,'vcHTML'));
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
                'base'                                                          =>  'cbs_location',
                'name'                                                          =>  __('Booking','autospa'),
                'description'                                                   =>  __('[Car Wash Booking System] Creates booking','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
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
    new WPBakeryShortCode_CBS_Location(); 