<?php 
// Template Name: Forget Password
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
                <div class="login-form">
                    <div class="login-header">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo/logo.png')); ?>" alt="<?php _e( 'Asset description' ); ?>" />
                        <p>Reset your account password</p>
                    </div>
                    <?php
                        // Start output buffering
                        ob_start();

                        // Display WooCommerce forgot password form
                        wc_print_notices();

                        ?>
                        <div class="woocommerce">
                        <!-- <form method="post" class="woocommerce-form woocommerce-form-reset-password" action="<?php echo esc_url( wp_lostpassword_url() ); ?>">
                            <div class="form-group">
                                <label for="user_login"><?php esc_html_e( 'Email Address', 'woocommerce' ); ?></label>
                                <input type="email" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="user_login" id="user_login" placeholder="<?php esc_attr_e( 'Your Email', 'woocommerce' ); ?>" />
                                <i class="far fa-envelope"></i>
                            </div>

                            <?php do_action( 'woocommerce_lostpassword_form' ); ?>

                            <div class="d-flex align-items-center">
                                <input type="hidden" name="wc_reset_password" value="true" />
                                <input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/password-reset' ) ); ?>" />
                                <button type="submit" class="theme-btn" value="<?php esc_attr_e( 'Send Reset Link', 'woocommerce' ); ?>"><i class="far fa-key"></i> <?php esc_html_e( 'Send Reset Link', 'woocommerce' ); ?></button>
                            </div>

                            <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
                        </form> -->

                        <form method="post" class="woocommerce-form woocommerce-form-reset-password" action="<?php echo esc_url( wp_lostpassword_url() ); ?>">
                            <div class="form-group">
                                <label for="user_login"><?php esc_html_e( 'Email Address', 'woocommerce' ); ?></label>
                                <input type="email" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="user_login" id="user_login" placeholder="<?php esc_attr_e( 'Your Email', 'woocommerce' ); ?>" />
                                <i class="far fa-envelope"></i>
                            </div>

                            <?php do_action( 'woocommerce_lostpassword_form' ); ?>

                            <div class="d-flex align-items-center">
                                <input type="hidden" name="wc_reset_password" value="true" />
                                <input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/password-reset' ) ); ?>" />
                                <button type="submit" class="theme-btn" value="<?php esc_attr_e( 'Send Reset Link', 'woocommerce' ); ?>"><i class="far fa-key"></i> <?php esc_html_e( 'Send Reset Link', 'woocommerce' ); ?></button>
                            </div>

                            <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

                            <?php
                            // Display the message
                            if ( isset( $_GET['reset'] ) && $_GET['reset'] === 'email_sent' ) {
                                echo '<p class="reset-message">Please check your email to reset your password.</p>';
                            }
                            ?>
                        </form>


                        </div>
                        <?php

                        // Get the buffered content and clean the buffer
                        $form_content = ob_get_clean();

                        // Output the form content
                        echo $form_content;
                        ?>

                </div>
            </div>
        </div>
    </div>
    <!-- forgot password end -->

</main>

<?php get_footer(); 