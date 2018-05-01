
		<div class="cbs-main-list-item-section-content cbs-clear-fix">

			<ul class="cbs-booking-summary cbs-list-reset cbs-clear-fix">

				<li class="cbs-booking-summary-date">
					<div class="cbs-meta-icon cbs-meta-icon-date"></div>
					<h5>
						<span></span>
						<span><?php esc_html_e('?',PLUGIN_CBS_DOMAIN); ?></span>
					</h5>
					<span><?php esc_html_e('Your Appointment Date',PLUGIN_CBS_DOMAIN); ?></span>
				</li>

				<li class="cbs-booking-summary-time">
					<div class="cbs-meta-icon cbs-meta-icon-time"></div>
					<h5>
						<span></span>
						<span><?php esc_html_e('?',PLUGIN_CBS_DOMAIN); ?></span>
					</h5>
					<span><?php esc_html_e('Your Appointment Time',PLUGIN_CBS_DOMAIN); ?></span>				
				</li>

				<li class="cbs-booking-summary-duration">
					<div class="cbs-meta-icon cbs-meta-icon-total-duration"></div>
					<h5>
						<span>0</span>
						<span><?php esc_html_e('h',PLUGIN_CBS_DOMAIN); ?></span>
						&nbsp;
						<span>0</span>
						<span><?php esc_html_e('min',PLUGIN_CBS_DOMAIN); ?></span>
					</h5>
					<span><?php esc_html_e('Duration',PLUGIN_CBS_DOMAIN); ?></span>
				</li>

				<li class="cbs-booking-summary-price ">
					<div class="cbs-meta-icon cbs-meta-icon-total-price"></div>
					<h5>
<?php
		if($this->data['currencySymbolPosition']=='left')
		{
?>
						<span class="cbs-booking-summary-price-symbol"><?php echo esc_html($this->data['currencySymbol']); ?></span>
<?php
		}
?>
						<span class="cbs-booking-summary-price-value">0<?php echo $this->data['currencySeparator']; ?>00</span>
<?php
		if($this->data['currencySymbolPosition']=='right')
		{
?>
						<span class="cbs-booking-summary-price-symbol"><?php echo esc_html($this->data['currencySymbol']); ?></span>
<?php
		}
?>
					</h5>
					<span><?php esc_html_e('Total Price',PLUGIN_CBS_DOMAIN); ?></span>				
				</li>

			</ul>
			
		</div>