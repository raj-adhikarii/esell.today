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
<?php $args = array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) {
    while ( $products->have_posts() ) {
        $products->the_post();
        $product = wc_get_product( get_the_ID() );
        
        // Display the product information
        echo 'Product Name: ' . $product->get_name() . '<br>';
        echo 'Product Price: ' . $product->get_price() . '<br>';
        echo 'Product SKU: ' . $product->get_sku() . '<br>';
        // and so on...
    }
} else {
    echo 'No products found';
}

wp_reset_postdata();
?>

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
                    <h2 class="site-title">Explore Our Popular Ads</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="product-img">
                        <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-tv"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Electronics</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">Wireless Headphone</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$180</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="product-img">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-watch"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Fashions</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">Men's Golden Watch</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$120</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="product-img">
                        <span class="product-status new">New</span>
                        <img src="https://images.unsplash.com/photo-1521566652839-697aa473761a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-mobile-button"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Mobiles</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">iPhone 12 Pro</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$320</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="product-img">
                        <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-laptop"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Laptops</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">Macbook M2 Pro</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$460</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="product-img">
                        <span class="product-status featured">Featured</span>
                        <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-backpack"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Backpacks</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">School Backpack</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$160</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="product-img">
                        <img src="https://images.unsplash.com/photo-1477901492169-d59e6428fc90?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-buildings"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Property</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">Modern Apartment</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$150</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="product-img">
                        <img src="https://plus.unsplash.com/premium_photo-1661281362580-95188f976fa1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-car-side"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Vehicles</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">Latest Sports Car</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$9,530</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="product-img">
                        <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-content">
                        <div class="product-top">
                            <div class="product-category">
                                <div class="product-category-icon">
                                    <i class="far fa-door-open"></i>
                                </div>
                                <h6 class="product-category-title"><a href="#">Furnitures</a></h6>
                            </div>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5><a href="#">Modern Room Furniture</a></h5>
                            <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                            <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                        </div>
                        <div class="product-bottom">
                            <div class="product-price">$270</div>
                            <a href="#" class="product-text-btn">View Details <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product area end -->



<!-- category area -->
<div class="category-area bg py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Category</span>
                    <h2 class="site-title">Most Popular Category</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-tv"></i>
                        </div>
                        <h4 class="category-title">Electronics</h4>
                        <span class="category-listing">15 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-mobile-button"></i>
                        </div>
                        <h4 class="category-title">Mobiles</h4>
                        <span class="category-listing">25 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-buildings"></i>
                        </div>
                        <h4 class="category-title">Property</h4>
                        <span class="category-listing">38 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-laptop"></i>
                        </div>
                        <h4 class="category-title">Laptops</h4>
                        <span class="category-listing">56 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.25s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-car-side"></i>
                        </div>
                        <h4 class="category-title">Vehicles</h4>
                        <span class="category-listing">75 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.50s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-door-open"></i>
                        </div>
                        <h4 class="category-title">Furnitures</h4>
                        <span class="category-listing">29 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-graduation-cap"></i>
                        </div>
                        <h4 class="category-title">Educations</h4>
                        <span class="category-listing">95 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-paw-simple"></i>
                        </div>
                        <h4 class="category-title">Animals</h4>
                        <span class="category-listing">82 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-watch"></i>
                        </div>
                        <h4 class="category-title">Fashions</h4>
                        <span class="category-listing">72 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-backpack"></i>
                        </div>
                        <h4 class="category-title">Backpacks</h4>
                        <span class="category-listing">69 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.25s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-gamepad-modern"></i>
                        </div>
                        <h4 class="category-title">Sports & Games</h4>
                        <span class="category-listing">46 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.50s">
                    <div class="category-content">
                        <div class="category-icon">
                            <i class="fal fa-heart"></i>
                        </div>
                        <h4 class="category-title">Health & Beauty</h4>
                        <span class="category-listing">39 Ads</span>
                    </div>
                </a>
            </div>
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
                    <h2 class="site-title">Most Popular Location</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.
                    </p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="location-img">
                        <img src="https://images.unsplash.com/photo-1588992370249-1b0fcaf6249b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                    </div>
                    <div class="location-info">
                        <h4>New York</h4>
                        <span><i class="far fa-location-dot"></i> 30 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="location-img">
                        <img src="https://images.unsplash.com/photo-1513094735237-8f2714d57c13?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80" alt="">
                    </div>
                    <div class="location-info">
                        <h4>San Francisco</h4>
                        <span><i class="far fa-location-dot"></i> 25 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="location-img">
                        <img src="https://images.unsplash.com/photo-1555529669-83329d5fac8e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1941&q=80" alt="">
                    </div>
                    <div class="location-info">
                        <h4>Florida</h4>
                        <span><i class="far fa-location-dot"></i> 15 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="location-img">
                        <img src="https://images.unsplash.com/photo-1587141121200-3cdb4c1b78a7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                    </div>
                    <div class="location-info">
                        <h4>Miami</h4>
                        <span><i class="far fa-location-dot"></i> 40 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="location-img">
                        <img src="https://images.unsplash.com/photo-1603466474065-e91b8dfff202?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                    </div>
                    <div class="location-info">
                        <h4>London</h4>
                        <span><i class="far fa-location-dot"></i> 50 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-6">
                <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="location-img">
                        <img src="https://images.unsplash.com/photo-1589526174056-2d6960ead9a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                    </div>
                    <div class="location-info">
                        <h4>Los Angeles</h4>
                        <span><i class="far fa-location-dot"></i> 45 Ads</span>
                    </div>
                </a>
            </div>
        </div>
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



<!-- pricing-area -->
<div class="pricing-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Pricing</span>
                    <h2 class="section-title">Our Flexiable Pricing Plan</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>
        <div class="pricing-wrapper">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="pricing-header">
                            <h4>Basic</h4>
                            <h1 class="pricing-amount">
                                $59 <span>/Monthly</span>
                            </h1>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li>10 Listings Submit</li>
                                <li>60 Days Availability</li>
                                <li>Average Price Range</li>
                                <li>20 Featured Listings</li>
                                <li>24/7 Fully Support</li>
                            </ul>
                            <a href="#" class="theme-btn">Get Started<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                        <div class="pricing-header">
                            <h4>Standard</h4>
                            <h1 class="pricing-amount">
                                $120 <span>/Monthly</span>
                            </h1>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li>50 Listings Submit</li>
                                <li>120 Days Availability</li>
                                <li>Average Price Range</li>
                                <li>20 Featured Listings</li>
                                <li>24/7 Fully Support</li>
                            </ul>
                            <a href="#" class="theme-btn">Get Started<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="pricing-item active wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                        <span class="pricing-badge">Popular</span>
                        <div class="pricing-header">
                            <h4>Business</h4>
                            <h1 class="pricing-amount">
                                $150 <span>/Monthly</span>
                            </h1>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li>200 Listings Submit</li>
                                <li>310 Days Availability</li>
                                <li>Average Price Range</li>
                                <li>20 Featured Listings</li>
                                <li>24/7 Fully Support</li>
                            </ul>
                            <a href="#" class="theme-btn">Get Started<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="pricing-header">
                            <h4>Enterprise</h4>
                            <h1 class="pricing-amount">
                                $250 <span>/Monthly</span>
                            </h1>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li>400 Listings Submit</li>
                                <li>310 Days Availability</li>
                                <li>Average Price Range</li>
                                <li>20 Featured Listings</li>
                                <li>24/7 Fully Support</li>
                            </ul>
                            <a href="#" class="theme-btn">Get Started<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pricing-area end -->



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