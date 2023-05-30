
<?php 
// Template Name: Dashboard Template
/**
 * Redirect to Home page if user attempts to try go to login if logged in
 * @author Arslan <arslan@wpbrigade.com>
 * @return void
 */
function redirect_to() {
	global $pagenow;

	if ( !is_customize_preview() && is_user_logged_in() && 'index.php' !== $pagenow ) {
		wp_redirect( home_url(), 302 );
		exit();
	}
}
get_header() ?>


<main class="main">

        <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail'); ?>
        <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
            <div class="container">
                <h2 class="breadcrumb-title">My Profile</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Profile</li>
                </ul>
            </div>
        </div>
    <?php endif; ?>



        <!-- user-profile -->
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="user-profile-sidebar">
                            <div class="user-profile-sidebar-top">
                                <div class="user-profile-img">
                                    <?php if ( is_user_logged_in() ) : ?>
                                        <?php
                                            $current_user = wp_get_current_user();
                                            $user_profile_link = get_author_posts_url( $current_user->ID );
                                            $user_profile_image = get_avatar( $current_user->ID, 32 );
                                        ?>

                                        <?php echo $user_profile_image; ?>
                                        <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                                        <input type="file" class="profile-img-file">
                                     <?php endif; ?>
                                </div>
                                <h5>Antoni Jonson</h5>
                                <p>antoni@example.com</p>
                            </div>
                            <ul class="user-profile-sidebar-list">
                                <li><a href="<?php echo site_url(); ?>/dashboard/"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                                <li><a class="active" href="<?php echo site_url(); ?>/profile/"><i class="far fa-user"></i> My Profile</a></li>
                                <li><a href="<?php echo site_url(); ?>/my-ads/"><i class="far fa-layer-group"></i> My Ads</a></li>
                                <li><a href="<?php echo site_url(); ?>/post-ad/"><i class="far fa-plus-circle"></i> Post Ads</a></li>
                                <li><a href="<?php echo site_url(); ?>/profile-setting/"><i class="far fa-gear"></i> Settings</a></li>
                                <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="far fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="user-profile-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="dashboard-widget dashboard-widget-color-1">
                                        <div class="dashboard-widget-info">
                                            <h1>650</h1>
                                            <span>Active Posted Ads</span>
                                        </div>
                                        <div class="dashboard-widget-icon">
                                            <i class="fal fa-list"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="dashboard-widget dashboard-widget-color-2">
                                        <div class="dashboard-widget-info">
                                            <h1>15.5k</h1>
                                            <span>Total Ads Views</span>
                                        </div>
                                        <div class="dashboard-widget-icon">
                                            <i class="fal fa-eye"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="dashboard-widget dashboard-widget-color-3">
                                        <div class="dashboard-widget-info">
                                            <h1>1250</h1>
                                            <span>Total Posted Ads</span>
                                        </div>
                                        <div class="dashboard-widget-icon">
                                            <i class="fal fa-layer-group"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-profile-card">
                                        <h4 class="user-profile-card-title">Recent Ads</h4>
                                        <div class="table-responsive">
                                            <table class="table text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Ads Info</th>
                                                        <th>Category</th>
                                                        <th>Publish</th>
                                                        <th>Price</th>
                                                        <th>Views</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="table-ad-info">
                                                                <a href="#">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                                    <div class="table-ad-content">
                                                                        <h6>Men's Golden Watch</h6>
                                                                        <span>Ad ID: #123456</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>Fashion</td>
                                                        <td>5 days ago</td>
                                                        <td>$150</td>
                                                        <td>350k+</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-ad-info">
                                                                <a href="#">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                                    <div class="table-ad-content">
                                                                        <h6>Men's Golden Watch</h6>
                                                                        <span>Ad ID: #123456</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>Fashion</td>
                                                        <td>5 days ago</td>
                                                        <td>$150</td>
                                                        <td>350k+</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-ad-info">
                                                                <a href="#">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                                    <div class="table-ad-content">
                                                                        <h6>Men's Golden Watch</h6>
                                                                        <span>Ad ID: #123456</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>Fashion</td>
                                                        <td>5 days ago</td>
                                                        <td>$150</td>
                                                        <td>350k+</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-ad-info">
                                                                <a href="#">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                                    <div class="table-ad-content">
                                                                        <h6>Men's Golden Watch</h6>
                                                                        <span>Ad ID: #123456</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>Fashion</td>
                                                        <td>5 days ago</td>
                                                        <td>$150</td>
                                                        <td>350k+</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-ad-info">
                                                                <a href="#">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                                    <div class="table-ad-content">
                                                                        <h6>Men's Golden Watch</h6>
                                                                        <span>Ad ID: #123456</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>Fashion</td>
                                                        <td>5 days ago</td>
                                                        <td>$150</td>
                                                        <td>350k+</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user-profile end -->


    </main>

    <?php get_footer(); 