<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_process_list',
        'name'                                                                  =>  __('Process list','autospa'),
        'description'                                                           =>  __('Creates process list','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_process_list_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (                   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autospa'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
            )
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autospa_theme_process_list',array('WPBakeryShortCode_VC_Autospa_Theme_Process_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Process_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();

        if($Validation->isEmpty($content)) return($html);
        
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-process-list','theme-clear-fix',$attribute['css_class'])).' data-responsive-mode="1">
                <ul'.Autospa_ThemeHelper::createClassAttribute(array('theme-clear-fix')).'>
                    '.do_shortcode($content).'
                </ul>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/