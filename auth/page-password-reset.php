<?php 
// Template Name: Password Reset
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

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


    <!-- forgot password -->
    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <?php echo do_shortcode('[custom_woocommerce_login]'); ?>
            </div>
        </div>
    </div>
    <!-- forgot password end -->

</main>

<?php get_footer(); 