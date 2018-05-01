<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_testimonial_list_item',
        'name'                                                                  =>  __('Testimonials list item','autospa'),
        'description'                                                           =>  __('Creates single item of testimonials list','autospa'), 
        'category'                                                              =>  __('Content','autospa'),   
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_testimonial_list'),
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'testimonial',
                'heading'                                                       =>  __('Testimonial','autospa'),
                'description'                                                   =>  __('Enter testimonial of item.','autospa'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'author',
                'heading'                                                       =>  __('Author','autospa'),
                'description'                                                   =>  __('Enter author of testimonial.','autospa'),
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'car_name',
                'heading'                                                       =>  __('Car name','autospa'),
                'description'                                                   =>  __('Enter car name.','autospa'),
            )                       
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autospa_theme_testimonial_list_item',array('WPBakeryShortCode_VC_Autospa_Theme_Testimonial_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Testimonial_List_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'testimonial'                                                       =>  '',
            'author'                                                            =>  '',
            'car_name'                                                          =>  '',   
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;

        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['testimonial'])) return($html);
    
        if($Validation->isNotEmpty($attribute['author']))
            $html.='<h6>'.esc_html($attribute['author']).'</h6>';
         if($Validation->isNotEmpty($attribute['car_name']))
            $html.='<span>'.esc_html($attribute['car_name']).'</span>';
         
        $html=
        '
            <li>
                <p>'.esc_html($attribute['testimonial']).'</p>
                <div>
                    '.$html.'
                </div>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/ 