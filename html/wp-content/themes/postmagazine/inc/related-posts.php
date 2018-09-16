<?php
/**
 * Related Posts for full post
 * @package PostMagazine
*/
?>


<?php $related_posts = postmagazine_related_posts(); 
 if ( $related_posts->have_posts() ): ?>

<h4 id="related-posts-heading"><span><?php esc_html_e('You may also like these posts:', 'postmagazine'); ?></span></h4>

<ul id="related-posts" class="row align-items-center">
   <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
  
	<li class="col-lg-4">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php if ( has_post_thumbnail() ): ?>
				<div id="related-posts-thumbnail">          
			<?php the_post_thumbnail('postmagazine-related-posts'); ?>         
				</div>
			<?php else: ?>
				<div id="related-posts-thumbnail">          
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-related.png" alt="<?php esc_html_e( 'related-post', 'postmagazine');?>"/>          
				</div>
			<?php endif; ?>
			<div id="related-posts-content">
				<h3 id="related-posts-title">
				<?php the_title(); ?>
				</h3>
			</div>
		</a>
	</li>
	
   <?php endwhile; ?>
</ul>
<hr id="related-post-footer">

<?php endif; 
 wp_reset_query(); ?>