<?php
	function block_space_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'space',
			'space' 						=> 100,
			'space_980' 					=> 90,
			'space_768' 					=> 80,
			'space_480' 					=> 70,
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_space block_group_layout">

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
							),
							'block_copy'				=> $exist,
						)); 
					?>

				<!-- BLOCK TAB: GENERAL -->
					<div class="block_tab block_tab_general">

					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='space' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][space]' 
								min='1'
								max='10000'
								step='1'
								style='width: 65px;'
								value='<?php if (isset($params['space'])) echo esc_attr($params['space']); ?>'
							><?php _e("Pixels", "loc_worker_core_plugin"); ?>
						</div>

						<hr>

						<h4><?php _e("Responsive modes", "loc_worker_core_plugin"); ?></h4>

					<!-- NUMBER -->
						<div class="option">
							@media max-width: 980px 
							<input 
								type='number' 
								class='block_option'
								id='space_980' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][space_980]' 
								min='1'
								max='10000'
								step='1'
								style='width: 65px;'
								value='<?php if (isset($params['space_980'])) echo esc_attr($params['space_980']); ?>'
							><?php _e("Pixels", "loc_worker_core_plugin"); ?>
						</div>

					<!-- NUMBER -->
						<div class="option">
							@media max-width: 768px 
							<input 
								type='number' 
								class='block_option'
								id='space_768' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][space_768]' 
								min='1'
								max='10000'
								step='1'
								style='width: 65px;'
								value='<?php if (isset($params['space_768'])) echo esc_attr($params['space_768']); ?>'
							><?php _e("Pixels", "loc_worker_core_plugin"); ?>
						</div>

					<!-- NUMBER -->
						<div class="option">
							@media max-width: 480px 
							<input 
								type='number' 
								class='block_option'
								id='space_480' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][space_480]' 
								min='1'
								max='10000'
								step='1'
								style='width: 65px;'
								value='<?php if (isset($params['space_480'])) echo esc_attr($params['space_480']); ?>'
							><?php _e("Pixels", "loc_worker_core_plugin"); ?>
						</div>

					</div>

					

				</div>
				
			</li>

		<?php	
	}
