<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Blockquote
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
       add_shortcode('vc_autospa_theme_blockquote',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_blockquote',
                'name'                                                          =>  __('Blockquote','autospa'),
                'description'                                                   =>  __('Creates blockquote','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textarea',
                        'param_name'                                            =>  'content',
                        'admin_label'                                           =>  true,
                        'heading'                                               =>  __('Blockquote','autospa'),
                        'description'                                           =>  __('Enter blockquote.','autospa'),
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
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);

        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-blockquote',$attribute['css_class'])).'>
                '.$content.'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Blockquote(); 