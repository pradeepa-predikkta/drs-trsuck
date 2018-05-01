		<?php echo $this->data['nonce']; ?>
		<div class="to">
			<ul class="to-form-field-list">
				<li>
					<h5><?php esc_html_e('Layout',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Select layout for widget area located in footer.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
					<div class="to-radio-button">
<?php
		$i=0;
		foreach($this->data['dictionary']['layout'] as $index=>$value)
		{
			$i++;
?>
						<input type="radio" name="<?php WAHelper::getFormName('layout'); ?>" id="<?php WAHelper::getFormName('layout_'.$i); ?>" value="<?php echo esc_attr($index); ?>" <?php WAHelper::checkedIf($this->data['option']['layout'],$index); ?>/>
						<label for="<?php WAHelper::getFormName('layout_'.$i); ?>"><?php echo esc_html($value); ?></label>
<?php
		}
?>
					</div>
				</li>
                <li>
                    <h5><?php esc_html_e('Smart sidebar',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
                    <span class="to-legend"><?php esc_html_e('Enable or disable smart sidebar option.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
                    <div class="to-radio-button">
                        <input type="radio" name="<?php WAHelper::getFormName('smart_sidebar_enable'); ?>" id="<?php WAHelper::getFormName('smart_sidebar_enable_1'); ?>" value="1" <?php WAHelper::checkedIf($this->data['option']['smart_sidebar_enable'],1); ?>/>
                        <label for="<?php WAHelper::getFormName('smart_sidebar_enable_1'); ?>"><?php esc_html_e('Enable',PLUGIN_WIDGET_AREA_DOMAIN); ?></label>
                        <input type="radio" name="<?php WAHelper::getFormName('smart_sidebar_enable'); ?>" id="<?php WAHelper::getFormName('smart_sidebar_enable_0'); ?>" value="0" <?php WAHelper::checkedIf($this->data['option']['smart_sidebar_enable'],0); ?>/>
                        <label for="<?php WAHelper::getFormName('smart_sidebar_enable_0'); ?>"><?php esc_html_e('Disable',PLUGIN_WIDGET_AREA_DOMAIN); ?></label>
                    </div>			
                </li> 
				<li>
					<h5><?php esc_html_e('CSS class',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
					<span class="to-legend">
						<?php esc_html_e('CSS class to assign to the Sidebar in the Appearance/Widget admin page.',PLUGIN_WIDGET_AREA_DOMAIN); ?><br/>
						<?php esc_html_e('This class will only appear in the source of the WordPress Widget admin page. It will not be included in the frontend of website.',PLUGIN_WIDGET_AREA_DOMAIN); ?><br/>
					</span>
					<div>
						<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_class'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_class'); ?>" value="<?php echo esc_attr($this->data['option']['register_sidebar_argument_class']); ?>"/>
					</div>
				</li>	
				<li>
					<h5><?php esc_html_e('Before widget',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('HTML to place before every widget.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_widget_start'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_widget_start'); ?>" value="<?php echo esc_attr($this->data['option']['register_sidebar_argument_widget_start']); ?>"/>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('After widget',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('HTML to place after every widget.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_widget_stop'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_widget_stop'); ?>" value="<?php echo esc_attr($this->data['option']['register_sidebar_argument_widget_stop']); ?>"/>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Before title',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('HTML to place before every title.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_title_start'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_title_start'); ?>" value="<?php echo esc_attr($this->data['option']['register_sidebar_argument_title_start']); ?>"/>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('After title',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('HTML to place after every title.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_title_stop'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_title_stop'); ?>" value="<?php echo esc_attr($this->data['option']['register_sidebar_argument_title_stop']); ?>"/>
					</div>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
			});
		</script>