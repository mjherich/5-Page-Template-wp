<?php
	function block_qa_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		$block_defaults = array( 
			'type'							=> 'qa',
			'title' 						=> "Q & A",
			'question' 						=> array('My Credit Card Is Stuck In My Computer?'),
			'answer'						=> array('You should probably get it out of there!'),
			'toggletype' 					=> 'toggle',
		);

		$params = wp_parse_args($params, $block_defaults);

		// MAKE SURE ARRAYS ARE TIGHT
		$params['question'] = array_values($params['question']);
		$params['answer'] = array_values($params['answer']);

		?>

			<li class="building_block block_qa block_group_functionality">

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
						
						
					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Type", "loc_worker_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][toggletype]"> 
				     			<option value="toggle" <?php if (isset($params['toggletype'])) {if ($params['toggletype'] == "toggle") echo "selected='selected'";} ?>>Toggle</option> 
				     			<option value="accordion" <?php if (isset($params['toggletype'])) {if ($params['toggletype'] == "accordion") echo "selected='selected'";} ?>>Accordion</option> 
							</select> 
						</div>

						<ul class="pb_sortable qa_sortable">

							<?php 

								for ($i = 0; $i < count($params['question']); $i++) {  
								?>

									<li>

										<table class="options_table option">
											<tr>
												<th><?php _e("Question", "loc_worker_core_plugin"); ?></th>
												<td>
													<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][question][<?php echo esc_attr($i);; ?>]' value="<?php if (isset($params['question'][$i])) echo htmlspecialchars($params['question'][$i]); ?>">
												</td>
											</tr>

											<tr>
												<th><?php _e("Answer", "loc_worker_core_plugin"); ?></th>
												<td>
													<textarea 
														class='block_option' 
														rows = '3'
														name='canon_options_pagebuilder[blocks][<?php echo esc_attr($index); ?>][answer][<?php echo esc_attr($i);; ?>]'
													><?php if (isset($params['answer'][$i])) echo $params['answer'][$i]; ?></textarea>
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

						<div class="pb_sortable_controls" data-min_num_elements="1" data-max_num_elements="10000">
							<input type="button" class="button button_add_to_sortable" value="<?php _e("Add new Q&A", "loc_worker_core_plugin"); ?>" />
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
