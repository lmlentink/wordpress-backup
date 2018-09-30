<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package PostMagazine
 */

 
 
/**
 * Change the blog loop for sticky posts
 * This will hide the sticky posts from the main blog loop for the front page, blog home, and archives
 */ 
 function postmagazine_hide_sticky($qry) {
  if (esc_attr(get_theme_mod( 'postmagazine_default_stickyposts', false ) ) && (is_front_page() || is_home() ) ) {
    $qry->set('post__not_in',get_option( 'sticky_posts' ));
  }
}
add_action('pre_get_posts','postmagazine_hide_sticky');
 

/**
 * Adds custom classes to the array of body classes.
 * @param array $classes Classes for the body element.
 * @return array
 */
function postmagazine_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'postmagazine_body_classes' );


//	Move the Continue Reading link outside of the post summary paragraph	
add_filter( 'the_content_more_link', 'postmagazine_move_more_link' );
	function postmagazine_move_more_link() {
	return '<p class="more-link-wrapper"><a class="readmore" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Read More', 'postmagazine' ) . '</a></p>';
}
	
// Replaces the excerpt "Read More" text by a link
function postmagazine_excerpt_more($more) {
       global $post;
	return '<a class="excerpt-readmore" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__( '&hellip;Read More', 'postmagazine' ) . '</a>';
}
add_filter('excerpt_more', 'postmagazine_excerpt_more');
	
	
// Custom excerpt size
function postmagazine_custom_excerpt_length( $length ) { 
	$postmagazine_excerpt_size = esc_attr(get_theme_mod( 'postmagazine_excerpt_size', '55' ));
	if ( is_admin() ) :
		return 55;		
	else: 	
		return $postmagazine_excerpt_size;
	endif;
	}
add_filter( 'excerpt_length', 'postmagazine_custom_excerpt_length', 999 );

/*
* Custom Excerpt Length
* Use postmagazine_excerpt(20); 
* This is REQUIRED for managing the slider exerpt size independently of the blog
* Does not affect the admin posts excerpt view.
*/

if ( ! function_exists( 'postmagazine_excerpt' ) ) {
	function postmagazine_excerpt( $limit = 50 ) {
	    echo '<p>'. esc_html( wp_trim_words( get_the_excerpt(), $limit)) .'</p>';
	}
}

// Display the related posts
if ( ! function_exists( 'postmagazine_related_posts' ) ) {

   function postmagazine_related_posts() {
      wp_reset_postdata();
      global $post;

      // Define shared post arguments
      $args = array(
         'no_found_rows'            => true,
         'update_post_meta_cache'   => false,
         'update_post_term_cache'   => false,
         'ignore_sticky_posts'      => 1,
         'orderby'               => 'rand',
         'post__not_in'          => array($post->ID),
         'posts_per_page'        => 3
      );
      // Related by categories
      if ( get_theme_mod('postmagazine_related_posts', 'categories') == 'categories' ) {

         $cats = get_post_meta($post->ID, 'related-posts', true);

         if ( !$cats ) {
            $cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
            $args['category__in'] = $cats;
         } else {
            $args['cat'] = $cats;
         }
      }
      // Related by tags
      if ( get_theme_mod('postmagazine_related_posts', 'categories') == 'tags' ) {

         $tags = get_post_meta($post->ID, 'related-posts', true);

         if ( !$tags ) {
            $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
            $args['tag__in'] = $tags;
         } else {
            $args['tag_slug__in'] = explode(',', $tags);
         }
         if ( !$tags ) { $break = true; }
      }

      $query = !isset($break)?new WP_Query($args):new WP_Query;
      return $query;
   }

}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function postmagazine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'postmagazine_pingback_header' );
