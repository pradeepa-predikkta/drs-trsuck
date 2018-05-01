<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Feature
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_feature',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        $Icon=new Autospa_ThemeIcon();
        $Feature=new Autospa_ThemeFeature();
        $VisualComposer=new Autospa_ThemeVisualComposer();
        
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_feature',
                'name'                                                          =>  __('Features','autospa'),
                'description'                                                   =>  __('Creates single feature','autospa'), 
                'category'                                                      =>  __('Content','autospa'),   
                'params'                                                        =>  array
                (  
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'header',
                        'heading'                                               =>  __('Header','autospa'),
                        'description'                                           =>  __('Enter header of feature.','autospa'),
                        'admin_label'                                           =>  true
                    ),
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'header_url',
                        'heading'                                               =>  __('Header URL address','autospa'),
                        'description'                                           =>  __('Enter header URL address.','autospa'),
                    ),                    
                    array
                    (
                        'type'                                                  =>  'textarea_html',
                        'param_name'                                            =>  'content',
                        'heading'                                               =>  __('Description','autospa'),
                        'description'                                           =>  __('Enter description of feature.','autospa'),
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'icon',
                        'heading'                                               =>  __('Icon','autospa'),
                        'description'                                           =>  __('Select icon of feature.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($Icon->getFeatureIcon()),
                        'std'                                                   =>  'car-2'
                    ),                    
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'icon_color',
                        'heading'                                               =>  __('Icon color','autospa'),
                        'description'                                           =>  __('Enter color of icon.','autospa'),
                    ),
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'icon_size',
                        'heading'                                               =>  __('Icon size','autospa'),
                        'description'                                           =>  __('Enter icon size in pixel. Values from 1-200 are allowed.','autospa'),
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'icon_position',
                        'heading'                                               =>  __('Icon position','autospa'),
                        'description'                                           =>  __('Select icon position of feature.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($Feature->getFeatureIconPosition()),
                        'std'                                                   =>  'top-left'
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
     
    public function vcHTML($attr,$content) 
    {
        $default=array
        (
            'header'                                                            =>  '',
            'header_url'                                                        =>  '',
            'icon'                                                              =>  'car-2',
            'icon_color'                                                        =>  '',
            'icon_size'                                                         =>  '',
            'icon_position'                                                     =>  'top-left',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Icon=new Autospa_ThemeIcon();
        $Feature=new Autospa_ThemeFeature();
        $Validation=new Autospa_ThemeValidation();
        
        if(($Validation->isEmpty($attribute['header'])) && ($Validation->isEmpty($content)))
            return($html);
        if(!array_key_exists($attribute['icon'],$Icon->getFeatureIcon()))
            $attribute['icon']=$default['icon'];
        if(!$Validation->isColor($attribute['icon_color']))
            $attribute['icon_color']=$default['icon_color']; 
        else $attribute['icon_color']=$attribute['icon_color'];
        if(!$Validation->isNumber($attribute['icon_size'],1,200))
            $attribute['icon_size']=$default['icon_size'];  
        else $attribute['icon_size']=$attribute['icon_size'].'px';  
        if(!array_key_exists($attribute['icon_position'],$Feature->getFeatureIconPosition()))
            $attribute['icon_position']=$default['icon_position'];       
        
        if($Validation->isNotEmpty($attribute['header']))
        {
            if($Validation->isNotEmpty($attribute['header_url']))
                $html='<a href="'.esc_url($attribute['header_url']).'">'.esc_html($attribute['header']).'</a>';  
            else $html=esc_html($attribute['header']);  
            $html='<h5>'.$html.'</h5>';
        }
        
        if($Validation->isNotEmpty($content))
            $html.='<div>'.do_shortcode(wpb_js_remove_wpautop($content,true)).'</div>';
        
        $style=array();
        
        if($Validation->isNotEmpty($attribute['icon_size']))
        {
            if($attribute['icon_position']=='left-top')
                $style['padding-left']=$attribute['icon_size'];
            else if($attribute['icon_position']=='right-top')
                $style['padding-right']=$attribute['icon_size'];
        }

        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-feature','theme-component-feature-icon-position-'.$attribute['icon_position'],$attribute['css_class'])).Autospa_ThemeHelper::createStyleAttribute($style).'>
                <span'.Autospa_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'])).Autospa_ThemeHelper::createStyleAttribute(array('color'=>$attribute['icon_color'],'font-size'=>$attribute['icon_size'])).'></span>
                '.$html.'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Feature(); 