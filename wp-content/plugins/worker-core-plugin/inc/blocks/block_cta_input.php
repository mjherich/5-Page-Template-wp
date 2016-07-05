<?php
	function block_cta_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'cta',
			'text' 							=> 'Purchase this theme today, no sign up or credit card needed, <a href="#">Get it now</a>',
			'bg_color' 						=> "#f5f5f5",
			'text_color' 					=> "#1d1b1a",
			'link_color' 					=> "#85b841",

			'bg_boxed'						=> 'checked',
		);

		$params = wp_parse_args($params, $block_defaults);


		?>

			<li class="building_block block_cta block_group_functionality">

			<!--  BLOCK HEADER -->
					<?php include 'includes/inc_block_header.php'; ?>

			<!--  BLOCK CONTENT -->
				<div class="block_options">

					<input class='block_option' type="hidden" id='block_uniqueid' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][uniqueid]' value='<?php if (isset($params['uniqueid'])) {echo esc_attr($params['uniqueid']);} else { echo uniqid(); } ?>'>
					<input class='block_option' type="hidden" id='block_type' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][type]' value='<?php echo esc_attr($params['type']); ?>'>
					<input class='block_option' type="hidden" id='block_status' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][status]' value='<?php if (isset($params['status'])) {echo esc_attr($params['status']);} else {echo "open";} ?>'>
					<input class='block_option' type="hidden" id='block_tab' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tab]' value='<?php if (isset($params['tab'])) { echo esc_attr($params['tab']); } else { echo "block_tab_general"; } ?>'>

				<!--  BLOCK MENU -->
					<?php 
						pb_block_menu(array(
							'block_tab_controls' 		=> array(
								'block_tab_general'			=> __("General", "loc_worker_core_plugin"),
								'block_tab_advanced'		=> __("Advanced", "loc_worker_core_plugin"),
							),
							'block_copy'				=> $exist,
						)); 
					?>

				<!-- BLOCK TAB: GENERAL -->
					<div class="block_tab block_tab_general">


					<!-- TEXTAREA -->
						<div class="option">
							<label><?php _e("Text", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '4'
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][text]'
							><?php if (isset($params['text'])) echo $params['text']; ?></textarea>
							<span class="detail"><?php _e("Enter text / HTML", "loc_worker_core_plugin"); ?></span>
						</div>
						
					<!-- COLORPICKER -->
						<div class="option">
							<label><?php _e("Background Color", "loc_worker_core_plugin"); ?></label>
							<div class="colorSelectorBox pb_color_selector"><div style="background-color: <?php echo $params['bg_color']; ?>"></div></div>
							<input class='block_option color_input' type="text" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_color]" value="<?php if (isset($params['bg_color'])) echo $params['bg_color']; ?>" />    
						</div>

					<!-- COLORPICKER -->
						<div class="option">
							<label><?php _e("Text Color", "loc_worker_core_plugin"); ?></label>
							<div class="colorSelectorBox pb_color_selector"><div style="background-color: <?php echo $params['text_color']; ?>"></div></div>
							<input class='block_option color_input' type="text" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][text_color]" value="<?php if (isset($params['text_color'])) echo $params['text_color']; ?>" />    
						</div>

					<!-- COLORPICKER -->
						<div class="option">
							<label><?php _e("Link Color", "loc_worker_core_plugin"); ?></label>
							<div class="colorSelectorBox pb_color_selector"><div style="background-color: <?php echo $params['link_color']; ?>"></div></div>
							<input class='block_option color_input' type="text" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][link_color]" value="<?php if (isset($params['link_color'])) echo $params['link_color']; ?>" />    
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_boxed]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_boxed]" class="checkbox" value="checked" <?php if (isset($params['bg_boxed'])) { checked($params['bg_boxed'] == "checked"); } ?>/> 
							<?php _e("Boxed background", "loc_worker_core_plugin"); ?>
						</div>

					</div>
					

				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>





				</div>
				
			</li>

		<?php	
	}
