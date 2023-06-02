<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package esell
 */

?>
	<!-- footer area -->
    <footer class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-100 pb-70">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box about-us">
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
                            <p class="mb-4">
                               Buy, sell, rent, & exchange in one go at E-Sell Today - online shopping nepal
                            </p>
                             <ul class="footer-contact">
                                <li><a href="tel:+21236547898"><i class="far fa-phone"></i>984-5294919</a></li>
                                <li><i class="far fa-map-marker-alt"></i>Ratopul, Gyaneshwor, KTM Nepal</li>
                                <li><a href="mailto:info@example.com"><i
                                            class="far fa-envelope"></i>info@e-sell.today</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Company</h4>
                            <ul class="footer-list">
                                <li><a href="<?php echo site_url(); ?>"><i class="fas fa-angle-double-right"></i> Home</a></li>
                                <li><a href="<?php echo site_url(); ?>/about"><i class="fas fa-angle-double-right"></i> About Us</a></li>
                                <li><a href="<?php echo site_url(); ?>/contact"><i class="fas fa-angle-double-right"></i> Contact Us</a></li>
                                <li><a href="<?php echo site_url(); ?>/service"><i class="fas fa-angle-double-right"></i> Our Services</a></li>
                               
                                <!-- <li><a href="#"><i class="fas fa-angle-double-right"></i> Careers</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-list">
                                <!-- <li><a href="#"><i class="fas fa-angle-double-right"></i> Post your AD</a></li> -->
                                <li><a href="<?php echo site_url(); ?>/buy-and-sell"><i class="fas fa-angle-double-right"></i> Buy and Sell Quickly</a></li>
                                <!-- <li><a href="#"><i class="fas fa-angle-double-right"></i> Banner Advertising</a></li> -->
                                <li><a href="<?php echo site_url(); ?>/dashboard"><i class="fas fa-angle-double-right"></i> Post Your Ads</a></li>
                                <li><a href="<?php echo site_url(); ?>#"><i class="fas fa-angle-double-right"></i> Our Partners</a></li>
                                <li><a href="<?php echo site_url(); ?>/blog"><i class="fas fa-angle-double-right"></i> Latest Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Help & Support</h4>
                            <ul class="footer-list">
                                <li><a href="<?php echo site_url(); ?>/faqs"><i class="fas fa-angle-double-right"></i> FAQ's</a></li>
                                <li><a href="<?php echo site_url(); ?>/help"><i class="fas fa-angle-double-right"></i> Help</a></li>
                                <li><a href="<?php echo site_url(); ?>/privacy-policy"><i class="fas fa-angle-double-right"></i> Privacy policy</a></li>
                                <li><a href="<?php echo site_url(); ?>/refund_returns"><i class="fas fa-angle-double-right"></i> Terms Of Service</a></li>
                                <!-- <li><a href="#"><i class="fas fa-angle-double-right"></i> Live Chat</a></li> -->
                                <!-- <li><a href="#"><i class="fas fa-angle-double-right"></i> Selling Tips</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Community</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Sitemap</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Newsletter</h4>
                            <div class="footer-newsletter">
                                <p>Subscribe Our Newsletter To Get Latest Update And News</p>
                                <div class="subscribe-form">
                                    <form action="#">
                                        <div class="form-group">
                                            <div class="form-group-icon">
                                                <i class="far fa-envelope"></i>
                                                <input type="email" class="form-control" placeholder="Your Email">
                                                <button class="theme-btn" type="submit">
                                                    <span class="far fa-paper-plane"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="footer-payment-method">
                                <h6>We Accept</h6>
                                <div class="payment-method-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payment/visa.svg" alt="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payment/paypal-1.svg" alt="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payment/discover.svg" alt="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payment/mastercard.svg" alt="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payment/american-express.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            &copy; <a href="<?php echo site_url(); ?>">E-sell Today,</a> <span id="date"></span> All Rights Reserved.
                        </p>
                    </div>
                                            <!-- <?php
                        // Retrieve the saved option data
                        // $my_options = get_option( 'my_options' );
                        // ?>

                        // <div class="my-options">
                        //   <h2>My Options</h2>
                        //   <p>Option One: <?php echo esc_html( $my_options['option_one'] ); ?></p>
                        //   <p>Option Two: <?php echo esc_html( $my_options['option_two'] ); ?></p>
                        // </div> -->

                    <div class="col-md-6 align-self-center">
                        <ul class="footer-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>