<?php
/**
 * Template part for displaying posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package PostMagazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
	<div class="entry-content-wrapper">						
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php esc_url(the_permalink()); ?>">			
				<?php 
				if ( esc_attr(get_theme_mod( 'postmagazine_default_thumbnails', false )) ) :
					the_post_thumbnail( 'default' );  
				else :
					the_post_thumbnail( 'post-thumbnails' ); 
				endif;				
				?>
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
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}		
		if ( 'post' === get_post_type()) {
			echo '<ul class="entry-meta">';
				if ( is_single() ) {
					postmagazine_posted_on();
				} else {
					postmagazine_time_link();
				};
			echo '</ul>';
		};
		?>								
	</header>
	
	<div class="entry-content">
		<?php
		if ( esc_attr(get_theme_mod( 'postmagazine_use_excerpt', 1 )) ) :
			the_excerpt();
		else :
		
			the_content( sprintf(
			/* translators: %s: Name of current post */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'postmagazine' ),
				get_the_title()
			) );
			
			endif;			
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'postmagazine' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div>

	<footer class="entry-footer">
	
	</footer>
	</div>
</article>	
