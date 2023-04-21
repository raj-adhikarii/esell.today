<?php 
/**
 * Enqueue scripts and styles.
 */
function esell_scripts() {
	wp_enqueue_style( 'esell-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-fontawesome', get_stylesheet_directory_uri() . '/assets/css/all-fontawesome.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-animatemin', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-magnific-popup', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-nice-select', get_stylesheet_directory_uri() . '/assets/css/nice-select.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-jquery-ui', get_stylesheet_directory_uri() . '/assets/css/jquery-ui.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-main-sty', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-style', get_stylesheet_uri(), array(), _esell_VERSION );
	wp_style_add_data( 'esell-style', 'rtl', 'replace' );

	wp_enqueue_script( 'esell-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), _esell_VERSION, false );
	wp_enqueue_script( 'esell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-modernizer', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-imagesloaded-pkdg', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-isotops-pkdg', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-counter-upl', get_template_directory_uri() . '/assets/js/counter-up.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-cmasonry-pkgd-min', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-ui-min', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-main', get_template_directory_uri() . '/assets/js/main.js', array(), _esell_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'esell_scripts' );
