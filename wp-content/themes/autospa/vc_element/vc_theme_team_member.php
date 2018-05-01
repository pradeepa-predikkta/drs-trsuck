<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Team_Member 
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_team_member',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        $Icon=new Autospa_ThemeIcon();
        $VisualComposer=new Autospa_ThemeVisualComposer();
        
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_team_member',
                'name'                                                          =>  __('Team member','autospa'),
                'description'                                                   =>  __('Creates team member','autospa'), 
                'category'                                                      =>  __('Content','autospa'),   
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'name',
                        'heading'                                               =>  __('Name','autospa'),
                        'description'                                           =>  __('Name of the team member.','autospa'),
                        'admin_label'                                           =>  true
                    ),
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'position',
                        'heading'                                               =>  __('Position','autospa'),
                        'description'                                           =>  __('Position of the team member.','autospa'),
                    ),                   
                    array
                    (
                        'type'                                                  =>  'attach_image',
                        'param_name'                                            =>  'image',
                        'heading'                                               =>  __('Image','autospa'),
                        'description'                                           =>  __('Select image of team member.','autospa')
                    ), 
                    array
                    (
                        'type'                                                  =>  'textarea',
                        'param_name'                                            =>  'description',
                        'heading'                                               =>  __('Description','autospa'),
                        'description'                                           =>  __('Description of the team member.','autospa'),
                    ),    
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'css_class',
                        'heading'                                               =>  __('CSS class','autospa'),
                        'description'                                           =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
                    ),
                    array
                    (
                        'type'                                                  =>  'param_group',
                        'param_name'                                            =>  'social_profile',
                        'params'                                                =>  array
                        (
                            array
                            (
                                'type'                                          =>  'dropdown',
                                'param_name'                                    =>  'profile_name',
                                'heading'                                       =>  __('Social profile','autospa'),
                                'description'                                   =>  __('Select social profile.','autospa'),
                                'value'                                         =>  $VisualComposer->createParamDictionary($Icon->getSocialIcon()),
                                'std'                                           =>  'facebook'
                            ), 
                            array
                            (
                                'type'                                          =>  'textfield',
                                'param_name'                                    =>  'profile_url',
                                'heading'                                       =>  __('URL address','autospa'),
                                'description'                                   =>  __('URL address of the social profile.','autospa'),
                            )
                        ),
                        'group'                                                 =>  __('Social profiles','autospa')
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
            'name'                                                              =>  '',
            'position'                                                          =>  '',
            'image'                                                             =>  '0',
            'description'                                                       =>  '',
            'css_class'                                                         =>  '',
            'social_profile'                                                    =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['name'])) return($html);
        
        $htmlImage=null;
        if((int)$attribute['image'])
        {
            $image=wp_get_attachment_image_src($attribute['image'],'large');
            $htmlImage=$image===false ? null : '<img src="'.esc_url($image[0]).'" alt="'.esc_attr($attribute['name']).'"/>';
        }
        
        $htmlDescription=null;
        if($Validation->isNotEmpty($attribute['description']))
        {
            $htmlDescription=
            '
                <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-divider')).'></div>
                <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-team-member-description')).'>'.esc_html($attribute['description']).'</div>
                <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-divider')).'></div>
            ';
        }
        
        $htmlSocialProfile=null;
        if($Validation->isNotEmpty($attribute['social_profile']))
        {
            $socialProfile=json_decode(rawurldecode($attribute['social_profile']));
            
            foreach($socialProfile as $value)
                $htmlSocialProfile.='[vc_autospa_theme_social_profile_list_item name="'.$value->{'profile_name'}.'" url="'.$value->{'profile_url'}.'"][/vc_autospa_theme_social_profile_list_item]';

            if($Validation->isNotEmpty($htmlSocialProfile))
                $htmlSocialProfile='[vc_autospa_theme_social_profile_list use_data_from_theme_option="0"]'.$htmlSocialProfile.'[/vc_autospa_theme_social_profile_list]';
        }

        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-team-member','theme-clear-fix',$attribute['css_class'])).'>
                '.$htmlImage.'
                '.do_shortcode('[vc_autospa_theme_header_subheader header_importance="6" underline_enable="0" align="alignleft" header="'.$attribute['name'].'" subheader="'.$attribute['position'].'"]').'
                '.$htmlDescription.'
                '.do_shortcode($htmlSocialProfile).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Team_Member(); 