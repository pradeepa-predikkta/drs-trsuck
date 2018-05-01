<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_accordion_item',
        'name'                                                                  =>  __('Accordion item (panel)','autospa'),
        'description'                                                           =>  __('Creates accordion item (panel)','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_accordion'),
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

add_shortcode('vc_autospa_theme_accordion_item',array('WPBakeryShortCode_VC_Autospa_Theme_Accordion_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Accordion_Item 
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

        $html= 
        '
            <h6><span class="theme-icon-meta-arrow-right-12"></span><span>'.esc_html($attribute['header']).'</span></h6>
            <div>'.do_shortcode($content).'</div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/