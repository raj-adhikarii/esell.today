<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

global $product;

// Get the product ID
// $product_id = $product->get_id();

// // Get the product object
// $product = wc_get_product( $product_id );

// // Get the product name
// $product_name = $product->get_name();

// // Get the product price
// $product_price = $product->get_price_html();

	print <<<HTML
	<main class="main">

	<!-- breadcrumb -->
	<div class="site-breadcrumb" style="background: url(https://e-sell.today/wp-content/uploads/2023/04/head.jpeg)">
		<div class="container">
			<h2 class="breadcrumb-title">Product</h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?php echo site_url(); ?>">Home</a></li>
				
				<li class="active">All Stores</li>
			</ul>
		</div>
	</div>
	HTML;
	?>

	<!-- product single -->
		<div class="product-single py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mb-4">
                        <div class="product-single-wrapper">
                            <div class="product-single-slider">
                                <div class="item-gallery">
                                    <div class="flexslider-thumbnails">
                                        <ul class="slides">
                                            <li data-thumb="assets/img/product/slider-1.jpg" rel="adjustX:10, adjustY:">
                                                <img src="assets/img/product/slider-1.jpg" alt="#">
                                            </li>
                                            <li data-thumb="assets/img/product/slider-2.jpg">
                                                <img src="assets/img/product/slider-2.jpg" alt="#">
                                            </li>
                                            <li data-thumb="assets/img/product/slider-3.jpg">
                                                <img src="assets/img/product/slider-3.jpg" alt="#">
                                            </li>
                                            <li data-thumb="assets/img/product/slider-4.jpg">
                                                <img src="assets/img/product/slider-4.jpg" alt="#">
                                            </li>
                                            <li data-thumb="assets/img/product/slider-5.jpg">
                                                <img src="assets/img/product/slider-5.jpg" alt="#">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-single-top">
                                <div class="product-single-title">
                                    <h3>Men's Golden Watch</h3>
                                    <p><i class="far fa-clock"></i> Posted on 05 December 2022, 10:00 AM</p>
                                </div>
                                <div class="product-single-btn">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-share-alt"></i></a>
                                    <a href="#"><i class="far fa-flag"></i></a>
                                </div>
                            </div>
                            <div class="product-single-price">
                                $1,520.00
                            </div>
                            <div class="product-single-moreinfo">
                                <ul>
                                    <li><i class="far fa-tag"></i> Fashion</li>
                                    <li><i class="far fa-dollar-sign"></i> Fixed Price</li>
                                    <li><i class="far fa-eye"></i> 1,200 Views</li>
                                    <li><i class="far fa-location-dot"></i> 25/A Road New York, USA</li>
                                </ul>
                            </div>
                            <div class="product-single-feature">
                                <h4 class="mb-3">Features</h4>
                                <div class="product-single-feature-meta">
                                    <ul>
                                        <li><span>Brand:</span>Apple</li>
                                        <li><span>Condition:</span>New</li>
                                        <li><span>Authenticity:</span>Original</li>
                                        <li><span>Model:</span>ZX-12345</li>
                                    </ul>
                                </div>
                                <div class="product-single-feature-list">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <ul>
                                                <li><i class="fad fa-circle-check"></i> Dual Camera</li>
                                                <li><i class="fad fa-circle-check"></i> Multi Screen</li>
                                                <li><i class="fad fa-circle-check"></i> 1 Year International Warranty</li>
                                                <li><i class="fad fa-circle-check"></i> 10 Hour Battery Life</li>
                                                <li><i class="fad fa-circle-check"></i> Dual Sim</li>
                                                <li><i class="fad fa-circle-check"></i> Touch Fingerprint</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul>
                                                <li><i class="fad fa-circle-check"></i> Dual Camera</li>
                                                <li><i class="fad fa-circle-check"></i> Multi Screen</li>
                                                <li><i class="fad fa-circle-check"></i> 1 Year International Warranty</li>
                                                <li><i class="fad fa-circle-check"></i> 10 Hour Battery Life</li>
                                                <li><i class="fad fa-circle-check"></i> Dual Sim</li>
                                                <li><i class="fad fa-circle-check"></i> Touch Fingerprint</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-single-description mt-4">
                                <h4 class="mb-3">Description</h4>
                                <p>
                                    There are many variations of passages available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                                </p>
                                <p class="mt-3">
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                </p>
                            </div>
                            <div class="product-single-location mt-4">
                                <h4 class="mb-3">Location Map</h4>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.34194156103!2d-74.03927096447748!3d40.759040329405195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a01c8df6fb3cb8!2sSolomon%20R.%20Guggenheim%20Museum!5e0!3m2!1sen!2sbd!4v1619410634508!5m2!1sen!2s"
                                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="product-single-review mt-5">
                                <h4>Reviews (20)</h4>
                                <div class="listing-single-comments">
                                    <div class="blog-comments mb-0">
                                        <div class="blog-comments-wrapper">
                                            <div class="blog-comments-single">
                                                <div class="blog-comments-img"><img src="assets/img/blog/com-1.jpg"
                                                        alt="thumb"></div>
                                                <div class="blog-comments-content">
                                                    <h5>Jesse Sinkler</h5>
                                                    <span><i class="far fa-clock"></i> 21 Dec, 2022</span>
                                                    <p>There are many variations of passages the majority have
                                                        suffered in some injected humour or randomised words which
                                                        don't look even slightly believable.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-comments-single blog-comments-reply">
                                                <div class="blog-comments-img"><img src="assets/img/blog/com-2.jpg"
                                                        alt="thumb"></div>
                                                <div class="blog-comments-content">
                                                    <h5>Daniel Wellman</h5>
                                                    <span><i class="far fa-clock"></i> 21 Dec, 2022</span>
                                                    <p>There are many variations of passages the majority have
                                                        suffered in some injected humour or randomised words which
                                                        don't look even slightly believable.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-comments-single">
                                                <div class="blog-comments-img"><img src="assets/img/blog/com-3.jpg"
                                                        alt="thumb"></div>
                                                <div class="blog-comments-content">
                                                    <h5>Kenneth Evans</h5>
                                                    <span><i class="far fa-clock"></i> 21 Dec, 2022</span>
                                                    <p>There are many variations of passages the majority have
                                                        suffered in some injected humour or randomised words which
                                                        don't look even slightly believable.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-comments-form">
                                            <h4 class="mb-4">Leave A Review</h4>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label class="star-label">Your Rating</label>
                                                            <div class="listing-review-form-star">
                                                                <div class="star-rating-wrapper">
                                                                    <div class="star-rating-box">
                                                                        <input type="radio" name="rating" value="5"
                                                                            id="star-5"> <label
                                                                            for="star-5">&#9733;</label>
                                                                        <input type="radio" name="rating" value="4"
                                                                            id="star-4"> <label
                                                                            for="star-4">&#9733;</label>
                                                                        <input type="radio" name="rating" value="3"
                                                                            id="star-3"> <label
                                                                            for="star-3">&#9733;</label>
                                                                        <input type="radio" name="rating" value="2"
                                                                            id="star-2"> <label
                                                                            for="star-2">&#9733;</label>
                                                                        <input type="radio" name="rating" value="1"
                                                                            id="star-1"> <label
                                                                            for="star-1">&#9733;</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                placeholder="Your Email*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="5"
                                                                placeholder="Your Review*"></textarea>
                                                        </div>
                                                        <button type="submit" class="theme-btn">Submit Review <i
                                                                class="far fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-single-related mt-5">
                                <h4 class="mb-4">Related Ads</h4>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                                                <img src="assets/img/product/01.jpg" alt="">
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
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <img src="assets/img/product/02.jpg" alt="">
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
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="product-status new">New</span>
                                                <img src="assets/img/product/03.jpg" alt="">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-sidebar">
                            <div class="product-single-sidebar-item">
                                <h5 class="title">Seller Info</h5>
                                <div class="product-single-author">
                                    <img src="assets/img/store/01.jpg" alt="">
                                    <h6><a href="#">Ako Electronic</a></h6>
                                    <span>Member Since 2020</span>
                                    <div class="product-single-author-phone">
                                        <span>
                                            <i class="far fa-phone"></i> 
                                            <span class="author-number">+2 123 XXX XXXX</span>
                                            <span class="author-reveal-number">+2 123 654 7898</span>
                                        </span>
                                        <p>Click to reveal phone number</p>
                                    </div>
                                    <a href="#" class="theme-border-btn w-100 mt-4"><i class="far fa-messages"></i> Send Message</a>
                                </div>
                                <div class="product-single-sidebar-item mt-5">
                                    <h5 class="title">Safety Tips For Buyer</h5>
                                    <div class="product-single-safety">
                                        <ul>
                                            <li><i class="far fa-check"></i> Meet seller in public place</li>
                                            <li><i class="far fa-check"></i> Check The item before buy</li>
                                            <li><i class="far fa-check"></i> Pay after collecting item</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product single -->
<?php

get_footer( 'shop' );
echo '<main>';

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
