<?php get_header(); 
// Template Name: FAQs Template ?>
<main class="main">

<!-- breadcrumb -->
<?php if(has_post_thumbnail($post ->ID)):
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
    ?>
<div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
    <div class="container">
        <h2 class="breadcrumb-title">Faq's</h2>
        <ul class="breadcrumb-menu">
            <li><a href="<?php echo site_url(); ?>">Home</a></li>
            <li class="active">Faq's</li>
        </ul>
    </div>
</div>
<?php endif; ?>


<!-- faq area -->
<div class="faq-area py-120">
    <div class="container">
        <?php 
        $counter = 1;
        $head = 100;
        if(have_rows('faqs_section')): ?>

        <div class="accordion" id="accordionExample">
            <div class="row">
                <?php while(have_rows('faqs_section')): the_row(); ?>
                <div class="col-lg-6">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?php echo $counter; ?>">
                            <?php $faqs_title = get_sub_field('faqs_title'); ?>
                           
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-<?php echo $counter; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $counter; ?>">
                                <span><i class="far fa-question"></i></span> 
                                <?php if(!empty($faqs_title)): ?>
                                    <?php echo ($faqs_title); ?>
                                <?php endif; ?>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $counter; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $counter; ?>"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php
                                $faqs_desc = get_sub_field('faqs_desc'); ?>
                                <?php if(!empty($faqs_desc)): ?>
                                    <?php echo ($faqs_desc); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            $counter++;
            endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- faq area end -->

</main>

<?php get_footer(); 