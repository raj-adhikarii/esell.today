<?php
/* Template Name: Vendor Template */
get_header(); 
?>
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


<!-- store area -->
<div class="store-area py-120">
    <div class="container">
    <?php
$vendors = WC_Product_Vendors_Utils::get_vendors();

if ($vendors) {
    echo '<div class="row">';
    
    foreach ($vendors as $vendor) {
        $vendor_id = $vendor->term_id;
        $vendor_name = $vendor->name;
        $vendor_permalink = home_url('/vendor/') . $vendor->slug; // Construct the vendor permalink manually

        // Custom query to count the number of products for the vendor
        $ads_count = $vendor->count;

        ?>
        <div class="col-md-2">
            <a href="<?php echo $vendor_permalink; ?>" class="store-item">
                <div class="store-img">
                    <img src="assets/img/store/01.jpg" alt="">
                </div>
                <div class="store-content">
                    <h6><?php echo $vendor_name; ?></h6>
                    <span><?php echo $ads_count; ?> Ads</span>
                </div>
            </a>
        </div>
        <?php
    }
    
    echo '</div>';
} else {
    echo 'No vendors found.';
}
?>


<!-- https://weareag.co.uk/add-vendor-profile-image-to-woocommerce-product-vendors/ -->



        <!-- <div class="row">
            <div class="col-md-2">
                <a href="#" class="store-item">
                    <div class="store-img">
                        <img src="assets/img/store/01.jpg" alt="">
                    </div>
                    <div class="store-content">
                        <h6>Ako Electronic</h6>
                        <span>5 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="store-item">
                    <div class="store-img">
                        <img src="assets/img/store/02.jpg" alt="">
                    </div>
                    <div class="store-content">
                        <h6>Ritro Fashion</h6>
                        <span>5 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="store-item">
                    <div class="store-img">
                        <img src="assets/img/store/03.jpg" alt="">
                    </div>
                    <div class="store-content">
                        <h6>Fx Sports</h6>
                        <span>5 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="store-item">
                    <div class="store-img">
                        <img src="assets/img/store/04.jpg" alt="">
                    </div>
                    <div class="store-content">
                        <h6>Abox Trader</h6>
                        <span>5 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="store-item">
                    <div class="store-img">
                        <img src="assets/img/store/05.jpg" alt="">
                    </div>
                    <div class="store-content">
                        <h6>Litto Property</h6>
                        <span>5 Ads</span>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="store-item">
                    <div class="store-img">
                        <img src="assets/img/store/06.jpg" alt="">
                    </div>
                    <div class="store-content">
                        <h6>Bivo Furniture</h6>
                        <span>5 Ads</span>
                    </div>
                </a>
            </div>
        </div> -->
    </div>
</div>
<!-- store area end -->


</main>

<?php get_footer(); 
