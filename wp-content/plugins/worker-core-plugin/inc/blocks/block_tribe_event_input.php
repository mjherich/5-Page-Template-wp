<?php
	function block_tribe_event_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'tribe_event',
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_tribe_event block_group_functionality">

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


					<?php 
						// DETECT PLUGIN
						if (!class_exists('Tribe__Events__Main')) {
							echo '<div class="option">';
							_e("<i><strong>WARNING:</strong> This block requires <strong>The Events Calendar</strong> plugin. The required plugin could not be found. Please go to plugins and install/activate the required plugin!</i>", "loc_worker_core_plugin");
							echo '</div>';
						} else  {
						?>

						<!-- DYNAMIC SELECT -->
							<?php 

								$events = tribe_get_events(array(
									'eventDisplay'		=> 'all',
									'orderby'			=> 'post_date',
									'order'				=> 'DESC',
                                    'posts_per_page'    => -1,
								));

							 ?>
							<div class="option">
								<label><?php _e("Select event", "loc_worker_core_plugin"); ?></label>
								<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][event_ID]"> 

								<?php 

									if (count($events) === 0) {
										echo "<option value=''>No events found</option>";
											
									} else {
										for ($i = 0; $i < count($events); $i++) { 
										?>
						     				<option value="<?php echo $events[$i]->ID; ?>" <?php if (isset($params['event_ID'])) {if ($params['event_ID'] == $events[$i]->ID) echo "selected='selected'";} ?>><?php printf('%s (%s)', esc_attr($events[$i]->post_title), esc_attr(tribe_get_start_date($events[$i]->ID))); ?></option> 
										<?php
										}
											
									}
								?>
								</select> 
							</div>

							
						<?php
						}
					?>
					

					</div>

				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>
						
				</div>
				
			</li>

		<?php	
	}
