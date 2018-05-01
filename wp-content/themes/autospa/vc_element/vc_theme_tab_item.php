<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_tab_item',
        'name'                                                                  =>  __('Tabs item (panel)','autospa'),
        'description'                                                           =>  __('Creates tabs item (panel)','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_tab'),
        'params'                                                                =>  array
        (   
             array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autospa'),
                'description'                                                   =>  __('Header of the panel.','autospa'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textarea_html',
                'param_name'                                                    =>  'content',
                'heading'                                                       =>  __('Content','autospa'),
                'description'                                                   =>  __('Content of the panel.','autospa'),
            )
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autospa_theme_tab_item',array('WPBakeryShortCode_VC_Autospa_Theme_Tab_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Tab_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'header'                                                            =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['header'])) return($html);

        $id=Autospa_ThemeHelper::createId('theme_component_tab');
        
        $html= 
        '
            <a href="#'.esc_attr($id).'">'.esc_html($attribute['header']).'</a>
            <div id="'.esc_attr($id).'">'.do_shortcode($content).'</div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/