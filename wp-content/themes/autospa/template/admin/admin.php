
		<div class="to to-to">

            <div id="to_notice"></div> 
            
			<form name="to_form" id="to_form" method="POST" action="#">

				<div class="to-header to-clear-fix">

					<div class="to-header-left">

						<div>
							<h3>QuanticaLabs</h3>
							<h6><?php esc_html_e('Theme Options','autospa'); ?></h6>
						</div>

					</div>

					<div class="to-header-right">

						<div>
							<h3>Auto Spa - Car Wash Auto Detail</h3>
							<h6>Wordpress Theme ver. <?php echo AUTOSPA_THEME_VERSION; ?></h6>&nbsp;&nbsp;
							<a href="http://support.quanticalabs.com" target="_blank">Support Forum</a>
							<a href="#" target="_blank"><?php esc_html_e('Theme site','autospa'); ?></a>
						</div>

						<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

					</div>

				</div>

				<div class="to-content to-clear-fix">

					<div class="to-content-left">

						<ul class="to-menu" id="to_menu">

							<li>
								<a href="#general_setting"><?php esc_html_e('General settings','autospa'); ?><span></span></a>
								<ul>
									<li><a href="#general_blog"><?php esc_html_e('Blog','autospa'); ?></a></li>
									<li><a href="#general_page"><?php esc_html_e('Page','autospa'); ?></a></li>
									<li><a href="#general_menu"><?php esc_html_e('Menu','autospa'); ?></a></li>
									<li><a href="#general_comment"><?php esc_html_e('Comments','autospa'); ?></a></li>
									<li><a href="#general_social_profile"><?php esc_html_e('Social profiles','autospa'); ?></a></li>
									<li><a href="#general_custom_js_code"><?php esc_html_e('Custom JS code','autospa'); ?></a></li>
									<li><a href="#general_content_copying"><?php esc_html_e('Content copying','autospa'); ?></a></li>
									<li><a href="#general_go_top_top"><?php esc_html_e('Go to top of page','autospa'); ?></a></li>
								</ul>				
							</li>
							<li>
								<a href="#page_setting"><?php esc_html_e('Page settings','autospa'); ?><span></span></a>
								<ul>
                                    <li><a href="#page_general"><?php esc_html_e('General','autospa'); ?></a></li>
									<li><a href="#page_header_top"><?php esc_html_e('Header top','autospa'); ?></a></li>
                                    <li><a href="#page_header_bottom"><?php esc_html_e('Header bottom','autospa'); ?></a></li>
                                    <li><a href="#page_footer"><?php esc_html_e('Footer','autospa'); ?></a></li>
								</ul>
							</li>
							<li>
								<a href="#post_setting"><?php esc_html_e('Post settings','autospa'); ?><span></span></a>
								<ul>
                                    <li><a href="#post_general"><?php esc_html_e('General','autospa'); ?></a></li>
									<li><a href="#post_header_top"><?php esc_html_e('Header top','autospa'); ?></a></li>
                                    <li><a href="#post_header_bottom"><?php esc_html_e('Header bottom','autospa'); ?></a></li>
                                    <li><a href="#post_footer"><?php esc_html_e('Footer','autospa'); ?></a></li>
                                    <li><a href="#post_element"><?php esc_html_e('Elements','autospa'); ?></a></li>
								</ul>
							</li>	
<?php
        if(Autospa_ThemePlugin::isActive('wooCommerce'))
        {
?>
							<li>
								<a href="#woocommerce_product_setting"><?php esc_html_e('Product settings','autospa'); ?><span></span></a>
								<ul>
                                    <li><a href="#woocommerce_product_general"><?php esc_html_e('General','autospa'); ?></a></li>
									<li><a href="#woocommerce_product_header_top"><?php esc_html_e('Header top','autospa'); ?></a></li>
                                    <li><a href="#woocommerce_product_header_bottom"><?php esc_html_e('Header bottom','autospa'); ?></a></li>
                                    <li><a href="#woocommerce_product_footer"><?php esc_html_e('Footer','autospa'); ?></a></li>
								</ul>
							</li>	            
<?php          
        }
?>                       
							<li>
								<a href="#plugin_setting" class="to-menu-plugin"><?php esc_html_e('Plugins settings','autospa'); ?><span></span></a>
								<ul>
									<li><a href="#plugin_maintenance_mode"><?php esc_html_e('Maintenance mode','autospa'); ?></a></li>
									<li><a href="#plugin_fancybox_image"><?php esc_html_e('Fancybox for images','autospa'); ?></a></li>
								</ul>
							</li>	
							<li>
								<a href="#custom_css" class="to-menu-css"><?php esc_html_e('Custom CSS','autospa'); ?><span></span></a>
							</li>
						</ul>

					</div>

					<div class="to-content-right" id="to_panel">
<?php
		$content=array
		(
			array('general_blog'),
			array('general_page'),
			array('general_logo'),
			array('general_menu'),
			array('general_comment'),
			array('general_social_profile'),
			array('general_custom_js_code'),
			array('general_content_copying'),
			array('general_go_top_top'),
			array('page_general'),
			array('page_header_top'),
            array('page_header_bottom'),
            array('page_footer'),
			array('post_general'),
			array('post_header_top'),
            array('post_header_bottom'),
            array('post_footer'),
            array('post_element'),
            array('plugin_maintenance_mode'),
			array('plugin_fancybox_image'),
            array('custom_css')
		);
        
        if(Autospa_ThemePlugin::isActive('wooCommerce'))
            array_push($content,array('woocommerce_product_general'),array('woocommerce_product_header_top'),array('woocommerce_product_header_bottom'),array('woocommerce_product_footer'));

		foreach($content as $value)
		{
?>
						<div id="<?php echo esc_attr($value[0]); ?>">
<?php
			$Template=new Autospa_ThemeTemplate($this->data,AUTOSPA_THEME_PATH_TEMPLATE.'admin/'.$value[0].'.php');
			echo $Template->output(false);
?>
						</div>
<?php
		}
?>
					</div>

				</div>

				<div class="to-footer to-clear-fix">

					<div class="to-footer-left">

						<ul class="to-social-list">
							<li><a href="http://themeforest.net/user/QuanticaLabs?ref=quanticalabs" class="to-social-list-envato" title="Envato"></a></li>
							<li><a href="http://www.facebook.com/QuanticaLabs" class="to-social-list-facebook" title="Facebook"></a></li>
							<li><a href="https://twitter.com/quanticalabs" class="to-social-list-twitter" title="Twitter"></a></li>
							<li><a href="http://quanticalabs.tumblr.com/" class="to-social-list-tumblr" title="Tumblr"></a></li>
						</ul>

					</div>

					<div class="to-footer-right">
						<input type="submit" value="<?php esc_attr_e('Save changes','autospa'); ?>" name="Submit" id="Submit" class="to-button"/>
					</div>			

				</div>

				<input type="hidden" name="action" id="action" value="theme_admin_option_page_save" />

			</form>
			
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				$('.to').themeOption();
				var element=$('.to').themeOptionElement({init:true});
                element.bindBrowseMedia('.to-button-browse');
			});
		</script>