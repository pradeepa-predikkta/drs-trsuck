<?php

/******************************************************************************/
/******************************************************************************/

$Accordion=new Autospa_ThemeAccordion();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_simple_table',
        'name'                                                                  =>  __('Simple table','autospa'),
        'description'                                                           =>  __('Creates two columns table','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_simple_table_item'), 
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
                'group'                                                         =>  __('General','autospa'),
            )                   
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autospa_theme_simple_table',array('WPBakeryShortCode_VC_Autospa_Theme_Simple_Table','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Simple_Table extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'css_class'                                                         =>  '',
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-simple-table','theme-clear-fix',$attribute['css_class'])).'>
                <ul>
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