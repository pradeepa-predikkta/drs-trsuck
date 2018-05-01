<?php

/******************************************************************************/
/******************************************************************************/

$Icon=new Autospa_ThemeIcon();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_process_list_item',
        'name'                                                                  =>  __('Process list item','autospa'),
        'description'                                                           =>  __('Creates single item of process list','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_process_list'),
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'icon',
                'heading'                                                       =>  __('Icon','autospa'),
                'description'                                                   =>  __('Select icon for item.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Icon->getFeatureIcon()),
                'std'                                                           =>  'car-2'
            ),   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autospa'),
                'description'                                                   =>  __('Enter header of item.','autospa'),
                'admin_label'                                                   =>  true
            )
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autospa_theme_process_list_item',array('WPBakeryShortCode_VC_Autospa_Theme_Process_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Process_List_Item 
{
    /**************************************************************************/

    public static function vcHTML($attr) 
    {
        $default=array
        (
            'icon'                                                              =>  'car-2',
            'header'                                                            =>  __('Header','autospa')
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Icon=new Autospa_ThemeIcon();
        $Validation=new Autospa_ThemeValidation();
        
        if(!array_key_exists($attribute['icon'],$Icon->getFeatureIcon()))
            $attribute['icon']=$default['icon'];
        if($Validation->isEmpty($attribute['header']))
            $attribute['header']=$default['header'];
              
        $html=
        '
            <li>
                <div>
                    <span'.Autospa_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'])).'></span>
                    <h5>'.esc_html($attribute['header']).'</h5>
                    <span'.Autospa_ThemeHelper::createClassAttribute(array('theme-icon-meta-arrow-large-rl')).'></span>
                </div>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 

/******************************************************************************/
/******************************************************************************/