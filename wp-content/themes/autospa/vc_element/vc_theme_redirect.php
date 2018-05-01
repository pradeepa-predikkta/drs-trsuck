<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Redirect
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_redirect',array($this,'vcHTML'));
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
                'base'                                                          =>  'vc_autospa_theme_redirect',
                'name'                                                          =>  __('Redirect','autospa'),
                'description'                                                   =>  __('Creates redirection based on entered URL address or post ID','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'url',
                        'heading'                                               =>  __('URL address','autospa'),
                        'description'                                           =>  __('Enter URL addres.','autospa'),
                        'admin_label'                                           =>  true
                    ), 
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'post_id',
                        'heading'                                               =>  __('Post ID','autospa'),
                        'description'                                           =>  __('Enter post ID.','autospa'),
                        'admin_label'                                           =>  true
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
            'url'                                                               =>  '',
            'post_id'                                                           =>  '',
            'status'                                                            =>  '301'
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Border=new Autospa_ThemeBorder();
        $Validation=new Autospa_ThemeValidation();
        
        if(($Validation->isEmpty($attribute['url'])) && ($Validation->isEmpty($attribute['post_id'])))
            return;
        
        if($Validation->isNotEmpty($attribute['post_id']))
        {
            $post=get_post($attribute['post_id']);
            if(is_null($post)) return;
            
            wp_redirect(get_permalink($post->ID),$attribute['status']);
            exit;
        }
        else
        {
            wp_redirect($attribute['url']);
            exit;
        }
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Redirect(); 