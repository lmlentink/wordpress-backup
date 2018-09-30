<?php
/**
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package PostMagazine
 */

$headerstyle = get_theme_mod( 'headerstyle', 'header1' );
 
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site <?php echo esc_attr(get_theme_mod( 'postmagazine_boxed_layout', 'full' ) ) ; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'postmagazine' ); ?></a>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'top' ); ?>
	
<div id="header-wrapper">
	<header id="masthead" class="site-header <?php echo esc_attr($headerstyle); ?>">
		<div class="container">
			<div class="row">			
				<div class="site-branding col-lg-12">		
						<?php	
							// is using a logo
							if ( has_custom_logo() ) {
								the_custom_logo();
							// if not using a logo
							} else {
								if ( is_front_page() && is_home() ) : ?>	
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif;

								$postmagazine_description = get_bloginfo( 'description', 'display' );
									if ( $postmagazine_description || is_customize_preview() ) :
								?>
									<p class="site-description"><?php echo $postmagazine_description; /* WPCS: xss ok. */ ?></p>
								<?php endif;			
							}	
						?>	
						
				</div><!-- .site-branding -->

				<div id="menu-wrapper" class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php 
								if ( has_nav_menu( 'primary' ) ) {
										wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_class' => 'nav-menu ',
											'menu_id' => 'main-nav',
											'container' => 'nav',
											'container_id' => 'main-nav-container'
										) ); 				
								} 
							?>				
						</div>
					</div>
				</div>			
			</div>
		</div>
	</header>
</div>

<?php if ( is_front_page() && esc_attr(get_theme_mod( 'postmagazine_show_slider', false ) ) ) : ?>
	<section id="post-slider"><?php get_template_part ( 'template-parts/header/featured-slider' ); ?></section>
<?php endif; ?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'featured' ); ?>

<?php if (is_front_page() && ( esc_attr(get_theme_mod( 'postmagazine_show_promoboxes', false ) ) ) ) :
	get_template_part( 'template-parts/promo', 'boxes' ); 
 endif; ?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'cta' ); ?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'content-top' ); ?>