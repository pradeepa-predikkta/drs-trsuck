<?php

/******************************************************************************/
/******************************************************************************/

$Icon=new Autospa_ThemeIcon();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_social_profile_list_item',
        'name'                                                                  =>  __('Social profiles list item','autospa'),
        'description'                                                           =>  __('Creates single social profile','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_social_profile_list'),
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'name',
                'heading'                                                       =>  __('Social profile','autospa'),
                'description'                                                   =>  __('Select social profile.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Icon->getSocialIcon()),
                'std'                                                           =>  'facebook',
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'url',
                'heading'                                                       =>  __('URL address','autospa'),
                'description'                                                   =>  __('URL address of the social profile.','autospa'),
                'admin_label'                                                   =>  true
            )
        )
    )
);   

/******************************************************************************/

add_shortcode('vc_autospa_theme_social_profile_list_item',array('WPBakeryShortCode_VC_Autospa_Theme_Social_Profile_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Social_Profile_List_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'name'                                                              =>  '',
            'url'                                                               =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;

        $Icon=new Autospa_ThemeIcon();
        $Validation=new Autospa_ThemeValidation();
        
        if(($Validation->isEmpty($attribute['name'])) || ($Validation->isEmpty($attribute['url']))) return($html);
        
        if(!array_key_exists($attribute['name'],$Icon->getSocialIcon())) return($html);
        
        $html=
        '
            <li>
                <a href="'.esc_url($attribute['url']).'"'.Autospa_ThemeHelper::createClassAttribute(array('theme-icon-social-'.$attribute['name'])).' target="_blank"></a>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/