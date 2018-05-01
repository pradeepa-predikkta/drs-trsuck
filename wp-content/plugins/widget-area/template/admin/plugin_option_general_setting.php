		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('CSS class',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('CSS class to assign to the Sidebar in the Appearance/Widget admin page.',PLUGIN_WIDGET_AREA_DOMAIN); ?><br/>
					<?php esc_html_e('This class will only appear in the source of the WordPress Widget admin page. It will not be included in the frontend of website.',PLUGIN_WIDGET_AREA_DOMAIN); ?><br/>
				</span>
				<div>
					<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_class'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_class'); ?>" value="<?php esc_attr_e($this->data['option']['register_sidebar_argument_class']); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Before widget',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('HTML to place before every widget.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_widget_start'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_widget_start'); ?>" value="<?php esc_attr_e($this->data['option']['register_sidebar_argument_widget_start']); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('After widget',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('HTML to place after every widget.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_widget_stop'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_widget_stop'); ?>" value="<?php esc_attr_e($this->data['option']['register_sidebar_argument_widget_stop']); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Before title',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('HTML to place before every title.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_title_start'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_title_start'); ?>" value="<?php esc_attr_e($this->data['option']['register_sidebar_argument_title_start']); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('After title',PLUGIN_WIDGET_AREA_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('HTML to place after every title.',PLUGIN_WIDGET_AREA_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php WAHelper::getFormName('register_sidebar_argument_title_stop'); ?>" id="<?php WAHelper::getFormName('register_sidebar_argument_title_stop'); ?>" value="<?php esc_attr_e($this->data['option']['register_sidebar_argument_title_stop']); ?>"/>
				</div>
			</li>
		</ul>