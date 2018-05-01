<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Button 
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_button',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_button',
                'name'                                                          =>  __('Button','autospa'),
                'description'                                                   =>  __('Creates button','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'label',
                        'admin_label'                                           =>  true,
                        'heading'                                               =>  __('Label','autospa'),
                        'description'                                           =>  __('Enter label of the button.','autospa'),
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'url',
                        'heading'                                               =>  __('URL address','autospa'),
                        'description'                                           =>  __('Enter URL address of the button.','autospa'),
                    ),                     
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'url_target',
                        'heading'                                               =>  __('URL address target','autospa'),
                        'description'                                           =>  __('Select target of the URL address.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Blank','autospa')                               =>  '_blank',
                            __('Parent','autospa')                              =>  '_parent',
                            __('Self','autospa')                                =>  '_self',
                            __('Top','autospa')                                 =>  '_top'
                        ),
                        'std'                                                   =>  '_self'
                    ),        
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'style',
                        'heading'                                               =>  __('Style','autospa'),
                        'description'                                           =>  __('Select style of the button.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Style 1','autospa')                             =>  1
                        ),
                        'std'                                                   =>  '1'
                    ),                     
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'align',
                        'heading'                                               =>  __('Align','autospa'),
                        'description'                                           =>  __('Select alignment of the button.','autospa'),
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
            'label'                                                             =>  __('Button','autospa'),
            'url'                                                               =>  '',
            'url_target'                                                        =>  '_self',
            'style'                                                             =>  '1',
            'align'                                                             =>  'left',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['url'])) 
            return($html);
        
        if($Validation->isEmpty($attribute['label']))
            $attribute['label']=$default['label'];
        if(!in_array($attribute['url_target'],array('_blank','_self','_parent','_top'))) 
            $attribute['url_target']=$default['url_target'];
        if(!in_array($attribute['style'],array('1'))) 
            $attribute['style']=$default['style'];        
        if(!in_array($attribute['align'],array('alignleft','aligncenter','alignright'))) 
            $attribute['align']=$default['align'];       

        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-button',$attribute['align'],$attribute['css_class'])).'>
                <a href="'.esc_url($attribute['url']).'" target="'.esc_attr($attribute['url_target']).'" '.Autospa_ThemeHelper::createClassAttribute(array('theme-button','theme-button-'.$attribute['style'])).'>
                    '.$attribute['label'].'
                </a>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Button(); 