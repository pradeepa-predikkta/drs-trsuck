<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemePost
{
	/**************************************************************************/
	
	function __construct()
	{
        $this->element=array
        (
            'date'                                                              =>  array(__('Date','autospa'),__('date','autospa')),
            'title'                                                             =>  array(__('Title','autospa'),__('title','autospa')),
            'author'                                                            =>  array(__('Author','autospa'),__('author','autospa')),
            'category'                                                          =>  array(__('Category','autospa'),__('category','autospa')),
            'comment_count'                                                     =>  array(__('Comments count','autospa'),__('comments count','autospa')),
            'image'                                                             =>  array(__('Image','autospa'),__('image','autospa')),
            'excerpt'                                                           =>  array(__('Excerpt','autospa'),__('excerpt','autospa')),
            'content'                                                           =>  array(__('Content','autospa'),__('content','autospa')),
            'author_info'                                                       =>  array(__('Author info','autospa'),__('author info','autospa')),
            'read_more_button'                                                  =>  array(__('Read more button','autospa'),__('read more button','autospa')),
            'divider'                                                           =>  array(__('Divider','autospa'),__('divider','autospa')),
            'social_share'                                                      =>  array(__('Social share','autospa'),__('social share','autospa')),
            'tag'                                                               =>  array(__('Tags','autospa'),__('tag','autospa')),
            'navigation'                                                        =>  array(__('Navigation','autospa'),__('navigation','autospa')),
        );
	}
	 
	/**************************************************************************/
	
	function adminInitMetaBox()
	{
        add_meta_box('meta_box_post_general',__('General','autospa'),array($this,'adminCreateMetaBoxPostGeneral'),'post','normal','default');
        add_meta_box('meta_box_post_header_top',__('Header Top','autospa'),array($this,'adminCreateMetaBoxPostHeaderTop'),'post','normal','default');
        add_meta_box('meta_box_post_header_bottom',__('Header Bottom','autospa'),array($this,'adminCreateMetaBoxPostHeaderBottom'),'post','normal','default');
        add_meta_box('meta_box_post_footer',__('Footer','autospa'),array($this,'adminCreateMetaBoxPostFooter'),'post','normal','default');
        
        add_filter('postbox_classes_post_meta_box_post_general',array($this,'adminCreateMetaBoxClass'));
        add_filter('postbox_classes_post_meta_box_post_header_top',array($this,'adminCreateMetaBoxClass'));
        add_filter('postbox_classes_post_meta_box_post_header_bottom',array($this,'adminCreateMetaBoxClass'));
        add_filter('postbox_classes_post_meta_box_post_footer',array($this,'adminCreateMetaBoxClass'));
	}
    
    /**************************************************************************/

    function adminCreateMetaBoxPostGeneral()
    {
 		global $post;

        $WidgetArea=new Autospa_ThemeWidgetArea();
        
		$data=array();
        
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
        
        $data['nonce']=wp_nonce_field('adminSaveMetaBox','autospa_meta_box_noncename',false,false);
				
        $data['dictionary']['postElement']=$this->element;
        
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['widgetAreaLocation']=$WidgetArea->getWidgetAreaLocationDictionary();
        
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_post_general.php');
		echo $Template->output();	       
    }
    
    /**************************************************************************/
    
 	function adminCreateMetaBoxPostHeaderTop()
	{
		global $post;

        $Menu=new Autospa_ThemeMenu();
        
		$data=array();
        
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
        
        $data['dictionary']['menu']=$Menu->getMenuDictionary(true,true,false);
				
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_post_header_top.php');
		echo $Template->output();		
	}
    
    /**************************************************************************/
    
 	function adminCreateMetaBoxPostHeaderBottom()
	{
		global $post;

		$data=array();
        
        $Background=new Autospa_ThemeBackground();
        $RevolutionSlider=new Autospa_ThemeRevolutionSlider();
        
        $data['dictionary']['backgroundType']=$Background->getDictionary('backgroundType',false);
		$data['dictionary']['backgroundSize']=$Background->getDictionary('backgroundSize',false);
		$data['dictionary']['backgroundClip']=$Background->getDictionary('backgroundClip',false);
		$data['dictionary']['backgroundRepeat']=$Background->getDictionary('backgroundRepeat',false);
		$data['dictionary']['backgroundOrigin']=$Background->getDictionary('backgroundOrigin',false);
		$data['dictionary']['backgroundAttachment']=$Background->getDictionary('backgroundAttachment',false);    
        
        $data['dictionary']['revolutionSlider']=$RevolutionSlider->getSliderDictionary();
	
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
				
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_post_header_bottom.php');
		echo $Template->output();		
	}
    
    /**************************************************************************/
    
 	function adminCreateMetaBoxPostFooter()
	{
		global $post;

        $WidgetArea=new Autospa_ThemeWidgetArea();
        
		$data=array();
        
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
				
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary();
        
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_post_footer.php');
		echo $Template->output();		
	}
    
    
    /**************************************************************************/
    
    function adminCreateMetaBoxClass($class) 
    {
        array_push($class,'to-postbox-1');
        return($class);
    }
    
    /**************************************************************************/
	
	function adminCreateMetaBoxPostWidgetArea()
	{
		global $post;
		
		$WidgetArea=new Autospa_ThemeWidgetArea();
		
		$data=array();
	
		$data['option']=Autospa_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary(true,true,false);
		$data['dictionary']['widgetAreaLocation']=$WidgetArea->getWidgetAreaLocationDictionary(true,true,false);
		
		$this->setPostMetaDefault($data['option']);
		
		$Template=new Autospa_ThemeTemplate($data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/meta_box_post_widget_area.php');
		echo $Template->output();			
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta)
	{
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_logo_normal_src','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_logo_normal_width','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_logo_normal_height','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_logo_sticky_src','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_logo_sticky_width','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_logo_sticky_height','');  
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_menu_id','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_social_profile_enable','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_breadcrumb_enable','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_revslider_alias','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_src','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_repat','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_position','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_size_1','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_size_2','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_origin','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_clip','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_background_type_image_attachment','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_footer_widget_area_1','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_footer_widget_area_2','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_footer_widget_area_3','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_widget_area_sidebar','-1');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_widget_area_sidebar_location','-1');
        
        /***/
        
        foreach($this->element as $index=>$value)
            Autospa_ThemeHelper::setDefaultOption($meta,'post_'.$index.'_enable','-1');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_menu_first_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_menu_first_level_item_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_menu_next_level_default_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_menu_next_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_menu_next_level_item_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_menu_first_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_menu_first_level_item_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_menu_next_level_default_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_menu_next_level_item_default_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_menu_next_level_item_hover_state_text_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_icon_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_icon_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_icon_normal_state_border_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_icon_hover_state_border_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_icon_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_icon_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_icon_normal_state_border_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_icon_hover_state_border_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_woocommerce_tooltip_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_woocommerce_tooltip_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_woocommerce_tooltip_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_woocommerce_tooltip_hover_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_woocommerce_tooltip_normal_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_woocommerce_tooltip_hover_state_text_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_woocommerce_tooltip_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_woocommerce_tooltip_hover_state_background_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_normal_normal_state_box_shadow_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_top_sticky_normal_state_box_shadow_color','');
        
        /***/
        
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_normal_state_background_color','');
        Autospa_ThemeHelper::setDefaultOption($meta,'post_header_bottom_normal_state_text_color','');        
	}

	/**************************************************************************/

	function getPostMostComment($argument)
	{
		$parameter=array
		(
			'post_type'							=>	'post',
			'posts_per_page'					=>	(int)$argument['post_count'],
			'meta_query'						=>	array(array('key'=>'_thumbnail_id')),
			'orderby'							=>	'comment_count',
			'order'								=>	'desc'
		);
		
		$query=new WP_Query($parameter);
		return($query);
	}
	
	/**************************************************************************/
	
	function getPostRecent($argument)
	{
		$parameter=array
		(
			'post_type'							=>	'post',
			'posts_per_page'					=>	(int)$argument['post_count'],
			'meta_query'						=>	array(array('key'=>'_thumbnail_id')),
			'orderby'							=>	'date',
			'order'								=>	'desc'
		);

		$query=new WP_Query($parameter);
		return($query);
	}	

	/**************************************************************************/

	function getPost()
	{
		$data=new stdClass();

		global $post,$wp_query;
		
		$categoryId=(int)get_query_var('cat');

		if((function_exists('is_woocommerce')) && (is_woocommerce()))
		{
			$data->post=get_post(get_option('woocommerce_shop_page_id'));
			
			if(is_product())
			{
				$data->post=$post;
			}
			elseif((is_product_category()) || (is_product_tag()))
			{
				$data->post->post_title=esc_html($wp_query->queried_object->name);	
			}
			elseif(is_search())
			{
				$data->post->post_title=sprintf(__('Search products for phrase <i>%s</i>','portada'),esc_html(get_query_var('s')));
			}
			
			setup_postdata($data->post);
		}
		else
		{
            if(is_tag()) 
            {
                $post=get_post(Autospa_ThemeOption::getOption('blog_category_post_id'));
                if(is_null($post)) return(false);

                $tagQuery=get_query_var('tag');
                $tagData=get_tags(array('slug'=>$tagQuery));

                $data->post=$post;
                $data->post->post_title=$tagData[0]->name;
            }
            elseif(is_author())
            {
                $author=get_userdata(get_query_var('author'));
                $post=get_post(Autospa_ThemeOption::getOption('blog_author_post_id'));
                if(is_null($post)) return(false);

                $data->post=$post;
                $data->post->post_title=get_the_author_meta('display_name',$author->data->ID);			
            }
            elseif(is_category($categoryId)) 
            {			
                $category=get_category($categoryId);
                $post=get_post(Autospa_ThemeOption::getOption('blog_category_post_id'));	
                if(is_null($post)) return(false);

                $data->post=$post;
                $data->post->post_title=esc_html($category->name);	
            }
            elseif(is_day()) 
            {
                $post=get_post(Autospa_ThemeOption::getOption('blog_archive_post_id'));
                if(is_null($post)) return(false);

                $data->post=$post;
                $data->post->post_title=get_the_date();
            }
            elseif(is_archive()) 
            {
                $post=get_post(Autospa_ThemeOption::getOption('blog_archive_post_id'));
                if(is_null($post)) return(false);

                $data->post=$post;
                $data->post->post_title=single_month_title(' ',false);
            }
            elseif(is_search())
            {
                $post=get_post(Autospa_ThemeOption::getOption('blog_search_post_id'));
                if(is_null($post)) return(false);

                $data->post=$post;
                $data->post->post_title=sprintf(__('Search Result for "%s"','autospa'),get_query_var('s'));
            }
            elseif(is_404())
            {
                $post=get_post(Autospa_ThemeOption::getOption('post_404_post_id'));
                if(is_null($post)) return(false);

                $data->post=$post;
                $data->post->post_title=$data->post->post_title;
            }
            else return(false);
        }

		return($data);
	}
    
    /**************************************************************************/
    
	function getCommentCount($post)
	{
		if(!comments_open($post->ID)) return(false);
		return(get_comments_number($post->ID));
	}
    
    /**************************************************************************/
    
    function createPostHeader($post,$titleLinkToSingle=true)
    {
        $html=array(null,null,null);
     
        if(get_post_type($post)=='post')
            $html[0]=$this->createPostHeaderDate($post);
        
        $html[1]=$this->createPostHeaderTitle($post,$titleLinkToSingle);
        
        if(get_post_type($post)=='post')
            $html[2]=$this->createPostHeaderMeta($post);

        $html=
        '
            <div class="theme-post-header">
                <div>
                    '.$html[0].'
                </div>
                <div>
                    '.$html[1].'
                    '.$html[2].'
                </div>
            </div>
        ';
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createPostHeaderDate($post)
    {
        $html=null;
        
        if(post_password_required($post)) return($html);
        if(Autospa_ThemeOption::getGlobalOption($post,'date_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return($html);
        
        $date=explode(' ',get_the_date('d M Y',$post->ID));
        
        $html=
        '
            <div class="theme-post-header-date">
                <span>
                    <a href="'.esc_url(get_month_link(get_the_time('Y',$post),get_the_time('m',$post))).'" title="'.esc_attr(sprintf(__('View all posts created on "%s %s".','autospa'),get_the_time('F',$post),get_the_time('Y',$post))).'">
                        '.esc_html($date[1]).'
                    </a>
                </span>
                <span>
                    <a href="'.esc_url(get_day_link(get_the_time('Y',$post),get_the_time('m',$post),get_the_time('d',$post))).'" title="'.esc_attr(sprintf(__('View all posts created on "%s %s %s".','autospa'),get_the_time('j',$post),get_the_time('F',$post),get_the_time('Y',$post))).'">
                        '.esc_html($date[0]).'
                    </a>
                </span>
                <span>
                    <a href="'.esc_url(get_year_link(get_the_time('Y',$post))).'" title="'.esc_attr(sprintf(__('View all posts created on "%s".','autospa'),get_the_time('Y',$post))).'">
                        '.esc_html($date[2]).'
                    </a>
                </span>
            </div>
        ';
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createPostHeaderTitle($post,$titleLinkToSingle=true)
    {
        $html=null;
        
        if(get_post_type($post)=='post')
        {
            if(Autospa_ThemeOption::getGlobalOption($post,'title_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return($html);
        }
        
        $html=get_the_title($post->ID);
        
        if($titleLinkToSingle) $html='<a href="'.esc_url(get_permalink($post->ID)).'">'.$html.'</a>';
        
        $html=
        '
            <div class="theme-post-header-title">
                <h3>'.$html.'</h3>
            </div>
        ';
        
        return($html);
    }
    
    /**************************************************************************/
	
    function createPostHeaderMeta($post)
    {
        $html=array(null,null,null);
  
        if(post_password_required($post)) return(null);
        
        $Validation=new Autospa_ThemeValidation();
        
        /***/
        
        if(Autospa_ThemeOption::getGlobalOption($post,'author_enable',Autospa_ThemeOption::getOptionPrefix($post))==1)
        {
            $html[0]=
            '
                <div class="theme-post-header-meta-user">
                    <span class="theme-icon-meta-user"></span>
                    <a href="'.esc_url(get_author_posts_url($post->post_author)).'" title="'.esc_attr(sprintf(__('View all posts from author "%s".','autospa'),get_the_author_meta('display_name',$post->user_id))).'">'.get_the_author_meta('display_name',$post->user_id).'</a>
                </div>
            ';
        }
        
        
        /***/
        
        if(Autospa_ThemeOption::getGlobalOption($post,'category_enable',Autospa_ThemeOption::getOptionPrefix($post))==1)
        {
            $category=get_the_category($post->ID);
            foreach($category as $categoryValue)
            {
                if($categoryValue->term_id==1) continue;

                $title=$Validation->isEmpty($categoryValue->description) ? sprintf(__('View all posts from category "%s".','autospa'),$categoryValue->name) : strip_tags(apply_filters('category_description',$categoryValue->description,$categoryValue));

                $html[1].=
                '
                    <li><a href="'.esc_url(get_category_link($categoryValue->term_id)).'" title="'.esc_attr($title).'">'.esc_html($categoryValue->name).'</a></li>
                ';
            }   

            if($Validation->isNotEmpty($html[1]))
            {
                $html[1]=
                '
                    <div class="theme-post-header-meta-category">
                        <span class="theme-icon-meta-category"></span>
                        <ul class="theme-reset-list">
                            '.$html[1].'
                        </ul>
                    </div>
                ';
            }
        }
        
        /***/
        
        if(Autospa_ThemeOption::getGlobalOption($post,'comment_count_enable',Autospa_ThemeOption::getOptionPrefix($post))==1)
        {
            $html[2]=
            '
                <div class="theme-post-header-meta-comment-count">
                    <span class="theme-icon-meta-comment"></span>
                    <a href="'.get_the_permalink($post->ID).'#comments">'.$this->getCommentCount($post).'</a>
                </div>
            ';
        }
        
        /***/
        
        if(($Validation->isEmpty($html[0])) && ($Validation->isEmpty($html[1])) && ($Validation->isEmpty($html[2]))) return(null);
        
        $html=
        '
            <div class="theme-post-header-meta theme-clear-fix">
                '.$html[0].'
                '.$html[1].'
                '.$html[2].'
            </div>
        ';
        
        return($html);
    }
    
    /**************************************************************************/
    
    function hasPostImage($post)
    {
        if(Autospa_ThemeOption::getGlobalOption($post,'image_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return(false);
        if(!has_post_thumbnail($post)) return(false);
        
        return(true);
    }
    
    /**************************************************************************/
    
    function createPostImage($post,$link=true)
    {
        $html=null;
        
        if(post_password_required($post)) return($html);
        if(!$this->hasPostImage($post)) return($html);
        
        $Page=new Autospa_ThemePage();
        
        $html=get_the_post_thumbnail($post->ID,$Page->getImageClass());
        
        if($link)
        {
            $html=
            '
                <a href="'.get_the_permalink($post).'" title="'.esc_attr(sprintf(__('View post "%s".','autospa'),strip_tags(get_the_title($post)))).'">
                    '.$html.'
                </a>
            ';
        }
        else 
        {
            $html=
            '
                <a href="'.get_the_post_thumbnail_url($post->ID,'full').'" class="theme-image-fancybox">
                    '.$html.'
                </a>
            ';            
        }
        
        $html=
        '
            <div class="theme-post-image">
                <div class="theme-image theme-image-hover">
                    '.$html.'
                </div>
			</div>
        ';
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createPostExcerpt($post)
    {
 		$html=null;
        
        if(post_password_required($post)) return($html);
        if(Autospa_ThemeOption::getGlobalOption($post,'excerpt_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return(null);
		
		$html=
		'
			<div class="theme-post-excerpt">
				'.$this->getExcerpt().'
			</div>
		';
		
		return($html);       
    }
    
    /**************************************************************************/
    
    function createPostContent($post)
    {
		$html=null;
        
        if(Autospa_ThemeOption::getGlobalOption($post,'content_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return(null);
        
		$content=apply_filters('the_content',do_shortcode(get_the_content($post)));
		
		$attribute=array
		(
			'before'															=>	'',
			'after'																=>	'',
			'next_or_number'													=>	'number',		
			'previouspagelink'													=>	__('Previous','autospa'),
			'nextpagelink'														=>	__('Next','autospa'),
			'link_before'														=> '<span>',
			'link_after'														=> '</span>',
			'echo'																=>	0
		);
		
		$html=
		'
			<div class="theme-post-content theme-clear-fix">'.$content.'</div>
			<div class="theme-pagination theme-clear-fix">
				'.wp_link_pages($attribute).'
			</div>
		';

		return($html);        
    }
    
    /**************************************************************************/
    
    function createPostReadMoreButton($post)
    {
        $html=null;
        
        if(Autospa_ThemeOption::getGlobalOption($post,'read_more_button_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return(null);
        
        $html=
        '
            <div class="theme-post-read-more-button">
                <a href="'.esc_url(get_permalink($post->ID)).'" class="theme-button theme-button-1" title="'.esc_attr(sprintf(__('View post "%s".','autospa'),strip_tags(get_the_title($post)))).'">'.esc_html__('Read More','autospa').'</a>
            </div>
        ';
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createPostDivider($post)
    {
        $html=null;
        
        if(get_post_type($post)=='post')
        {
            if(Autospa_ThemeOption::getGlobalOption($post,'divider_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return(null);
        }
        
        $html='<div class="theme-post-divider theme-clear-fix"></div>';
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createPostAuthorInfo($post)
    {
        $html=null;
        
        if(post_password_required($post)) return($html);
        if(Autospa_ThemeOption::getGlobalOption($post,'author_info_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return(null);    
        
		$Validation=new Autospa_ThemeValidation();
		
		$htmlDescription=get_the_author_meta('user_description',$post->user_id);
		if($Validation->isEmpty($htmlDescription)) return($html);
		
		$htmlAvatar=get_avatar(get_the_author_meta('ID',$post->user_ID),80,'',get_the_author_meta('display_name'));
		
		$html=
		'
			<div class="theme-post-author-info">
				'.$htmlAvatar.'
                <div>
                    <span>
                        <span class="theme-icon-meta-author"></span><a href="'.esc_url(get_author_posts_url($post->post_author)).'" title="'.sprintf(esc_attr('View all posts from author "%s".','autospa'),get_the_author_meta('display_name',$post->user_id)).'">'.get_the_author_meta('display_name',$post->user_id).'</a>
                    </span>
                    '.$htmlDescription.'
                </div>
			</div>
		';
	
		return($html);       
    }
    
    /**************************************************************************/
    
    function createPostMeta($post)
    {
        $html=array(null,null);
        
        if(post_password_required($post)) return(null);
        
        $Validation=new Autospa_ThemeValidation();
        
        if(Autospa_ThemeOption::getGlobalOption($post,'social_share_enable',Autospa_ThemeOption::getOptionPrefix($post))==1)
        {   
            $html[0]=
            '
                <div class="theme-post-meta-share">
                    <span>'.esc_html__('Share:','autospa').'</span>
                    <ul class="theme-reset-list">
                        <li><a href="'.$this->createTwitterShareURL($post).'" class="theme-icon-social-twitter" target="_blank"></a></li>
                        <li><a href="'.$this->createFacebookShareURL($post).'" class="theme-icon-social-facebook" target="_blank"></a></li>
                        <li><a href="'.$this->createPinterestShareURL($post).'" class="theme-icon-social-pinterest" target="_blank"></a></li>
                    </ul>
                </div>
            ';
        }
        
        if(Autospa_ThemeOption::getGlobalOption($post,'tag_enable',Autospa_ThemeOption::getOptionPrefix($post))==1)
        {   
            $tag=get_the_tags($post->ID);
            if($tag)
            {     
                $i=0;
                foreach($tag as $value)
                {
                    $i++;
                    
                    $html[1].=
                    '
                        <li><a href="'.esc_url(get_tag_link($value->term_id)).'" title="'.esc_attr(sprintf(__('View all posts marked as "%s".','autospa'),$value->name)).'">'.esc_html($value->name).'</a>'.($i==count($tag) ? '' : ', ').'</li>
                    ';
                }

                $html[1]=
                '	
                    <div class="theme-post-meta-tag">
                        <span class="theme-icon-meta-tag"></span>
                        <ul class="theme-reset-list">
                            '.$html[1].'
                        </ul>
                    </div>
                ';                 
            }
        }
        
        $html=join($html);
        
        if(!$Validation->isEmpty($html))
        {
            $html=
            '
                <div class="theme-post-meta theme-clear-fix">
                    '.$html.'
                </div>
            ';
        }
        
        return($html);
    }
    
    /**************************************************************************/
    
    function createPostNavigation($post)
    {
 		$html=null;
		
        if(post_password_required($post)) return($html);
		if(Autospa_ThemeOption::getGlobalOption($post,'navigation_enable',Autospa_ThemeOption::getOptionPrefix($post))!=1) return($html);	
		
		$Validation=new Autospa_ThemeValidation();
		
		$prevPost=get_previous_post();
		if(!empty($prevPost)) 
			$html.='<a class="theme-post-navigation-prev" href="'.esc_url(get_permalink($prevPost->ID)).'" title="'.the_title_attribute(array('post'=>$prevPost->ID,'echo'=>false)).'"><span class="theme-icon-meta-arrow-right-12"></span><span>'.esc_html(get_the_title($prevPost->ID)).'</span></span></a>';
		
		$nextPost=get_next_post();
		if(!empty($nextPost)) 
			$html.='<a class="theme-post-navigation-next" href="'.esc_url(get_permalink($nextPost->ID)).'" title="'.the_title_attribute(array('post'=>$nextPost->ID,'echo'=>false)).'"><span>'.esc_html(get_the_title($nextPost->ID)).'</span><span class="theme-icon-meta-arrow-right-12"></span></a>';		
			
		if($Validation->isNotEmpty($html))
		{
			$html=
			'
				<div class="theme-post-navigation theme-clear-fix">
					'.$html.'
				</div>				
			';
		}	
		
		return($html);	       
    }
    
    /**************************************************************************/
    
	function createPostComment()
	{		
        if(post_password_required()) return(null);
		get_template_part('comment');
	}
    
    /**************************************************************************/
    
	function createTwitterShareURL($post)
	{
		$postTile=get_the_title($post->ID);
		$postURL=get_the_permalink($post->ID);
		
		$twitterStatus=mb_substr($postTile,0,139-mb_strlen($postURL)).' '.$postURL;		
	
		return('https://twitter.com/home?status='.urlencode($twitterStatus));
	}
	
	/**************************************************************************/
	
	function createFacebookShareURL($post)
	{
		return('https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink($post->ID)));
	}
	
	/**************************************************************************/
	
	function createPinterestShareURL($post)
	{
		if(!has_post_thumbnail($post->ID)) return(null);
		
		return('https://pinterest.com/pin/create/button/?url='.esc_url(get_the_permalink($post->ID)).'&amp;media='.esc_url(wp_get_attachment_url(get_post_thumbnail_id($post->ID))).'&amp;description='.urlencode(strip_tags(Autospa_ThemeHelper::getTheExcerpt($post->ID))));
	}
    
    function getExcerpt()
    {
        ob_start();
        the_excerpt();
        $content=ob_get_clean();
        return($content);
    }
    
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/