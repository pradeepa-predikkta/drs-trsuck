<?php

/******************************************************************************/
/******************************************************************************/

$Easing=new Autospa_ThemeEasing();
$Carousel=new Autospa_ThemeCarouFredSel();
$VisualComposer=new Autospa_ThemeVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_testimonial_list',
        'name'                                                                  =>  __('Testimonials list','autospa'),
        'description'                                                           =>  __('Creates testimonials list.','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_testimonial_list_item'), 
        'show_settings_on_create'                                               =>  true,
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (                   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autospa'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
                'group'                                                         =>  __('General','autospa')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_auto_play_enable',
                'heading'                                                       =>  __('Autoplay','autospa'),
                'description'                                                   =>  __('Enable or disable autoplay.','autospa'),
                'value'                                                         =>  array
                (
                    __('Enabled','autospa')                                     =>  '1',
                    __('Disabled','autospa')                                    =>  '0',
                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('Carousel','autospa')
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'carousel_auto_timeout_duration',
                'heading'                                                       =>  __('Timeout duration','autospa'),
                'description'                                                   =>  __('Determines the duration of the timeout in milliseconds. Allowed are integer values from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Carousel','autospa')
            ),                     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_circular_enable',
                'heading'                                                       =>  __('Circular','autospa'),
                'description'                                                   =>  __('Determines whether the carousel should be circular.','autospa'),
                'value'                                                         =>  array
                (
                    __('Enabled','autospa')                                     =>  1,
                    __('Disabled','autospa')                                    =>  0,
                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('Carousel','autospa')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_infinite_enable',
                'heading'                                                       =>  __('Inifinite','autospa'),
                'description'                                                   =>  __('Determines whether the carousel should be infinite.','autospa'),
                'value'                                                         =>  array
                (
                    __('Enabled','autospa')                                     =>  1,
                    __('Disabled','autospa')                                    =>  0,
                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('Carousel','autospa')
            ),     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_scroll_pause_hover_enable',
                'heading'                                                       =>  __('Pause on hover','autospa'),
                'description'                                                   =>  __('Determines whether the timeout between transitions should be paused.','autospa'),
                'value'                                                         =>  array
                (
                    __('Enabled','autospa')                                     =>  1,
                    __('Disabled','autospa')                                    =>  0,
                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('Carousel','autospa')
            ),  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_direction',
                'heading'                                                       =>  __('Direction','autospa'),
                'description'                                                   =>  __('Direction of the carousel.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Carousel->getDirection()),
                'std'                                                           =>  'left',
                'group'                                                         =>  __('Carousel','autospa')
            ),                     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_scroll_fx',
                'heading'                                                       =>  __('Scroll effect','autospa'),
                'description'                                                   =>  __('Indicates which effect to use for the transition.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Carousel->getScrollFX()),
                'std'                                                           =>  'fade',
                'group'                                                         =>  __('Carousel','autospa')
            ),                
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'carousel_scroll_easing',
                'heading'                                                       =>  __('Easing','autospa'),
                'description'                                                   =>  __('Indicates which easing function to use for the transition.','autospa'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Easing->getEasingType()),
                'std'                                                           =>  'swing',
                'group'                                                         =>  __('Carousel','autospa')
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'carousel_scroll_duration',
                'heading'                                                       =>  __('Duration','autospa'),
                'description'                                                   =>  __('Determines the duration of the transition in milliseconds. Allowed are integer values from 0 to 999999.','autospa'),
                'group'                                                         =>  __('Carousel','autospa')
            )      
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autospa_theme_testimonial_list',array('WPBakeryShortCode_VC_Autospa_Theme_Testimonial_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Testimonial_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'css_class'                                                         =>  '',
            'carousel_auto_play_enable'                                         =>  '1',
            'carousel_auto_timeout_duration'                                    =>  '6000',
            'carousel_circular_enable'                                          =>  '1',
            'carousel_infinite_enable'                                          =>  '1',
            'carousel_scroll_pause_hover_enable'                                =>  '1',
            'carousel_direction'                                                =>  'left',
            'carousel_scroll_fx'                                                =>  'fade',
            'carousel_scroll_easing'                                            =>  'swing',
            'carousel_scroll_duration'                                          =>  '300',
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Easing=new Autospa_ThemeEasing();
        $Carousel=new Autospa_ThemeCarouFredSel();
        $Validation=new Autospa_ThemeValidation();

        if($Validation->isEmpty($content)) return($html);
        
        if(!$Validation->isNumber($attribute['carousel_auto_play_enable'],0,1))
            $attribute['carousel_auto_play_enable']=$default['carousel_auto_play_enable'];
        if(!$Validation->isNumber($attribute['carousel_auto_timeout_duration'],0,999999))
            $attribute['carousel_auto_timeout_duration']=$default['carousel_auto_timeout_duration'];  
        if(!$Validation->isNumber($attribute['carousel_circular_enable'],0,1))
            $attribute['carousel_circular_enable']=$default['carousel_circular_enable'];
        if(!$Validation->isNumber($attribute['carousel_infinite_enable'],0,1))
            $attribute['carousel_infinite_enable']=$default['carousel_infinite_enable'];
        if(!array_key_exists($attribute['carousel_direction'],$Carousel->getDirection()))
            $attribute['carousel_direction']=$default['carousel_direction'];          
        if(!$Validation->isNumber($attribute['carousel_scroll_pause_hover_enable'],0,1))
            $attribute['carousel_scroll_pause_hover_enable']=$default['carousel_scroll_pause_hover_enable'];
        if(!array_key_exists($attribute['carousel_scroll_fx'],$Carousel->getScrollFX()))
            $attribute['carousel_scroll_fx']=$default['carousel_scroll_fx'];       
        if(!array_key_exists($attribute['carousel_scroll_easing'],$Easing->getEasingType()))
            $attribute['carousel_scroll_easing']=$default['carousel_scroll_easing'];           
        if(!$Validation->isNumber($attribute['carousel_scroll_duration'],0,999999))
            $attribute['carousel_scroll_duration']=$default['carousel_scroll_duration'];        
        
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);

        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-testimonial-list',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                <ul>
                    '.do_shortcode($content).'
                </ul>
                <div class="theme-component-testimonial-list-navigation">
					<a href="#" class="theme-component-testimonial-list-navigation-left theme-icon-meta-arrow-large-rl"></a>
					<span class="theme-component-testimonial-list-navigation-center theme-icon-feature-testimonials"></span>
					<a href="#" class="theme-component-testimonial-list-navigation-right theme-icon-meta-arrow-large-rl"></a>
				</div>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/