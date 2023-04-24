<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package esell
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-dot"></div>
        <div class="loader-dot dot2"></div>
        <div class="loader-dot dot3"></div>
        <div class="loader-dot dot4"></div>
        <div class="loader-dot dot5"></div>
    </div>
</div>
<!-- preloader end -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'esell' ); ?></a>

	
	<!-- header area -->
    <header class="header">
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg main-navigation" id="site-navigation">
                <div class="container custom-nav">
				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$esell_description = get_bloginfo( 'description', 'display' );
					if ( $esell_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $esell_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
                    <div class="mobile-menu-right">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-btn-icon"><i class="far fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo site_url(); ?>">Home</a>
                            </li>
                            <li class="nav-item"<?php if (is_page('about')) echo 'class="active"' ?>><a class="nav-link" href="<?php echo site_url(); ?>/about/">About</a></li>
                           
                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>/service/">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>/location/">Location</a></li>
                           
                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>/faqs/">FAQs</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>/contact/">Contact</a></li>
                        </ul>
						<!-- <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                            ?> -->
                                    

                        <div class="header-nav-right">
                            <div class="header-account">
                                <div class="dropdown">
                                    <?php if ( is_user_logged_in() ) : ?>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $user_profile_link = get_author_posts_url( $current_user->ID );
                                        $user_profile_image = get_avatar( $current_user->ID, 32 );
                                        ?>
                                        <div data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $user_profile_image; ?>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/dashboard/"><i class="far fa-user"></i> My Profile</a></li>
                                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/dashboard/products/"><i class="far fa-layer-group"></i> My Ads</a></li>
                                            <?php
                                                if ( is_user_logged_in() ) {
                                                    // User is logged in, redirect to the product dashboard page
                                                    $dashboard_url = site_url( '/dashboard/products' );
                                                    ?>
                                                    <li><a class="dropdown-item" href="<?php echo $dashboard_url; ?>"><i class="far fa-layer-group"></i> My Ads</a></li>
                                                    <?php
                                                } else {
                                                    // User is not logged in, redirect to the login page
                                                    $login_url = wp_login_url( get_permalink() );
                                                    ?>
                                                    <li><a class="dropdown-item" href="<?php echo $login_url; ?>"><i class="fas fa-sign-in-alt"></i> <?php esc_html_e( 'Login', 'text-domain' ); ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            <li><a class="dropdown-item" href="<?php echo $user_profile_link; ?>?type=favorite/"><i class="far fa-heart"></i> My Favorites</a></li>
                                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/dashboard/settings/store"><i class="far fa-cog"></i> Settings</a></li>
                                            <li><a class="dropdown-item" href="<?php echo wp_logout_url( home_url() ); ?>"><i class="far fa-sign-out"></i> Log Out</a></li>
                                        </ul>
                                    <?php else : ?>
                                        <div class="header-account">
                                            <a href="<?php echo site_url(); ?>/dashboard/" class="header-account-link"><i class="far fa-user-circle"></i> Sign
                                                In</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="header-btn">
                                <a href="<?php echo site_url(); ?>/esell/dashboard/products/" class="theme-btn mt-2"><span
                                        class="far fa-plus-circle"></span>Post Your Ads</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header>
    <!-- header area end -->
