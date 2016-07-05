<?php
	function block_content_sidebar_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		// ADVANCED TAB
		$block_defaults = array( 
			'type'							=> 'content_sidebar',
		);

		$params = wp_parse_args($params, $block_defaults);

		// get array of registered sidebars
		$registered_sidebars_array = array();

		foreach ($GLOBALS['wp_registered_sidebars'] as $key => $value) {
			array_push($registered_sidebars_array, $value);
		}

		?>

			<li class="building_block block_content_sidebar block_group_native">

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

						<div class="option">
							<span class="detail"><?php _e("Displays the content of your page. Make sure the page using this pagebuilder template has content.", "loc_worker_core_plugin"); ?></span>
						</div>

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Select sidebar", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][sidebar_id]"> 

								<?php 
									for ($i = 0; $i < count($registered_sidebars_array); $i++) { 
									?>
					     				<option value="<?php echo $registered_sidebars_array[$i]['id']; ?>" <?php if (isset($params['sidebar_id'])) {if ($params['sidebar_id'] ==  $registered_sidebars_array[$i]['id']) echo "selected='selected'";} ?>><?php echo  $registered_sidebars_array[$i]['name']; ?></option> 
									<?php
									}
								?>

							</select> 
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
