<?php get_header(); ?>

<main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(https://tinysol.com.au/esell/wp-content/uploads/2023/04/head.jpeg)">
            <div class="container">
                <h2 class="breadcrumb-title"><?php the_title(); ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>/service">Service</a></li>
                    <li class="active"><?php the_title(); ?></li>
                </ul>
            </div>
        </div>


        <!-- service-single -->
        <div class="service-single-area py-120">
            <div class="container">
                <div class="service-single-wrapper">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="service-sidebar">
                                <div class="widget category">
                                    <h4 class="widget-title">All Services</h4>
                                    <?php
                                    $args = array(
                                        'post_type' => 'service',
                                        'post_per_page' => -1
                                    );

                                    $query = new WP_Query($args); ?>
                                    <?php if($query->have_posts()): ?>
                                    <div class="category-list">
                                        <?php while($query->have_posts()): $query->the_post(); ?>
                                        <a href="<?php the_permalink(); ?>"><i class="far fa-long-arrow-right"></i><?php the_title(); ?></a>
                                        <?php endwhile; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="widget service-download">
                                    <h4 class="widget-title">Download</h4>
                                    <a href="#"><i class="far fa-file-pdf"></i> Download Brochure</a>
                                    <a href="#"><i class="far fa-file-alt"></i> Download App</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <?php while(have_posts()): the_post(); ?>
                            <div class="service-details">
                                <div class="service-details-img mb-30">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }
                                    ?>
                                </div>
                                <div class="service-details">
                                    <h3 class="mb-30"><?php the_title(); ?></h3>
                                    <p class="mb-20">
                                        <?php the_content(); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service-single -->

    </main>

<?php get_footer();