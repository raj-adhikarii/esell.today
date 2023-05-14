<?php 
// Template Name: Buy and sell Template
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

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam aspernatur dignissimos vero pariatur repellat aliquam, tempora alias nostrum maxime, velit a quasi eius suscipit. Dolorem inventore quaerat labore veritatis, distinctio porro ipsa amet recusandae omnis adipisci id mollitia quae cum voluptate, aspernatur magni. Atque modi eius neque! Vero perferendis quibusdam explicabo. Aspernatur modi, ea distinctio tempore quo possimus illum facere.</p>

</main>


<?php get_footer();
