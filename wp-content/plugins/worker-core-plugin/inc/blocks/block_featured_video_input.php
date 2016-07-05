<?php
	function block_featured_video_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		// DEFAULTS
		$block_defaults = array( 
			'type'									=> 'featured_video',
			'before_video'							=> '<h4>Worker for WordPress</h4>',
			'embed_code'							=> '<iframe src="//player.vimeo.com/video/33186694" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
			'after_video'							=> '<h5>Better For Your Business</h5>',
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_featured_video block_group_functionality">

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


						<div class="option">
							<label><?php _e("Before video", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option services' 
								id='block_before_video' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][before_video]'
							><?php if (isset($params['before_video'])) echo $params['before_video']; ?></textarea>
							<span class="detail">Text / HTML</span>
						</div>

						<div class="option">
							<label><?php _e("Embeddable media code", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' id='block_embed_code' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][embed_code]' value="<?php if (isset($params['embed_code'])) echo htmlspecialchars($params['embed_code']); ?>">
						</div>

						<div class="option">
							<label><?php _e("After video", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option services' 
								id='block_after_video' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][after_video]'
							><?php if (isset($params['after_video'])) echo $params['after_video']; ?></textarea>
							<span class="detail"><?php _e("Text / HTML", "loc_worker_core_plugin"); ?></span>
						</div>


					</div>

				<!-- BLOCK TAB: APPEARANCE -->
					<div class="block_tab block_tab_appearance">
						<?php include 'includes/inc_block_appearance_tab.php'; ?>
					</div>


				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>


					
				</div>
				<!-- END BLOCK OPTIONS -->
				
			</li>

		<?php	
	}
