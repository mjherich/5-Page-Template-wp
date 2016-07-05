<?php
	function block_img_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		// ADVANCED TAB
		$block_defaults = array( 
			'type'							=> 'img',
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_img block_group_functionality">

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


					<!-- UPLOAD -->
						<div class="option">
							<label><?php _e("Image", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' id='img_url' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][img_url]' class='url' value='<?php if (isset($params['img_url'])) echo $params['img_url']; ?>'>
							<input type="button" id="upload_img_url_btn" class="upload button upload_button" value="<?php _e("Select image", "loc_worker_core_plugin"); ?>" />
						</div>
						
					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Layout", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][layout]"> 
				     			<option value="full_width_fit" <?php if (isset($params['layout'])) {if ($params['layout'] == "full_width_fit") echo "selected='selected'";} ?>><?php _e("Full width fit", "loc_worker_core_plugin"); ?></option> 
				     			<option value="boxed_fit" <?php if (isset($params['layout'])) {if ($params['layout'] == "boxed_fit") echo "selected='selected'";} ?>><?php _e("Boxed fit", "loc_worker_core_plugin"); ?></option> 
				     			<option value="boxed" <?php if (isset($params['layout'])) {if ($params['layout'] == "boxed") echo "selected='selected'";} ?>><?php _e("Boxed left align", "loc_worker_core_plugin"); ?></option> 
				     			<option value="boxed_center" <?php if (isset($params['layout'])) {if ($params['layout'] == "boxed_center") echo "selected='selected'";} ?>><?php _e("Boxed center align", "loc_worker_core_plugin"); ?></option> 
				     			<option value="boxed_right" <?php if (isset($params['layout'])) {if ($params['layout'] == "boxed_right") echo "selected='selected'";} ?>><?php _e("Boxed right align", "loc_worker_core_plugin"); ?></option> 
							</select> 
						</div>

					</div>

				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>

						

				</div>
				<!-- END BLOCK_OPTIONS -->
			</li>

		<?php	
	}