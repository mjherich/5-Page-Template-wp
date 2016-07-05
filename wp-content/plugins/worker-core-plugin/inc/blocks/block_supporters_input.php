<?php
	function block_supporters_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'						=> 'supporters',
			'title' 					=> "Over 200 members and growing, <span>We love our team.</span>",
			'img'						=> array(),
			'repeat'					=> "checked",
			'links_open_window'			=> "unchecked",
			'btn_1_text'				=> "Join Us Today",
			'btn_2_text'				=> "Make Donations",
		);

		$params = wp_parse_args($params, $block_defaults);

		//remove template and do array_values
		unset($params['img']['image_index']);
		$params['img'] = array_values($params['img']);

		?>

			<li class="building_block block_supporters block_group_functionality<?php if(!$exist) { echo ' save_reload'; } ?>">

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
						</div>
						
						
					<!-- SPECIAL INPUT -->
						<div class="option supporters">
							<ul class="supporter_template">

								<li>
									<input class='block_option input_img_url' type="hidden" name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][img][image_index][img_url]' value=''>
									
									<div class="supporter-img">
										<img src="">
									</div>
									
									<div class="supporter-details">
										<span class="img-details"><?php _e("Optional link:", "loc_worker_core_plugin"); ?></span>
										<input class='block_option input_link_url' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][img][image_index][link_url]' value=''>
									</div>
								</li>

							</ul>
							<ul class="supporter_images">

								<?php 

									for ($i = 0; $i < count($params['img']); $i++) {  
										if (isset($params['img'][$i])) {
											?>
												<li>
													<input class='block_option input_img_url' type="hidden" name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][img][<?php echo esc_attr($i);; ?>][img_url]' value='<?php echo $params['img'][$i]['img_url']; ?>'>
													
													<div class="supporter-img">
														<img src="<?php echo $params['img'][$i]['img_url']; ?>">
													</div>

													<div class="supporter-details">
														<span class="img-details"><?php _e("Optional link:", "loc_worker_core_plugin"); ?></span>
														<input class='block_option input_link_url' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][img][<?php echo esc_attr($i);; ?>][link_url]' value="<?php if (isset($params['img'][$i]['link_url'])) echo htmlspecialchars($params['img'][$i]['link_url']); ?>">
													</div>
												</li>
												
											<?php
										}
									}
											
								?>

							</ul>

							<div class="supporter_controls">
								<input type="button" class="button button_upload_supporter_image" value="<?php _e("Upload supporter image", "loc_worker_core_plugin"); ?>" />
								<input type="button" class="button button_remove_supporter_image" value="<?php _e("Remove supporter image", "loc_worker_core_plugin"); ?>" />
							</div>
						</div>


					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][repeat]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][repeat]" class="checkbox" value="checked" <?php if (isset($params['repeat'])) { checked($params['repeat'] == "checked"); } ?>/> 
							<?php _e("Repeat images to fill screen", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][links_open_window]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][links_open_window]" class="checkbox" value="checked" <?php if (isset($params['links_open_window'])) { checked($params['links_open_window'] == "checked"); } ?>/> 
							<?php _e("Open links in new window", "loc_worker_core_plugin"); ?>
						</div>

					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 1 text", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][btn_1_text]' value="<?php if (isset($params['btn_1_text'])) echo htmlspecialchars($params['btn_1_text']); ?>">
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 1 link", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][btn_1_link]' value="<?php if (isset($params['btn_1_link'])) echo htmlspecialchars($params['btn_1_link']); ?>">
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 2 text", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][btn_2_text]' value="<?php if (isset($params['btn_2_text'])) echo htmlspecialchars($params['btn_2_text']); ?>">
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 2 link", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][btn_2_link]' value="<?php if (isset($params['btn_2_link'])) echo htmlspecialchars($params['btn_2_link']); ?>">
						</div>
						
					<!-- TEXTAREA -->
						<div class="option">
							<label><?php _e("HTML", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '10'
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][html]'
							><?php if (isset($params['html'])) echo $params['html']; ?></textarea>
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
				
			</li>

		<?php	
	}
