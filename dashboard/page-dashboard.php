<?php 
/* Template Name: Dashboard Template */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header() ?>

<main class="main">

        <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail'); ?>
        <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
            <div class="container">
                <h2 class="breadcrumb-title"><?php echo get_the_title(); ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="active"><?php echo get_the_title(); ?></li>
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
                            <?php if ( is_user_logged_in() ) : ?>
                                <?php
                                    $current_user = wp_get_current_user();
                                    $user_profile_link = get_author_posts_url( $current_user->ID );
                                    $user_profile_image = get_avatar( $current_user->ID, 32 );
                                ?>
                                <div class="user-profile-img">

                                        <?php echo $user_profile_image; ?>
                                        <button type="button" class="profile-img-btn"><a  class="active" href="<?php echo site_url(); ?>/profile"><i class="far fa-camera"></i></a></button>
                                        <!-- <input type="file" class="profile-img-file"> -->
                                </div>
                                <h5><?php echo esc_html( $current_user->display_name ); ?></h5>
                                <p><?php echo esc_html( $current_user->user_email ); ?></p>
                            <?php endif; ?>
                        </div>

                        <ul class="user-profile-sidebar-list">
                            <li><a <?php echo is_page(sanitize_title('dashboard')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/dashboard/"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                            <li><a <?php echo is_page(sanitize_title('profile')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/profile/"><i class="far fa-user"></i> My Profile</a></li>
                            <li><a <?php echo is_page(sanitize_title('my-ads')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/my-ads/"><i class="far fa-layer-group"></i> My Ads</a></li>
                            <li><a <?php echo is_page(sanitize_title('post-ad')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/post-ad/"><i class="far fa-plus-circle"></i> Post Ads</a></li>
                            <li><a <?php echo is_page(sanitize_title('profile-setting')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/profile-setting/"><i class="far fa-gear"></i> Settings</a></li>
                            <li><a <?php echo is_page(sanitize_title('favorite')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/favorite/"><i class="far fa-heart"></i> Wishlist</a></li>
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
                                        <?php $wpdbs; 
                                            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'product'");
                                        ?>
                                        <table class="table">
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
                                            <?php foreach($results as $product) {?>
                                                <tr>
                                                    <td>
                                                        <div class="table-ad-info">
                                                            <a href="#">
                                                            <img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" class="img-responsive" alt="<?php the_title(); ?>"/>
                                                                <div class="table-ad-content">
                                                                    <h6><?php echo get_the_title($product->ID); ?></h6>
                                                                    <span>Ad ID: #123456</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td style="max-width:200px;overflow:hidden;">
                                                        <?php
                                                            $categories = get_the_terms($product->ID, 'product_cat');
                                                            if ($categories && !is_wp_error($categories)) {
                                                                $category_names = array();
                                                                foreach ($categories as $category) {
                                                                    $category_names[] = $category->name;
                                                                }
                                                                echo implode(', ', $category_names);
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        $publish_date = get_post_field('post_date', $product->ID);
                                                        $days_ago = human_time_diff(strtotime($publish_date), current_time('timestamp')) . ' ago';
                                                        echo $days_ago;
                                                    ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                            $product = wc_get_product($product->ID);
                                                            if ($product->is_on_sale()) {
                                                                $regular_price = $product->get_regular_price();
                                                                $sale_price = $product->get_sale_price();
                                                                echo '<del>' . wc_price($regular_price) . '</del> ' . wc_price($sale_price);
                                                            } else {
                                                                $price = $product->get_price();
                                                                echo wc_price($price);
                                                            }
                                                        ?>
                                                    </td>
                                                        <td>
                                                            <?php
                                                            // Get the current view count
                                                            $view_count = get_post_meta($product->get_id(), 'view_count', true);

                                                            // Increment the view count by 1
                                                            $view_count++;
                                                            update_post_meta($product->get_id(), 'view_count', $view_count);

                                                            // Display the view count
                                                            echo 'Views: ' . $view_count;
                                                        ?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <?php
                                                            $product_status = get_post_status($product->ID);
                                                            echo $product_status;
                                                        ?>
                                                    </span>
                                                </td>
                                                </tr>
                                                <?php  } ?>
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
// endif; ?>