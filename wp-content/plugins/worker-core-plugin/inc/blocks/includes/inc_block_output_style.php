					<?php 

						$css_block_id = pb_get_block_id($params);

						// CUSTOM BACKGROUND
						if (!empty($bg_img) || !empty($bg_color)) {
							echo "#$css_block_id";
							if (isset($bg_boxed)) { if($bg_boxed == 'checked') { echo " .main.wrapper"; } }
							echo "{";
							if (!empty($bg_img)) { echo "background-image: url('$bg_img');"; }
							if (!empty($bg_color)) { echo "background-color: $bg_color;"; }
							echo "}";
						}


						// CUSTOM FONT COLOR
						if (!empty($font_color)) {
							echo "#$css_block_id blockquote,";
							echo "#$css_block_id h1,";
							echo "#$css_block_id h1 *,";
							echo "#$css_block_id h2,";
							echo "#$css_block_id h2 *,";
							echo "#$css_block_id h3,";
							echo "#$css_block_id h3 *,";
							echo "#$css_block_id h4,";
							echo "#$css_block_id h4 *,";
							echo "#$css_block_id h5,";
							echo "#$css_block_id h5 *,";
							echo "#$css_block_id h6,";
							echo "#$css_block_id h6 *,";
							echo "#$css_block_id a,";
							echo "#$css_block_id p,";
							echo "#$css_block_id div";
							echo "{";
							if (!empty($font_color)) { echo  "color: $font_color;"; }
							echo "}";
						}
				

						// CUSTOM CSS
						if (!empty($custom_css)) { echo $custom_css; }


						// MARGIN AND PADDING
						if (!empty($margin_shorthand_property) || !empty($padding_shorthand_property)) {
							printf('#%s {', esc_attr(pb_get_block_id($params)));
							if (!empty($margin_shorthand_property)) { echo "margin: $margin_shorthand_property;"; }
							if (!empty($padding_shorthand_property)) { echo "padding: $padding_shorthand_property;"; }
							echo "}";
						}

					?>