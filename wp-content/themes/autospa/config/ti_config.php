<?php

/******************************************************************************/
/******************************************************************************/

define('PLUGIN_THEME_INSTALLER_THEME_CONTEXT','autospa');
define('PLUGIN_THEME_INSTALLER_THEME_CLASS_PREFIX','Autospa_');
define('PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX','at_option');

define('PLUGIN_THEME_INSTALLER_SKIN_OPTION_NAME','at_skin');

/****/

TIData::set('import','option',array('widget_data','content_data','theme_option'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_category_post_id',array('title'=>'Blog Large Image - Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_archive_post_id',array('title'=>'Blog Large Image - Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_search_post_id',array('title'=>'Blog Large Image - Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_author_post_id',array('title'=>'Blog Large Image - Right Sidebar','postType'=>'page'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_404_page_id',array('title'=>'Page 404','postType'=>'page'));

/***/

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_top_logo_normal_src',array('title'=>'logo','postType'=>'attachment'));
TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_top_logo_sticky_src',array('title'=>'logo_sticky','postType'=>'attachment'));
TIData::set('term_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_top_menu_id',array('title'=>'Top header','taxonomy'=>'nav_menu'));

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_bottom_background_type_image_src',array('title'=>'header_02','postType'=>'attachment'));

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_footer_widget_area_1',array('title'=>'Footer top'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_footer_widget_area_2',array('title'=>'Footer middle'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_footer_widget_area_3',array('title'=>'Footer bottom'));

/***/

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_widget_area_sidebar',array('title'=>'Post'));

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_top_logo_normal_src',array('title'=>'logo','postType'=>'attachment'));
TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_top_logo_sticky_src',array('title'=>'logo_sticky','postType'=>'attachment'));
TIData::set('term_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_top_menu_id',array('title'=>'Top header','taxonomy'=>'nav_menu'));

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_bottom_background_type_image_src',array('title'=>'header_02','postType'=>'attachment'));

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_footer_widget_area_1',array('title'=>'Footer top'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_footer_widget_area_2',array('title'=>'Footer middle'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_footer_widget_area_3',array('title'=>'Footer bottom'));

/***/

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_widget_area_sidebar',array('title'=>'Shop'));

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_top_logo_normal_src',array('title'=>'logo','postType'=>'attachment'));
TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_top_logo_sticky_src',array('title'=>'logo_sticky','postType'=>'attachment'));
TIData::set('term_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_top_menu_id',array('title'=>'Top header','taxonomy'=>'nav_menu'));

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_bottom_background_type_image_src',array('title'=>'header_02','postType'=>'attachment'));

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_footer_widget_area_2',array('title'=>'Footer middle'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_footer_widget_area_3',array('title'=>'Footer bottom'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_maintenance_mode_post_id',array('title'=>'Maintenance Mode','postType'=>'page'));

/***/

TIData::set('post_id','page_on_front',array('title'=>'Home','postType'=>'page'));
TIData::set('option','show_on_front','page');

/***/

TIData::set('option','posts_per_page',5);
TIData::set('option','permalink_structure','/%postname%/');

TIData::set('option','thread_comments',1);
TIData::set('option','thread_comments_depth',2);
TIData::set('option','page_comments',1);
TIData::set('option','comments_per_page',5);
TIData::set('option','comment_order','desc');

TIData::set('option','show_avatars',1);
TIData::set('option','avatar_default','mystery');

TIData::set('option','date_format','F j, Y');

TIData::set('option','blogname','Auto Spa - Car Wash Auto Detail WordPress Theme');
TIData::set('option','blogdescription','');

/******************************************************************************/
/******************************************************************************/