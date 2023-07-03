<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package esell
 */

?>
	<div class="col-md-4">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="blog-item">
				<div class="blog-item-img">
					<?php esell_post_thumbnail(); ?>									
				</div>

				<div class="blog-item-info">
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="blog-item-meta">
							<ul>
								<li><a href="<?php the_permalink(); ?>"><i class="far fa-user-circle"></i> <?php esell_posted_by(); ?> </a></li>
								<li><a href="<?php the_permalink(); ?>"><i class="far fa-calendar-alt"></i><?php esell_posted_on(); ?></a></li>
							</ul>
						</div>
					<?php endif; ?>
					<h4 class="blog-title">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</h4>
					<footer class="entry-footer">
						<?php esell_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->
    </div>

