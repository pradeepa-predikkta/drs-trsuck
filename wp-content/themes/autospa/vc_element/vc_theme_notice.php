<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Notice
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_notice',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        $Icon=new Autospa_ThemeIcon();
        $Feature=new Autospa_ThemeFeature();
        $VisualComposer=new Autospa_ThemeVisualComposer();
        
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_notice',
                'name'                                                          =>  __('Notice','autospa'),
                'description'                                                   =>  __('Creates notice','autospa'), 
                'category'                                                      =>  __('Content','autospa'),  
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'icon',
                        'heading'                                               =>  __('Icon','autospa'),
                        'description'                                           =>  __('Select icon.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($Icon->getFeatureIcon()),
                        'group'                                                 =>  __('General','autospa'),
                        'std'                                                   =>  'user-chat'
                    ),                      
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'header_text',
                        'heading'                                               =>  __('Header','autospa'),
                        'description'                                           =>  __('Enter text of header.','autospa'),
                        'admin_label'                                           =>  true,
                        'group'                                                 =>  __('General','autospa'),
                    ),                     
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'subheader_text',
                        'heading'                                               =>  __('Subheader','autospa'),
                        'description'                                           =>  __('Enter text of subheader.','autospa'),
                        'admin_label'                                           =>  true,
                        'group'                                                 =>  __('General','autospa'),
                    ),                         
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'close_button_enable',
                        'heading'                                               =>  __('Close button','autospa'),
                        'description'                                           =>  __('Enable or disable displaying of close button.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enable','autospa')                              =>  '1',
                            __('Disable','autospa')                             =>  '0'
                        ),
                        'std'                                                   =>  '1',
                        'group'                                                 =>  __('General','autospa'),
                    ),                        
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'progress_bar_enable',
                        'heading'                                               =>  __('Progress bar','autospa'),
                        'description'                                           =>  __('Enable or disable displaying of progress bar.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enable','autospa')                              =>  '1',
                            __('Disable','autospa')                             =>  '0'
                        ),
                        'std'                                                   =>  '1',
                        'group'                                                 =>  __('General','autospa'),
                    ),                          
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'time_to_close',
                        'heading'                                               =>  __('Time to close','autospa'),
                        'description'                                           =>  __('Time (in miliseconds) to close notice. Allowed are values from range 0 to 999999.','autospa'),
                        'group'                                                 =>  __('General','autospa'),
                    ),                     
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'css_class',
                        'heading'                                               =>  __('CSS class','autospa'),
                        'description'                                           =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
                        'group'                                                 =>  __('General','autospa'),
                    ),
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'box_border_color',
                        'heading'                                               =>  __('Box border color','autospa'),
                        'description'                                           =>  __('Enter color of box border.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ),                     
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'box_background_color',
                        'heading'                                               =>  __('Box background color','autospa'),
                        'description'                                           =>  __('Enter color of box background.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ),                       
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'icon_text_color',
                        'heading'                                               =>  __('Icon color','autospa'),
                        'description'                                           =>  __('Enter color of the icon.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ), 
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'icon_background_color',
                        'heading'                                               =>  __('Icon background color','autospa'),
                        'description'                                           =>  __('Enter color of icon background.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ),                    
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'header_text_color',
                        'heading'                                               =>  __('Header color','autospa'),
                        'description'                                           =>  __('Enter color of header.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ),               
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'subheader_text_color',
                        'heading'                                               =>  __('Subheader color','autospa'),
                        'description'                                           =>  __('Enter color of subheader.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ),       
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'close_button_text_color',
                        'heading'                                               =>  __('Button color','autospa'),
                        'description'                                           =>  __('Enter color of button.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
                    ),                 
                    array
                    (
                        'type'                                                  =>  'colorpicker',
                        'param_name'                                            =>  'progress_bar_background_color',
                        'heading'                                               =>  __('Progress bar color','autospa'),
                        'description'                                           =>  __('Enter color of prgress bar.','autospa'),
                        'group'                                                 =>  __('Styles','autospa'),
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
            'icon'                                                              =>  'check',
            'header_text'                                                       =>  '',
            'subheader_text'                                                    =>  '',
            'close_button_enable'                                               =>  '1',
            'progress_bar_enable'                                               =>  '1',
            'time_to_close'                                                     =>  '0',
            'box_border_color'                                                  =>  '',
            'box_background_color'                                              =>  '',
            'icon_text_color'                                                   =>  '',
            'icon_background_color'                                             =>  '',
            'header_text_color'                                                 =>  '',
            'subheader_text_color'                                              =>  '',
            'close_button_text_color'                                           =>  '',
            'progress_bar_background_color'                                     =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['subheader_text']))
            $attribute['subheader_text']=$content;
        
        if(($Validation->isEmpty($attribute['header_text'])) && ($Validation->isEmpty($attribute['subheader_text']))) return($html);
        if(!$Validation->isNumber($attribute['close_button_enable'],0,1))
            $attribute['close_button_enable']=$default['close_button_enable'];
        if(!$Validation->isNumber($attribute['close_button_enable'],0,1))
            $attribute['progress_bar_enable']=$default['progress_bar_enable'];        
        if(!$Validation->isNumber($attribute['time_to_close'],0,999999))
            $attribute['time_to_close']=$default['time_to_close'];         
        if(!$Validation->isColor($attribute['box_border_color']))
            $attribute['box_border_color']=$default['box_border_color'];          
        if(!$Validation->isColor($attribute['box_background_color']))
            $attribute['box_background_color']=$default['box_background_color'];
        if(!$Validation->isColor($attribute['icon_text_color']))
            $attribute['icon_text_color']=$default['icon_text_color'];          
        if(!$Validation->isColor($attribute['icon_background_color']))
            $attribute['icon_background_color']=$default['icon_background_color'];          
        if(!$Validation->isColor($attribute['header_text_color']))
            $attribute['header_text_color']=$default['header_text_color'];          
        if(!$Validation->isColor($attribute['subheader_text_color']))
            $attribute['subheader_text_color']=$default['subheader_text_color'];          
        if(!$Validation->isColor($attribute['close_button_text_color']))
            $attribute['close_button_text_color']=$default['close_button_text_color'];          
        if(!$Validation->isColor($attribute['progress_bar_background_color']))
            $attribute['progress_bar_background_color']=$default['progress_bar_background_color'];    
        
        /***/
        
        $style=array(array(),array(),array(),array(),array(),array(),array());
        
        if($Validation->isColor($attribute['icon_background_color']))
            $style[0]['background-color']=$attribute['icon_background_color'];
        if($Validation->isColor($attribute['icon_text_color']))
            $style[1]['color']=$attribute['icon_text_color'];        
        if($Validation->isColor($attribute['box_border_color']))
        {
            $style[2]['border-width']='1px';
            $style[2]['border-style']='solid';
            $style[2]['border-color']=$attribute['box_border_color'];
        }
        if($Validation->isColor($attribute['box_background_color']))
            $style[2]['background-color']=$attribute['box_background_color'];
        
        if($Validation->isNotEmpty($attribute['header_text']))
        {
            if($Validation->isColor($attribute['header_text_color'])) $style[3]['color']=$attribute['header_text_color'];            
            $html.='<h5'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice-content-header')).Autospa_ThemeHelper::createStyleAttribute($style[3]).'>'.$attribute['header_text'].'</h5>';
        }
        if($Validation->isNotEmpty($attribute['subheader_text']))
        {
            if($Validation->isColor($attribute['subheader_text_color'])) $style[4]['color']=$attribute['subheader_text_color'];            
            $html.='<p'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice-content-subheader')).Autospa_ThemeHelper::createStyleAttribute($style[4]).'>'.$attribute['subheader_text'].'</p>';
        }                    
        
        if($attribute['close_button_enable'])
        {
            if($Validation->isColor($attribute['close_button_text_color'])) $style[5]['color']=$attribute['close_button_text_color'];
            
            $label=__('Close','autospa');
            if($attribute['time_to_close']>0) $label=__('Close within <span></span> seconds','autospa');
            
            $html.='<div><a href="#"'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice-content-close-button')).Autospa_ThemeHelper::createStyleAttribute($style[5]).'>'.$label.'</a></div>';
        }
        if($attribute['progress_bar_enable'])
        {
            if($Validation->isColor($attribute['progress_bar_background_color'])) $style[6]['background-color']=$attribute['progress_bar_background_color'];
            $html.='<div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice-content-progress-bar')).Autospa_ThemeHelper::createStyleAttribute($style[6]).'><div></div></div>';
        } 
        
        $dataAttribute=array();
        $dataAttribute['time_to_close']=$attribute['time_to_close'];

        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice-icon')).Autospa_ThemeHelper::createStyleAttribute($style[0]).'>
                    <span'.Autospa_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'])).Autospa_ThemeHelper::createStyleAttribute($style[1]).'></span>
                </div>
                <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-notice-content')).Autospa_ThemeHelper::createStyleAttribute($style[2]).'>
                    '.$html.'
                </div>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Notice(); 