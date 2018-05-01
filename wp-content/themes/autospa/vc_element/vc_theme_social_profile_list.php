<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_social_profile_list',
        'name'                                                                  =>  __('Social profiles list','autospa'),
        'description'                                                           =>  __('Creates list of social profiles','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_social_profile_list_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'use_data_from_theme_option',
                'heading'                                                       =>  __('Use data from Theme Options','autospa'),
                'description'                                                   =>  __('Enable or disable this option allows to use the data of social profiles defined in Theme Options. In this case you don\'t need to enter these details directly in component.' ,'autospa'),
                'value'                                                         =>  array
                (
                    __('Enable','autospa')                                      =>  '1',
                    __('Disable','autospa')                                     =>  '0'
                ),
                'std'                                                           =>  '0'
            ),  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autospa'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
            )
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autospa_theme_social_profile_list',array('WPBakeryShortCode_VC_Autospa_Theme_Social_Profile_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Social_Profile_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/

    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'use_data_from_theme_option'                                        =>  '0',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Icon=new Autospa_ThemeIcon();
        $Validation=new Autospa_ThemeValidation();
        
        if(!$Validation->isNumber($attribute['use_data_from_theme_option'],0,1))
            $attribute['use_data_from_theme_option']=$default['use_data_from_theme_option'];        
        
        if($attribute['use_data_from_theme_option']==1)
        {
            $content=null;
            $socialProfile=array();
       
            foreach($Icon->getSocialIcon() as $index=>$value)
            {
                $address=Autospa_ThemeOption::getOption('social_profile_address_'.$index);
                $order=(int)Autospa_ThemeOption::getOption('social_profile_order_'.$index);
                
                if($Validation->isEmpty($address)) continue;
                $socialProfile[$order]=array($index,$address);
            }
            
            ksort($socialProfile);
            
            foreach($socialProfile as $value)
                $content.='[vc_autospa_theme_social_profile_list_item name="'.$value[0].'" url="'.$value[1].'"]';
        }
       
        if($Validation->isEmpty($content)) return($html);
        
        $html=
        '
            <ul'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-social-profile','theme-clear-fix',$attribute['css_class'])).'>
                '.do_shortcode($content).'
            </ul>
        ';
        
        return($html);
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/