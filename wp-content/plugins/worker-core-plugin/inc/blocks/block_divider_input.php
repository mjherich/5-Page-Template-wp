<?php
	function block_divider_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'								=> 'divider',
			'divider_text' 						=> "Divide and conquer!",
			'divider_type' 						=> "text_bar",
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_divider block_group_layout">

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

					<!-- DYNAMIC SELECT -->
						<div class="option">
							<label><?php _e("Type", "loc_worker_core_plugin"); ?></label>
							<select id="divider_type" class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][divider_type]"> 
				     			<option value="hr" <?php if (isset($params['divider_type'])) {if ($params['divider_type'] == "hr") echo "selected='selected'";} ?>><?php _e("Horizontal ruler", "loc_worker_core_plugin"); ?></option> 
				     			<option value="text_bar" <?php if (isset($params['divider_type'])) {if ($params['divider_type'] == "text_bar") echo "selected='selected'";} ?>><?php _e("Text bar", "loc_worker_core_plugin"); ?></option> 
							</select> 
						</div>
						
					<!-- TEXT BAR SPECIFIC OPTION: TEXT INPUT -->

						<div class="pb_dynamic_option" data-listen_to="#divider_type" data-listen_for="text_bar" data-same_level_parent_container=".option">

							<div class="option">
								<label><?php _e("Divider text", "loc_worker_core_plugin"); ?></label>
								<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][divider_text]' value="<?php if (isset($params['divider_text'])) echo htmlspecialchars($params['divider_text']); ?>">
							</div>

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
