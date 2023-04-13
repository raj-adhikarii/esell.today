<?php get_header(); ?>
    <main class="main">

    <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(https://tinysol.com.au/esell/wp-content/uploads/2023/04/abt.jpeg)">
            <div class="container">
                <h2 class="breadcrumb-title">Services</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="active">Services</li>
                </ul>
            </div>
        </div>

        <!-- service area -->
        <div class="service-area bg py-120">
            <div class="container">
                    <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <div class="site-heading text-center">
                                    <span class="site-title-tagline">Services</span>
                                            <h2 class="section-title">Our Popular Services </h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                    </div>

                <?php
                $args = array(
                    'post_type' => 'service',
                    'posts_per_page' => 3
                );

                $query = new WP_Query($args); ?>
                <?php if($query->have_posts()) : ?>
                    <div class="row align-items-center">
                        <?php while($query->have_posts()): $query->the_post(); ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="service-item">
                                    <div class="service-icon">
                                        <i class="fal fa-dolly-flatbed"></i>
                                    </div>
                                    <div class="service-content">
                                        <h4> <?php the_title(); ?></h4>
                                        <p>It is a long established fact that readable content of a page when looking at its layout.</p>
                                        <a href="#" class="theme-border-btn">Read More<i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- service area end -->
</main>
<?php get_footer();