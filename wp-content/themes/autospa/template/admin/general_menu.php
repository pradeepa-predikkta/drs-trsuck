		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Menu transition','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable animation in menu.','autospa'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('menu_animation_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('menu_animation_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['menu_animation_enable'],1); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('menu_animation_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('menu_animation_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('menu_animation_enable_2'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['menu_animation_enable'],0); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('menu_animation_enable_2'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
				</div>			
			</li>	
			<li>
				<h5><?php esc_html_e('Menu opening speed','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Speed of the opening animation in miliseconds','autospa'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autospa_ThemeHelper::getFormName('menu_animation_speed_open'); ?>" id="<?php Autospa_ThemeHelper::getFormName('menu_animation_speed_open'); ?>" value="<?php echo esc_attr($this->data['option']['menu_animation_speed_open']); ?>" maxlength="5"/>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Menu closing speed','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Speed of the closing animation in miliseconds','autospa'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autospa_ThemeHelper::getFormName('menu_animation_speed_close'); ?>" id="<?php Autospa_ThemeHelper::getFormName('menu_animation_speed_close'); ?>" value="<?php echo esc_attr($this->data['option']['menu_animation_speed_close']); ?>" maxlength="5"/>
				</div>
			</li>					
			<li>
				<h5><?php esc_html_e('Menu delay','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('The delay in milliseconds that the mouse can remain outside a submenu without it closing.','autospa'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autospa_ThemeHelper::getFormName('menu_animation_delay'); ?>" id="<?php Autospa_ThemeHelper::getFormName('menu_animation_delay'); ?>" value="<?php echo esc_attr($this->data['option']['menu_animation_delay']); ?>" maxlength="5"/>
				</div>
			</li>			
		</ul>