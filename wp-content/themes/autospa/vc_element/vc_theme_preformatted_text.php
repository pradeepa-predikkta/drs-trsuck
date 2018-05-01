<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Preformatted_Text
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_preformatted_text',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_preformatted_text',
                'name'                                                          =>  __('Preformatted text','autospa'),
                'description'                                                   =>  __('Creates block with preformatted text','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textarea',
                        'param_name'                                            =>  'content',
                        'admin_label'                                           =>  true,
                        'heading'                                               =>  __('Content','autospa')
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
   			<div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-preformatted-text','theme-state-open',$attribute['css_class'])).'>
				<div>
					<a href="#">
						<span>'.esc_html('Open','autospa').'</span>
						<span>'.esc_html('Close','autospa').'</span>
					</a>
				</div>
				<pre>'.wp_kses_normalize_entities($content).'</pre>
			</div> 
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Preformatted_Text(); 