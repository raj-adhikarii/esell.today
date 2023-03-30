<?php
add_action( 'init', 'location_register_post_type' );
function location_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Locations', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Locations', 'e-sell_today' ),
			'name_admin_bar'     => esc_html__( 'Location', 'e-sell_today' ),
			'add_new'            => esc_html__( 'Add Location', 'e-sell_today' ),
			'add_new_item'       => esc_html__( 'Add new Location', 'e-sell_today' ),
			'new_item'           => esc_html__( 'New Location', 'e-sell_today' ),
			'edit_item'          => esc_html__( 'Edit Location', 'e-sell_today' ),
			'view_item'          => esc_html__( 'View Location', 'e-sell_today' ),
			'update_item'        => esc_html__( 'View Location', 'e-sell_today' ),
			'all_items'          => esc_html__( 'All Locations', 'e-sell_today' ),
			'search_items'       => esc_html__( 'Search Locations', 'e-sell_today' ),
			'parent_item_colon'  => esc_html__( 'Parent Location', 'e-sell_today' ),
			'not_found'          => esc_html__( 'No Locations found', 'e-sell_today' ),
			'not_found_in_trash' => esc_html__( 'No Locations found in Trash', 'e-sell_today' ),
			'name'               => esc_html__( 'Locations', 'e-sell_today' ),
			'singular_name'      => esc_html__( 'Location', 'e-sell_today' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-location-alt',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'location', $args );
}

add_action( 'init', 'service_register_post_type' );
function service_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Services', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Services', 'e-sell_today' ),
			'name_admin_bar'     => esc_html__( 'Service', 'e-sell_today' ),
			'add_new'            => esc_html__( 'Add Service', 'e-sell_today' ),
			'add_new_item'       => esc_html__( 'Add new Service', 'e-sell_today' ),
			'new_item'           => esc_html__( 'New Service', 'e-sell_today' ),
			'edit_item'          => esc_html__( 'Edit Service', 'e-sell_today' ),
			'view_item'          => esc_html__( 'View Service', 'e-sell_today' ),
			'update_item'        => esc_html__( 'View Service', 'e-sell_today' ),
			'all_items'          => esc_html__( 'All Services', 'e-sell_today' ),
			'search_items'       => esc_html__( 'Search Services', 'e-sell_today' ),
			'parent_item_colon'  => esc_html__( 'Parent Service', 'e-sell_today' ),
			'not_found'          => esc_html__( 'No Services found', 'e-sell_today' ),
			'not_found_in_trash' => esc_html__( 'No Services found in Trash', 'e-sell_today' ),
			'name'               => esc_html__( 'Services', 'e-sell_today' ),
			'singular_name'      => esc_html__( 'Service', 'e-sell_today' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-images-alt',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'service', $args );
}