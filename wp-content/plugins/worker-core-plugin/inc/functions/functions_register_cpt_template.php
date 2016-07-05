<?php

/**************************************
INDEX

GENERAL:
The custom post type base name should be singular (cpt_project - not cpt_projects)

REPLACE:
TEMPLATECAPS
templatelowercase
Templatefirstcap
templateslug (usually: namespace_templatelowercase e.g. cpt_project)
FOLDERNAME
loc_timedrop
templatelowercase_category
Templateuppercase_category

REGISTER CUSTOM POST FORMAT: TEMPLATECAPS
CUSTOM MESSAGES: TEMPLATECAPS
CUSTOM TAXONOMIES: TEMPLATECAPS CATEGORY

***************************************/


/**************************************
REGISTER CUSTOM POST FORMAT: TEMPLATECAPS
***************************************/

add_action( 'init', 'canon_register_cpt_templatelowercases' );

function canon_register_cpt_templatelowercases() {

	$labels = array(
		'name'               	=> _x( 'Templatefirstcaps', 'post type general name', 'loc_timedrop' ),
		'singular_name'      	=> _x( 'Templatefirstcap', 'post type singular name', 'loc_timedrop' ),
		'add_new'            	=> _x( 'Add New', 'book', 'loc_timedrop' ),
		'add_new_item'       	=> __( 'Add New Templatefirstcap', 'loc_timedrop' ),
		'edit_item'          	=> __( 'Edit Templatefirstcap', 'loc_timedrop' ),
		'new_item'           	=> __( 'New Templatefirstcap', 'loc_timedrop' ),
		'all_items'          	=> __( 'All Templatefirstcaps', 'loc_timedrop' ),
		'view_item'          	=> __( 'View Templatefirstcap', 'loc_timedrop' ),
		'search_items'       	=> __( 'Search Templatefirstcaps', 'loc_timedrop' ),
		'not_found'          	=> __( 'No templatelowercases found', 'loc_timedrop' ),
		'not_found_in_trash' 	=> __( 'No templatelowercases found in the Trash', 'loc_timedrop' ), 
		'parent_item_colon'  	=> '',
		'menu_name'          	=> 'FOLDERNAME'
	);

	$args = array(
		'labels'        		=> $labels,
		'description'   		=> 'Holds our templatelowercases and templatelowercase specific data',
		'public'        		=> true,
		'menu_position' 		=> 5,
		'supports'      		=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   		=> true,
		'rewrite' 				=> array('slug' => 'templatelowercases'),
		// 'exclude_from_search' 	=> true,
	);

	register_post_type( 'templateslug', $args );	
}

/**************************************
CUSTOM MESSAGES:TEMPLATECAPS
***************************************/

add_filter( 'post_updated_messages', 'canon_cpt_templatelowercases_messages' );

function canon_cpt_templatelowercases_messages($messages) {
	global $post, $post_ID;

	$messages['templateslug'] = array(
		0 => '', 
		1 => sprintf( __('Templatefirstcap updated. <a href="%s">View templatelowercase</a>'), esc_url( get_permalink($post_ID), 'loc_timedrop' ) ),
		2 => __('Custom field updated.', 'loc_timedrop'),
		3 => __('Custom field deleted.', 'loc_timedrop'),
		4 => __('Templatefirstcap updated.', 'loc_timedrop'),
		5 => isset($_GET['revision']) ? sprintf( __('Templatefirstcap restored to revision from %s', 'loc_timedrop'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Templatefirstcap published. <a href="%s">View templatelowercase</a>'), esc_url( get_permalink($post_ID) ), 'loc_timedrop' ),
		7 => __('Templatefirstcap saved.', 'loc_timedrop'),
		8 => sprintf( __('Templatefirstcap submitted. <a target="_blank" href="%s">Preview templatelowercase</a>', 'loc_timedrop'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Templatefirstcap scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview templatelowercase</a>', 'loc_timedrop'), date_i18n( __( 'M j, Y @ G:i', 'loc_timedrop' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Templatefirstcap draft updated. <a target="_blank" href="%s">Preview templatelowercase</a>', 'loc_timedrop'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}

/**************************************
CUSTOM TAXONOMIES: TEMPLATECAPS CATEGORY
***************************************/

add_action( 'init', 'canon_register_taxonomy_templatelowercase_category', 0 );

function canon_register_taxonomy_templatelowercase_category () {
	$labels = array(
		'name'              => _x( 'Templatefirstcap Categories', 'taxonomy general name', 'loc_timedrop' ),
		'singular_name'     => _x( 'Templatefirstcap Category', 'taxonomy singular name', 'loc_timedrop' ),
		'search_items'      => __( 'Search Templatefirstcap Categories', 'loc_timedrop' ),
		'all_items'         => __( 'All Templatefirstcap Categories', 'loc_timedrop' ),
		'parent_item'       => __( 'Parent Templatefirstcap Category', 'loc_timedrop' ),
		'parent_item_colon' => __( 'Parent Templatefirstcap Category:', 'loc_timedrop' ),
		'edit_item'         => __( 'Edit Templatefirstcap Category', 'loc_timedrop' ), 
		'update_item'       => __( 'Update Templatefirstcap Category', 'loc_timedrop' ),
		'add_new_item'      => __( 'Add New Templatefirstcap Category', 'loc_timedrop' ),
		'new_item_name'     => __( 'New Templatefirstcap Category', 'loc_timedrop' ),
		'menu_name'         => __( 'Templatefirstcap Categories', 'loc_timedrop' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'templatelowercase_category', 'templateslug', $args );
}


/**************************************
CUSTOM EDIT.PHP COLUMNS
***************************************/


// first add the custom columns
add_filter('manage_edit-templateslug_columns', 'add_templateslug_columns', 4);
function add_templateslug_columns($defaults){

	$defaults['templatelowercase_category'] = __('Templateuppercase_category', 'loc_worker_core_plugin');
	return $defaults;

}

// now fill custom columns with actual data
add_action('manage_posts_custom_column', 'fill_templateslug_columns', 4, 2);
function fill_templateslug_columns($column, $post_id){

	if($column === 'templatelowercase_category'){
		// get terms and sort
		$terms = get_the_terms($post_id, 'templatelowercase_category');
		$terms = array_values($terms);
		// output terms with links
		for ($i = 0; $i < count($terms); $i++) {  
			printf('<a href="?post_type=templateslug&templatelowercase_category=%s">%s</a>', $terms[$i]->slug, $terms[$i]->name);
			if ($i !== count($terms)-1 ) { echo ", "; }	// add comma separator unless it is the last item
		}
	}

}