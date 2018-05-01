<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Italic_Text 
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_italic_text',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_italic_text',
                'name'                                                          =>  __('Italic text','autospa'),
                'description'                                                   =>  __('Creates block of italics text','autospa'), 
                'category'                                                      =>  __('Content','autospa'),   
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textarea',
                        'param_name'                                            =>  'content',
                        'admin_label'                                           =>  true,
                        'heading'                                               =>  __('Text','autospa'),
                        'description'                                           =>  __('Enter text.','autospa')
                    ), 
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'align',
                        'heading'                                               =>  __('Align','autospa'),
                        'description'                                           =>  __('Select alignment of text.','autospa'),
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
     
    public function vcHTML($attr,$content) 
    {
        $default=array
        (
            'text'                                                              =>  '',
            'align'                                                             =>  'alignleft',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        if(!in_array($attribute['align'],array('alignleft','aligncenter','alignright'))) 
            $attribute['align']=$default['align'];
     
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-italic-text',$attribute['align'],$attribute['css_class'])).'>
                '.$content.'
            </div>
        ';      
     
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Italic_Text(); 