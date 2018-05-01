<?php

/******************************************************************************/
/******************************************************************************/

$Tab=new Autospa_ThemeTab();
$Easing=new Autospa_ThemeEasing();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_tab',
        'name'                                                                  =>  __('Tabs','autospa'),
        'description'                                                           =>  __('Creates tabs','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_tab_item'), 
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
                'description'                                                   =>  __('Controls the height of the tabs and each panel.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Tab->getHeightStyle()),
                'std'                                                           =>  'content',
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
                'param_name'                                                    =>  'animation_open_enable',
                'heading'                                                       =>  __('Animation (on open)','autospa'),
                'description'                                                   =>  __('Enable or disable animation (on open) of tabs.','autospa'),
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
                'param_name'                                                    =>  'animation_open_duration',
                'heading'                                                       =>  __('Animation duration (on open)','autospa'),
                'description'                                                   =>  __('Duration of animation (on open) in miliseconds. Allowed are integer numbers from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Animation','autospa'),
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'animation_open_delay',
                'heading'                                                       =>  __('Animation delay (on open)','autospa'),
                'description'                                                   =>  __('Delay of animation (on open) in miliseconds. Allowed are integer numbers from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Animation','autospa'),
            ),   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'animation_open_easing',
                'heading'                                                       =>  __('Easing (on open)','autospa'),
                'description'                                                   =>  __('Easing of animation (on open).','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Easing->getEasingType()),
                'std'                                                           =>  'swing',
                'group'                                                         =>  __('Animation','autospa'),
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'animation_close_enable',
                'heading'                                                       =>  __('Animation (on close)','autospa'),
                'description'                                                   =>  __('Enable or disable animation (on close) of tabs.','autospa'),
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
                'param_name'                                                    =>  'animation_close_duration',
                'heading'                                                       =>  __('Animation duration (on close)','autospa'),
                'description'                                                   =>  __('Duration of animation (on close) in miliseconds. Allowed are integer numbers from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Animation','autospa'),
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'animation_close_delay',
                'heading'                                                       =>  __('Animation delay (on close)','autospa'),
                'description'                                                   =>  __('Delay of animation (on close) in miliseconds. Allowed are integer numbers from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Animation','autospa'),
            ),   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'animation_close_easing',
                'heading'                                                       =>  __('Easing (on close)','autospa'),
                'description'                                                   =>  __('Easing of animation (on close).','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Easing->getEasingType()),
                'std'                                                           =>  'swing',
                'group'                                                         =>  __('Animation','autospa'),
            )    
        )
    )
); 
        
/******************************************************************************/

add_shortcode('vc_autospa_theme_tab',array('WPBakeryShortCode_VC_Autospa_Theme_Tab','vcHTML'));

/******************************************************************************/
        
class WPBakeryShortCode_VC_Autospa_Theme_Tab extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'active'                                                            =>  '0',
            'close_start'                                                       =>  '0',
            'collapsible'                                                       =>  '0',
            'height_style'                                                      =>  'content',
            'css_class'                                                         =>  '',
            'animation_open_enable'                                             =>  '1',
            'animation_open_duration'                                           =>  '200',
            'animation_open_delay'                                              =>  '0',
            'animation_open_easing'                                             =>  'swing',
            'animation_close_enable'                                             =>  '1',
            'animation_close_duration'                                           =>  '200',
            'animation_close_delay'                                              =>  '0',
            'animation_close_easing'                                             =>  'swing'
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Tab=new Autospa_ThemeTab();
        $Easing=new Autospa_ThemeEasing();
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        
        if(!$Validation->isNumber($attribute['active'],0,999)) 
            $attribute['active']=$default['active'];        
        if(!$Validation->isNumber($attribute['close_start'],0,1)) 
            $attribute['close_start']=$default['close_start'];         
        if(!$Validation->isNumber($attribute['collapsible'],0,1)) 
            $attribute['collapsible']=$default['collapsible']; 
        if(!array_key_exists($attribute['height_style'],$Tab->getHeightStyle()))
            $attribute['height_style']=$default['height_style']; 
        if(!$Validation->isNumber($attribute['animation_open_enable'],0,1)) 
            $attribute['animation_open_enable']=$default['animation_open_enable'];          
        if(!$Validation->isNumber($attribute['animation_open_duration'],0,999999)) 
            $attribute['animation_open_duration']=$default['animation_open_duration'];  
        if(!$Validation->isNumber($attribute['animation_open_delay'],0,999999)) 
            $attribute['animation_open_delay']=$default['animation_open_delay'];   
        if(!array_key_exists($attribute['animation_open_easing'],$Easing->getEasingType()))
            $attribute['animation_open_easing']=$default['animation_open_easing'];           
        if(!$Validation->isNumber($attribute['animation_close_enable'],0,1)) 
            $attribute['animation_close_enable']=$default['animation_close_enable'];          
        if(!$Validation->isNumber($attribute['animation_close_duration'],0,999999)) 
            $attribute['animation_close_duration']=$default['animation_close_duration'];  
        if(!$Validation->isNumber($attribute['animation_close_delay'],0,999999)) 
            $attribute['animation_close_delay']=$default['animation_close_delay'];   
        if(!array_key_exists($attribute['animation_close_easing'],$Easing->getEasingType()))
            $attribute['animation_close_easing']=$default['animation_close_easing'];           
        
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-tab','theme-clear-fix',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/