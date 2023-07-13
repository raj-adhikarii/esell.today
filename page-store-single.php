<?php
/* Template Name: Store Single */

get_header(); ?>

<main class="main">

    <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail'); ?>
        <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
            <div class="container">
                <h2 class="breadcrumb-title"><?php echo get_the_title(); ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="active"><?php echo get_the_title(); ?></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <!-- store single -->
    <div class="store-single py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="store-banner">
                            <div class="store-banner-img">
                                <img src="assets/img/store/banner.jpg" alt="">
                            </div>
                            <div class="store-banner-content">
                                <div class="store-banner-logo">
                                    <img src="assets/img/store/01.jpg" alt="">
                                </div>
                                <div class="store-banner-info">
                                    <h4>Ritro Fashion</h4>
                                    <span>25 Posted Ads</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 mt-5">
                        <div class="col-md-12">
                            <div class="product-sort">
                                <h6>Showing 1-10 of 50 Results</h6>
                                <div class="product-sort-list-grid">
                                    <a class="product-sort-grid active" href="ad-grid.html"><i class="far fa-grid-2"></i></a>
                                    <a class="product-sort-list" href="ad-list.html"><i class="far fa-list-ul"></i></a>
                                </div>
                                <div class="col-md-3 product-sort-box">
                                    <select class="select">
                                        <option value="1">Sort By Default</option>
                                        <option value="5">Sort By Featured</option>
                                        <option value="2">Sort By Latest</option>
                                        <option value="3">Sort By Low Price</option>
                                        <option value="4">Sort By High Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                            <div class="col-md-6 col-lg-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img src="assets/img/product/04.jpg" alt="">
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
                            <div class="col-md-6 col-lg-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <span class="product-status featured">Featured</span>
                                        <img src="assets/img/product/05.jpg" alt="">
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
                            <div class="col-md-6 col-lg-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img src="assets/img/product/06.jpg" alt="">
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
                            
                            <!-- pagination -->
                            <div class="pagination-area">
                                <div aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i
                                                        class="far fa-angle-double-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5">
                        <div class="product-sidebar">
                            <div class="product-single-sidebar-item">
                                <h5 class="title">Contact Info</h5>
                                <div class="product-single-author">
                                    <img src="assets/img/account/user.jpg" alt="">
                                    <h6><a href="#">Antoni Jonson</a></h6>
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

<?php get_footer(); 