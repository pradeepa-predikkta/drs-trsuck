		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Automatic excerpt length','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Number of words in automatic excerpt.','autospa'); ?></span>
				<div>
					<input type="text" name="<?php Autospa_ThemeHelper::getFormName('comment_automatic_excerpt_length'); ?>" id="<?php Autospa_ThemeHelper::getFormName('comment_automatic_excerpt_length'); ?>" value="<?php echo esc_attr($this->data['option']['comment_automatic_excerpt_length']); ?>" maxlength="3"/>
				</div>
			</li>
		</ul>