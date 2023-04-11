<?php
//Location
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

//Services
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

// Testimonial
add_action( 'init', 'testimonial_register_post_type' );
function testimonial_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Testimonials', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Testimonials', 'esell-today' ),
			'name_admin_bar'     => esc_html__( 'Testimonial', 'esell-today' ),
			'add_new'            => esc_html__( 'Add Testimonial', 'esell-today' ),
			'add_new_item'       => esc_html__( 'Add new Testimonial', 'esell-today' ),
			'new_item'           => esc_html__( 'New Testimonial', 'esell-today' ),
			'edit_item'          => esc_html__( 'Edit Testimonial', 'esell-today' ),
			'view_item'          => esc_html__( 'View Testimonial', 'esell-today' ),
			'update_item'        => esc_html__( 'View Testimonial', 'esell-today' ),
			'all_items'          => esc_html__( 'All Testimonials', 'esell-today' ),
			'search_items'       => esc_html__( 'Search Testimonials', 'esell-today' ),
			'parent_item_colon'  => esc_html__( 'Parent Testimonial', 'esell-today' ),
			'not_found'          => esc_html__( 'No Testimonials found', 'esell-today' ),
			'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash', 'esell-today' ),
			'name'               => esc_html__( 'Testimonials', 'esell-today' ),
			'singular_name'      => esc_html__( 'Testimonial', 'esell-today' ),
		],
		'public'              => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => false,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-money',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'testimonial', $args );
}

//vendor post type
function custom_post_type_vendor() {

	$labels = array(
		'name'               => __( 'Vendors', 'text-domain' ),
		'singular_name'      => __( 'Vendor', 'text-domain' ),
		'menu_name'          => __( 'Vendors', 'text-domain' ),
		'add_new'            => __( 'Add New', 'text-domain' ),
		'add_new_item'       => __( 'Add New Vendor', 'text-domain' ),
		'edit_item'          => __( 'Edit Vendor', 'text-domain' ),
		'new_item'           => __( 'New Vendor', 'text-domain' ),
		'view_item'          => __( 'View Vendor', 'text-domain' ),
		'search_items'       => __( 'Search Vendors', 'text-domain' ),
		'not_found'          => __( 'No vendors found', 'text-domain' ),
		'not_found_in_trash' => __( 'No vendors found in trash', 'text-domain' ),
	);

	$args = array(
		'label'              => __( 'Vendor', 'text-domain' ),
		'labels'             => $labels,
		'description'        => __( 'Vendor information', 'text-domain' ),
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'rewrite'            => array( 'slug' => 'vendor' ),
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'        => true,
		'menu_icon'          => 'dashicons-businessman',
	);

	register_post_type( 'vendor', $args );

}
add_action( 'init', 'custom_post_type_vendor' );

add_action( 'init', 'store_register_post_type' );
function store_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Stores', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Stores', 'esell-today' ),
			'name_admin_bar'     => esc_html__( 'Store', 'esell-today' ),
			'add_new'            => esc_html__( 'Add Store', 'esell-today' ),
			'add_new_item'       => esc_html__( 'Add new Store', 'esell-today' ),
			'new_item'           => esc_html__( 'New Store', 'esell-today' ),
			'edit_item'          => esc_html__( 'Edit Store', 'esell-today' ),
			'view_item'          => esc_html__( 'View Store', 'esell-today' ),
			'update_item'        => esc_html__( 'View Store', 'esell-today' ),
			'all_items'          => esc_html__( 'All Stores', 'esell-today' ),
			'search_items'       => esc_html__( 'Search Stores', 'esell-today' ),
			'parent_item_colon'  => esc_html__( 'Parent Store', 'esell-today' ),
			'not_found'          => esc_html__( 'No Stores found', 'esell-today' ),
			'not_found_in_trash' => esc_html__( 'No Stores found in Trash', 'esell-today' ),
			'name'               => esc_html__( 'Stores', 'esell-today' ),
			'singular_name'      => esc_html__( 'Store', 'esell-today' ),
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
		'menu_icon'           => 'dashicons-admin-home',
		'supports' => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'custom-fields',
			'comments',
			'revisions',
			'page-attributes',
		],
		'taxonomies' => [
			'category',
			'tag',
		],
		'rewrite' => true
	];

	register_post_type( 'store', $args );
}
