<?php 

		// ADVANCED TAB DEFAULTS. REMEMBER YOU CAN OVERWRITE TAB DEFAULTS BY DEFINING $PARAMS['VALUE'] IN BLOCK DEFAULTS.
		$advanced_tab_defaults = array( 
			'custom_classes'				=> '',
			'custom_css' 					=> '',
			'margin_shorthand_property' 	=> '',
			'padding_shorthand_property' 	=> '',
		);

		$params = wp_parse_args($params, $advanced_tab_defaults);

?>

						<div class="option">
							<label><?php _e("Custom block classes", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' id='block_custom_classes' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][custom_classes]' value="<?php if (isset($params['custom_classes'])) echo htmlspecialchars($params['custom_classes']); ?>">
						</div>

						<div class="option">
							<label><?php _e("Custom block CSS", "loc_worker_core_plugin"); ?></label>
							<span class="detail">&lt;style&gt;</span>
							<textarea 
								class='block_option' 
								id='block_custom_css' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][custom_css]'
								rows='5'
							><?php if (isset($params['custom_css'])) echo $params['custom_css']; ?></textarea>
							<span class="detail">&lt;/style&gt;</span>
						</div>

						<div class="option">
							<strong><?php _e("Margin Shorthand Property", "loc_worker_core_plugin"); ?></strong> (<a href="http://www.w3schools.com/css/css_margin.asp" target="_blank">?</a>)
							<input class='block_option' type='text' id='block_margin_shorthand_property' placeholder="0px 0px 0px 0px" name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][margin_shorthand_property]' value="<?php if (isset($params['margin_shorthand_property'])) echo htmlspecialchars($params['margin_shorthand_property']); ?>">
						</div>

						<div class="option">
							<strong><?php _e("Padding Shorthand Property", "loc_worker_core_plugin"); ?></strong> (<a href="http://www.w3schools.com/css/css_padding.asp" target="_blank">?</a>)
							<input class='block_option' type='text' id='block_padding_shorthand_property' placeholder="0px 0px 0px 0px" name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][padding_shorthand_property]' value="<?php if (isset($params['padding_shorthand_property'])) echo htmlspecialchars($params['padding_shorthand_property']); ?>">
						</div>

