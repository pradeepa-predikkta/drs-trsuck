<?php

/******************************************************************************/
/******************************************************************************/

$Easing=new Autospa_ThemeEasing();
$Accordion=new Autospa_ThemeAccordion();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_accordion',
        'name'                                                                  =>  __('Accordion','autospa'),
        'description'                                                           =>  __('Creates accordion','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_accordion_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'active',
                'heading'                                                       =>  __('Active','autospa'),
                'description'                                                   =>  __('The zero-based index of the panel that is active (open). Allowed are integer numbers from 0 to 999.','autospa'),
                'group'                                                         =>  __('General','autospa'),
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'close_start',
                'heading'                                                       =>  __('Close at start','autospa'),
                'description'                                                   =>  __('This option determines if panels are closed at start.','autospa'),
                'value'                                                         =>  array
                (
                    __('Yes','autospa')                                         =>  '1',
                    __('No','autospa')                                          =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('General','autospa'),
            ),                
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'collapsible',
                'heading'                                                       =>  __('Collapsible','autospa'),
                'description'                                                   =>  __('This option determines if the active panel can be closed.','autospa'),
                'value'                                                         =>  array
                (
                    __('Yes','autospa')                                         =>  '1',
                    __('No','autospa')                                          =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('General','autospa'),
            ),                      
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'height_style',
                'heading'                                                       =>  __('Height style','autospa'),
                'description'                                                   =>  __('Controls the height of the accordion and each panel.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Accordion->getHeightStyle()),
                'std'                                                           =>  'auto',
                'group'                                                         =>  __('General','autospa'),
            ),                                  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autospa'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
                'group'                                                         =>  __('General','autospa'),
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'animation_enable',
                'heading'                                                       =>  __('Animation','autospa'),
                'description'                                                   =>  __('Enable or disable animation of panels.','autospa'),
                'value'                                                         =>  array
                (
                    __('Enable','autospa')                                      =>  '1',
                    __('Disable','autospa')                                     =>  '0',

                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('Animation','autospa'),
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'animation_duration',
                'heading'                                                       =>  __('Animation duration','autospa'),
                'description'                                                   =>  __('Duration of animation in miliseconds. Allowed are integer numbers from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Animation','autospa')             
            ),                    
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'animation_easing',
                'heading'                                                       =>  __('Easing','autospa'),
                'description'                                                   =>  __('Easing of animation.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Easing->getEasingType()),
                'std'                                                           =>  'easeOutQuad',
                'group'                                                         =>  __('Animation','autospa'),
            )                    
        )
    )
);  

/******************************************************************************/
        
add_shortcode('vc_autospa_theme_accordion',array('WPBakeryShortCode_VC_Autospa_Theme_Accordion','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Accordion extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'active'                                                            =>  '0',
            'close_start'                                                       =>  '0',
            'collapsible'                                                       =>  '0',
            'height_style'                                                      =>  'auto',
            'css_class'                                                         =>  '',
            'animation_enable'                                                  =>  '1',
            'animation_duration'                                                =>  '300',
            'animation_easing'                                                  =>  'easeOutQuad'
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Easing=new Autospa_ThemeEasing();
        $Accordion=new Autospa_ThemeAccordion();
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        
        if(!$Validation->isNumber($attribute['active'],0,999)) 
            $attribute['active']=$default['active'];        
        if(!$Validation->isNumber($attribute['close_start'],0,1)) 
            $attribute['close_start']=$default['close_start'];         
        if(!$Validation->isNumber($attribute['collapsible'],0,1)) 
            $attribute['collapsible']=$default['collapsible']; 
        if(!array_key_exists($attribute['height_style'],$Accordion->getHeightStyle()))
            $attribute['height_style']=$default['height_style']; 
        if(!$Validation->isNumber($attribute['animation_enable'],0,1)) 
            $attribute['animation_enable']=$default['animation_enable'];          
        if(!$Validation->isNumber($attribute['animation_duration'],0,999999)) 
            $attribute['animation_duration']=$default['animation_duration'];         
        if(!array_key_exists($attribute['animation_easing'],$Easing->getEasingType()))
            $attribute['animation_easing']=$default['animation_easing'];     
   
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-accordion','theme-clear-fix',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/