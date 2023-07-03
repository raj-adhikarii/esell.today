<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package esell
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$esell_comment_count = get_comments_number();
			if ( '1' === $esell_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'esell' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $esell_comment_count, 'comments title', 'esell' ) ),
					number_format_i18n( $esell_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'esell' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>
<div class="container">
<div class="product-single-review mt-5">
                                <h4>Reviews (20)</h4>
                                <div class="listing-single-comments">
                                    <div class="blog-comments mb-0">
                                        <div class="blog-comments-wrapper">
                                            <div class="blog-comments-single">
                                                <div class="blog-comments-img"><img src="assets/img/blog/com-1.jpg"
                                                        alt="thumb"></div>
                                                <div class="blog-comments-content">
                                                    <h5>Jesse Sinkler</h5>
                                                    <span><i class="far fa-clock"></i> 21 Dec, 2022</span>
                                                    <p>There are many variations of passages the majority have
                                                        suffered in some injected humour or randomised words which
                                                        don't look even slightly believable.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-comments-single blog-comments-reply">
                                                <div class="blog-comments-img"><img src="assets/img/blog/com-2.jpg"
                                                        alt="thumb"></div>
                                                <div class="blog-comments-content">
                                                    <h5>Daniel Wellman</h5>
                                                    <span><i class="far fa-clock"></i> 21 Dec, 2022</span>
                                                    <p>There are many variations of passages the majority have
                                                        suffered in some injected humour or randomised words which
                                                        don't look even slightly believable.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-comments-single">
                                                <div class="blog-comments-img"><img src="assets/img/blog/com-3.jpg"
                                                        alt="thumb"></div>
                                                <div class="blog-comments-content">
                                                    <h5>Kenneth Evans</h5>
                                                    <span><i class="far fa-clock"></i> 21 Dec, 2022</span>
                                                    <p>There are many variations of passages the majority have
                                                        suffered in some injected humour or randomised words which
                                                        don't look even slightly believable.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-comments-form">
                                            <h4 class="mb-4">Leave A Review</h4>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label class="star-label">Your Rating</label>
                                                            <div class="listing-review-form-star">
                                                                <div class="star-rating-wrapper">
                                                                    <div class="star-rating-box">
                                                                        <input type="radio" name="rating" value="5"
                                                                            id="star-5"> <label
                                                                            for="star-5">&#9733;</label>
                                                                        <input type="radio" name="rating" value="4"
                                                                            id="star-4"> <label
                                                                            for="star-4">&#9733;</label>
                                                                        <input type="radio" name="rating" value="3"
                                                                            id="star-3"> <label
                                                                            for="star-3">&#9733;</label>
                                                                        <input type="radio" name="rating" value="2"
                                                                            id="star-2"> <label
                                                                            for="star-2">&#9733;</label>
                                                                        <input type="radio" name="rating" value="1"
                                                                            id="star-1"> <label
                                                                            for="star-1">&#9733;</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                placeholder="Your Email*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="5"
                                                                placeholder="Your Review*"></textarea>
                                                        </div>
                                                        <button type="submit" class="theme-btn">Submit Review <i
                                                                class="far fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>

</div><!-- #comments -->
