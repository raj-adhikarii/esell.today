<?php 
// Template Name: Forget Password
get_header(); ?>

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


    <!-- forgot password -->
    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo/logo.png')); ?>" alt="<?php _e( 'Asset description' ); ?>" />
                        <p>Reset your account password</p>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Your Email">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-key"></i> Send Reset
                                Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- forgot password end -->

</main>

<?php get_footer(); 