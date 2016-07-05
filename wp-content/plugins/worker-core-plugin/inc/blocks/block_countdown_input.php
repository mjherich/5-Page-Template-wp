<?php
	function block_countdown_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'countdown',
			'title' 						=> "",
			'datetime_string' 				=> "December 31, 2023 23:59:59",
			'gmt_offset' 					=> "+10",
			'format' 						=> "dHMS",
			'description' 					=> "",
			'use_compact' 					=> "unchecked",
		);

		$params = wp_parse_args($params, $block_defaults);


		?>

			<li class="building_block block_countdown block_group_functionality">

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
								'block_tab_appearance'		=> __("Appearance", "loc_worker_core_plugin"),
								'block_tab_advanced'		=> __("Advanced", "loc_worker_core_plugin"),
							),
							'block_copy'				=> $exist,
						)); 
					?>

				<!-- BLOCK TAB: GENERAL -->
					<div class="block_tab block_tab_general">

					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Title", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][title]' value="<?php if (isset($params['title'])) echo htmlspecialchars($params['title']); ?>">
							<span class="detail"><?php _e("Optional", "loc_worker_core_plugin"); ?></span>
						</div>
						

					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Countdown to", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][datetime_string]' value="<?php if (isset($params['datetime_string'])) echo $params['datetime_string']; ?>">
							<span class="detail"><?php _e("Must be in the format Month DD, YYYY HH:MM:SS e.g. December 31, 2023 23:59:59", "loc_worker_core_plugin"); ?></span>
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("GMT offset", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][gmt_offset]' value="<?php if (isset($params['gmt_offset'])) echo $params['gmt_offset']; ?>">
							<span class="detail"><?php _e("GMT offset of your current timezone. You can search for your timezone <a href='http://www.worldtimezone.com/' target='_blank'>here</a>", "loc_worker_core_plugin"); ?></span>
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Output format", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][format]' value="<?php if (isset($params['format'])) echo $params['format']; ?>">
							<span class="detail"><?php _e("'Y' for years, 'O' for months, 'W' for weeks, 'D' for days, 'H' for hours, 'M' for minutes, 'S' for seconds. Use upper-case characters for required fields and lower-case characters for display only if non-zero.", "loc_worker_core_plugin"); ?></span>
						</div>
						

					<!-- TEXTAREA -->
						<div class="option">
							<label><?php _e("Description", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '4'
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][description]'
							><?php if (isset($params['description'])) echo $params['description']; ?></textarea>
							<span class="detail"><?php _e("Optional. Enter text / HTML.", "loc_worker_core_plugin"); ?></span>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][use_compact]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][use_compact]" class="checkbox" value="checked" <?php if (isset($params['use_compact'])) { checked($params['use_compact'] == "checked"); } ?>/> 
							<?php _e("Use compact format", "loc_worker_core_plugin"); ?>
						</div>

					</div>
				<!-- END BLOCK TAB: GENERAL -->

					
				<!-- BLOCK TAB: APPEARANCE -->
					<div class="block_tab block_tab_appearance">
						<?php include 'includes/inc_block_appearance_tab.php'; ?>
					</div>


				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>
					
				</div>
				
			</li>

		<?php	
	}
