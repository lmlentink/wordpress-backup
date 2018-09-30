<?php
/**
 * Add inline styles to the head area
 * @package PostMagazine
*/
 
 // Dynamic styles
function postmagazine_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	

// content
	$postmagazine_content_bg = get_theme_mod( 'postmagazine_content_bg', '#fff' );
	$postmagazine_body_text = get_theme_mod( 'postmagazine_body_text', '#656565' );
	$postmagazine_site_footer_bg = get_theme_mod( 'postmagazine_site_footer_bg', '#1f1f1f' );
	$postmagazine_site_footer_text = get_theme_mod( 'postmagazine_site_footer_text', '#cacaca' );
	$postmagazine_header_bg = get_theme_mod( 'postmagazine_header_bg', '#0f0f0f' );
	$postmagazine_sitetitle = get_theme_mod( 'postmagazine_sitetitle', '#fff' );
	$postmagazine_sitetagline = get_theme_mod( 'postmagazine_sitetagline', '#c1c1c1' );
	$postmagazine_link_colour = get_theme_mod( 'postmagazine_link_colour', '#83c1ef' );
	$postmagazine_link_vcolour = get_theme_mod( 'postmagazine_link_vcolour', '#5b8fbd' );
	$postmagazine_link_hcolour = get_theme_mod( 'postmagazine_link_hcolour', '#83c1ef' );	
	$postmagazine_readmore_bg = get_theme_mod( 'postmagazine_readmore_bg', '#7dafd2' );
	$postmagazine_readmore_label = get_theme_mod( 'postmagazine_readmore_label', '#fff' );
	$postmagazine_blockquote_border = get_theme_mod( 'postmagazine_blockquote_border', '#7dafd2' );
	$postmagazine_blockquote_bg = get_theme_mod( 'postmagazine_blockquote_bg', '#fff' );
	$postmagazine_blockquote_text = get_theme_mod( 'postmagazine_blockquote_text', '#808080' );	
	$postmagazine_headings = get_theme_mod( 'postmagazine_headings', '#000' );	
	$postmagazine_entry_title = get_theme_mod( 'postmagazine_entry_title', '#484848' );
	$postmagazine_sticky_bg = get_theme_mod( 'postmagazine_sticky_bg', '#f1eee8' );
	$postmagazine_sticky_text = get_theme_mod( 'postmagazine_sticky_text', '#656565' );
	$postmagazine_related_bg = get_theme_mod( 'postmagazine_related_bg', '#2d8477' );
	$postmagazine_related_text = get_theme_mod( 'postmagazine_related_text', '#fff' );
	$postmagazine_image_viewer_bg = get_theme_mod( 'postmagazine_image_viewer_bg', '#0f0f0f' );
	$postmagazine_featured_image_caption_bg = get_theme_mod( 'postmagazine_featured_image_caption_bg', '#0f0f0f' );
	$postmagazine_featured_image_caption = get_theme_mod( 'postmagazine_featured_image_caption', '#fff' );	
	$postmagazine_text_selection_bg = get_theme_mod( 'postmagazine_text_selection_bg', '#f1eee8' );
	$postmagazine_text_selection_text = get_theme_mod( 'postmagazine_text_selection_text', '#656565' );	
	$custom .= "body {color:" . esc_attr($postmagazine_body_text) . "}
	#page {background-color:" . esc_attr($postmagazine_content_bg) . "}
	#site-footer {background-color:" . esc_attr($postmagazine_site_footer_bg) . ";}
	#site-footer, #site-footer a, #site-footer .widget-title {color:" . esc_attr($postmagazine_site_footer_text) . "}
	#masthead {background-color:" . esc_attr($postmagazine_header_bg) . "}
	a {color:" . esc_attr($postmagazine_link_colour) . "}
	a:visited {color:" . esc_attr($postmagazine_link_vcolour) . "}
	a:hover {color:" . esc_attr($postmagazine_link_hcolour) . "}	
	a.readmore, a.readmore:visited {background-color:" . esc_attr($postmagazine_readmore_bg) . "; color:" . esc_attr($postmagazine_readmore_label) . ";}
	.entry-title, .entry-title a {color:" . esc_attr($postmagazine_entry_title) . ";}
	.sticky-wrapper .hentry {background-color:" . esc_attr($postmagazine_sticky_bg) . "; color:" . esc_attr($postmagazine_sticky_text) . ";}	
	blockquote {background-color:" . esc_attr($postmagazine_blockquote_bg) . "; border-color:" . esc_attr($postmagazine_blockquote_border) . ";color:" . esc_attr($postmagazine_blockquote_text) . ";}
	h1,h2,h3,h4,h5,h6,.entry-title a,.entry-title a:visited {color:" . esc_attr($postmagazine_headings) . ";}
	.related-posts-content {background-color:" . esc_attr($postmagazine_related_bg) . "; }
	.related-posts a, .related-posts a:visited {color:" . esc_attr($postmagazine_related_text) . "; }
	#attachment-wrapper {background-color:" . esc_attr($postmagazine_image_viewer_bg) . "; }
	.post-caption {background-color:" . esc_attr($postmagazine_featured_image_caption_bg) . "; color:" . esc_attr($postmagazine_featured_image_caption) . ";}
	::selection {background-color:" . esc_attr($postmagazine_text_selection_bg) . "; color:" . esc_attr($postmagazine_text_selection_text) . ";}
	"."\n";

// sidebars
	$postmagazine_top_left_bg = get_theme_mod( 'postmagazine_top_left_bg', '#58819e' );
	$postmagazine_top_right_bg = get_theme_mod( 'postmagazine_top_right_bg', '#58819e' );
	$postmagazine_top_left_text = get_theme_mod( 'postmagazine_top_left_text', '#fff' );
	$postmagazine_top_right_text = get_theme_mod( 'postmagazine_top_right_text', '#fff' );	
	$postmagazine_lr_widget_title = get_theme_mod( 'postmagazine_lr_widget_title', '#fff' );
	$postmagazine_lr_widget_title_bg = get_theme_mod( 'postmagazine_lr_widget_title_bg', '#7dafd2' );
	$postmagazine_widget_title = get_theme_mod( 'postmagazine_widget_title', '#0f0f0f' );	
	$postmagazine_bottom_widget_title = get_theme_mod( 'postmagazine_bottom_widget_title', '#e7f0f7' );	
	$postmagazine_bottom_bg = get_theme_mod( 'postmagazine_bottom_bg', '#58819e' );
	$postmagazine_bottom_sidebar_text = get_theme_mod( 'postmagazine_bottom_sidebar_text', '#d1e5f3' );
	$custom .= "#topleft {background-color:" . esc_attr($postmagazine_top_left_bg) . "; }
	#topright {background-color:" . esc_attr($postmagazine_top_right_bg) . "; }
	#topleft, #topleft a, #topleft a:visited, #topleft .widget-title {color:" . esc_attr($postmagazine_top_left_text) . ";}
	#topright, #topright a, #topright a:visited, #topright .widget-title {color:" . esc_attr($postmagazine_top_right_text) . ";}
	#left-sidebar .widget-title, #right-sidebar .widget-title {background-color:" . esc_attr($postmagazine_lr_widget_title_bg) . "; color:" . esc_attr($postmagazine_lr_widget_title) . "}
	.widget-title {color:" . esc_attr($postmagazine_widget_title) . "}
	#bottom-sidebar .widget-title {color:" . esc_attr($postmagazine_bottom_widget_title) . "}
	#bottom-sidebar,  #bottom-sidebar a {color:" . esc_attr($postmagazine_bottom_sidebar_text) . "}
	#bottom-sidebar {background-color:" . esc_attr($postmagazine_bottom_bg) . ";}
	"."\n";	
	
// navigation
	$postmagazine_social_bg = get_theme_mod( 'postmagazine_social_bg', '#7dafd2' );
	$postmagazine_social_hbg = get_theme_mod( 'postmagazine_social_hbg', '#d3edff' );
	$postmagazine_social_icon = get_theme_mod( 'postmagazine_social_icon', '#fff' );
	$postmagazine_mobile_toggle_bg = get_theme_mod( 'postmagazine_mobile_toggle_bg', '#7dafd2' );
	$postmagazine_mobile_toggle_icon = get_theme_mod( 'postmagazine_mobile_toggle_icon', '#fff' );
	$postmagazine_mobile_bg = get_theme_mod( 'postmagazine_mobile_bg', '#000' );
	$postmagazine_mobile_links = get_theme_mod( 'postmagazine_mobile_links', '#c5c5c5' );
	$postmagazine_mobile_hlinks = get_theme_mod( 'postmagazine_mobile_hlinks', '#d6c293' );	
	$postmagazine_menu_links = get_theme_mod( 'postmagazine_menu_links', '#fff' );
	$postmagazine_menu_hlinks = get_theme_mod( 'postmagazine_menu_hlinks', '#d6c293' );
	$postmagazine_submenu_bg = get_theme_mod( 'postmagazine_submenu_bg', '#0f0f0f' );
	$postmagazine_submenu_border = get_theme_mod( 'postmagazine_submenu_border', '#0f0f0f' );
	$postmagazine_submenu_link_border = get_theme_mod( 'postmagazine_submenu_link_border', '#272727' );	
	$postmagazine_breadcrumb_bg = get_theme_mod( 'postmagazine_breadcrumb_bg', '#f1eee8' );
	$postmagazine_breadcrumbs_text = get_theme_mod( 'postmagazine_breadcrumbs_text', '#656565' );
	$postmagazine_scrolltotop = get_theme_mod( 'postmagazine_scrolltotop', '#7dafd2' );
	$custom .= "#breadcrumbs-sidebar {background-color:" . esc_attr($postmagazine_breadcrumb_bg) . "}
	#breadcrumbs-sidebar, #breadcrumbs a {color:" . esc_attr($postmagazine_breadcrumbs_text) . "}
	.social-menu a {background-color:" . esc_attr($postmagazine_social_bg) . "}
	.social-menu a:before {color:" . esc_attr($postmagazine_social_icon) . "}	
	.social-menu a:focus,.social-menu a:hover {background-color:" . esc_attr($postmagazine_social_hbg) . "}
	.scrolltop:hover {color:" . esc_attr($postmagazine_social_hbg) . "}
	#mobile-nav-toggle, body.mobile-nav-active #mobile-nav-toggle {background-color:" . esc_attr($postmagazine_mobile_toggle_bg) . "; color:" . esc_attr($postmagazine_mobile_toggle_icon) . "}	
	#mobile-nav {background-color:" . esc_attr($postmagazine_mobile_bg) . ";}	
	#mobile-nav ul li a, #mobile-nav ul .menu-item-has-children i.fa-angle-up, #mobile-nav ul i.fa-angle-down {color:" . esc_attr($postmagazine_mobile_links) . ";}	
	#mobile-nav ul li a:hover, #mobile-nav ul .current_page_item a {color:" . esc_attr($postmagazine_mobile_hlinks) . ";}
	#main-nav a {color:" . esc_attr($postmagazine_menu_links) . ";}
	#main-nav a:hover, #main-nav li:hover > a,#main-nav .current-menu-item > a,#main-nav .current-menu-ancestor > a {color:" . esc_attr($postmagazine_menu_hlinks) . ";}	
	#main-nav a {border-color:" . esc_attr($postmagazine_submenu_border) . ";}	
	#main-nav ul {background-color:" . esc_attr($postmagazine_submenu_bg) . "; border-color:" . esc_attr($postmagazine_submenu_border) . ";}
	#main-nav ul li {border-color:" . esc_attr($postmagazine_submenu_link_border) . ";}
	.scrolltop {color:" . esc_attr($postmagazine_scrolltotop) . ";}
	"."\n";

// widgets
	$postmagazine_promo_image = get_theme_mod( 'postmagazine_promo_image', '#7dafd2' );
	$postmagazine_promo_image_text = get_theme_mod( 'postmagazine_promo_image_text', '#fff' );
	$postmagazine_promo_image_readmore = get_theme_mod( 'postmagazine_promo_image_readmore', '#d3edff' );
	$postmagazine_recentposts_title_bg = get_theme_mod( 'postmagazine_recentposts_title_bg', '#0f0f0f' );
	$postmagazine_recentposts_title = get_theme_mod( 'postmagazine_recentposts_title', '#fff' );	
	$custom .= ".promo-image-caption-box {background-color:" . esc_attr($postmagazine_promo_image) . "; color:" . esc_attr($postmagazine_promo_image_text) . "}
	.promo-image-content {border-color:" . esc_attr($postmagazine_promo_image) . "}
	.promo-image-readmore a {color:" . esc_attr($postmagazine_promo_image_readmore) . "}
	.widget_pm-recent-posts h4 {background-color:" . esc_attr($postmagazine_recentposts_title_bg) . ";}
	.widget_pm-recent-posts h4 a {color:" . esc_attr($postmagazine_recentposts_title) . "}
	"."\n";	

// forms
	$postmagazine_button_bg = get_theme_mod( 'postmagazine_button_bg', '#7dafd2' );
	$postmagazine_button_hbg = get_theme_mod( 'postmagazine_button_hbg', '#0f0f0f' );
	$postmagazine_button_text = get_theme_mod( 'postmagazine_button_text', '#fff' );
	$custom .= "input[type=submit],input[type=reset],button,.button,input[type=submit]:visited,input[type=reset]:visited,button:visited,.button:visited {background-color:" . esc_attr($postmagazine_button_bg) . "; color:" . esc_attr($postmagazine_button_text) . "}
	input[type=submit]:hover,input[type=submit]:focus,input[type=reset]:hover,input[type=reset]:focus,button:hover,button:focus,.button:hover,.button:focus {background-color:" . esc_attr($postmagazine_button_hbg) . "; color:" . esc_attr($postmagazine_button_text) . "}	"."\n";

// slider
	$postmagazine_slider_arrows = get_theme_mod( 'postmagazine_slider_arrows', '#7dafd2' );
	$postmagazine_slider_dots = get_theme_mod( 'postmagazine_slider_dots', '#e0e0e0' );
	$postmagazine_slider_active_dots = get_theme_mod( 'postmagazine_slider_active_dots', '#fff' );
	
	$postmagazine_slider_category = get_theme_mod( 'postmagazine_slider_category', '#c1dff9' );
	$postmagazine_slider_title = get_theme_mod( 'postmagazine_slider_title', '#fff' );
	$postmagazine_slider_excerpt = get_theme_mod( 'postmagazine_slider_excerpt', '#fff' );
	$postmagazine_slider_readmore_button = get_theme_mod( 'postmagazine_slider_readmore_button', '#7dafd2' );
	$postmagazine_slider_readmore_label = get_theme_mod( 'postmagazine_slider_readmore_label', '#fff' );
	$custom .= "#featured-slider .prev-arrow, #featured-slider .next-arrow {color:" . esc_attr($postmagazine_slider_arrows) . "}
	.slider-dots {color:" . esc_attr($postmagazine_slider_dots) . "}
	.slider-dots li:hover,.slick-active {color:" . esc_attr($postmagazine_slider_active_dots) . "; color:" . esc_attr($postmagazine_slider_active_dots) . "}
	.slide-category a {color:" . esc_attr($postmagazine_slider_dots) . "}
	.slider-title a {color:" . esc_attr($postmagazine_slider_title) . "}
	.slider-content {color:" . esc_attr($postmagazine_slider_excerpt) . "}
	.slider-readmore a {background-color:" . esc_attr($postmagazine_slider_readmore_button) . "; color:" . esc_attr($postmagazine_slider_readmore_label) . "}
	"."\n";	

// Woo Commerce
if( esc_attr(get_theme_mod( 'postmagazine_enable_woocommerce', false ) ) ) :
	$postmagazine_woo_tab = get_theme_mod( 'postmagazine_woo_tab', '#f1eee8' );
	$postmagazine_woo_active_tab = get_theme_mod( 'postmagazine_woo_active_tab', '#fff' );
	$postmagazine_woo_product_price = get_theme_mod( 'postmagazine_woo_product_price', '#7dafd2' );
	$postmagazine_woo_stars = get_theme_mod( 'postmagazine_woo_stars', '#d6ba77' );
	$postmagazine_woo_onsale_bg = get_theme_mod( 'postmagazine_woo_onsale_bg', '#0f0f0f' );
	$postmagazine_woo_onsale_text = get_theme_mod( 'postmagazine_woo_onsale_text', '#fff' );	
	$postmagazine_woo_thead_background = get_theme_mod( 'postmagazine_woo_thead_background', '#7dafd2' );	
	$postmagazine_woo_thead_text = get_theme_mod( 'postmagazine_woo_thead_text', '#fff' );
	$postmagazine_woo_myaccount_buttons = get_theme_mod( 'postmagazine_woo_myaccount_buttons', '#f1eee8' );
	$postmagazine_woo_myaccount_buttons_text = get_theme_mod( 'postmagazine_woo_myaccount_buttons_text', '#656565' );
		$postmagazine_woo_myaccount_hbuttons = get_theme_mod( 'postmagazine_woo_myaccount_hbuttons', '#7dafd2' );
	$postmagazine_woo_myaccount_buttons_htext = get_theme_mod( 'postmagazine_woo_myaccount_buttons_htext', '#fff' );
	$custom .= ".woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs li:hover {background-color:" . esc_attr($postmagazine_woo_tab) . "; }	
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active {background-color:" . esc_attr($postmagazine_woo_active_tab) . "; }	
	.summary.entry-summary .price {color:" . esc_attr($postmagazine_woo_product_price) . "; }	
	.star-rating span:before,p.stars.selected a:not(.active):before {color:" . esc_attr($postmagazine_woo_stars) . "; }
	.onsale {background-color:" . esc_attr($postmagazine_woo_onsale_bg) . "; color:" . esc_attr($postmagazine_woo_onsale_text) . "; }
	table.shop_table thead th {background-color:" . esc_attr($postmagazine_woo_thead_background) . "; color:" . esc_attr($postmagazine_woo_thead_text) . "; }
	li.woocommerce-MyAccount-navigation-link a {background-color:" . esc_attr($postmagazine_woo_myaccount_buttons) . "; color:" . esc_attr($postmagazine_woo_myaccount_buttons_text) . "; }
	li.woocommerce-MyAccount-navigation-link a:hover {background-color:" . esc_attr($postmagazine_woo_myaccount_hbuttons) . "; border-color:" . esc_attr($postmagazine_woo_myaccount_hbuttons) . "; color:" . esc_attr($postmagazine_woo_myaccount_buttons_htext) . "; }
	li.woocommerce-MyAccount-navigation-link a:before { color:" . esc_attr($postmagazine_woo_myaccount_buttons_text) . "; }
	li.woocommerce-MyAccount-navigation-link a:hover::before { color:" . esc_attr($postmagazine_woo_myaccount_buttons_htext) . "; }
	"."\n";
endif;
	
// dropcap		
	if( esc_attr(get_theme_mod( 'postmagazine_show_dropcap', false ) ) ) :
		$postmagazine_dropcap_colour = get_theme_mod( 'postmagazine_dropcap_colour', '#333' );		
		$custom .= ".single-post .entry-content > p:first-of-type::first-letter {
		font-weight: 700;
		font-style: normal;
		font-family: \"Times New Roman\", Times, serif;
		font-size: 5.25rem;
		font-weight: normal;
		line-height: 0.8;
		float: left;
		margin: 4px 0 0;
		padding-right: 8px;
		text-transform: uppercase;
		}
		.single-post .entry-content h2 ~ p:first-of-type::first-letter {
			font-size: initial;	
			font-weight: initial;	
			line-height: initial; 
			float: initial;	
			margin-bottom: initial;	
			padding-right: initial;	
			text-transform: initial;
		}	
		.single-post .entry-content > p:first-of-type::first-letter {color:" . esc_attr($postmagazine_dropcap_colour) . "}"."\n";
	endif;

 if ( is_active_sidebar('featured1') ) : 
	$custom .= "#content {padding: 1rem 25px 0;}"."\n";
 endif;
 
	
// END CUSTOM CSS

//Output all the styles
	wp_add_inline_style( 'postmagazine-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'postmagazine_inline_styles' );	