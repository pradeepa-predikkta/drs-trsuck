<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_counter_box',
        'name'                                                                  =>  __('Counter boxes','autospa'),
        'description'                                                           =>  __('Creates list of counter boxes','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_row'), 
        'content_element'                                                       =>  true,
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'animation_duration',
                'heading'                                                       =>  __('Animation duration','autospa'),
                'description'                                                   =>  __('Enter duration (in miliseconds) of animation. Allowed are integer numbers from range 0 to 999999.','autospa'),
            ),                 
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

add_shortcode('vc_autospa_theme_counter_box',array('WPBakeryShortCode_VC_Autospa_Theme_Counter_Box','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Counter_Box extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'animation_duration'                                                =>  '2000',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();

        if(!$Validation->isNumber($attribute['animation_duration'],0,999999)) 
            $attribute['animation_duration']=$default['animation_duration'];        
        
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-counter-box',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/