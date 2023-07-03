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
        <?php if(have_rows('testimonial_sec')): ?>
                <div class="row">
                    <?php while(have_rows('testimonial_sec')): the_row(); ?>
                        <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="site-heading text-center">
                                <span class="site-title-tagline">Testimonials</span>
                                    <?php $section_title = get_sub_field('testi_title'); ?>
                                        <?php if(!empty($section_title)) : ?>
                                            <h2 class="section-title"><?php echo ($section_title); ?></h2>
                                        <?php endif; ?>

                                    <?php $section_desc = get_sub_field('testi_desc'); ?>
                                        <?php if(!empty($section_desc)): ?>
                                            <?php echo ($section_desc); ?>
                                        <?php endif; ?>
                            </div>
                        </div>
                </div>
                <?php if(have_rows('testimonial_card')) : ?>
                    <div class="testimonial-slider owl-carousel owl-theme">
                        <?php while(have_rows('testimonial_card')): the_row(); ?>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <div class="testimonial-author-img">
                                        <?php $testi_img = get_sub_field('testimonial_img'); ?>
                                            <?php if(!empty($testi_img)): ?>
                                                <img src="<?php echo $testi_img['url']; ?>" alt="<?php echo $testi_img['alt']; ?>">
                                            <?php endif; ?>
                                    </div>
                                    <div class="testimonial-author-info">
                                        <?php $name = get_sub_field('name'); ?>
                                            <?php if(!empty($name)): ?>
                                                <h4><?php echo ($name); ?></h4>
                                            <?php endif; ?>
                                        <?php $designation = get_sub_field('title'); ?>
                                            <?php if(!empty($title)) : ?>
                                                <?php echo ($designation); ?>
                                            <?php endif; ?>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <?php $testi_desc = get_sub_field('reviews'); ?>
                                        <?php if(!empty($testi_desc)) : ?>
                                            <?php echo ($testi_desc); ?>
                                        <?php endif; ?>
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
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<!-- testimonial-area end -->



<!-- team-area -->
<div class="team-area pb-120">
    <div class="container">
        <?php if(have_rows('team_section')) : ?>  
            <div class="row">
                <?php while(have_rows('team_section')): the_row(); ?>
                    <div class="col-lg-7 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Team</span>
                            <?php $team_title = get_sub_field('team_title'); ?>
                                <?php if(!empty($team_title)): ?>
                                    <h2 class="section-title"><?php echo ($team_title); ?></h2>
                                <?php endif; ?>

                            <?php $team_desc = get_sub_field('team_desc'); ?>
                                <?php if(!empty($team_desc)): ?>
                                    <?php echo ($team_desc); ?>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if(have_rows('team_card')) : ?>
                    <div class="row">
                        <?php while(have_rows('team_card')): the_row(); ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="team-item">
                                    <div class="team-img">
                                        <?php $team_image = get_sub_field('team_image'); ?>
                                            <?php if(!empty($team_image)) : ?>
                                                <img src="<?php echo $team_image['url']; ?>" alt="<?php echo $team_image['alt']; ?>">
                                            <?php endif; ?>
                                    </div>
                                    <div class="team-content">
                                        <div class="team-bio">
                                            <?php $team_card_title = get_sub_field('member_name'); ?>
                                                <?php if(!empty($team_card_title)) : ?>
                                                    <h5><a href="#"><?php echo ($team_card_title); ?></a></h5>
                                                <?php endif; ?>

                                            <?php $position = get_sub_field('member_designation'); ?>
                                                <?php if(!empty($position)) : ?>
                                                    <span><?php echo ($position); ?></span>
                                                <?php endif; ?>
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
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
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