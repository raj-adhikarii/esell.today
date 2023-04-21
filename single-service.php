<?php get_header(); ?>

<main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title"><?php the_title(); ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="active">Service Single</li>
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
                                    <a href="#"><i class="far fa-file-alt"></i> Download Application</a>
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
                                    <h3 class="mb-30">Buy Item Directly</h3>
                                    <p class="mb-20">
                                        <?php the_content(); ?>
                                    </p>
                                    <p class="mb-20">
                                        But I must explain to you how all this mistaken idea of denouncing pleasure and
                                        praising pain was born and I will give you a complete account of the system, and
                                        expound the actual teachings of the great explorer of the truth, the
                                        master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                                        itself, because it is pleasure, but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that are extremely painful. Nor again
                                        is there anyone who loves or pursues or desires to obtain pain of itself,
                                        because it is pain, but because occasionally circumstances occur in which toil
                                        and pain can procure him some great pleasure. To take a trivial example
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6 mb-20">
                                            <img src="assets/img/service/01.jpg" alt="">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <img src="assets/img/service/02.jpg" alt="">
                                        </div>
                                    </div>
                                    <p class="mb-20">
                                        Power of choice is untrammelled and when nothing prevents our being able to do
                                        what we like best, every pleasure is to be welcomed and every pain avoided. But
                                        in certain circumstances and owing to the claims of duty or the obligations of
                                        business it will frequently occur that pleasures have to be repudiated and
                                        annoyances accepted. The wise man therefore always holds in these matters to
                                        this principle of selection.
                                    </p>
                                    <div class="my-4">
                                        <div class="mb-3">
                                            <h3 class="mb-3">Our Work Process</h3>
                                            <p>Aliquam facilisis rhoncus nunc, non vestibulum mauris volutpat non.
                                                Vivamus tincidunt accumsan urna, vel aliquet nunc commodo tristique.
                                                Nulla facilisi. Phasellus vel ex nulla. Nunc tristique sapien id mauris
                                                efficitur, porta scelerisque nisl dignissim. Vestibulum ante ipsum
                                                primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed at
                                                mollis tellus. Proin consequat, orci nec bibendum viverra, ante orci
                                                suscipit dolor, et condimentum felis dolor ac lectus.</p>
                                        </div>
                                        <ul class="service-single-list">
                                            <li><i class="far fa-check"></i>Fusce justo risus placerat in risus eget
                                                tincidunt consequat elit.</li>
                                            <li><i class="far fa-check"></i>Nunc fermentum sem sit amet dolor laoreet
                                                placerat.</li>
                                            <li><i class="far fa-check"></i>Nullam rhoncus dictum diam quis ultrices.
                                            </li>
                                            <li><i class="far fa-check"></i>Integer quis lorem est uspendisse eu augue
                                                porta ullamcorper dictum.</li>
                                            <li><i class="far fa-check"></i>Quisque tristique neque arcu ut venenatis
                                                felis malesuada et.</li>
                                        </ul>
                                    </div>
                                    <div class="my-4">
                                        <h3 class="mb-3">Service Features</h3>
                                        <p>Quisque a nisl id sem sollicitudin volutpat. Cras et commodo quam, vel congue
                                            ligula. Orci varius natoque penatibus et magnis dis parturient montes,
                                            nascetur ridiculus mus. Cras quis venenatis neque. Donec volutpat tellus
                                            lobortis mi ornare eleifend. Fusce eu nisl ut diam ultricies accumsan.
                                            Integer lobortis vestibulum nunc id porta. Curabitur aliquam arcu sed ex
                                            dictum, a facilisis urna porttitor. Fusce et mattis nisl. Sed iaculis libero
                                            consequat justo auctor iaculis. Vestibulum sed ex et magna tristique
                                            bibendum. Sed hendrerit neque nec est suscipit, id faucibus dolor convallis.
                                        </p>
                                    </div>
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