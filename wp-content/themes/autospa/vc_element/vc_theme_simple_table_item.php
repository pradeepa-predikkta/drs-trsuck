<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_simple_table_item',
        'name'                                                                  =>  __('Simple table item (line)','autospa'),
        'description'                                                           =>  __('Creates simple table item (line)','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_simple_table'),
        'params'                                                                =>  array
        (   
             array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'value_1',
                'heading'                                                       =>  __('First column value','autospa'),
                'description'                                                   =>  __('First column value.','autospa'),
                'admin_label'                                                   =>  true
            ),
             array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'value_2',
                'heading'                                                       =>  __('Second column value','autospa'),
                'description'                                                   =>  __('Second column value.','autospa'),
                'admin_label'                                                   =>  true
            ),
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autospa_theme_simple_table_item',array('WPBakeryShortCode_VC_Autospa_Theme_Simple_Table_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Simple_Table_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'value_1'                                                           =>  '',
            'value_2'                                                           =>  '',
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if(($Validation->isEmpty($attribute['value_1'])) && ($Validation->isEmpty($attribute['value_2']))) return($html);

        $html= 
        '
            <li>
                <div>'.esc_html($attribute['value_1']).'</div>
                <div>'.esc_html($attribute['value_2']).'</div>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/