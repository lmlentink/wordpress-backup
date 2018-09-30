<?php
/**
 * Template part for displaying page content in page.php
 * @package PostMagazine
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // featured image for pages
	if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php esc_url(the_permalink()); ?>">			
				<?php 	the_post_thumbnail( 'post-thumbnails' ); ?>
			</a>				
				
			<?php if( esc_attr(get_theme_mod( 'postmagazine_show_featured_captions', true ) ) ) {			
			$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
			  if(!empty($get_description) ) {
				  //If description is not empty show the div
			  echo '<div class="post-caption-container"><p class="post-caption">' . esc_html($get_description) . '</p></div>';
			  }
			  }
			?>								
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'postmagazine' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'postmagazine' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-inset' ); ?>
	
</article>
