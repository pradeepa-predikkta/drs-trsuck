<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_gallery_masonry',
        'name'                                                                  =>  __('Masonry gallery','autospa'),
        'description'                                                           =>  __('Creates masonry gallery','autospa'), 
        'category'                                                              =>  __('Content','autospa'),
        'as_parent'                                                             =>  array('only'=>'vc_autospa_theme_gallery_masonry_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'filter_enable',
                'heading'                                                       =>  __('Filter','autospa'),
                'description'                                                   =>  __('Allow to filter gallery items.','autospa'),
                'value'                                                         =>  array
                (
                    __('Yes','autospa')                                         =>  '1',
                    __('No','autospa')                                          =>  '0'
                ),
                'std'                                                           =>  '1'
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

add_shortcode('vc_autospa_theme_gallery_masonry',array('WPBakeryShortCode_VC_Autospa_Theme_Gallery_Masonry','vcHTML'));
 
/******************************************************************************/
        
class WPBakeryShortCode_VC_Autospa_Theme_Gallery_Masonry extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        global $autospa_gallery_masonry_id;
        
        $autospa_gallery_masonry_id=Autospa_ThemeHelper::createId('theme_gallery_masonry');
        
        $default=array
        (
            'filter_enable'                                                     =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        if(!$Validation->isNumber($attribute['filter_enable'],0,1))
            $attribute['filter_enable']=$default['filter_enable'];
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-gallery-masonry',($attribute['filter_enable']==1 ? 'theme-component-gallery-masonry-with-filter' : null),$attribute['css_class'])).'>
                <ul class="theme-component-gallery-masonry-image-list">
                    '.do_shortcode($content).'
                </ul>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 

/******************************************************************************/
/******************************************************************************/