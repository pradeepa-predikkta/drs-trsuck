		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Right click','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable right click.','autospa'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('right_click_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('right_click_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['right_click_enable'],1); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('right_click_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('right_click_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('right_click_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['right_click_enable'],0); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('right_click_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Text selection','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable text selection.','autospa'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('copy_selection_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('copy_selection_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['copy_selection_enable'],1); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('copy_selection_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('copy_selection_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('copy_selection_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['copy_selection_enable'],0); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('copy_selection_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
				</div>
			</li>
		</ul>