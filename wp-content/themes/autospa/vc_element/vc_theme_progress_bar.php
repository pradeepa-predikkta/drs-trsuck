<?php

/******************************************************************************/
/******************************************************************************/

$Easing=new Autospa_ThemeEasing();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_progress_bar',
        'name'                                                                  =>  __('Progress bars','autospa'),
        'description'                                                           =>  __('Creates list of progress bars','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_row'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (   
           array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'animation_easing_type',
                'heading'                                                       =>  __('Animation easing type','autospa'),
                'description'                                                   =>  __('Select easing type of animation.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Easing->getEasingType()),
                'std'                                                           =>  'easeInQuad'
            ),                    
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

add_shortcode('vc_autospa_theme_progress_bar',array('WPBakeryShortCode_VC_Autospa_Theme_Progress_Bar','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Progress_Bar extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
    
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'animation_easing_type'                                             =>  'easeInQuad',
            'animation_duration'                                                =>  '2000',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Easing=new Autospa_ThemeEasing();
        $Validation=new Autospa_ThemeValidation();

        if(!array_key_exists($attribute['animation_easing_type'],$Easing->getEasingType()))
            $attribute['animation_easing_type']=$default['animation_easing_type'];
        if(!$Validation->isNumber($attribute['animation_duration'],0,999999)) 
            $attribute['animation_duration']=$default['animation_duration'];        
        
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-progress-bar',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/