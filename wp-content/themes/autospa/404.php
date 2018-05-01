<?php 
		$id=(int)Autospa_ThemeOption::getOption('page_404_page_id');

		if($id<=0)
		{
			get_header();
?>
            <div class="theme-main theme-clear-fix theme-page-sidebar-disable aligncenter">	
                <h1 class="theme-page-404-header"><?php esc_html_e('404','autospa'); ?></h1>
                <h3><?php esc_html_e('OOPS. Page not found.','autospa'); ?></h3>
                <p>
                    <?php esc_html_e('We looked everywhere but the requested page was not found.','autospa'); ?><br>
                    <?php echo wp_kses(__('<a href="http://quanticalabs.com/Autospa/Template/?page=home">Click here</a> to return to the homepage or use the search below.','autospa'),array('a'=>array('href'=>array(),'title'=>array()))); ?>
                </p>
            </div>
<?php			
			get_footer();
		}
		else
		{
			$url=get_the_permalink($id);
			
			if($url===false) wp_redirect(get_home_url());
        	else wp_redirect($url);
		}