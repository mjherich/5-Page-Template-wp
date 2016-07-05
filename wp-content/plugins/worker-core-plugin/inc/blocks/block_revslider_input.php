<?php
	function block_revslider_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		// DEFAULTS
		$block_defaults = array( 
			'type'							=> 'revslider',
			'alias'							=> 'homepage',
		);

		$params = wp_parse_args($params, $block_defaults);

        // HANDLE STATUS
        if (class_exists('RevSlider')) {
	        $slider = new RevSlider();
	        $arrSliders = $slider->getAllSliderAliases();
	        if (empty($arrSliders)) { $arrSliders = array('No sliders found!'); }
        } else {
        	$arrSliders = array('Revolution Slider plugin not found!');	
        }

		?>

			<li class="building_block block_revslider block_group_functionality">

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
							<label><?php _e("Slider alias", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' id="alias" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][alias]"> 
							<?php 
								for ($i = 0; $i < count($arrSliders); $i++) { 
								?>
				     				<option value="<?php echo $arrSliders[$i]; ?>" <?php if (isset($params['alias'])) {if ($params['alias'] == $arrSliders[$i]) echo "selected='selected'";} ?>><?php echo $arrSliders[$i]; ?></option> 
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
