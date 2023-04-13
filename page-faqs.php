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
                        <h2 class="accordion-header" id="<?php echo $head; ?>">
                            <?php $faqs_title = get_sub_field('faqs_title'); ?>
                           
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#<?php echo $counter; ?>" aria-expanded="true" aria-controls="<?php echo $counter; ?>">
                                <span><i class="far fa-question"></i></span> 
                                <?php if(!empty($faqs_title)): ?>
                                <?php echo ($faqs_title); ?>
                                <?php endif; ?>
                            </button>
                        </h2>
                        <div id="<?php echo $counter; ?>" class="accordion-collapse collapse show" aria-labelledby="<?php echo $head; ?>"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We denounce with righteous indignation and dislike men who
                                are so beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desirente odio dignissim quam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <span><i class="far fa-question"></i></span> How Can I Become A Member
                                ?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We denounce with righteous indignation and dislike men who
                                are so beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desirente odio dignissim quam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                <span><i class="far fa-question"></i></span> Can I Upgrade My Plan Any Time ?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We denounce with righteous indignation and dislike men who
                                are so beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desirente odio dignissim quam.
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
            $counter++;
            $head++;
            endwhile; ?>
                <div class="col-lg-6">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                <span><i class="far fa-question"></i></span> What Payment Gateway You Support ?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We denounce with righteous indignation and dislike men who
                                are so beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desirente odio dignissim quam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                <span><i class="far fa-question"></i></span> How Do I Change My Email Id ?
                            </button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We denounce with righteous indignation and dislike men who
                                are so beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desirente odio dignissim quam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                <span><i class="far fa-question"></i></span> How Do I Change My Email Id ?
                            </button>
                        </h2>
                        <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We denounce with righteous indignation and dislike men who
                                are so beguiled and demoralized by the charms of pleasure of the moment, so
                                blinded by desirente odio dignissim quam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- faq area end -->

</main>

<?php get_footer(); 