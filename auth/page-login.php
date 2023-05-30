<?php
// Template Name: Login Template
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



        <!-- login area -->
        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo/logo.png')); ?>" alt="<?php _e('Asset description'); ?>">
                            <p>Login with your account</p>
                        </div>
                        <form action="#">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Your Email">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Your Password">
                                <i class="far fa-lock"></i>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="<?php echo site_url(); ?>/forget-password/" class="forgot-pass">Forgot Password?</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Sign In</button>
                            </div>
                        </form>
                        <div class="login-footer">
                            <div class="login-divider"><span>Or</span></div>
                            <div class="social-login">
                                <a href="#" class="btn-fb"><i class="fab fa-facebook"></i> Login With Facebook</a>
                                <a href="#" class="btn-gl"><i class="fab fa-google"></i> Login With Google</a>
                            </div>
                            <p>Don't have an account? <a href="<?php echo site_url(); ?>/sign-up/">Sign Up.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login area end -->


    </main>

<?php get_footer(); 