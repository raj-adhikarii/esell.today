<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package esell
 */

get_header();
?>

<main class="main">

<!-- hero area -->
<?php if(have_rows('home_banner')) : ?>
<div class="hero-section">
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
    ?>
    <div class="hero-single" style="background: url(<?php echo $image[0]; ?>)">
    <?php endif; ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="hero-content">
                        <?php while(have_rows('home_banner')) : the_row(); ?>
                        <div class="hero-content-wrapper">
                            <?php $banner_title = get_sub_field('banner_title') ?>
                                <?php if(!empty($banner_title)): ?>
                                    <h1 class="hero-title"> <?php echo ($banner_title); ?></h1>
                                <?php endif; ?>

                            <?php $banner_desc = get_sub_field('banner_desc'); ?>
                                <?php if(!empty($banner_desc)): ?>
                                    <?php echo ($banner_desc); ?>
                                <?php endif; ?>
                            <div class="hero-btn">
                                <a href="#" class="theme-btn">Browse Ads <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="theme-border-btn text-white">Post Your Ads <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="search-wrapper">
                <div class="search-form">
                    <form action="#">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <input type="text" class="form-control"
                                            placeholder="What are you looking for?">
                                        <i class="far fa-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <select class="select">
                                            <option value="">Location</option>
                                            <option value="1">New York</option>
                                            <option value="2">California</option>
                                            <option value="3">London</option>
                                            <option value="4">Maxico</option>
                                            <option value="5">Los Angeles</option>
                                            <option value="6">Washington</option>
                                        </select>
                                        <i class="far fa-location-dot"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <select class="select">
                                            <option value="">Category</option>
                                            <option value="1">All Category</option>
                                            <option value="2">Electronics</option>
                                            <option value="3">Laptops & PCs</option>
                                            <option value="4">Mobiles</option>
                                            <option value="5">Property</option>
                                            <option value="6">Vehicles</option>
                                            <option value="7">Fashions</option>
                                            <option value="8">Animals</option>
                                            <option value="9">Furnitures</option>
                                            <option value="10">Educations</option>
                                            <option value="11">Jobs</option>
                                            <option value="12">Sports & Games</option>
                                            <option value="13">Health & Beauty</option>
                                            <option value="14">Matrimony</option>
                                        </select>
                                        <i class="far fa-bars-sort"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="theme-btn"><span
                                        class="far fa-search"></span>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="search-keyword">
                    <span>Trending Keywords:</span>
                    <a href="#">Electronics</a>
                    <a href="#">Property</a>
                    <a href="#">Vehicles</a>
                    <a href="#">Fashions</a>
                    <a href="#">Animals</a>
                    <a href="#">Furnitures</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php endif; ?>
<!-- hero area end -->

<!-- process area -->

<div class="process-area pt-120">
    <div class="container">
        <?php if(have_rows('how_it_works')): ?>
            <div class="row">
                <?php while(have_rows('how_it_works')): the_row(); ?>
                    <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Process</span>
                            <?php $title = get_sub_field('how_it_works_title'); ?>
                                <?php if(!empty($title)): ?>
                                    <h2 class="section-title"><?php echo $title; ?></h2>
                                <?php endif; ?>

                            <?php $desc = get_sub_field('how_it_works_desc'); ?>
                                <?php if(!empty($desc)): ?>
                                    <?php echo $desc; ?>
                                <?php endif; ?>
                        </div>
                    </div>

                    
                    <?php
                    $counter = 1;
                    if(have_rows('how_it_works_cards')): ?>
                        <div class="row">
                            <?php while(have_rows('how_it_works_cards')): the_row(); ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="process-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".50s">
                                        <span class="process-count"><?php echo $counter; ?></span>
                                        <div class="process-icon">
                                            <?php $ico_class = get_sub_field('cards_icon_class'); ?>
                                                <?php if(!empty($ico_class)): ?> 
                                                    <i class="fal <?php echo $ico_class; ?>"></i>
                                                <?php endif; ?>
                                        </div>
                                        <div class="process-content">
                                            <?php $card_title = get_sub_field('cards_title'); ?>
                                                <?php if(!empty($card_title)): ?>
                                                    <h5><?php echo $card_title; ?></h5>
                                                <?php endif; ?>

                                            <?php $card_desc = get_sub_field('cards_desc'); ?>
                                                <?php if(!empty($card_desc)): ?>
                                                    <?php echo $card_desc; ?>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php 
                            $counter++; 
                            endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- process area end -->

<!-- product area -->
<div class="product-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Popular Ads</span>
                    <h2 class="section-title">Explore Our Popular Ads</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 8,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                $products = new WP_Query( $args );

                if ( $products->have_posts() ) :
                    while ( $products->have_posts() ) : $products->the_post();
                        global $product;
                        $product_id   = $product->get_id();
                        $product_name = $product->get_name();
                        $product_price = $product->get_price();
                        $product_sku = $product->get_sku();
                        $product_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($product_id), 'medium' )[0];
                        ?>

                        <div class="col-md-6 col-lg-3">
                            <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                                <div class="product-img">
                                    <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                                    <?php if ( $product_image_url ): ?>
                                        <img src="<?php echo esc_url( $product_image_url ); ?>" alt="<?php echo esc_attr( $product_name ); ?>">
                                    <?php endif; ?>
                                    <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="product-content">
                                    <div class="product-top">
                                        <div class="product-category">
                                            <div class="product-category-icon">
                                                <i class="far fa-tv"></i>
                                            </div>
                                            <h6 class="product-category-title"><a href="#"><?php echo $product->get_categories(); ?></a></h6>
                                        </div>
                                        <div class="product-rate">
                                            <i class="fas fa-star"></i>
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5><a href="<?php the_permalink(); ?>"><?php echo $product_name; ?></a></h5>
                                            <?php
                                                // Get the vendor ID for the current product
                                                $vendor_id = get_post_field( 'post_author', get_the_ID() );

                                                // Get the vendor's store info
                                                $store_info = dokan_get_store_info( $vendor_id );

                                                // Output the store location
                                                echo '<p><i class="far fa-location-dot"></i> ' . $store_info['address']['city'] . ', ' . $store_info['address']['state'] . ', ' . $store_info['address']['country'] . '</p>';
                                           
                                                $posted_time = get_the_time('U'); // get the post published time
                                                $current_time = current_time('timestamp'); // get the current time

                                                $time_diff = human_time_diff($posted_time, $current_time); // get the time elapsed since post was published

                                                echo ' <div class="product-date"><i class="far fa-clock"></i> ' . $time_diff . ' ago' . ' </div>'; // display the time elapsed
                                            ?>

                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price"><?php echo wc_price($product_price); ?></div>
                                        <a href="<?php the_permalink(); ?>" class="product-text-btn">View Details <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No products found</p>';
            endif; ?>
        </div>
    </div>
</div>
<!-- product area end -->

<!-- category area -->
<div class="location-area bg py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Category</span>
                    <h2 class="section-title">Most Popular category</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $product_categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
            ));
            $delay = 0;
            foreach ($product_categories as $cat) :
                $cat_thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                $cat_thumb_url = wp_get_attachment_thumb_url($cat_thumb_id);
                $category_link = get_term_link($cat); 
                ?>
                <div class="col-6 col-lg-2">
                    <a href="<?php echo $category_link; ?>" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?= $delay ?>">
                        <div class="category-content">
                            <div class="category-icon">
                                <?php
                                $category_icon_class = "";
                                switch ($cat->name) {
                                case "Watches":
                                    $category_icon_class = "fal fa-watch";
                                    break;
                                case "Electronics":
                                    $category_icon_class = "fal fa-tv";
                                    break;
                                case "Mobiles":
                                    $category_icon_class = "fal fa-mobile-button";
                                    break;
                                case "Men's Fashion":
                                    $category_icon_class = "fal fa-buildings";
                                    break;
                                case "TV & Home Appliances":
                                    $category_icon_class = "fal fa-laptop";
                                    break;
                                case "Vehicles":
                                    $category_icon_class = "fal fa-car-side";
                                    break;
                                case "Electronic Devices":
                                    $category_icon_class = "fal fa-door-open";
                                    break;
                                case "Women's Fashion":
                                    $category_icon_class = "fa-solid fa-spray-can";
                                    break;
                                case "Bags":
                                    $category_icon_class = "fa-solid fa-icons";
                                    break;
                                case "Bags":
                                    $category_icon_class = "fal fa-buildings";
                                    break;
                                case "Bags":
                                    $category_icon_class = "fal fa-backpack";
                                    break;
                                case "Bags":
                                    $category_icon_class = "fal fa-backpack";
                                    break;
                                default:
                                    $category_icon_class = "fal fa-question-circle";
                                }
                                ?>
                                <i class="<?= $category_icon_class ?>"></i>
                            </div>
                            <h4 class="category-title"><?= $cat->name ?></h4>
                            <span class="category-listing"><?= $cat->count ?> Ads</span>
                        </div>
                    </a>
                </div>
                <?php $delay += 0.25; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- category area end -->



<!-- location area -->
<div class="location-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Location</span>
                    <h2 class="section-title">Most Popular Location</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.
                    </p>
                </div>
            </div>
        </div>
        <?php
                $args = array(
                    'post_type' => 'location',
                    'posts_per_page' => 6
                );

                $query = new WP_Query($args); ?>

                <?php if($query->have_posts()) : ?>
                <div class="row align-items-center">
                    <?php while($query->have_posts()): $query->the_post(); ?> 
                    <div class="col-md-12 col-lg-4">
                        <a href="<?php the_permalink(); ?>" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="location-img">
                                <img src="https://images.unsplash.com/photo-1588992370249-1b0fcaf6249b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                            </div>
                            <div class="location-info">
                                <h4>New York <?php the_title(); ?></h4>
                                <span><i class="far fa-location-dot"></i> 30 Ads</span>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
    </div>
</div>
<!-- location area end -->



<!-- counter area -->
<div class="counter-area bg pt-60 pb-60">
    <div class="container">
        <?php if(have_rows('stats')) : ?>
            <div class="counter-wrapper">
                <div class="row">
                    <?php while(have_rows('stats')): the_row(); ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-box">
                                <div class="counter-icon">
                                    <?php $ico = get_sub_field('stats_icon_class'); ?>
                                        <?php if(!empty($ico)): ?>
                                            <i class="fal <?php echo ($ico); ?>"></i>
                                        <?php endif; ?>
                                </div>
                                <div class="counter-content">
                                    <div class="counter-number">
                                        <?php $number = get_sub_field('stats_number'); ?>
                                            <?php if(!empty($number)): ?>
                                                <span class="counter" data-count="+" data-to="<?php echo ($number); ?>"
                                                    data-speed="3000"><?php echo ($number); ?></span>
                                                <span class="counter-sign">+</span>
                                            <?php endif; ?>
                                    </div>

                                    <?php $counter_title = get_sub_field('stats_title'); ?>
                                        <?php if(!empty($counter_title)): ?>
                                            <h6 class="counter-title"><?php echo ($counter_title); ?></h6>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- counter area end -->



<!-- choose area -->
<div class="choose-area py-120">
    <div class="container">
        <?php if(have_rows('why_choose_us')) : ?>
        <div class="row align-items-center">
            <?php while(have_rows('why_choose_us')): the_row(); ?>
            <div class="col-lg-6">
                <div class="choose-img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
                    <?php $img = get_sub_field('why_us_img'); ?>
                        <?php if(!empty($img)): ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="site-heading mb-3">
                        <span class="site-title-tagline">Why Choose Us</span>
                            <?php $whyus_title = get_sub_field('why_us_title'); ?>
                                <?php if(!empty($whyus_title)): ?>
                                    <h2 class="section-title">
                                        <?php echo ($whyus_title); ?>
                                    </h2>
                                <?php endif; ?>
                    </div>

                    <?php
                        $paragraph_text = get_sub_field('why_us_desc'); // Get the ACF paragraph field content
                            if ($paragraph_text) {
                                $paragraph_text = strip_tags($paragraph_text); // Remove any existing HTML tags
                                echo '<p class="choose-text">' . $paragraph_text . '</p>'; // Output the cleaned paragraph with a class
                            }
                        ?>

                    <?php if(have_rows('why_us_icon_list')): ?>
                        <ul class="choose-list">
                            <?php while(have_rows('why_us_icon_list')): the_row(); ?>

                                <?php $icon_list = get_sub_field('icon_list'); ?>
                                    <?php if(!empty($icon_list)) : ?>
                                        <li><i class="fad fa-check-circle"></i><?php echo ($icon_list); ?></li>
                                    <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- choose area end -->



<!-- cta-area -->
<?php if(have_rows('marketplace_section')): ?>
    <div class="cta-area" style="background: url(https://images.unsplash.com/photo-1483134529005-4c93495107d5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80);background-position: center;
    background-size: cover;
    background-attachment: fixed;
    padding-top: 80px;
    padding-bottom: 80px;
    z-index: 1;">
        <div class="container">
            <div class="row">
                <?php while(have_rows('marketplace_section')): the_row(); ?>
                    <div class="col-lg-8 mx-auto text-center">
                        <div class="cta-text">
                            <?php $marketplace_title = get_sub_field('marketplace_title'); ?>
                                <?php if(!empty($marketplace_title)): ?>
                                    <h1><?php echo ($marketplace_title); ?></h1>
                                <?php endif; ?>

                            <?php $marketplace_desc = get_sub_field('marketplace_desc'); ?>
                                <?php if(!empty($marketplace_desc)): ?>
                                    <?php echo ($marketplace_desc); ?>
                                <?php endif; ?>
                        </div>
                        <a href="#" class="theme-btn mt-30">Get Started Now<i class="fas fa-arrow-right"></i></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- cta-area end -->

<!-- download area -->
<div class="download-area pt-90 pb-90">
    <div class="container">
        <?php if(have_rows('download_app')) : ?>
            <div class="row align-items-center">
                <?php while(have_rows('download_app')): the_row(); ?>
                <div class="col-lg-6">
                        <div class="download-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="download-img">
                                <?php $download_image = get_sub_field('down_img'); ?>
                                    <?php if(!empty($download_image)): ?>
                                        <img src="<?php echo $download_image['url']; ?>" alt="<?php echo $download_image['alt']; ?>">
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="download-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".75s">
                            <div class="site-heading mb-30">
                                <span class="site-title-tagline">Download App</span>
                                    <?php $down_title = get_sub_field('download_app_title'); ?>
                                        <?php if(!empty($down_title)) : ?>
                                            <h2 class="section-title"><?php echo ($down_title); ?></h2>
                                        <?php endif; ?>

                                    <?php $down_desc = get_sub_field('down_desc'); ?>
                                        <?php if(!empty($down_desc)): ?>
                                            <?php echo ($down_desc); ?>
                                        <?php endif; ?>
                            </div>
                            <div class="download-btn">
                                <a href="#"><img src="assets/img/download/google-play.png" alt=""></a>
                                <a href="#"><img src="assets/img/download/app-store.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?> 
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- download area end -->


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


<!-- blog-area -->
<div class="blog-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Our Blog</span>
                    <h2 class="section-title">Our Latest News & Blog</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>

        <?php $args = array(
            'post_type' => 'post',
            'post_per_page' => '3',
            'order' => 'DESC',
            'orderby' => 'date'
        );

        $query = new WP_Query($args); ?>

       <?php if($query->have_posts()): ?>
        <div class="row">
            <?php while($query->have_posts()): $query->the_post(); ?>
            <div class="col-md-6 col-lg-4">
                <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <?php if(has_post_thumbnail()): ?>
                    <div class="blog-item-img">
                    <?php the_post_thumbnail( 'full', [ 'alt' => esc_html ( get_the_title() ) ] ); ?>
                    </div>
                    <?php endif; ?>
                    <div class="blog-item-info">
                        <div class="blog-item-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-user-circle"></i> By: <?php the_author(); ?></a></li>
                                <li><a href="#"><i class="far fa-calendar-alt"></i> <?php the_time('F j, Y'); ?></a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <a class="theme-btn" href="<?php the_permalink(); ?>">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
       <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>
<!-- blog-area end -->


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

<?php
get_footer();