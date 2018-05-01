
		<div class="to to-to">

			<form name="to_form" id="to_form" method="POST" action="#">

				<div id="to_notice"></div> 

				<div class="to-header to-clear-fix">

					<div class="to-header-left">

						<div>
							<h3><?php esc_html_e('QuanticaLabs',PLUGIN_CBS_DOMAIN); ?></h3>
							<h6><?php esc_html_e('Plugin Options',PLUGIN_CBS_DOMAIN); ?></h6>
						</div>

					</div>

					<div class="to-header-right">

						<div>
							<h3>
								<?php esc_html_e('Car Wash Booking System',PLUGIN_CBS_DOMAIN); ?>
							</h3>
							<h6>
								<?php echo sprintf(esc_html__('WordPress Plugin ver. %s',PLUGIN_CBS_DOMAIN),PLUGIN_CBS_VERSION); ?>
							</h6>
							&nbsp;&nbsp;
							<a href="<?php echo esc_url('http://support.quanticalabs.com'); ?>" target="_blank"><?php esc_html_e('Support Forum',PLUGIN_CBS_VERSION); ?></a>
							<a href="<?php echo esc_url('http://codecanyon.net/item/car-wash-booking-system-for-wordpress/13540671?ref=quanticalabs'); ?>" target="_blank"><?php esc_html_e('Plugin site',PLUGIN_CBS_VERSION); ?></a>
						</div>

						<a href="<?php echo esc_url('http://quanticalabs.com'); ?>" class="to-header-right-logo"></a>

					</div>

				</div>

				<div class="to-content to-clear-fix">

					<div class="to-content-left">

						<ul class="to-menu" id="to_menu">
							<li>
								<a href="#import_dummy_content"><?php esc_html_e('Import dummy content',PLUGIN_CBS_DOMAIN); ?><span></span></a>
							</li>
							<li>
								<a href="#generate_coupon_codes"><?php esc_html_e('Generate coupon codes',PLUGIN_CBS_DOMAIN); ?><span></span></a>
							</li>
						</ul>

					</div>

					<div class="to-content-right" id="to_panel">
<?php
		$content=array('import_dummy_content','generate_coupon_codes');
		foreach($content as $value)
		{
?>
						<div id="<?php echo $value; ?>">
<?php
			$Template=new CBSTemplate($this->data,PLUGIN_CBS_TEMPLATE_PATH.'admin/option_'.$value.'.php');
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
							<li><a href="<?php echo esc_url('http://themeforest.net/user/QuanticaLabs?ref=quanticalabs'); ?>" class="to-social-list-envato" title="<?php esc_attr_e('Envato',PLUGIN_CBS_DOMAIN); ?>"></a></li>
							<li><a href="<?php echo esc_url('http://www.facebook.com/QuanticaLabs'); ?>" class="to-social-list-facebook" title="<?php esc_attr_e('Facebook',PLUGIN_CBS_DOMAIN); ?>"></a></li>
							<li><a href="<?php echo esc_url('https://twitter.com/quanticalabs'); ?>" class="to-social-list-twitter" title="<?php esc_attr_e('Twitter',PLUGIN_CBS_DOMAIN); ?>"></a></li>
							<li><a href="<?php echo esc_url('http://quanticalabs.tumblr.com/'); ?>" class="to-social-list-tumblr" title="<?php esc_attr_e('Tumblr',PLUGIN_CBS_DOMAIN); ?>"></a></li>
						</ul>

					</div>
					
					<div class="to-footer-right">
						<!--
							<input type="submit" value="<?php esc_attr_e('Save changes',PLUGIN_CBS_DOMAIN); ?>" name="Submit" id="Submit" class="to-button"/>
						-->
					</div>			
				
				</div>
				
				<input type="hidden" name="action" id="action" value="<?php echo esc_attr(PLUGIN_CBS_CONTEXT.'_option_page_save'); ?>" />
				
				<script type="text/javascript">

					jQuery(document).ready(function($)
					{
						$('.to').themeOption();
						$('.to').themeOptionElement({init:true});
					});

				</script>

			</form>
			
		</div>