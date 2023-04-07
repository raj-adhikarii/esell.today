<?php get_header(); 
// Template Name: About Template ?>
<main class="main">

<!-- breadcrumb -->
<?php if(has_post_thumbnail($post ->ID)):
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
?>
    <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
        <div class="container">
            <h2 class="breadcrumb-title">About Us</h2>
            <ul class="breadcrumb-menu">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
<?php endif; ?>


<!-- about area -->
<div class="about-area py-120 mb-30">
    <div class="container">
        <?php if(have_rows('Bnr_twi')): ?>
            <?php while(have_rows('Bnr_twi')): the_row(); ?>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left">
                            <div class="about-img">
                                <?php $img = get_sub_field('banner_image'); ?>
                                <?php if(!empty($img)): ?>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                <?php endif; ?>
                            </div>
                            <div class="about-shape">
                                <img src="http://localhost/esell.today/wp-content/uploads/2023/03/01.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline">About Us</span>
                                <?php $about_title = get_sub_field('bnr_t'); ?>
                                    <?php if(!empty($about_title)): ?>
                                        <h2 class="section-title">
                                            <?php echo ($about_title); ?>
                                        </h2>
                                    <?php endif; ?>
                            </div>

                            <?php $about_desc = get_sub_field('bnr_desc'); ?>
                            <?php if(!empty($about_desc)): ?>
                                <p class="about-text">
                                    <?php echo ($about_desc); ?>
                                </p>
                            <?php endif; ?>
                            <div class="about-list-wrapper">
                                <?php if(have_rows('bnr_ico_list')) : ?>
                                    <ul class="about-list list-unstyled">
                                        <?php while(have_rows('bnr_ico_list')): the_row(); ?>
                                            <li>
                                                <div class="about-icon"><span class="fas fa-check-circle"></span></div>
                                                <div class="about-list-text">
                                                    <?php $ico_title = get_sub_field('icon_list'); ?>
                                                        <?php if(!empty($ico_title)): ?>
                                                            <p><?php echo ($ico_title); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="about-bottom">
                                <a href="about.html" class="theme-btn">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<!-- about area end -->



<!-- counter area -->
<div class="counter-area bg pt-40 pb-40">
    <div class="container">
        <div class="counter-wrapper">
            <?php if(have_rows('about_stats')) : ?>
            <div class="row">
                <?php while(have_rows('about_stats')): the_row(); ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="counter-icon">
                            <i class="fal fa-layer-group"></i>
                        </div>

                            <div class="counter-content">
                                <div class="counter-number">
                                    <span class="counter" data-count="+" data-to="<?php the_sub_field('stats_title'); ?>"
                                            data-speed="3000"> <?php the_sub_field('stats_title'); ?></span>
                                    <span class="counter-sign">+</span>
                                </div>
                                <h6 class="counter-title"><?php the_sub_field('stats_description'); ?></h6>
                            </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- counter area end -->



<!-- testimonial-area -->
<div class="testimonial-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Testimonials</span>
                    <h2 class="section-title">What Our Client Say's</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>
        <div class="testimonial-slider owl-carousel owl-theme">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-author-img">
                        <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pexels-sumit-kapoor-718261-1.jpg" alt="">
                    </div>
                    <div class="testimonial-author-info">
                        <h4>Sylvia H Green</h4>
                        <p>Customer</p>
                    </div>
                </div>
                <div class="testimonial-quote">
                    <p>
                        There are many variations of majority have suffered alteration popularity belief believable in some form by injected.
                    </p>
                    <div class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></div>
                </div>
                <div class="testimonial-rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-author-img">
                        <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pexels-moose-photos-1587009-1.jpg" alt="">
                    </div>
                    <div class="testimonial-author-info">
                        <h4>Gordo Novak</h4>
                        <p>Customer</p>
                    </div>
                </div>
                <div class="testimonial-quote">
                    <p>
                        There are many variations of majority have suffered alteration popularity belief believable in some form by injected.
                    </p>
                    <div class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></div>
                </div>
                <div class="testimonial-rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-author-img">
                        <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pexels-andrea-piacquadio-874158-2.jpg" alt="">
                    </div>
                    <div class="testimonial-author-info">
                        <h4>Reid E Butt</h4>
                        <p>Customer</p>
                    </div>
                </div>
                <div class="testimonial-quote">
                    <p>
                        There are many variations of majority have suffered alteration popularity belief believable in some form by injected.
                    </p>
                    <div class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></div>
                </div>
                <div class="testimonial-rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-author-img">
                        <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pexels-moose-photos-1587009-1.jpg" alt="">
                    </div>
                    <div class="testimonial-author-info">
                        <h4>Parker Jimenez</h4>
                        <p>Customer</p>
                    </div>
                </div>
                <div class="testimonial-quote">
                    <p>
                        There are many variations of majority have suffered alteration popularity belief believable in some form by injected.
                    </p>
                    <div class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></div>
                </div>
                <div class="testimonial-rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-author-img">
                        <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pexels-andrea-piacquadio-874158-2.jpg" alt="">
                    </div>
                    <div class="testimonial-author-info">
                        <h4>Heruli Nez</h4>
                        <p>Customer</p>
                    </div>
                </div>
                <div class="testimonial-quote">
                    <p>
                        There are many variations of majority have suffered alteration popularity belief believable in some form by injected.
                    </p>
                    <div class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></div>
                </div>
                <div class="testimonial-rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial-area end -->



<!-- team-area -->
<div class="team-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Our Team</span>
                    <h2 class="section-title">Meet With Our Team</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="team-item">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1616179054043-7570cd0d47d6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="thumb">
                    </div>
                    <div class="team-content">
                        <div class="team-bio">
                            <h5><a href="#">Edna Craig</a></h5>
                            <span>Business Manager</span>
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="team-item">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80" alt="thumb">
                    </div>
                    <div class="team-content">
                        <div class="team-bio">
                            <h5><a href="#">Jeffrey Cox</a></h5>
                            <span>CEO & Founder</span>
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="team-item">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="thumb">
                    </div>
                    <div class="team-content">
                        <div class="team-bio">
                            <h5><a href="#">Audrey Gadis</a></h5>
                            <span>Support Manager</span>
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="team-item">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1564522365984-c08ed1f78893?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="thumb">
                    </div>
                    <div class="team-content">
                        <div class="team-bio">
                            <h5><a href="#">Rodger Garza</a></h5>
                            <span>Creative Director</span>
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- team-area end -->



<!-- partner area -->
    <?php
    // Check if the partner repeater field exists and has rows
    if( have_rows('footer_client_list') ):
        ?>
        <div class="partner-area bg pt-50 pb-50">
            <div class="container">
                <div class="partner-wrapper partner-slider owl-carousel owl-theme">
                    <?php
                    // Loop through the partner repeater field
                    while( have_rows('footer_client_list') ) : the_row();
                        // Retrieve the image field
                        $image = get_sub_field('client_img');
                        // Output the image with an <img> tag
                        if( $image ) {
                            $url = $image['url'];
                            $alt = $image['alt'];
                            echo '<img src="' . $url . '" alt="' . $alt . '">';
                        }
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;
?>
<!-- partner area end -->
</main>
<?php get_footer(); 