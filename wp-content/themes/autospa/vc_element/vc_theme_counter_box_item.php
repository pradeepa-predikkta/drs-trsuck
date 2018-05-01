<?php

/******************************************************************************/
/******************************************************************************/

$Icon=new Autospa_ThemeIcon();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_counter_box_item',
        'name'                                                                  =>  __('Counter boxes item','autospa'),
        'description'                                                           =>  __('Creates single counter box','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (                       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'label',
                'heading'                                                       =>  __('Label','autospa'),
                'description'                                                   =>  __('Enter label of progress bar.','autospa'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'value',
                'heading'                                                       =>  __('Value','autospa'),
                'description'                                                   =>  __('Enter value of progress bar. An integer value from range 0 to 999999.','autospa'),
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'icon',
                'heading'                                                       =>  __('Icon','autospa'),
                'description'                                                   =>  __('Select icon for counter box.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Icon->getFeatureIcon()),
                'std'                                                           =>  'car-2'
            ), 
            array
            (
                'type'                                                          =>  'colorpicker',
                'param_name'                                                    =>  'background_color',
                'heading'                                                       =>  __('Background color','autospa'),
                'description'                                                   =>  __('Enter background color.','autospa'),
            ),                
            array
            (
                'type'                                                          =>  'colorpicker',
                'param_name'                                                    =>  'label_color',
                'heading'                                                       =>  __('Label color','autospa'),
                'description'                                                   =>  __('Enter color of label.','autospa'),
            ), 
            array
            (
                'type'                                                          =>  'colorpicker',
                'param_name'                                                    =>  'value_color',
                'heading'                                                       =>  __('Value color','autospa'),
                'description'                                                   =>  __('Enter color of value.','autospa'),
            ),   
            array
            (
                'type'                                                          =>  'colorpicker',
                'param_name'                                                    =>  'icon_color',
                'heading'                                                       =>  __('Icon color','autospa'),
                'description'                                                   =>  __('Enter color of icon.','autospa'),
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'icon_size',
                'heading'                                                       =>  __('Icon size','autospa'),
                'description'                                                   =>  __('Enter icon size in pixel. Values from 1-200 are allowed.','autospa'),
            )                   
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autospa_theme_counter_box_item',array('WPBakeryShortCode_VC_Autospa_Theme_Counter_Box_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Counter_Box_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'label'                                                             =>  __('Label','autospa'),
            'value'                                                             =>  '100',
            'icon'                                                              =>  'car-2',
            'background_color'                                                  =>  '',
            'label_color'                                                       =>  '',
            'value_color'                                                       =>  '',
            'icon_color'                                                        =>  '',
            'icon_size'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Icon=new Autospa_ThemeIcon();
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['label']))
            $attribute['label']=$default['label'];
        if(!$Validation->isNumber($attribute['value'],0,999999)) 
            return($html);
        if(!array_key_exists($attribute['icon'],$Icon->getFeatureIcon()))
            $attribute['icon']=$default['icon'];
        if(!$Validation->isColor($attribute['background_color']))
            $attribute['background_color']=$default['background_color'];   
        if(!$Validation->isColor($attribute['label_color']))
            $attribute['label_color']=$default['label_color']; 
        if(!$Validation->isColor($attribute['value_color']))
            $attribute['value_color']=$default['value_color'];
        if(!$Validation->isColor($attribute['icon_color']))
            $attribute['icon_color']=$default['icon_color'];   
        if(!$Validation->isNumber($attribute['icon_size'],1,200))
            $attribute['icon_size']=$default['icon_size'];  
        else $attribute['icon_size']=$attribute['icon_size'].'px'; 
            
        $dataAttribute=$attribute;
              
        unset($dataAttribute['label'],$dataAttribute['icon'],$dataAttribute['background_color'],$dataAttribute['label_color'],$dataAttribute['value_color'],$dataAttribute['icon_color'],$dataAttribute['icon_size']);
        
        $html=
        '
            <div'.Autospa_ThemeHelper::createStyleAttribute(array('background-color'=>$attribute['background_color'])).Autospa_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item')).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                <span'.Autospa_ThemeHelper::createStyleAttribute(array('color'=>$attribute['value_color'])).'>0</span>
                <span'.Autospa_ThemeHelper::createStyleAttribute(array('color'=>$attribute['icon_color'],'font-size'=>$attribute['icon_size'])).Autospa_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'])).'></span>
                <h6'.Autospa_ThemeHelper::createStyleAttribute(array('color'=>$attribute['label_color'])).'>'.esc_html($attribute['label']).'</h6>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/