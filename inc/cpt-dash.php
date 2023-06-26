<?php
//Services
add_action( 'init', 'service_register_post_type' );
function service_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Services', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Services', 'esell-today' ),
			'name_admin_bar'     => esc_html__( 'service', 'esell-today' ),
			'add_new'            => esc_html__( 'Add service', 'esell-today' ),
			'add_new_item'       => esc_html__( 'Add new service', 'esell-today' ),
			'new_item'           => esc_html__( 'New service', 'esell-today' ),
			'edit_item'          => esc_html__( 'Edit service', 'esell-today' ),
			'view_item'          => esc_html__( 'View service', 'esell-today' ),
			'update_item'        => esc_html__( 'View service', 'esell-today' ),
			'all_items'          => esc_html__( 'All Services', 'esell-today' ),
			'search_items'       => esc_html__( 'Search Services', 'esell-today' ),
			'parent_item_colon'  => esc_html__( 'Parent service', 'esell-today' ),
			'not_found'          => esc_html__( 'No Services found', 'esell-today' ),
			'not_found_in_trash' => esc_html__( 'No Services found in Trash', 'esell-today' ),
			'name'               => esc_html__( 'Services', 'esell-today' ),
			'singular_name'      => esc_html__( 'service', 'esell-today' ),
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
		'menu_icon'           => 'dashicons-portfolio',
		'supports' => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'trackbacks',
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

	register_post_type( 'service', $args );
}

//Register Map Widget
function wpb_widgets_init() {
 
    register_sidebar( array(
        'name' => __( 'Map', 'wpb' ),
        'id' => 'map_widget',
        'description' => __( 'The main map widget appears on the page choch contain map field', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widgett %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    }
 
add_action( 'widgets_init', 'wpb_widgets_init' );