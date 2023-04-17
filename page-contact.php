<?php get_header(); 
// Template Name: Contact Template ?>

    <main class="main">

    <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
    ?>
    <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
        <div class="container">
            <h2 class="breadcrumb-title">Contact Us</h2>
            <ul class="breadcrumb-menu">
                <li><a href="<? echo site_url(); ?>">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <!-- contact area -->
    <div class="contact-area py-120">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-content">
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>Office Address</h5>
                                    <p>25/B Milford, New York, USA</p>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>Call Us</h5>
                                    <p>+2 123 4565 789</p>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>Email Us</h5>
                                    <p>info@example.com</p>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>Open Time</h5>
                                    <p>Mon - Sat (10.00AM - 05.30PM)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 align-self-center">
                        <div class="contact-form">
                            <div class="contact-form-header">
                                <?php $cta_title = get_field('cta_title'); ?>
                                <?php if(!empty($cta_title)): ?>
                                    <h2><?php echo ($cta_title); ?></h2>
                                <?php endif; ?>
                                
                                <?php $cta_desc = get_field('cta_desc'); ?>
                                <?php if(!empty($cta_desc)) : ?>
                                    <p><?php echo ($cta_desc); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php echo do_shortcode('[contact-form-7 id="241" title="Contact Page"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact area -->

    <!-- map -->
    <div class="contact-map">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.34194156103!2d-74.03927096447748!3d40.759040329405195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a01c8df6fb3cb8!2sSolomon%20R.%20Guggenheim%20Museum!5e0!3m2!1sen!2sbd!4v1619410634508!5m2!1sen!2s"
            style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
            <?php dynamic_sidebar('map_widget'); ?>
    </div>

    </main>

<?php get_footer();

