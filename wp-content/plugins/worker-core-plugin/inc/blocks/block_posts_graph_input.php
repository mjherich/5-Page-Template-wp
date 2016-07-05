<?php
	function block_posts_graph_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'posts_graph',
			'title' 						=> "Trending Posts",
			'description' 					=> "Display a category of trending posts either by most views or by most comments. It's a great way to showcase what's hot in your blog.",
			'show' 							=> "latest_posts",
			'num_posts' 					=> 14,
			'y_axis' 						=> "hits",
			'x_axis' 						=> "new_right",
		);

		$params = wp_parse_args($params, $block_defaults);

		?>

			<li class="building_block block_posts_graph block_group_functionality">

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
							<label><?php _e("Description", "loc_worker_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '4'
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][description]'
							><?php if (isset($params['description'])) echo $params['description']; ?></textarea>
							<span class="detail">Enter text / HTML</span>
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
				     				<option value="postcat_<?php echo $cat_list[$i]->slug; ?>" <?php if (isset($params['show'])) {if ($params['show'] == "postcat_" . $cat_list[$i]->slug) echo "selected='selected'";} ?>><?php echo $cat_list[$i]->name; ?> category</option> 
								<?php
								}
							?>
							</select> 
						</div>
							
						
					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='num_posts' 
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][num_posts]' 
								min='2'
								max='16'
								step='1'
								style='width: 45px;'
								value='<?php if (isset($params['num_posts'])) echo esc_attr($params['num_posts']); ?>'
							><?php _e("Number of posts to load", "loc_worker_core_plugin"); ?>
						</div>

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("X-axis", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][x_axis]"> 
				     			<option value="new_right" <?php if (isset($params['x_axis'])) {if ($params['x_axis'] == "new_right") echo "selected='selected'";} ?>><?php _e("Newest posts to the right", "loc_worker_core_plugin"); ?></option> 
				     			<option value="new_left" <?php if (isset($params['x_axis'])) {if ($params['x_axis'] == "new_left") echo "selected='selected'";} ?>><?php _e("Newest posts to the left", "loc_worker_core_plugin"); ?></option> 
							</select> 
						</div>

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Y-axis", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][y_axis]"> 
				     			<option value="hits" <?php if (isset($params['y_axis'])) {if ($params['y_axis'] == "hits") echo "selected='selected'";} ?>><?php _e("Number of views", "loc_worker_core_plugin"); ?></option> 
				     			<option value="comments" <?php if (isset($params['y_axis'])) {if ($params['y_axis'] == "comments") echo "selected='selected'";} ?>><?php _e("Number of comments", "loc_worker_core_plugin"); ?></option> 
							</select> 
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
