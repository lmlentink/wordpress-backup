<?php
/**
 * The template for displaying the footer
 * @package PostMagazine
 */
?>

	<div id="content-bottom-sidebar">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'content-bottom' ); ?>
	</div>

	<?php get_template_part( 'template-parts/sidebars/sidebar', 'featured-bottom' ); ?>
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>

	<footer id="site-footer">
	
	<!-- Scroll Top Button -->
	<span class="scrolltop">
		<i class="fas fa-arrow-circle-up"></i>
	</span>	
	
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>					
		<?php get_template_part( 'template-parts/navigation/navigation', 'social' ); ?>
		<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
		
		<p class="copyright">
		<?php esc_html_e('Copyright &copy;', 'postmagazine'); ?> 
		<?php 	echo date_i18n( esc_html__( 'Y', 'postmagazine' ) );  // WPCS: XSS OK ?>
		<?php echo esc_html(get_theme_mod( 'postmagazine_copyright' )); ?>. <?php esc_html_e('All rights reserved.', 'postmagazine'); ?>
		</p>
		
	</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
