<?php
/**
 * Custom template for pages
 *
 * @package WordPress
 * @since 1.0.0.4
 */
?>
<?php get_header(); ?>

	<!-- layout-container -->
	<div id="page-layout" class="pagewidth clearfix">

		<!-- content -->
		<div id="content" class="clearfix">
			<?php content_start(); ?>

			<?php
			////////////////   404	  ///////////////
			if ( is_404() ): ?>
				<h1 class="page-title"><?php _e( '404'); ?></h1>
				<p><?php _e( 'Page not found.'); ?></p>
			<?php endif; ?>

			<?php
			////////////////   PAGE	  ///////////////
			?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div id="page-<?php the_ID(); ?>" class="type-page">

					<!-- page-title -->
					
					<!-- /page-title -->

					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="post-image"><meta itemprop="image" content="<?php echo esc_url( wp_get_attachment_thumb_url( get_post_thumbnail_id() ) ); ?>" />
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( base_get( 'setting-page_layout_image_size', 'large' ) ); ?>
							</a>
						</figure>
					<?php endif; // has post thumbnail ?>

					<div class="page-content">

						<?php the_content(); ?>

						<?php wp_link_pages( array(
							'before'         => '<p><strong>' . __( 'Pages:') . '</strong> ',
							'after'          => '</p>',
							'next_or_number' => 'number'
						) ); ?>

						<?php edit_post_link( __( 'Edit')); ?>

						<!-- comments -->
						<?php comments_template(); ?>
						<!-- /comments -->

					</div>
					<!-- /.post-content -->

				</div>
				<!-- /.type-page -->
			<?php endwhile; endif; ?>

			<?php content_end(); // hook ?>
		</div>
		<!-- /content -->
		<?php content_after(); // hook ?>

		<?php
        ////////////////   SIDEBAR	 ///////////////
		get_sidebar(); ?>

	</div>
<!-- /layout-container -->

<?php get_footer(); ?>
