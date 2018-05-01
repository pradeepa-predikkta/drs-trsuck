<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Header_Subheader
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_header_subheader',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_header_subheader',
                'name'                                                          =>  __('Header & subheader','autospa'),
                'description'                                                   =>  __('Creates header and subheader','autospa'), 
                'category'                                                      => __('Content','autospa'),   
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'header',
                        'heading'                                               =>  __('Header','autospa'),
                        'description'                                           =>  __('Enter value for header.','autospa'),
                        'admin_label'                                           =>  true
                    ), 
                     array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'header_importance',
                        'heading'                                               =>  __('Header importance','autospa'),
                        'description'                                           =>  __('Select importance of the header.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('H1','autospa')                                  =>  '1',
                            __('H2','autospa')                                  =>  '2',
                            __('H3','autospa')                                  =>  '3',
                            __('H4','autospa')                                  =>  '4',
                            __('H5','autospa')                                  =>  '5',
                            __('H6','autospa')                                  =>  '6'
                        ),
                        'std'                                                   =>  '2'
                    ),        
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'underline_enable',
                        'heading'                                               =>  __('Underline','autospa'),
                        'description'                                           =>  __('Enable or disable underline between header and subheader.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enable','autospa')                              =>  '1',
                            __('Disable','autospa')                             =>  '0'
                        ),
                        'std'                                                   =>  '1'
                    ),                     
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'subheader',
                        'heading'                                               =>  __('Subheader','autospa'),
                        'description'                                           =>  __('Enter value for subheader.','autospa'),
                        'admin_label'                                           =>  true
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'align',
                        'heading'                                               =>  __('Align','autospa'),
                        'description'                                           =>  __('Select alignment of header and subheader.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Left','autospa')                                =>  'alignleft',
                            __('Center','autospa')                              =>  'aligncenter',
                            __('Right','autospa')                               =>  'alignright'
                        ),
                        'std'                                                   =>  'aligncenter'
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
            'header'                                                            =>  '',
            'header_importance'                                                 =>  '2',
            'underline_enable'                                                  =>  '1',
            'subheader'                                                         =>  '',
            'align'                                                             =>  'aligncenter',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['header'])) return($html);
        if(!$Validation->isNumber($attribute['header_importance'],1,6)) 
            $attribute['header_importance']=$default['header_importance'];
        if(!$Validation->isNumber($attribute['underline_enable'],0,1))
            $attribute['underline_enable']=$default['underline_enable'];
        if(!in_array($attribute['align'],array('alignleft','aligncenter','alignright'))) 
            $attribute['align']=$default['align'];
     
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-header-subheader',$attribute['align'],$attribute['css_class'])).'>
                <h'.$attribute['header_importance'].Autospa_ThemeHelper::createClassAttribute(array('theme-component-header-subheader-header',($attribute['underline_enable']==1 ? 'theme-header-underline' : null))).'>'.$attribute['header'].'</h'.$attribute['header_importance'].'>
                '.($Validation->isEmpty($attribute['subheader']) ? null : '<div class="theme-component-header-subheader-subheader">'.$attribute['subheader'].'</div>').'
            </div>
        ';      
     
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Header_Subheader(); 