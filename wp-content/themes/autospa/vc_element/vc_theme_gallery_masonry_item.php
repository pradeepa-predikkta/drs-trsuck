<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autospa_theme_gallery_masonry_item',
        'name'                                                                  =>  __('Masonry gallery item','autospa'),
        'description'                                                           =>  __('Creates single masonry gallery item','autospa'), 
        'category'                                                              =>  __('Content','autospa'),
        'as_child'                                                              =>  array('only'=>'vc_autospa_theme_gallery_masonry'),
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'attach_image',
                'param_name'                                                    =>  'image',
                'heading'                                                       =>  __('Image','autospa'),
                'description'                                                   =>  __('Select an image','autospa'),
                'admin_label'                                                   =>  true
            ),   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'width',
                'heading'                                                       =>  __('Width','autospa'),
                'description'                                                   =>  __('Width of the item.','autospa'),
                'value'                                                         =>  array
                (
                    __('1x','autospa')                                          =>  '1',
                    __('2x','autospa')                                          =>  '2'
                ),
                'std'                                                           =>  '1'
            )
        )
    )
);  

/******************************************************************************/

add_shortcode('vc_autospa_theme_gallery_masonry_item',array('WPBakeryShortCode_VC_Autospa_Theme_Gallery_Masonry_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Gallery_Masonry_Item extends WPBakeryShortCode 
{
    /**************************************************************************/
    
    public static function vcHTML($attr) 
    {
        global $autospa_gallery_masonry_id;
        
        $default=array
        (
            'image'                                                             =>  '',
            'width'                                                             =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if(!in_array($attribute['width'],array(1,2))) 
            $attribute['width']=$default['width'];
        
        if(($image=wp_get_attachment_image_src($attribute['image'],'full'))===false) return($html);
            
        $post=get_post($attribute['image']);
        
        if(($Validation->isNotEmpty($post->post_title)) || ($Validation->isNotEmpty($post->post_content)))
        {
            $html=
            '
                <span>'.esc_html($post->post_title).'</span>
                <span></span>
                <span>'.esc_html($post->post_content).'</span>                
            ';
        }
        
        $description=null;
        if($Validation->isNotEmpty($post->post_title))
           $description='<b>'.esc_html($post->post_title).'</b>';
        if($Validation->isNotEmpty($post->post_content))
        {
            if($Validation->isNotEmpty($description)) $description.=' | ';
            $description.=$post->post_content;
        }

        $dataAttribute=array();
        $term=get_the_category($attribute['image']);
        
        foreach($term as $value)
            $dataAttribute['category'][]=array('id'=>$value->{'term_id'},'name'=>$value->{'name'});

        if(isset($dataAttribute['category']))
            $dataAttribute['category']=json_encode($dataAttribute['category']);
            
        $html=
        '
            <li'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-gallery-masonry-item','theme-component-gallery-masonry-item-width-'.(int)$attribute['width'],'theme-image','theme-image-hover')).' data-width-count="'.(int)$attribute['width'].'"'.Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                <a data-fancybox-group="'.esc_attr($autospa_gallery_masonry_id).'" href="'.esc_attr($image[0]).'" class="theme-image-fancybox">
                    <img src="'.esc_attr($image[0]).'" alt=""/>
                    <span class="theme-image-hover-layer">
                        <span>
                            <span>
                                '.$html.'
                            </span>
                        </span>
                    </span>
                    <span class="theme-image-description">'.$description.'</span>
                </a>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/