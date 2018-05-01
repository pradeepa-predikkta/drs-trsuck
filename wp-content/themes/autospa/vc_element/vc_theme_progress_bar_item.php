<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_progress_bar_item',
        'name'                                                                  =>  __('Progress bar','autospa'),
        'description'                                                           =>  __('Creates single progress bar','autospa'), 
        'category'                                                              =>  __('Content','autospa'),
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
                'description'                                                   =>  __('Enter value of progress bar. An integer value from range 0 to 999999.','autospa')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'character_before',
                'heading'                                                       =>  __('Character before value','autospa'),
                'description'                                                   =>  __('Enter character (text) which should be displayed before value of progress bar.','autospa'),
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'character_after',
                'heading'                                                       =>  __('Character after value','autospa'),
                'description'                                                   =>  __('Enter character (text) which should be displayed after value of progress bar.','autospa'),
            )    
        )
    )
);
        
/******************************************************************************/

add_shortcode('vc_autospa_theme_progress_bar_item',array('WPBakeryShortCode_VC_Autospa_Theme_Progress_Bar_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Progress_Bar_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'label'                                                             =>  __('Label','autospa'),
            'value'                                                             =>  '100',
            'character_before'                                                  =>  '',
            'character_after'                                                   =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['label']))
            $attribute['label']=$default['label'];
        if(!$Validation->isNumber($attribute['value'],0,99999)) 
            return($html);
        
        $dataAttribute=$attribute;
              
        unset($dataAttribute['label']);
        
        $html=
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-progress-bar-item')).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                <h6>'.esc_html($attribute['label']).'</h6>
                <span></span>
                <div><div></div></div>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/