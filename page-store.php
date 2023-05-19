<?php 
// Template name: Store Template
get_header(); ?>

<main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(https://e-sell.today/wp-content/uploads/2023/04/head.jpeg)">
            <div class="container">
                <h2 class="breadcrumb-title">All Stores</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="active">All Stores</li>
                </ul>
            </div>
        </div>

        <!-- store area -->
        <div class="store-area py-120">
            <div class="container">
            <div class="row">
    <?php
        $vendors = dokan()->vendor->get_vendors();
        foreach ( $vendors as $vendor ) {
            $store_info = dokan_get_store_info( $vendor->get_id() );
            $store_name = $store_info['store_name'];
            $store_banner_url = $store_info['banner'];
            if ( $store_name ) {
    ?>
                <div class="col-md-2">
                    <a href="<?php the_permalink(); ?>" class="store-item">
                        <div class="store-img">
                            <?php if ( $store_banner_url ): ?>
                                <img src="<?php echo dokan_get_no_seller_image(); ?>" alt="<?php echo esc_attr( $store_info['store_name'] ); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="store-content">
                            <h6><?php echo $store_name; ?></h6>
                            <span>5 Ads</span>
                        </div>
                    </a>
                </div>
    <?php 
            }
        }
    ?>
</div>




                <!-- <div class="row">
                    <div class="col-md-2">
                        <a href="#" class="store-item">
                            <div class="store-img">
                                <img src="assets/img/store/01.jpg" alt="">
                            </div>
                            <div class="store-content">
                                <h6>Ako Electronic </h6>
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
                    <div class="col-md-2">
                        <a href="#" class="store-item">
                            <div class="store-img">
                                <img src="assets/img/store/07.jpg" alt="">
                            </div>
                            <div class="store-content">
                                <h6>Yaho Car</h6>
                                <span>5 Ads</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="store-item">
                            <div class="store-img">
                                <img src="assets/img/store/08.jpg" alt="">
                            </div>
                            <div class="store-content">
                                <h6>Lebox Beauty</h6>
                                <span>5 Ads</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="store-item">
                            <div class="store-img">
                                <img src="assets/img/store/09.jpg" alt="">
                            </div>
                            <div class="store-content">
                                <h6>Lt Electronic</h6>
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
                                <h6>Ab Fashion</h6>
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
                                <h6>Rebox Sports</h6>
                                <span>5 Ads</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="store-item">
                            <div class="store-img">
                                <img src="assets/img/store/07.jpg" alt="">
                            </div>
                            <div class="store-content">
                                <h6>Hso Property</h6>
                                <span>5 Ads</span>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- store area end -->


    </main>
    <?php
$vendors = dokan()->vendor->get_vendors();

foreach ( $vendors as $vendor ) {
    $store_info = dokan_get_store_info( $vendor->get_id() );
    $store_name = $store_info['store_name'];
    $store_banner_url = $store_info['banner'];

    if ( $store_name ) { ?>
        <div class="col-md-2">
            <a href="#" class="store-item">
                <div class="store-img">
                    <?php if ( $store_banner_url ) : ?>
                        <img src="<?php echo esc_url( $store_banner_url ); ?>" alt="<?php echo esc_attr( $store_name ); ?>">
                    <?php else : ?>
                        <img src="<?php echo dokan_get_no_seller_image(); ?>" alt="<?php echo esc_attr( $store_name ); ?>">
                    <?php endif; ?>
                </div>
                <div class="store-content">
                    <h6><?php echo esc_html( $store_name ); ?></h6>
                    <span>5 Ads</span>
                </div>
            </a>
        </div>
    <?php }
}
?>



<?php get_footer(); 