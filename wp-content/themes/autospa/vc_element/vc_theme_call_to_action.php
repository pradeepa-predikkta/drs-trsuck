<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Call_To_Action
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_call_to_action',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_call_to_action',
                'name'                                                          =>  __('Call to action','autospa'),
                'description'                                                   =>  __('Creates call to action section','autospa'), 
                'category'                                                      =>  __('Content','autospa'),   
                'params'                                                        =>  array
                (  
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'header',
                        'heading'                                               =>  __('Header','autospa'),
                        'description'                                           =>  __('Enter header of the call to action section.','autospa'),
                        'admin_label'                                           =>  true
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'button_label',
                        'heading'                                               =>  __('Button label','autospa'),
                        'description'                                           =>  __('Enter label of the button.','autospa'),
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'button_url',
                        'heading'                                               =>  __('Button URL address','autospa'),
                        'description'                                           =>  __('Enter URL address of the button.','autospa'),
                    ),                     
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'button_url_target',
                        'heading'                                               =>  __('Button URL addres target','autospa'),
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
                        'param_name'                                            =>  'button_style',
                        'heading'                                               =>  __('Button style','autospa'),
                        'description'                                           =>  __('Select style of the button.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Style 1','autospa')                             =>  '1'
                        ),
                        'std'                                                   =>  '1'
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
            'header'                                                            =>  __('Call To Action','autospa'),
            'button_label'                                                      =>  __('Button','autospa'),
            'button_url'                                                        =>  '',
            'button_url_target'                                                 =>  '_self',
            'button_style'                                                      =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['button_url'])) 
            return($html);
        
        if($Validation->isEmpty($attribute['header']))
            $attribute['header']=$default['header'];
        if($Validation->isEmpty($attribute['button_label']))
            $attribute['button_label']=$default['button_label'];       
        if(!in_array($attribute['button_url_target'],array('_blank','_self','_parent','_top'))) 
            $attribute['button_url_target']=$default['button_url_target'];
        if(!in_array($attribute['button_style'],array('1'))) 
            $attribute['button_style']=$default['button_style'];        

        
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-call-to-action',$attribute['css_class'])).'>
                <h3'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-call-to-action-header')).'>'.$attribute['header'].'</h3>
                '.do_shortcode('[vc_autospa_theme_button url_target="'.$attribute['button_url_target'].'" style="'.$attribute['button_style'].'" label="'.$attribute['button_label'].'" url="'.$attribute['button_url'].'" css_class="theme-component-call-to-action-button"]').'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Call_To_Action(); 