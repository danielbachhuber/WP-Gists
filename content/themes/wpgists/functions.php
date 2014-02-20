<?php

require_once dirname( __FILE__ ) . '/inc/class-gist.php';

/**
 * Register our content types
 */
add_action( 'init', function(){

	// Gist post type
	register_post_type( 'gist', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor', 'excerpt', 'author' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Gists', 'wpgists' ),
			'singular_name'       => __( 'Gist', 'wpgists' ),
			'all_items'           => __( 'Gists', 'wpgists' ),
			'new_item'            => __( 'New Gist', 'wpgists' ),
			'add_new'             => __( 'Add New', 'wpgists' ),
			'add_new_item'        => __( 'Add New Gist', 'wpgists' ),
			'edit_item'           => __( 'Edit Gist', 'wpgists' ),
			'view_item'           => __( 'View Gist', 'wpgists' ),
			'search_items'        => __( 'Search Gists', 'wpgists' ),
			'not_found'           => __( 'No Gists found', 'wpgists' ),
			'not_found_in_trash'  => __( 'No Gists found in trash', 'wpgists' ),
			'parent_item_colon'   => __( 'Parent Gist', 'wpgists' ),
			'menu_name'           => __( 'Gists', 'wpgists' ),
		),
	) );

	// Plugin taxonomy
	register_taxonomy( 'plugin', array( 'gist' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Plugins', 'wpgists' ),
			'singular_name'              => _x( 'Plugin', 'taxonomy general name', 'wpgists' ),
			'search_items'               => __( 'Search Plugins', 'wpgists' ),
			'popular_items'              => __( 'Popular Plugins', 'wpgists' ),
			'all_items'                  => __( 'All Plugins', 'wpgists' ),
			'parent_item'                => __( 'Parent Plugin', 'wpgists' ),
			'parent_item_colon'          => __( 'Parent Plugin:', 'wpgists' ),
			'edit_item'                  => __( 'Edit Plugin', 'wpgists' ),
			'update_item'                => __( 'Update Plugin', 'wpgists' ),
			'add_new_item'               => __( 'New Plugin', 'wpgists' ),
			'new_item_name'              => __( 'New Plugin', 'wpgists' ),
			'separate_items_with_commas' => __( 'Plugins separated by comma', 'wpgists' ),
			'add_or_remove_items'        => __( 'Add or remove Plugins', 'wpgists' ),
			'choose_from_most_used'      => __( 'Choose from the most used Plugins', 'wpgists' ),
			'menu_name'                  => __( 'Plugins', 'wpgists' ),
		),
	) );

	// Theme taxonomy
	register_taxonomy( 'theme', array( 'gist' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Themes', 'wpgists' ),
			'singular_name'              => _x( 'Theme', 'taxonomy general name', 'wpgists' ),
			'search_items'               => __( 'Search Themes', 'wpgists' ),
			'popular_items'              => __( 'Popular Themes', 'wpgists' ),
			'all_items'                  => __( 'All Themes', 'wpgists' ),
			'parent_item'                => __( 'Parent Theme', 'wpgists' ),
			'parent_item_colon'          => __( 'Parent Theme:', 'wpgists' ),
			'edit_item'                  => __( 'Edit Theme', 'wpgists' ),
			'update_item'                => __( 'Update Theme', 'wpgists' ),
			'add_new_item'               => __( 'New Theme', 'wpgists' ),
			'new_item_name'              => __( 'New Theme', 'wpgists' ),
			'separate_items_with_commas' => __( 'Themes separated by comma', 'wpgists' ),
			'add_or_remove_items'        => __( 'Add or remove Themes', 'wpgists' ),
			'choose_from_most_used'      => __( 'Choose from the most used Themes', 'wpgists' ),
			'menu_name'                  => __( 'Themes', 'wpgists' ),
		),
	) );

});
