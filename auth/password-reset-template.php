<?php
/*
 * Template Name: Password Reset Template
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Display WooCommerce notices
        wc_print_notices();

        // Display the password reset form
        ?>
        <div class="woocommerce">
            <form method="post" class="woocommerce-form woocommerce-form-reset-password">
                <div class="form-group">
                    <label for="password"><?php esc_html_e('New Password', 'woocommerce'); ?></label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" />
                </div>

                <div class="d-flex align-items-center">
                    <input type="hidden" name="wc_reset_password" value="true" />
                    <?php wp_nonce_field('wc-reset-password', 'wc-reset-password-nonce'); ?>
                    <button type="submit" class="theme-btn"><?php esc_html_e('Reset Password', 'woocommerce'); ?></button>
                </div>
            </form>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
