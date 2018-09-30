<?php
/**
 * Theme Info Page
 * Special thanks to the Consulting theme by ThinkUpThemes for this info page to be used as a foundation.
 * @package PostMagazine
 */
 
function postmagazine_info() {    


	// About page instance
	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme

		$theme_name    = trim( ucwords( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
		$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
		$theme_version = $theme_data->get( 'Version' );

	$config = array(
		// translators: %1$s: menu title under appearance
		'menu_name'             => sprintf( esc_html__( 'About %1$s', 'postmagazine' ), ucfirst( $theme_name ) ),
		// translators: %1$s: page name 
		'page_name'             => sprintf( esc_html__( 'About %1$s', 'postmagazine' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome title 
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %1$s - v', 'postmagazine' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome content 
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a beautifully designed blog magazine theme that is perfect for creating a lifestyle, health, food, and fashion based sites. Packed with features from being WooCommerce ready, unlimited colours, having 5 blog styled layouts, a featured post slider, 21 widget positions, and a whole lot more.', 'postmagazine' ), ucfirst( $theme_name ) ),
		
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => '//www.bloggingthemestyles.com/wordpress-themes/postmagazine-pro',
			'price_discount'  => __( 'Get the Pro for 25% off)', 'postmagazine' ),
			'price_normal'	  => __( 'Save 25% off the PostMagazine Pro regular price of $59. Offer EXPIRES April 30, 2018. Use this coupon at checkout.', 'postmagazine' ),
			'coupon'	      => 'PMPRO25',
			'button'	      => __( 'Upgrade &amp; Save 25%', 'postmagazine' ),
		),
		
		'tabs'                 => array(
			'getting_started'  => esc_html__( 'Getting Started', 'postmagazine' ),
			'support_content'  => esc_html__( 'Support', 'postmagazine' ),
			'changelog'           => esc_html__( 'Changelog', 'postmagazine' ),
			'free_pro'         => esc_html__( 'Free VS PRO', 'postmagazine' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'postmagazine' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out detailed setup documentation.', 'postmagazine' ) ),
				// translators: %1$s: theme name 
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'postmagazine' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/setup-postmagazine' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'postmagazine' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'postmagazine' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'postmagazine' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'postmagazine' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'postmagazine' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'postmagazine' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),

		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'postmagazine' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'postmagazine' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),			
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'postmagazine' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'Get free support by visiting the theme support forum and I will do my very best to answer your questions should you find yourself in need of help.', 'postmagazine' ),
				'button_label' => esc_html__( 'Get Free Support', 'postmagazine' ),
				'button_link'  => esc_url( '//www.bloggingthemestyles.com/support' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Common Problems', 'postmagazine' ),
				'icon'         => 'dashicons dashicons-editor-help',
				'text'         => esc_html__( 'For quick answers to the most common problems, you can check out the tutorials which can provide instant solutions and answers.', 'postmagazine' ),
				'button_label' => sprintf( esc_html__( 'Get Answers', 'postmagazine' ) ),
				'button_link'  => '//www.bloggingthemestyles.com/support/common-problems',
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => esc_html__('PostMagazine Pro','postmagazine' ),
			'pro_theme_link'      => '//www.bloggingthemestyles.com/wordpress-themes/postmagazine-pro/',
			'get_pro_theme_label' => sprintf( esc_html__( 'Get PostMagazine Pro', 'postmagazine' ) ),
			'features'            => array(
				array(
					'title'            => esc_html__( 'Mobile Friendly', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Unlimited Colours', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Boxed Layouts', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Post Slider', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Background Image', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Built-In Social Buttons', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Show or Hide Elements', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Custom Error Page', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				
				array(
					'title'            => esc_html__( 'Blog Styles', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '5',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '14',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Sidebar Positions', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '21',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '31',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Page Templates', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '5',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Font Awesome (New version 5) Icons', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Recent Posts Widget with Thumbnails', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Related Posts with Thumbnails', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Theme Options', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Support', 'postmagazine' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Header Options', 'postmagazine' ),
					'description'      => esc_html__('4 Header styles for the Pro version', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Custom Blog Title &amp; Introduction', 'postmagazine' ),
					'description'      => esc_html__('WordPress does not have this, but we have added a customizable blog title and intro option.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Blog Thumbnail Creation', 'postmagazine' ),
					'description'      => esc_html__('Automatically have post featured images cropped when uploading.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Featured Image Captions for Posts', 'postmagazine' ),
					'description'      => esc_html__('Enhance your post featured images with captions', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Post Formats', 'postmagazine' ),
					'description'      => esc_html__('Post formats include image, gallery, aside, video, quote, link, audio....posted with a linked label.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				
				array(
					'title'            => esc_html__( 'Custom Header Images', 'postmagazine' ),
					'description'      => esc_html__('One of the header styles, this lets you use the WordPress custom image header feature.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Add Google Fonts', 'postmagazine' ),
					'description'      => esc_html__('Add up to 2 more Google Fonts.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Typography Options', 'postmagazine' ),
					'description'      => esc_html__('Change the font for your main text and headings, and more.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Customized Archive Titles', 'postmagazine' ),
					'description'      => esc_html__('No more archive titles like Category: Your Category Name. Now it you get the Category: removed.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
			
				array(
					'title'            => esc_html__( 'Featured Sticky Post', 'postmagazine' ),
					'description'      => esc_html__('Make your featured post stand out with special style.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				
				array(
					'title'            => esc_html__( 'Custom Promo Image Widget', 'postmagazine' ),
					'description'      => esc_html__('Upload images and set a visual caption with a Read More button link.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				
				array(
					'title'            => esc_html__( 'Advertising Banner Widgets', 'postmagazine' ),
					'description'      => esc_html__('Special advertising widgets based on industry standard banner sizes.', 'postmagazine'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
		
				
			),
		),
	);
	postmagazine_info_page::init( $config );

}

add_action('after_setup_theme', 'postmagazine_info');

?>