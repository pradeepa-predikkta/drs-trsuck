<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Recent_Post 
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_recent_post',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_recent_post',
                'name'                                                          =>  __('Recent posts','autospa'),
                'description'                                                   =>  __('Creates recent posts list','autospa'), 
                'category'                                                      =>  __('Content','autospa'),   
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'post_count',
                        'heading'                                               =>  __('Post count','autospa'),
                        'description'                                           =>  __('Number of posts to shown. It should be an integer value from 1 to 99','autospa'),
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
            'post_count'                                                        =>  3,
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isNumber($attribute['post_count'],1,99))
            $attribute['post_count']=$default['post_count'];        
        
		$parameter=array
		(
			'post_type'                                                         =>	'post',
			'posts_per_page'                                                    =>	(int)$attribute['post_count'],
			'orderby'                                                           =>	'date',
			'order'                                                             =>	'desc'
		);

		$query=new WP_Query($parameter);

		if(!$query) return($html);
        if(!$query->post_count) return($html);
        
        global $post;
		$bPost=$post;

		while($query->have_posts())
		{
			$query->the_post();
            
            $html.=
            '
                <li>
                    <a href="'.get_the_permalink().'" title="'.esc_attr(sprintf(__('View post "%s".','autospa'),get_the_title())).'">
                        <span>'.get_the_title().'</span>
                        <span>'.get_the_date().'</span>
                    </a>
                </li>
            ';
        }
        
        $post=$bPost;
        
        $html= 
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-recent-post',$attribute['css_class'])).'>
                <ul>
                    '.$html.'
                </ul>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Recent_Post(); 