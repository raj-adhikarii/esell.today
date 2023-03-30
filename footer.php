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
                                We are many variations passages available have suffered alteration
                                in some form by injected humour.
                            </p>
                            <ul class="footer-contact">
                                <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
                                <li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>
                                <li><a href="mailto:info@example.com"><i
                                            class="far fa-envelope"></i>info@example.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Company</h4>
                            <ul class="footer-list">
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> About Us</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Our Team</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Contact Us</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Terms Of Service</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Privacy policy</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Careers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-list">
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Membership</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Buy and Sell Quickly</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Banner Advertising</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Promote Your Ads</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Our Partners</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Latest Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Help & Support</h4>
                            <ul class="footer-list">
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> FAQ's</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Live Chat</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> How Stay Safe</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Selling Tips</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Community</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i> Sitemap</a></li>
                            </ul>
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
                                    <img src="assets/img/payment/paypal.svg" alt="">
                                    <img src="assets/img/payment/mastercard.svg" alt="">
                                    <img src="assets/img/payment/visa.svg" alt="">
                                    <img src="assets/img/payment/discover.svg" alt="">
                                    <img src="assets/img/payment/american-express.svg" alt="">
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
                            &copy; Copyright <span id="date"></span> <a href="#"> CLASAD </a> All Rights Reserved.
                        </p>
                    </div>
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