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
<div class="hero-section">
    <div class="hero-single" style="background: url(https://images.unsplash.com/photo-1546213290-e1b492ab3eee?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="hero-content">
                        <div class="hero-content-wrapper">
                            <h1 class="hero-title">Buy, <span>Sell, Rent</span> & Exchange in one Click</h1>
                            <p>Search from over 3000+ Active Ads in 35+ Categories for Free</p>
                            <div class="hero-btn">
                                <a href="#" class="theme-btn">Browse Ads <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="theme-border-btn text-white">Post Your Ads <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
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
<!-- hero area end -->



<!-- process area -->
<div class="process-area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Process</span>
                    <h2 class="site-title">How It Works</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="process-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
                    <span class="process-count">01</span>
                    <div class="process-icon">
                        <i class="fal fa-user"></i>
                    </div>
                    <div class="process-content">
                        <h5>Create Account</h5>
                        <p>It is a long established fact that the reader will be distracted readable. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="process-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".50s">
                    <span class="process-count">02</span>
                    <div class="process-icon">
                        <i class="fal fa-layer-group"></i>
                    </div>
                    <div class="process-content">
                        <h5>Post Your Ad</h5>
                        <p>It is a long established fact that the reader will be distracted readable. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="process-item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".75s">
                    <span class="process-count">03</span>
                    <div class="process-icon">
                        <i class="fal fa-sack-dollar"></i>
                    </div>
                    <div class="process-content">
                        <h5>Sell Your Item</h5>
                        <p>It is a long established fact that the reader will be distracted readable. </p>
                    </div>
                </div>
            </div>
        </div>
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
        <div class="counter-wrapper">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="counter-icon">
                            <i class="fal fa-layer-group"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number">
                                <span class="counter" data-count="+" data-to="9200"
                                    data-speed="3000">9200</span>
                                <span class="counter-sign">+</span>
                            </div>
                            <h6 class="counter-title">Ads Listed</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="counter-icon">
                            <i class="fal fa-smile"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number">
                                <span class="counter" data-count="+" data-to="8530"
                                    data-speed="3000">8530</span>
                                <span class="counter-sign">+</span>
                            </div>
                            <h6 class="counter-title">Happy Clients</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="counter-icon">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number">
                                <span class="counter" data-count="+" data-to="5680"
                                    data-speed="3000">5680</span>
                                <span class="counter-sign">+</span>
                            </div>
                            <h6 class="counter-title">Daily Visitors</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="counter-icon">
                            <i class="fal fa-award"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number">
                                <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                <span class="counter-sign">+</span>
                            </div>
                            <h6 class="counter-title">Win Awards</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- counter area end -->



<!-- choose area -->
<div class="choose-area py-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="choose-img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
                    <img src="https://images.unsplash.com/photo-1545239351-1141bd82e8a6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=781&q=80" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="site-heading mb-3">
                        <span class="site-title-tagline">Why Choose Us</span>
                        <h2 class="site-title">
                            Earn cash by selling or Find anything you desire
                        </h2>
                    </div>
                    <p class="choose-text">There are many variations of passages of Lorem Ipsum available,
                        but the majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even.</p>
                        <ul class="choose-list">
                            <li><i class="fad fa-check-circle"></i> Take a look at our round up of the best shows.</li>
                            <li><i class="fad fa-check-circle"></i> It is a long established fact reader will be distracted.</li>
                            <li><i class="fad fa-check-circle"></i> At vero eos et accusamus et iusto odio dignissimos.</li>
                        </ul>
                    <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- choose area end -->



<!-- cta-area -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="cta-text">
                    <h1>World's Largest Marketplace</h1>
                    <p>It is a long established fact that a reader will be distracted by the read is that it has desktop publishing packages and web page normal distribution of letters</p>
                </div>
                <a href="#" class="theme-btn mt-30">Get Started Now<i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- cta-area end -->



<!-- pricing-area -->
<div class="pricing-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Pricing</span>
                    <h2 class="site-title">Our Flexiable Pricing Plan</h2>
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
<div class="download-area pt-60 pb-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="download-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="download-img">
                        <img src="https://images.unsplash.com/photo-1613442301239-ea2478101ea7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="download-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="site-heading mb-30">
                        <span class="site-title-tagline">Download App</span>
                        <h2 class="site-title">Get More In Our Application Sit Back And Enjoy</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using is that it has normal distribution of letters.</p>
                    </div>
                    <div class="download-btn">
                        <a href="#"><img src="assets/img/download/google-play.png" alt=""></a>
                        <a href="#"><img src="assets/img/download/app-store.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- download area end -->


<!-- testimonial-area -->
<div class="testimonial-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Testimonials</span>
                    <h2 class="site-title">What Our Client Say's</h2>
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
                        <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pexels-sumit-kapoor-718261-1.jpg" alt="">
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


<!-- blog-area -->
<div class="blog-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Our Blog</span>
                    <h2 class="site-title">Our Latest News & Blog</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="blog-item-img">
                        <img src="https://images.pexels.com/photos/39284/macbook-apple-imac-computer-39284.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Thumb">
                    </div>
                    <div class="blog-item-info">
                        <div class="blog-item-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                <li><a href="#"><i class="far fa-calendar-alt"></i> December 04, 2022</a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="#">There are many variations for passages available suffer</a>
                        </h4>
                        <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                    <div class="blog-item-img">
                        <img src="https://images.pexels.com/photos/245032/pexels-photo-245032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Thumb">
                    </div>
                    <div class="blog-item-info">
                        <div class="blog-item-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                <li><a href="#"><i class="far fa-calendar-alt"></i> December 04, 2022</a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="#">There are many variations for passages available suffer</a>
                        </h4>
                        <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                    <div class="blog-item-img">
                        <img src="https://images.pexels.com/photos/245032/pexels-photo-245032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Thumb">
                    </div>
                    <div class="blog-item-info">
                        <div class="blog-item-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                <li><a href="#"><i class="far fa-calendar-alt"></i> December 04, 2022</a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="#">There are many variations for passages available suffer</a>
                        </h4>
                        <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area end -->


<!-- partner area -->
<div class="partner-area bg pt-50 pb-50">
    <div class="container">
        <div class="partner-wrapper partner-slider owl-carousel owl-theme">
            <!-- <img src="https://images.pexels.com/photos/258174/pexels-photo-258174.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumb"> -->
            <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pngegg-4.png" alt="thumb">
            <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pngegg-1.png" alt="thumb">
            <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pngegg-2.png" alt="thumb">
            <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pngegg-3.png" alt="thumb">
            <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pngegg-1.png" alt="thumb">
            <img src="http://localhost/esell.today/wp-content/uploads/2023/03/pngegg-2.png" alt="thumb">
        </div>
    </div>
</div>
<!-- partner area end -->

</main>

<?php
get_footer();