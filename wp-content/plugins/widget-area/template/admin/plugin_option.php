		<div id="to" class="to to-wa">

			<div id="to_notice"></div>

			<form name="to_form" id="to_form" method="POST" action="#">

				<div class="to-header to-clear-fix">

					<div class="to-header-left">

						<div>
							<h3>QuanticaLabs</h3>
							<h6><?php esc_html_e('Widget Areas',PLUGIN_WIDGET_AREA_DOMAIN); ?></h6>
						</div>

					</div>

					<div class="to-header-right">

						<div>
							<h3><?php esc_html_e('Widget Areas',PLUGIN_WIDGET_AREA_DOMAIN); ?></h3>
							<h6><?php echo sprintf(esc_html__('WordPress Plugin ver. %s',PLUGIN_WIDGET_AREA_DOMAIN),PLUGIN_WIDGET_AREA_VERSION); ?></h6>&nbsp;&nbsp;
						</div>

						<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

					</div>

				</div>

				<div class="to-content to-clear-fix">

					<div class="to-content-left">

						<ul class="to-menu" id="to_menu">
							<li>
								<a href="#general_setting"><?php esc_html_e('General settings',PLUGIN_WIDGET_AREA_DOMAIN); ?><span></span></a>			
							</li>						
						</ul>

					</div>

					<div class="to-content-right" id="to_panel">
<?php
		$content=array
		(
			'general_setting'
		);

		foreach($content as $value)
		{
?>
							<div id="<?php echo $value; ?>">
<?php
			$Template=new WATemplate($this->data,PLUGIN_WIDGET_AREA_TEMPLATE_PATH.'admin/plugin_option_'.$value.'.php');
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
							<li><a href="http://twitter.com/quanticalabs" class="to-social-list-twitter" title="Twitter"></a></li>
							<li><a href="http://quanticalabs.tumblr.com/" class="to-social-list-tumblr" title="Tumblr"></a></li>
						</ul>

					</div>

					<div class="to-footer-right">
						<input type="submit" value="<?php esc_attr_e('Save changes',PLUGIN_WIDGET_AREA_DOMAIN); ?>" name="Submit" id="Submit" class="to-button"/>
					</div>			

				</div>

				<input type="hidden" name="action" id="action" value="<?php echo esc_attr(PLUGIN_WIDGET_AREA_CONTEXT.'_save'); ?>"/>

				<script type="text/javascript">

					jQuery(document).ready(function($)
					{
						$('#to').themeOption({submitOneField:true});
						$('#to').themeOptionElement({init:true});
					});

				</script>

			</form>

		</div>	