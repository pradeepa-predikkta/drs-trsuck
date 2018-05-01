		<p>
			<label for="<?php echo esc_attr($this->data['option']['header']['id']); ?>"><?php esc_html_e('Header','autospa'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['header']['id']); ?>" name="<?php echo esc_attr($this->data['option']['header']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['header']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['subheader']['id']); ?>"><?php esc_html_e('Subheader','autospa'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['subheader']['id']); ?>" name="<?php echo esc_attr($this->data['option']['subheader']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['subheader']['value']); ?>" />
		</p>
 		<p>
			<label for="<?php echo esc_attr($this->data['option']['content']['id']); ?>"><?php esc_html_e('Content','autospa'); ?>:</label>
			<textarea class="widefat" id="<?php echo esc_attr($this->data['option']['content']['id']); ?>" name="<?php echo esc_attr($this->data['option']['content']['name']); ?>" type="text"><?php echo esc_html($this->data['option']['content']['value']); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['button_label']['id']); ?>"><?php esc_html_e('Button label','autospa'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['button_label']['id']); ?>" name="<?php echo esc_attr($this->data['option']['button_label']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['button_label']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['button_url']['id']); ?>"><?php esc_html_e('Button URL address','autospa'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['button_url']['id']); ?>" name="<?php echo esc_attr($this->data['option']['button_url']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['button_url']['value']); ?>" />
		</p>