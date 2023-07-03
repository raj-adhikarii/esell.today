<?php 
// Template Name: Legal Template
get_header(); ?>
<main class="main">
<!-- breadcrumb -->
<?php if(has_post_thumbnail($post ->ID)):
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
    ?>
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

 <!-- legal-start  -->
 <div class="service-single-area py-120">
            <div class="container">
                <div class="service-single-wrapper legal">
                    <?php if(have_rows('legal')): ?>
                    <div class="row">
                        <?php while(have_rows('legal')): the_row(); ?>
                        <div class="col-xl-8 col-lg-8 mx-auto">
                                <div class="service-details">

                                <?php 
                                    $title = get_sub_field('title'); ?>
                                        <?php if(!empty($title)): ?>
                                            <h1 class="mb-30"><?php echo ($title); ?></h1>
                                        <?php endif; ?>

                                    <div class="service-details-img mb-30">
                                        <!-- <?php
                                        $help_image = get_sub_field('help_topic_image'); ?>

                                        <?php if(!empty($help_image)): ?>
                                            <img src="<?php echo $help_image['url']; ?>" alt="<?php echo $help_image['alt']; ?>">
                                        <?php endif; ?> -->
                                    </div>
                                    <div class="service-details">
                                        <?php
                                            $desc = get_sub_field('desc'); ?>
                                                <?php if(!empty($desc)) : ?>
                                                    <?php echo ($desc); ?>
                                                <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- help-end -->
</main>
<?php get_footer();