<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Divider
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_divider',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        $Border=new Autospa_ThemeBorder();
        $VisualComposer=new Autospa_ThemeVisualComposer();
        
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_divider',
                'name'                                                          =>  __('Divider','autospa'),
                'description'                                                   =>  __('Creates divider','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'width',
                        'heading'                                               =>  __('Width','autospa'),
                        'description'                                           =>  __('Enter width of divider with unit, e.g: 80px, 100%.','autospa'),
                        'admin_label'                                           =>  true
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'height',
                        'heading'                                               =>  __('Height','autospa'),
                        'description'                                           =>  __('Enter height of divider with unit, e.g: 80px, 100%.','autospa'),
                        'admin_label'                                           =>  true
                    ),                    
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'style',
                        'heading'                                               =>  __('Style','autospa'),
                        'description'                                           =>  __('Select style of divider.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($Border->getStyle()),
                        'std'                                                   =>  'solid'
                    ),                    
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'color',
                        'heading'                                               =>  __('Icon color','autospa'),
                        'description'                                           =>  __('Enter color of divider.','autospa'),
                    ),  
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'align',
                        'heading'                                               =>  __('Align','autospa'),
                        'description'                                           =>  __('Select alignment of divider.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Left','autospa')                                =>  'alignleft',
                            __('Center','autospa')                              =>  'aligncenter',
                            __('Right','autospa')                               =>  'alignright'
                        ),
                        'std'                                                   =>  'alignleft'
                    ),                      
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'margin_top',
                        'heading'                                               =>  __('Top margin','autospa'),
                        'description'                                           =>  __('Enter top margin of divider in pixels. Allowed numbers are from range 0 to 999.','autospa'),
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'margin_bottom',
                        'heading'                                               =>  __('Bottom margin','autospa'),
                        'description'                                           =>  __('Enter bottom margin of divider in pixels. Allowed numbers are from range 0 to 999.','autospa'),
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'css_class',
                        'heading'                                               =>  __('CSS class','autospa'),
                        'description'                                           =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
                    )   
                )
            )
        );         
    } 
    
    /**************************************************************************/
     
    public function vcHTML($attr) 
    {
        $default=array
        (
            'width'                                                             =>  '',
            'height'                                                            =>  '',
            'style'                                                             =>  'solid',
            'color'                                                             =>  '',
            'align'                                                             =>  'alignleft',
            'margin_top'                                                        =>  '',
            'margin_bottom'                                                     =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Border=new Autospa_ThemeBorder();
        $Validation=new Autospa_ThemeValidation();
        
        if(!in_array($attribute['style'],$Border->getStyle())) 
            $attribute['style']=$default['style'];
        if(!$Validation->isColor($attribute['color']))
            $attribute['color']=$default['color'];         
        if(!in_array($attribute['align'],array('alignleft','aligncenter','alignright'))) 
            $attribute['align']=$default['align'];  
        if(!$Validation->isNumber($attribute['margin_top'],0,999))
            $attribute['margin_top']=$default['margin_top'];      
        if(!$Validation->isNumber($attribute['margin_bottom'],0,999))
            $attribute['margin_bottom']=$default['margin_bottom'];             
        
        $style=array();
        
        $style['width']=$attribute['width'];
        
        $style['border-style']=$attribute['style'];
        $style['border-color']=$attribute['color'];
        $style['border-width']=$attribute['height'];
        
        if($Validation->isNotEmpty($attribute['margin_top']))
           $style['margin-top']=$attribute['margin_top'].'px'; 
        if($Validation->isNotEmpty($attribute['margin_bottom']))
           $style['margin-bottom']=$attribute['margin_bottom'].'px';         
        
        $html='<div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-divider',$attribute['align'],$attribute['css_class'])).Autospa_ThemeHelper::createStyleAttribute($style).'></div>';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Divider(); 