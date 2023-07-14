<?php 
/* Template Name: Post Ad Template */
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



    <!-- user-profile -->
    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
                    <div class="user-profile-sidebar">
                        <div class="user-profile-sidebar-top">
                            <?php if ( is_user_logged_in() ) : ?>
                                <?php
                                    $current_user = wp_get_current_user();
                                    $user_profile_link = get_author_posts_url( $current_user->ID );
                                    $user_profile_image = get_avatar( $current_user->ID, 32 );
                                ?>
                                <div class="user-profile-img">
                                    <?php echo $user_profile_image; ?>
                                    <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                                    <input id="profile-img-upload" type="file" class="profile-img-file">
                                </div>
                                
                                <h5><?php echo esc_html( $current_user->display_name ); ?></h5>
                                <p><?php echo esc_html( $current_user->user_email ); ?></p>
                            <?php endif; ?>
                        </div>
                        <ul class="user-profile-sidebar-list">
                            <?php  
                                require get_template_directory() . '/inc/dashboard-sidebar.php'; 
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user-profile-wrapper">
                        <div class="ad-success-message"></div>
                        <div class="user-profile-card">
                            <h4 class="user-profile-card-title">Post Ads</h4>
                            <div class="col-lg-12">
                                <div class="post-ad-form">
                                    <h6 class="mb-4">Basic Information</h6>
                                    <form id="custom_post_ads_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                            $product_id=" ";  
                                            $product_title=" ";
                                            $edit_ad= " ";
                                            $price= " ";
                                            $description= " ";
                                            if(isset($_GET['edit'])):
                                                $product_id=$_GET['product_id'];
                                                $product=wc_get_product( $product_id );
                                                
                                                $product_title=$product->get_title();
                                                $category=get_the_terms($product_id,'product_cat');
                                                $price=get_post_meta($product_id,'_price',true);
                                                $tags=get_the_terms($product_id,'post_tag');
                                                $description=$product->description;
                                            endif;
                                            

                                        ?>
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text"  name="post_title" class="form-control" placeholder="Enter title" value="<?php echo $product_title ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Category</label>

                                                    <?php 
                                                        $terms = get_terms( array(
                                                            'taxonomy'   => 'product_cat',
                                                            'hide_empty' => false, // Set to true if you want to exclude empty categories
                                                        ) );
                                                    ?>

                                                    <input type="text" name="post_category" placeholder="Select Category" list="category-list" id="category-search">

                                                    <datalist id="category-list">
                                                        <?php	
                                                            if (isset($_GET['edit'])) {
                                                                ?>
                                                                <option value="<?php echo $category[0]->name ?>" selected><?php echo $category[0]->name ?></option>
                                                                <?php
                                                            } else {
                                                                if (!empty($terms)) {
                                                                    foreach ($terms as $item) {
                                                                        ?>
                                                                        <option value="<?php echo $item->name ?>"><?php echo $item->name ?></option>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <option value="uncategorized">Uncategorized</option>
                                                                    <?php  
                                                                }
                                                            }
                                                        ?>
                                                    </datalist>

                                                    <script>
                                                        jQuery(document).ready(function($) {
                                                            $('#category-search').on('input', function() {
                                                                var searchVal = $(this).val().toLowerCase();

                                                                $('#category-list option').each(function() {
                                                                    var categoryText = $(this).text().toLowerCase();
                                                                    var categoryValue = $(this).val();

                                                                    if (categoryText.indexOf(searchVal) !== -1) {
                                                                        $(this).show();
                                                                    } else {
                                                                        $(this).hide();
                                                                    }

                                                                    if (categoryValue === "") {
                                                                        $(this).show();
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Price (NPR)</label>
                                                    <input type="text" name="product_price" class="form-control" placeholder="Enter price" value="<?php echo $price ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 tags-keyword">
                                                <div class="form-group">
                                                    <label>Tags or keyword</label>
                                                    <input type="text" name="tags_keyword" class="form-control" placeholder="Enter tags ex: watch,laptop">
                                                </div>
                                            </div>
                                            <?php 
                                                $toggle_id=" ";
                                                if(isset($_GET['edit'])){
                                                    $toggle_id='id="upload-images-section"';
                                                    $edit_ad="data-edit='edit-ad'"; 
        
                                            ?>  
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" id="change-images-checkbox"> Change Images
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                            <div class="images-section" <?php echo $edit_ad ?>>
                                                <?php if (empty($product_images)) { ?>
                                                    <div class="col-lg-12" <?php echo $toggle_id ?>>
                                                        <input type="file" name="product_images[]" id="input" class="product-img-file" multiple>
                                                        <div id="preview-parent"></div>
                                                    </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <div class="product-upload-wrapper">
                                                        <div class="product-img-upload">
                                                            <span><i class="far fa-images"></i> Upload Product Images</span>
                                                        </div>
                                                        <?php if (empty($product_images)) { ?>
                                                            <input type="file" name="product_images[]" class="product-img-file" multiple>
                                                            <div class="alert alert-danger mt-2" id="error-message"></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            
                                            <h6 class="fw-bold my-4">Detailed Information</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" placeholder="Write description" cols="30" rows="5" ><?php echo  $description ?></textarea>

                                                    <!-- <?php
                                                        if(isset($_GET['edit'])){
                                                    ?>
                                                    <textarea name="description" class="form-control" placeholder="Write description" cols="30" rows="5" ><?php echo  $_GET['description'] ?></textarea>
                                                    <?php } ?> -->
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="agree" type="checkbox" value="" id="agree" required checked>
                                                    <label class="form-check-label" for="agree">
                                                        I Agree With Your Terms Of Services And Privacy Policy.
                                                    </label>
                                                  </div>
                                            </div>
                                            <div class="col-lg-12 my-4">
                                                <?php  
                                                    if(isset($_GET['edit'])){
                                                    ?>
                                                    <input type="hidden" name="edit_field" value="<?php echo $_GET['product_id'];  ?>">
                                                   <?php }
                                                ?>
                                                <button type="submit" id="custom_post_ads" class="theme-btn">Post Your Ads</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user-profile end -->
    
</main>
<?php get_footer(); 
   

