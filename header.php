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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">Home</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="index.html">Home One</a></li>
                                    <li><a class="dropdown-item" href="index-2.html">Home Two</a></li>
                                    <li><a class="dropdown-item" href="index-3.html">Home Three</a></li>
                                    <li><a class="dropdown-item" href="index-4.html">Home Four</a></li>
                                    <li><a class="dropdown-item" href="index-5.html">Home Five</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>/about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="category.html">Category</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">All Ads</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="ad-grid.html">Ads Grid One</a></li>
                                    <li><a class="dropdown-item" href="ad-grid-2.html">Ads Grid Two</a></li>
                                    <li><a class="dropdown-item" href="ad-grid-3.html">Ads Grid Three</a></li>
                                    <li><a class="dropdown-item" href="ad-list.html">Ads List One</a></li>
                                    <li><a class="dropdown-item" href="ad-list-2.html">Ads List Two</a></li>
                                    <li><a class="dropdown-item" href="ad-list-3.html">Ads List Three</a></li>
                                    <li><a class="dropdown-item" href="ad-single.html">Ads Single One</a></li>
                                    <li><a class="dropdown-item" href="ad-single-2.html">Ads Single Two</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">My Account</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="dashboard.html">Dashboard</a>
                                            <li><a class="dropdown-item" href="profile.html">My Profile</a>
                                            <li><a class="dropdown-item" href="profile-ad.html">My Ads</a>
                                            <li><a class="dropdown-item" href="post-ad.html">Post Ads</a>
                                            <li><a class="dropdown-item" href="profile-ad-setting.html">Ads Settings</a>
                                            <li><a class="dropdown-item" href="profile-favorite.html">My Favorites</a>
                                            <li><a class="dropdown-item" href="profile-message.html">Messages</a>
                                            <li><a class="dropdown-item" href="profile-payment.html">Payments</a>
                                            <li><a class="dropdown-item" href="profile-setting.html">Settings</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="login.html">Sign In</a></li>
                                            <li><a class="dropdown-item" href="register.html">Sign Up</a></li>
                                            <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Services</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="service.html">Services</a></li>
                                            <li><a class="dropdown-item" href="service-single.html">Service Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Stores</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="store.html">All Stores</a></li>
                                            <li><a class="dropdown-item" href="store-single.html">Store Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Extra Pages</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                                            <li><a class="dropdown-item" href="terms.html">Terms Of Service</a></li>
                                            <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="team.html">Our Team</a></li>
                                    <li><a class="dropdown-item" href="pricing.html">Pricing Plan</a></li>
                                    <li><a class="dropdown-item" href="faq.html">Faq</a></li>
                                    <li><a class="dropdown-item" href="testimonial.html">Testimonials</a></li>
                                    <li><a class="dropdown-item" href="404.html">404 Error</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="blog.html">Blog One</a></li>
                                    <li><a class="dropdown-item" href="blog-2.html">Blog Two</a></li>
                                    <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
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
                                <a href="login.html" class="header-account-link"><i class="far fa-user-circle"></i> Sign
                                    In</a>
                            </div>
                            <div class="header-btn">
                                <a href="post-ad.html" class="theme-btn mt-2"><span
                                        class="far fa-plus-circle"></span>Post Your Ads</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header>
    <!-- header area end -->
