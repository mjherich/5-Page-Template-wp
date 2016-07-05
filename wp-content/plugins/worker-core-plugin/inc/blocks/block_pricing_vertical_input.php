<?php
	function block_pricing_vertical_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'								=> 'pricing_vertical',
			'title' 							=> "Select Your Plan",

			'tables'							=> array(
				0										=> array(
					'table_status'							=> 'open',
					'feature'								=> 'unchecked',
					
					'price'									=> '$49',
					'interval'								=> 'p/year',
					'content'								=> '<h3>Term</h3>
					<p>365 days from your date of sign up.</p>',
					'bonus_content_1'						=> '<h3>Support</h3>
					<p>Our support centre is open for you 365 days a year.</p>',
					'bonus_content_2'						=> '<h3>Benefits</h3>
					<p>Aenean eu leo quam lenque ornare sem lacinia quam venenatis.</p>',
					'btn_text'								=> 'Join Up',
					'btn_link'								=> '',
				),

				1										=> array(
					'table_status'							=> 'open',
					'feature'								=> 'checked',
					
					'price'									=> '$69',
					'interval'								=> 'p/year',
					'content'								=> '<h3>Term</h3>
					<p>365 days from your date of sign up.</p>',
					'bonus_content_1'						=> '<h3>Support</h3>
					<p>Our support centre is open for you 365 days a year.</p>',
					'bonus_content_2'						=> '<h3>Benefits</h3>
					<p>Aenean eu leo quam lenque ornare sem lacinia quam venenatis.</p>',
					'btn_text'								=> 'Join Up',
					'btn_link'								=> '',
				),

				2										=> array(
					'table_status'							=> 'open',
					'feature'								=> 'unchecked',
					
					'price'									=> '$99',
					'interval'								=> 'p/year',
					'content'								=> '<h3>Term</h3>
					<p>365 days from your date of sign up.</p>',
					'bonus_content_1'						=> '<h3>Support</h3>
					<p>Our support centre is open for you 365 days a year.</p>',
					'bonus_content_2'						=> '<h3>Benefits</h3>
					<p>Aenean eu leo quam lenque ornare sem lacinia quam venenatis.</p>',
					'btn_text'								=> 'Join Up',
					'btn_link'								=> '',
				),
			),
		);

		$params = wp_parse_args($params, $block_defaults);

        // MAKE SURE ARRAY IS TIGHT
        $params['tables'] = array_values($params['tables']);

		// var_dump($params['tables']);



		?>

			<li class="building_block block_pricing_vertical block_group_functionality">

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
								rows = '3'
								name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][text]'
							><?php if (isset($params['text'])) echo $params['text']; ?></textarea>
							<span class="detail">Enter text / HTML</span>
						</div>
						
					<!-- SORTABLE -->
						<ul class="pb_sortable pricing_sortable">

							<?php 

								for ($i = 0; $i < count($params['tables']); $i++) {  
								?>

									<li>

										<div class="block_subheader table_toggle">
											<?php _e("Table", "loc_worker_core_plugin"); ?>
										</div>

										<table class="options_table option">

											<input class='block_option table_status' type="hidden" name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][table_status]' value='<?php if (isset($params['tables'][$i]['table_status'])) {echo $params['tables'][$i]['table_status'];} else {echo "open";} ?>'>
											
											<tr>
												<th><?php _e("Featured table", "loc_worker_core_plugin"); ?></th>
												<td>
													<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][feature]" value="unchecked" />
													<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][feature]" class="checkbox" value="checked" <?php if (isset($params['tables'][$i]['feature'])) { checked($params['tables'][$i]['feature'] == "checked"); } ?>/> 
												</td>
											</tr>

										

											<tr>
												<th><?php _e("Price", "loc_worker_core_plugin"); ?></th>
												<td>
													<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][price]' value="<?php if (isset($params['tables'][$i]['price'])) echo htmlspecialchars($params['tables'][$i]['price']); ?>">
												</td>
											</tr>

											<tr>
												<th><?php _e("Interval", "loc_worker_core_plugin"); ?></th>
												<td>
													<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][interval]' value="<?php if (isset($params['tables'][$i]['interval'])) echo htmlspecialchars($params['tables'][$i]['interval']); ?>">
												</td>
											</tr>

											<tr>
												<th><?php _e("Content", "loc_worker_core_plugin"); ?></th>
												<td>
													<textarea 
														class='block_option' 
														rows = '4'
														name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][content]'
													><?php if (isset($params['tables'][$i]['content'])) echo $params['tables'][$i]['content']; ?></textarea>
												</td>
											</tr>

											<tr>
												<th><?php _e("Bonus content 1 (optional)", "loc_worker_core_plugin"); ?></th>
												<td>
													<textarea 
														class='block_option' 
														rows = '4'
														name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][bonus_content_1]'
													><?php if (isset($params['tables'][$i]['bonus_content_1'])) echo $params['tables'][$i]['bonus_content_1']; ?></textarea>
												</td>
											</tr>

											<tr>
												<th><?php _e("Bonus content 2 (optional)", "loc_worker_core_plugin"); ?></th>
												<td>
													<textarea 
														class='block_option' 
														rows = '4'
														name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][bonus_content_2]'
													><?php if (isset($params['tables'][$i]['bonus_content_2'])) echo $params['tables'][$i]['bonus_content_2']; ?></textarea>
												</td>
											</tr>

											<tr>
												<th><?php _e("Button text", "loc_worker_core_plugin"); ?></th>
												<td>
													<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][btn_text]' value="<?php if (isset($params['tables'][$i]['btn_text'])) echo htmlspecialchars($params['tables'][$i]['btn_text']); ?>">
												</td>
											</tr>

											<tr>
												<th><?php _e("Button link", "loc_worker_core_plugin"); ?></th>
												<td>
													<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][tables][<?php echo esc_attr($i);; ?>][btn_link]' value="<?php if (isset($params['tables'][$i]['btn_link'])) echo htmlspecialchars($params['tables'][$i]['btn_link']); ?>">
												</td>
											</tr>

											<tr>
												<td colspan="2" class="delete_from_sortable"><a href=""><?php _e("delete", "loc_worker_core_plugin"); ?></a></td>
											</tr>

										</table>

									</li>
									
								<?php
								}

							?>
						</ul>

						<div class="pb_sortable_controls" data-min_num_elements="1" data-max_num_elements="1000">
							<input type="button" class="button button_add_to_sortable" value="<?php _e("Add new pricing table", "loc_worker_core_plugin"); ?>" />
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
