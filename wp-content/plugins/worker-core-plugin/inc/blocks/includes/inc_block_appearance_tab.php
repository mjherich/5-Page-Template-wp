<?php 

		// APPEARANCE TAB DEFAULTS. REMEMBER YOU CAN OVERWRITE TAB DEFAULTS BY DEFINING 'PARAM'=>'VALUE' IN BLOCK DEFAULTS.
		$appearance_tab_defaults = array( 
			'tab'							=> 'block_tab_general',
			'parallax_ratio'				=> 1,
			'bg_boxed'						=> 'unchecked',
			'bg_color'						=> '',
			'font_color'					=> '',
		);

		$params = wp_parse_args($params, $appearance_tab_defaults);

?>

						<div class="option">
							<label><?php _e("Background Image", "loc_worker_core_plugin"); ?></label>
							<input class='block_option upload_text' type='text' id='block_bg_image' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_img]' value='<?php if (isset($params['bg_img'])) echo $params['bg_img']; ?>'>
							<input class='upload_button button' type="button" id="upload_bg_img_button" value="Select Image" />
						</div>

						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='num_columns' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][parallax_ratio]' 
								min='0'
								max='2'
								step='0.05'
								style='width: 45px;'
								value='<?php if (isset($params['parallax_ratio'])) echo esc_attr($params['parallax_ratio']); ?>'
							><?php _e("Parallax ratio <i>(1 for no parallax, 0 for max parallax)</i>", "loc_worker_core_plugin"); ?>
						</div>

						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_boxed]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_boxed]" class="checkbox" value="checked" <?php if (isset($params['bg_boxed'])) { checked($params['bg_boxed'] == "checked"); } ?>/> 
							<?php _e("Boxed background <i>(not available with full width content)</i>", "loc_worker_core_plugin"); ?>
						</div>

						<div class="option">
							<p><strong><?php _e("Block Colors", "loc_worker_core_plugin"); ?></strong> <i>(<?php _e("leave empty to use defaults", "loc_worker_core_plugin"); ?>)</i></p>
							<div class="colorSelectorBox pb_color_selector"><div style="background-color: <?php echo $params['bg_color']; ?>"></div></div>
							<input class='block_option color_input' type="text" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_color]" value="<?php if (isset($params['bg_color'])) echo $params['bg_color']; ?>" />    
							<label class="color_label"><?php _e("Background Color", "loc_worker_core_plugin"); ?></label>
						</div>

						<div class="option">
							<div class="colorSelectorBox pb_color_selector"><div style="background-color: <?php echo $params['font_color']; ?>"></div></div>
							<input class='block_option color_input' type="text" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][font_color]" value="<?php if (isset($params['font_color'])) echo $params['font_color']; ?>" />    
							<label class="color_label"><?php _e("Font Color", "loc_worker_core_plugin"); ?></label>
						</div>