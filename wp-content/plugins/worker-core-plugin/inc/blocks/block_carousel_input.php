<?php
	function block_carousel_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'carousel',
			'title' 						=> "My Carousel",
			'show' 							=> "latest_posts",
			'link_to' 						=> "posts",
			'layout' 						=> "boxed",
			'show_section_header' 			=> "checked",
			'show_featured_image' 			=> "checked",
			'show_date' 					=> "checked",
			'show_title' 					=> "checked",
			'show_excerpt' 					=> "checked",
			'show_more_link' 				=> "checked",
			'display_num_posts' 			=> 5,
			'num_posts' 					=> 15,
			'excerpt_length' 				=> 155,
			'slide_speed' 					=> 200,
			'autoplay_speed' 				=> 3000,
			'stop_on_hover' 				=> "checked",
			'pagination' 					=> "checked",
		);

		$params = wp_parse_args($params, $block_defaults);


		?>

			<li class="building_block block_carousel block_group_functionality">

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
						
					<!-- DYNAMIC SELECT -->
						<?php 

							$cat_list = get_categories(array(
								'hide_empty' => 0
							));
							$cat_list = array_values($cat_list);

						 ?>
						<div class="option">
							<label><?php _e("Show", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' id="show" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show]"> 
				     			<option value="latest_posts" <?php if (isset($params['show'])) {if ($params['show'] == "latest_posts") echo "selected='selected'";} ?>><?php _e("Latest posts", "loc_worker_core_plugin"); ?></option> 
				     			<option value="random_posts" <?php if (isset($params['show'])) {if ($params['show'] == "random_posts") echo "selected='selected'";} ?>><?php _e("Random posts", "loc_worker_core_plugin"); ?></option> 
				     			<option value="latest_posts"></option> 

				     			<option value="popular_views" <?php if (isset($params['show'])) {if ($params['show'] == "popular_views") echo "selected='selected'";} ?>><?php _e("Popular posts by views", "loc_worker_core_plugin"); ?>	</option> 
			 					<option value="popular_comments" <?php if (isset($params['show'])) {if ($params['show'] == "popular_comments") echo "selected='selected'";} ?>><?php _e("Popular posts by comments", "loc_worker_core_plugin"); ?>	</option> 
				     			<option value="latest_posts"></option> 

							<?php 
								for ($i = 0; $i < count($cat_list); $i++) { 
								?>
				     				<option value="postcat_<?php echo esc_attr($cat_list[$i]->slug); ?>" <?php if (isset($params['show'])) {if ($params['show'] == "postcat_" . $cat_list[$i]->slug) echo "selected='selected'";} ?>><?php echo esc_attr($cat_list[$i]->name); ?> category</option> 
								<?php
								}
							?>
							</select> 
						</div>

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Layout", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' id="layout" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][layout]"> 
				     			<option value="boxed" <?php if (isset($params['layout'])) {if ($params['layout'] == "boxed") echo "selected='selected'";} ?>><?php _e("Boxed", "loc_worker_core_plugin"); ?></option> 
				     			<option value="full" <?php if (isset($params['layout'])) {if ($params['layout'] == "full") echo "selected='selected'";} ?>><?php _e("Full Width", "loc_worker_core_plugin"); ?></option> 
							</select> 
						</div>
						
					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Featured images link to", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' id="link_to" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][link_to]"> 
				     			<option value="post" <?php if (isset($params['link_to'])) {if ($params['link_to'] == "post") echo "selected='selected'";} ?>><?php _e("Posts", "loc_worker_core_plugin"); ?></option> 
				     			<option value="lightbox" <?php if (isset($params['link_to'])) {if ($params['link_to'] == "lightbox") echo "selected='selected'";} ?>><?php _e("Lightbox", "loc_worker_core_plugin"); ?></option> 
							</select> 
						</div>
						
					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_section_header]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_section_header]" class="checkbox" value="checked" <?php if (isset($params['show_section_header'])) { checked($params['show_section_header'] == "checked"); } ?>/> 
							<?php _e("Show section header", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_featured_image]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_featured_image]" class="checkbox" value="checked" <?php if (isset($params['show_featured_image'])) { checked($params['show_featured_image'] == "checked"); } ?>/> 
							<?php _e("Show featured image", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_date]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_date]" class="checkbox" value="checked" <?php if (isset($params['show_date'])) { checked($params['show_date'] == "checked"); } ?>/> 
							<?php _e("Show publish date", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_title]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_title]" class="checkbox" value="checked" <?php if (isset($params['show_title'])) { checked($params['show_title'] == "checked"); } ?>/> 
							<?php _e("Show title", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_excerpt]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_excerpt]" class="checkbox" value="checked" <?php if (isset($params['show_excerpt'])) { checked($params['show_excerpt'] == "checked"); } ?>/> 
							<?php _e("Show excerpt", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_more_link]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][show_more_link]" class="checkbox" value="checked" <?php if (isset($params['show_more_link'])) { checked($params['show_more_link'] == "checked"); } ?>/> 
							<?php _e("Show more link", "loc_worker_core_plugin"); ?>
						</div>

					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='display_num_posts' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][display_num_posts]' 
								min='1'
								max='100'
								step='1'
								style='width: 60px;'
								value='<?php if (isset($params['display_num_posts'])) echo esc_attr($params['display_num_posts']); ?>'
							><?php _e("Number of items to display", "loc_worker_core_plugin"); ?>
						</div>
						
					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='num_posts' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][num_posts]' 
								min='1'
								max='100'
								step='1'
								style='width: 60px;'
								value='<?php if (isset($params['num_posts'])) echo esc_attr($params['num_posts']); ?>'
							><?php _e("Number of items to load", "loc_worker_core_plugin"); ?>
						</div>
						
					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='excerpt_length' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][excerpt_length]' 
								min='1'
								step='1'
								style='width: 60px;'
								value='<?php if (isset($params['excerpt_length'])) echo esc_attr($params['excerpt_length']); ?>'
							><?php _e("Excerpt length", "loc_worker_core_plugin"); ?>
						</div>
						
					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='slide_speed' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][slide_speed]' 
								min='0'
								max='10000'
								step='10'
								style='width: 60px;'
								value='<?php if (isset($params['slide_speed'])) echo esc_attr($params['slide_speed']); ?>'
							><?php _e("Slide speed", "loc_worker_core_plugin"); ?> <i>(<?php _e("milliseconds", "loc_worker_core_plugin"); ?>)</i>
						</div>
						
					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='autoplay_speed' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][autoplay_speed]' 
								min='0'
								max='10000'
								step='100'
								style='width: 60px;'
								value='<?php if (isset($params['autoplay_speed'])) echo esc_attr($params['autoplay_speed']); ?>'
							><?php _e("Autoplay speed ", "loc_worker_core_plugin"); ?> <i>(<?php _e("milliseconds - 0 to turn autoplay off", "loc_worker_core_plugin"); ?>)</i>
						</div>
						
					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][stop_on_hover]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][stop_on_hover]" class="checkbox" value="checked" <?php if (isset($params['stop_on_hover'])) { checked($params['stop_on_hover'] == "checked"); } ?>/> 
							<?php _e("Stop on hover", "loc_worker_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][pagination]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][pagination]" class="checkbox" value="checked" <?php if (isset($params['pagination'])) { checked($params['pagination'] == "checked"); } ?>/> 
							<?php _e("Pagination", "loc_worker_core_plugin"); ?>
						</div>

					</div>
					<!-- END BLOCK TAB GENERAL -->


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
