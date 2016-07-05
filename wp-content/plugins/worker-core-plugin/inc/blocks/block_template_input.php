<?php
	function block_TEMPLATE_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'TEMPLATE',
			'title' 						=> "Our Projects",
			'show' 							=> "latest_posts",
			'num_columns' 					=> 3,
			'num_posts' 					=> 3,
			'show_section_header' 			=> "checked",
			'show_featured_image' 			=> "checked",
			'link_to' 						=> "posts",
			'button_text' 					=> "View All",
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_TEMPLATE block_group_GROUP">

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
						

					<!-- TEXTAREA -->
						<div class="option">
							<label><?php _e("Text", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '4'
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][text]'
							><?php if (isset($params['text'])) echo $params['text']; ?></textarea>
							<span class="detail">Enter text / HTML</span>
						</div>
						
					

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Text", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show]"> 
				     			<option value="latest_posts" <?php if (isset($params['show'])) {if ($params['show'] == "latest_posts") echo "selected='selected'";} ?>><?php _e("Latest Posts", "loc_worker_core_plugin"); ?></option> 
				     			<option value="random_posts" <?php if (isset($params['show'])) {if ($params['show'] == "random_posts") echo "selected='selected'";} ?>><?php _e("Random Posts", "loc_worker_core_plugin"); ?></option> 
							</select> 
						</div>

					<!-- DYNAMIC SELECT -->
						<?php 

							$cat_list = get_categories(array(
								'hide_empty' => 0
							));
							$cat_list = array_values($cat_list);

						 ?>
						<div class="option">
							<label><?php _e("Text", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show]"> 
				     			<option value="latest_posts" <?php if (isset($params['show'])) {if ($params['show'] == "latest_posts") echo "selected='selected'";} ?>><?php _e("Latest Posts", "loc_worker_core_plugin"); ?></option> 
				     			<option value="random_posts" <?php if (isset($params['show'])) {if ($params['show'] == "random_posts") echo "selected='selected'";} ?>><?php _e("Random Posts", "loc_worker_core_plugin"); ?></option> 
				     			<option value="latest_posts"></option> 
				     			<option value="latest_posts">Categories:</option> 

							<?php 
								for ($i = 0; $i < count($cat_list); $i++) { 
								?>
				     				<option value="postcat_<?php echo $cat_list[$i]->cat_ID; ?>" <?php if (isset($params['show'])) {if ($params['show'] == "postcat_" . $cat_list[$i]->cat_ID) echo "selected='selected'";} ?>>- <?php echo $cat_list[$i]->name; ?></option> 
								<?php
								}
							?>
							</select> 
						</div>
						
					

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][use_parallax]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][use_parallax]" class="checkbox" value="checked" <?php if (isset($params['use_parallax'])) { checked($params['use_parallax'] == "checked"); } ?>/> 
							<?php _e("Use parallax scrolling for background image", "loc_worker_core_plugin"); ?>
						</div>

					

					<!-- DYNAMIC CHECKBOXES -->
						<div class="option">
							<label><?php _e("Filter menu categories", "loc_worker_core_plugin"); ?></label>
							<?php 
								for ($i = 0; $i < count($cat_list); $i++) { 
								?>
									<input 
										class='block_option checkbox' 
										id='block_cat_ids' 
										type="checkbox" 
										name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][cat_ids][<?php echo $cat_list[$i]->cat_ID; ?>]' 
										value='checked'
										<?php checked(isset($params['cat_ids'][$cat_list[$i]->cat_ID])) ?>
									/> 
									<?php echo $cat_list[$i]->name; ?> <br>
								<?php
								}
							?>
						</div>



					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='parallax_ratio' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][parallax_ratio]' 
								min='0'
								max='2'
								step='0.1'
								style='width: 45px;'
								value='<?php if (isset($params['parallax_ratio'])) echo esc_attr($params['parallax_ratio']); ?>'
							><?php _e("Parallax ratio", "loc_worker_core_plugin"); ?>
						</div>


					<!-- COLORPICKER -->
						<div class="option">
							<label><?php _e("Background Color", "loc_worker_core_plugin"); ?></label>
							<div class="colorSelectorBox pb_color_selector"><div style="background-color: <?php echo $params['bg_color']; ?>"></div></div>
							<input class='block_option color_input' type="text" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][bg_color]" value="<?php if (isset($params['bg_color'])) echo $params['bg_color']; ?>" />    
						</div>

					<!-- UPLOAD -->
						<div class="option">
							<label><?php _e("Image", "loc_worker_core_plugin"); ?></label>
							<input class='block_option' type='text' id='img_url' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][img_url]' class='url' value='<?php if (isset($params['img_url'])) echo $params['img_url']; ?>'>
							<input type="button" id="upload_img_url_btn" class="upload button upload_button" value="<?php _e("Select image", "loc_worker_core_plugin"); ?>" />
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
