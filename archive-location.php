<?php get_header(); ?>
    <main class="main">

    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url(https://tinysol.com.au/esell/wp-content/uploads/2023/04/head.jpeg)">
        <div class="container">
            <h2 class="breadcrumb-title">Locations</h2>
            <ul class="breadcrumb-menu">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active">Locations</li>
            </ul>
        </div>
    </div>

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
                        <a href="#" class="location-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
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

    </main>
<?php get_footer();