<?php
/**
 * PostMagazine Theme Customizer
 * @package PostMagazine
 */

/**
 * Control type.
 * @access public
 * @var string
 */
if ( ! class_exists( 'PostMagazine_Customize_Static_Text_Control' ) ){
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class PostMagazine_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="PostMagazine-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="PostMagazine-description PostMagazine-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('PostMagazine Pro', 'postmagazine') ?></h1>
			<p><?php esc_html_e('Opt in for the pro version of PostMagazine and enjoy many additional features that will add more options. Here is a sample of what you will get:','postmagazine'); ?></p>
			<p style="font-weight: 700;"><?php esc_html_e('Pro Features:', 'postmagazine') ?></p>
			<ul>
				<li><?php esc_html_e('&bull; 14 Blog Styles', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; 31 Sidebar Positions', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; 4 Header Styles', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; 5 Page Templates', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Special Featured Sticky Post', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Post Formats', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Promo Image Widget', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Advertising Banner Widgets', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Custom Blog Title &amp; Intro', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Add More Google Fonts', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Typography Options', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Custom Archive Titles', 'postmagazine')?></li>
				<li><?php esc_html_e('&bull; Page Builder Ready', 'postmagazine')?></li>
			</ul>
			
			<p><a class="button" href="<?php echo esc_url('https://www.bloggingthemestyles.com/wordpress-themes/postmagazine-pro'); ?>" target="_blank"><?php esc_html_e( 'Get the Pro', 'postmagazine' ); ?></a></p>				
			<?php
			endif;
		}
	}
}	

 /*
 * This loads categories for our slider dropdown select
 */
function postmagazine_cats() {
	$cats = array();
	$cats[0] = 'All';

	foreach ( get_categories() as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}
	return $cats;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function postmagazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'postmagazine_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'postmagazine_customize_partial_blogdescription',
		) );
	}

   // SECTION - EQUABLE UPGRADE
    $wp_customize->add_section( 'postmagazine_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'postmagazine' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'postmagazine_upgrade', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new PostMagazine_Customize_Static_Text_Control( $wp_customize, 'postmagazine_upgrade', array(
			'label'	=> esc_html__('Get The Pro Version:','postmagazine'),
			'section'	=> 'postmagazine_upgrade',
			'description' => array('')
		) ) );	
		
// SECTION - THEME OPTIONS
	$wp_customize->add_section( 'postmagazine_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'postmagazine' ),
		'priority' => 20, 
	) );	
	
	// Setting group for the boxed layout
	$wp_customize->add_setting( 'postmagazine_boxed_layout', array(
		'default' => 'full',
		'sanitize_callback' => 'postmagazine_sanitize_select',
	) );  
	$wp_customize->add_control( 'postmagazine_boxed_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Boxed Layout', 'postmagazine' ),
		  'section' => 'postmagazine_theme_options',
		  'choices' => array(
			  'full' => esc_html__( 'Full Width', 'postmagazine' ),
			  'boxed1800' => esc_html__( 'Boxed 1800px Width', 'postmagazine' ),
			  'boxed1600' => esc_html__( 'Boxed 1600px Width', 'postmagazine' ),
			  'boxed1400' => esc_html__( 'Boxed 1400px Width', 'postmagazine' ),			 
	) ) );	
			
	// Setting group for blog layout
	$wp_customize->add_setting( 'postmagazine_blog_layout', array(
		'default' => 'blog1',
		'sanitize_callback' => 'postmagazine_sanitize_select',
	) );  
	$wp_customize->add_control( 'postmagazine_blog_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Layout', 'postmagazine' ),
		  'section' => 'postmagazine_theme_options',
		  'choices' => array(	
				'blog1' => esc_html__( 'Default With Right Sidebar', 'postmagazine' ),	  
				'blog2' => esc_html__( 'Default With Left Sidebar', 'postmagazine' ),		
				'blog3' => esc_html__( 'List With No Sidebar', 'postmagazine' ),				
				'blog4' => esc_html__( 'List With Right Sidebar', 'postmagazine' ),
				'blog5' => esc_html__( 'List With Left Sidebar', 'postmagazine' ),						
		) ) );	

	// Setting group for full post (single) layout  
	$wp_customize->add_setting( 'postmagazine_single_layout', array(
		'default' => 'single1',
		'sanitize_callback' => 'postmagazine_sanitize_select',
	) );  
	$wp_customize->add_control( 'postmagazine_single_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Full Post Style', 'postmagazine' ),
		  'section' => 'postmagazine_theme_options',
		  'choices' => array(	
				'single1' => esc_html__( 'Single With Right Sidebar', 'postmagazine' ),	 
				'single2' => esc_html__( 'Single With Left Sidebar', 'postmagazine' ), 
				'single3' => esc_html__( 'Single With No Sidebars', 'postmagazine' ),
		) ) );	
		
	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'postmagazine_use_excerpt',  array(
		  'default' => 1,
		  'sanitize_callback' => 'postmagazine_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'postmagazine_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Excerpts', 'postmagazine' ),
		'description' => esc_html__( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag. NOTE: Some blog styles only use excerpts.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	  ) );

    // Excerpt size
    $wp_customize->add_setting( 'postmagazine_excerpt_size',  array(        
            'default'           => '55', 
			'sanitize_callback' => 'absint',
        ) );
    $wp_customize->add_control( 'postmagazine_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'postmagazine_theme_options',
        'label'       => esc_html__('Excerpt Size', 'postmagazine'),
		'description' => esc_html__('You can change the size of your blog summary excerpts with increments of 5 words.', 'postmagazine'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 1,
        ),
    ) );	  

	// Use FontAwesome version 4
	$wp_customize->add_setting( 'postmagazine_fa4',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_fa4', array(
		'type'     => 'checkbox',
		'label'    => __( 'Use FontAwesome 4', 'postmagazine' ),
		'description' => __( 'For compatibility reasons when using the new FontAwesome version 4 (turned off by default). You also have the option to disable both v4 and v5 if you are using a plugin for Font Awesome.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );

	// Use FontAwesome version 5
	$wp_customize->add_setting( 'postmagazine_fa5',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_fa5', array(
		'type'     => 'checkbox',
		'label'    => __( 'Use FontAwesome 5', 'postmagazine' ),
		'description' => __( 'For compatibility reasons when using the new FontAwesome version 5 (turned on by default), if you find icons are missing or look odd, you can switch to FontAwesome version 4. You also have the option to disable both v4 and v5 if you are using a plugin for Font Awesome.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );
	
	// Show featured label
	$wp_customize->add_setting( 'postmagazine_show_featured_tag',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_featured_tag', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Tag', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the featured tag in the post meta info.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );

	// Show format label
	$wp_customize->add_setting( 'postmagazine_show_post_format',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_post_format', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Format', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the post format linked tag in the post meta info.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );
	
	// Show featured image captions
	$wp_customize->add_setting( 'postmagazine_show_featured_captions',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_featured_captions', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Image Captions', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show or hide the post summary featured image caption.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	

	
	// Show author bio section
	$wp_customize->add_setting( 'postmagazine_show_single_featured',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_single_featured', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Featured Image', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the featured image also on the full post view.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	
	
	// Show full post footer group
	$wp_customize->add_setting( 'postmagazine_show_post_tags',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_post_tags', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Footer Group', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show or hide the full post footer group that includes the tags list.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	
	
	// Show full post nav
	$wp_customize->add_setting( 'postmagazine_show_post_nav',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_post_nav', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Navigation', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the Next and Previous post navigation on the full post view.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	

	// Show author bio section
	$wp_customize->add_setting( 'postmagazine_show_author_bio',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_author_bio', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Author Bio Section', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the author biography info section on the full article view.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	
	
	
	// Show related posts section
	$wp_customize->add_setting( 'postmagazine_show_related_posts',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_related_posts', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Related Posts Section', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the related posts section on the full article view.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	
	
		
	// Enable default thumbnails
	$wp_customize->add_setting( 'postmagazine_default_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_default_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Default Style Blog Thumbnails', 'postmagazine' ),
		'description' => esc_html__( 'This will create featured images for the blog 1 and 2 styled layouts. Size = 740x400 pixels.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	

	// Enable List thumbnails
	$wp_customize->add_setting( 'postmagazine_list_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_list_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'List Style Blog Thumbnails', 'postmagazine' ),
		'description' => esc_html__( 'This will create featured images for the list styled layouts. Size = 440x275 pixels.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	

		
	// Enable full post thumbnails
	$wp_customize->add_setting( 'postmagazine_singlepost_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_singlepost_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Full Post Thumbnail Creation', 'postmagazine' ),
		'description' => esc_html__( 'When enabled, a custom thumbnail will be created for the full post view. (Images will be 750x500 pixels.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );		

	// Enable related post thumbnails
	$wp_customize->add_setting( 'postmagazine_related_post_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_related_post_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Related Post Thumbnail Creation', 'postmagazine' ),
		'description' => esc_html__( 'When enabled, a custom thumbnail will be created for the related posts sections on the full post view. (Images will be 210x150 pixels.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );
	
	// Related Posts
   $wp_customize->add_setting('postmagazine_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'postmagazine_sanitize_select'
   ));

   $wp_customize->add_control('postmagazine_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Displayed From:', 'postmagazine'),
      'section' => 'postmagazine_theme_options',
      'settings' => 'postmagazine_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'postmagazine'),
         'tags' => esc_html__('Related Posts By Tags', 'postmagazine')
      )
   ));
   	
	// Enable WooCommerce
	$wp_customize->add_setting( 'postmagazine_enable_woocommerce',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_enable_woocommerce', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable WooCommerce', 'postmagazine' ),
		'description' => esc_html__( 'This lets you enable WooCommerce support with this theme.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );	
	
	// Show sticky post on frontpage
	$wp_customize->add_setting( 'postmagazine_show_fpsticky',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_fpsticky', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Featured Sticky Post', 'postmagazine' ),
		'description' => esc_html__( 'This lets you show the featured sticky post on the Blog.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );

	// Show sticky posts in blog loop
	$wp_customize->add_setting( 'postmagazine_default_stickyposts',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_default_stickyposts', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide Default Sticky Posts', 'postmagazine' ),
		'description' => esc_html__( 'This lets you hide the standard sticky posts from the blog list of post summaries.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );
	
	// Frontpage Sticky Category
	$wp_customize->add_setting( 'postmagazine_stickycat_cat', array(
		'default' => 0,
		'sanitize_callback' => 'postmagazine_sanitize_cat',
	) );

	$wp_customize->add_control( 'postmagazine_stickycat_cat', array(
		'type' => 'select',
		'label' => esc_html__( 'Sticky category', 'postmagazine' ),
		'description' => esc_html__( 'Choose your category to show a featured (sticky) post on your front page. Make sure your post has a featured image.', 'postmagazine' ),
		'choices' => postmagazine_cats(),
		'section' => 'postmagazine_theme_options',
	) );	
	
	// Enable attachment comments
	$wp_customize->add_setting( 'postmagazine_show_attachment_comments',	array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'postmagazine_show_attachment_comments', array(
		'type'     => 'checkbox',
		'label'    => __( 'Show Image Attachment Page Comments', 'postmagazine' ),
		'description' => __( 'If you are using a WP gallery shortcode and want to showcase your images on the custom attachment page, you can enable or disable comments for images.', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',
	) );		
	
	
	// Copyright
	$wp_customize->add_setting( 'postmagazine_copyright', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_copyright', array(
		'settings' => 'postmagazine_copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'postmagazine' ),
		'section'  => 'postmagazine_theme_options',		
		'type'     => 'text',
	) ); 
	
// ADD TO SITE IDENTITY

// Site Title Colour
 	$wp_customize->add_setting( 'postmagazine_sitetitle', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'postmagazine' ),
		'section' => 'title_tagline',
		'settings'   => 'postmagazine_sitetitle',
	) ) );
	
// Site Title tagline
 	$wp_customize->add_setting( 'postmagazine_site_tagline', array(
		'default'        => '#ccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_site_tagline', array(
		'label'   => esc_html__( 'Site Tagline Colour', 'postmagazine' ),
		'section' => 'title_tagline',
		'settings'   => 'postmagazine_site_tagline',
	) ) );		
	
// ADD TO COLOUR SECTION	
// content background
 	$wp_customize->add_setting( 'postmagazine_content_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_content_bg', array(
		'label'   => esc_html__( 'Main Content Area Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_content_bg',
	) ) );	
// body text
 	$wp_customize->add_setting( 'postmagazine_body_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_body_text', array(
		'label'   => esc_html__( 'Body Text Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_body_text',
	) ) );				
			
// header background
 	$wp_customize->add_setting( 'postmagazine_header_bg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_header_bg', array(
		'label'   => esc_html__( 'Header Background Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_header_bg',
	) ) );				
			
// site title
 	$wp_customize->add_setting( 'postmagazine_sitetitle', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_sitetitle',
	) ) );
	
// site description
 	$wp_customize->add_setting( 'postmagazine_sitetagline', array(
		'default'        => '#c1c1c1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_sitetagline', array(
		'label'   => esc_html__( 'Site Description Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_sitetagline',
	) ) );				
			
	
// top left area bg
 	$wp_customize->add_setting( 'postmagazine_top_left_bg', array(
		'default'        => '#58819e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_top_left_bg', array(
		'label'   => esc_html__( 'Top Left Section Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_top_left_bg',
	) ) );		
	
// top left area text
 	$wp_customize->add_setting( 'postmagazine_top_left_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_top_left_text', array(
		'label'   => esc_html__( 'Top Left Section Text', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_top_left_text',
	) ) );
	
// top right area bg
 	$wp_customize->add_setting( 'postmagazine_top_right_bg', array(
		'default'        => '#58819e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_top_right_bg', array(
		'label'   => esc_html__( 'Top Right Section Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_top_right_bg',
	) ) );		
	
// top right area text
 	$wp_customize->add_setting( 'postmagazine_top_right_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_top_right_text', array(
		'label'   => esc_html__( 'Top Right Section Text', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_top_right_text',
	) ) );				
			
	
// site footer background
 	$wp_customize->add_setting( 'postmagazine_site_footer_bg', array(
		'default'        => '#1f1f1f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_site_footer_bg', array(
		'label'   => esc_html__( 'Site Footer Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_site_footer_bg',
	) ) );	

// site footer text
 	$wp_customize->add_setting( 'postmagazine_site_footer_text', array(
		'default'        => '#cacaca',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_site_footer_text', array(
		'label'   => esc_html__( 'Site Footer Text', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_site_footer_text',
	) ) );	
	
// link colour
 	$wp_customize->add_setting( 'postmagazine_link_colour', array(
		'default'        => '#83c1ef',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_link_colour', array(
		'label'   => esc_html__( 'Link Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_link_colour',
	) ) );	
	
// visited colour
 	$wp_customize->add_setting( 'postmagazine_link_vcolour', array(
		'default'        => '#5b8fbd',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_link_vcolour', array(
		'label'   => esc_html__( 'Link Visited Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_link_vcolour',
	) ) );	
	
// hover colour
 	$wp_customize->add_setting( 'postmagazine_link_hcolour', array(
		'default'        => '#ecb888',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_link_hcolour', array(
		'label'   => esc_html__( 'Link Hover Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_link_hcolour',
	) ) );		
	
// read more button background
 	$wp_customize->add_setting( 'postmagazine_readmore_bg', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_readmore_bg', array(
		'label'   => esc_html__( 'Read More Button', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_readmore_bg',
	) ) );	
	
// read more link colour
 	$wp_customize->add_setting( 'postmagazine_readmore_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_readmore_label', array(
		'label'   => esc_html__( 'Read More Label', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_readmore_label',
	) ) );		

// entry titles
 	$wp_customize->add_setting( 'postmagazine_entry_title', array(
		'default'        => '#484848',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_entry_title', array(
		'label'   => esc_html__( 'Post Titles', 'postmagazine' ),
		'description' => esc_html__( 'This is the colour of your post titles.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_entry_title',
	) ) );	
	
// featured sticky background
 	$wp_customize->add_setting( 'postmagazine_sticky_bg', array(
		'default'        => '#f1eee8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_sticky_bg', array(
		'label'   => esc_html__( 'Featured Sticky Post Background', 'postmagazine' ),
		'description' => esc_html__( 'This is background colour for the featured sticky post.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_sticky_bg',
	) ) );

// featured sticky content
 	$wp_customize->add_setting( 'postmagazine_sticky_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_sticky_text', array(
		'label'   => esc_html__( 'Featured Sticky Post Text', 'postmagazine' ),
		'description' => esc_html__( 'This is your featured sticky post content colour.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_sticky_text',
	) ) );	

	
// left right sidebar titles
 	$wp_customize->add_setting( 'postmagazine_lr_widget_title', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_lr_widget_title', array(
		'label'   => esc_html__( 'Sidebar Widget Titles', 'postmagazine' ),
		'description' => esc_html__( 'This is your widget title colour for the left and right columns.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_lr_widget_title',
	) ) );	

// sidebar titles
 	$wp_customize->add_setting( 'postmagazine_widget_title', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_widget_title', array(
		'label'   => esc_html__( 'Sidebar Widget Titles', 'postmagazine' ),
		'description' => esc_html__( 'This is your widget title colour that do not have a background to them.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_widget_title',
	) ) );	
	
// left right sidebar title background
 	$wp_customize->add_setting( 'postmagazine_lr_widget_title_bg', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_lr_widget_title_bg', array(
		'label'   => esc_html__( 'Widget Title Background', 'postmagazine' ),
		'description' => esc_html__( 'This is the background colour for your left and right column widget titles.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_lr_widget_title_bg',
	) ) );		
	
// bottom sidebar background
 	$wp_customize->add_setting( 'postmagazine_bottom_bg', array(
		'default'        => '#58819e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_bottom_bg', array(
		'label'   => esc_html__( 'Bottom Sidebar Widget Text', 'postmagazine' ),
		'description' => esc_html__( 'This is the background colour for your bottom sidebar group.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_bottom_bg',
	) ) );	
// bottom sidebar widget title 
 	$wp_customize->add_setting( 'postmagazine_bottom_sidebar_text', array(
		'default'        => '#e7f0f7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_bottom_sidebar_text', array(
		'label'   => esc_html__( 'Bottom Sidebar Text', 'postmagazine' ),
		'description' => esc_html__( 'This is the colour of your bottom sidebar widget titles.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_bottom_sidebar_text',
	) ) );		
// bottom sidebar text
 	$wp_customize->add_setting( 'postmagazine_bottom_sidebar_text', array(
		'default'        => '#d1e5f3',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_bottom_sidebar_text', array(
		'label'   => esc_html__( 'Bottom Sidebar Text', 'postmagazine' ),
		'description' => esc_html__( 'This is the colour of your bottom sidebar content colour, including widget titles.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_bottom_sidebar_text',
	) ) );	
	
// dropcap colour
 	$wp_customize->add_setting( 'postmagazine_dropcap_colour', array(
		'default'        => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_dropcap_colour', array(
		'label'   => esc_html__( 'Dropcap Letter Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_dropcap_colour',
	) ) );		
	
// featured image caption background
 	$wp_customize->add_setting( 'postmagazine_featured_image_caption_bg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_featured_image_caption_bg', array(
		'label'   => esc_html__( 'Featured Image Caption Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_featured_image_caption_bg',
	) ) );	

// featured image caption
 	$wp_customize->add_setting( 'postmagazine_featured_image_caption', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_featured_image_caption', array(
		'label'   => esc_html__( 'Featured Image Caption Text', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_featured_image_caption',
	) ) );		
	
// image view background
 	$wp_customize->add_setting( 'postmagazine_image_viewer_bg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_image_viewer_bg', array(
		'label'   => esc_html__( 'Image Viewer Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_image_viewer_bg',
	) ) );		
	
// button background
 	$wp_customize->add_setting( 'postmagazine_button_bg', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_button_bg', array(
		'label'   => esc_html__( 'Button Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_button_bg',
	) ) );	
	
// button hover background
 	$wp_customize->add_setting( 'postmagazine_button_hbg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_button_hbg', array(
		'label'   => esc_html__( 'Button Hover Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_button_bg',
	) ) );
	

// button text
 	$wp_customize->add_setting( 'postmagazine_button_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_button_text', array(
		'label'   => esc_html__( 'Button Text', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_button_text',
	) ) );	
	
// breadcrumbs bg
 	$wp_customize->add_setting( 'postmagazine_breadcrumbs_bg', array(
		'default'        => '#f1eee8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_breadcrumbs_bg', array(
		'label'   => esc_html__( 'Breadcrumbs Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_breadcrumbs_bg',
	) ) );		

// breadcrumbs text
 	$wp_customize->add_setting( 'postmagazine_breadcrumbs_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_breadcrumbs_text', array(
		'label'   => esc_html__( 'Breadcrumbs Text Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_breadcrumbs_text',
	) ) );	

// social background
 	$wp_customize->add_setting( 'postmagazine_social_bg', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_social_bg', array(
		'label'   => esc_html__( 'Top Social Icon Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_social_bg',
	) ) );
// social hover background
 	$wp_customize->add_setting( 'postmagazine_social_hbg', array(
		'default'        => '#d3edff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_social_hbg', array(
		'label'   => esc_html__( 'Top Social Icon Hover Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_social_hbg',
	) ) );
// social icon
 	$wp_customize->add_setting( 'postmagazine_social_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_social_icon', array(
		'label'   => esc_html__( 'Top Social Icon', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_social_icon',
	) ) );

// mobile menu toggle bg
 	$wp_customize->add_setting( 'postmagazine_mobile_toggle_bg', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_mobile_toggle_bg', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Background', 'postmagazine' ),
		'description'   => esc_html__( 'This is the colour for your toggle button background.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_mobile_toggle_bg',
	) ) );	

// mobile menu toggle icon
 	$wp_customize->add_setting( 'postmagazine_mobile_toggle_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_mobile_toggle_icon', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Icon', 'postmagazine' ),
		'description'   => esc_html__( 'This is the colour for your toggle button icon.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_mobile_toggle_icon',
	) ) );	

// mobile menu background
 	$wp_customize->add_setting( 'postmagazine_mobile_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_mobile_bg', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Icon', 'postmagazine' ),
		'description'   => esc_html__( 'This is the colour for your mobile menu background flyout panel.', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_mobile_bg',
	) ) );	

// mobile menu links
 	$wp_customize->add_setting( 'postmagazine_mobile_links', array(
		'default'        => '#c5c5c5',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_mobile_links', array(
		'label'   => esc_html__( 'Mobile Menu Links', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_mobile_links',
	) ) );	

// mobile menu hover links
 	$wp_customize->add_setting( 'postmagazine_mobile_hlinks', array(
		'default'        => '#d6c293',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_mobile_hlinks', array(
		'label'   => esc_html__( 'Mobile Menu Hover Links', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_mobile_hlinks',
	) ) );	

// menu links
 	$wp_customize->add_setting( 'postmagazine_menu_links', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_menu_links', array(
		'label'   => esc_html__( 'Main Menu Links', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_menu_links',
	) ) );	

// menu hover and active links
 	$wp_customize->add_setting( 'postmagazine_menu_hlinks', array(
		'default'        => '#d6c293',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_menu_hlinks', array(
		'label'   => esc_html__( 'Main Menu Hover & Active Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_menu_hlinks',
	) ) );


// submenu background
 	$wp_customize->add_setting( 'postmagazine_submenu_bg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_submenu_bg', array(
		'label'   => esc_html__( 'Main Menu Submenu Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_submenu_bg',
	) ) );

// submenu border
 	$wp_customize->add_setting( 'postmagazine_submenu_border', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_submenu_border', array(
		'label'   => esc_html__( 'Main Menu Submenu Border', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_submenu_border',
	) ) );	

// submenu link border
 	$wp_customize->add_setting( 'postmagazine_submenu_link_border', array(
		'default'        => '#272727',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_submenu_link_border', array(
		'label'   => esc_html__( 'Main Menu Submenu Link Borders', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_submenu_link_border',
	) ) );	


// selecting content background
 	$wp_customize->add_setting( 'postmagazine_text_selection_bg', array(
		'default'        => '#f1eee8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_text_selection_bg', array(
		'label'   => esc_html__( 'Text Select Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_text_selection_bg',
	) ) );		
// selecting content text
 	$wp_customize->add_setting( 'postmagazine_text_selection_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_text_selection_text', array(
		'label'   => esc_html__( 'Text Select Text Colour', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_text_selection_text',
	) ) );	
		
// blockquote border
 	$wp_customize->add_setting( 'postmagazine_blockquote_border', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_blockquote_border', array(
		'label'   => esc_html__( 'Blockquote Border', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_blockquote_border',
	) ) );	
	
// blockquote background
 	$wp_customize->add_setting( 'postmagazine_blockquote_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_blockquote_bg', array(
		'label'   => esc_html__( 'Blockquote Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_blockquote_bg',
	) ) );		

// blockquote text
 	$wp_customize->add_setting( 'postmagazine_blockquote_text', array(
		'default'        => '#808080',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_blockquote_text', array(
		'label'   => esc_html__( 'Blockquote Text', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_blockquote_text',
	) ) );	

// scroll to top
 	$wp_customize->add_setting( 'postmagazine_scrolltotop', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_scrolltotop', array(
		'label'   => esc_html__( 'Scroll to Top Arrow', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_scrolltotop',
	) ) );	

	
// recent posts title bg
 	$wp_customize->add_setting( 'postmagazine_recentposts_title_bg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_recentposts_title_bg', array(
		'label'   => esc_html__( 'Recent Posts Title Background', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_recentposts_title_bg',
	) ) );		
	
// recent posts link title
 	$wp_customize->add_setting( 'postmagazine_recentposts_title', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_recentposts_title', array(
		'label'   => esc_html__( 'Recent Posts Title', 'postmagazine' ),
		'section' => 'colors',
		'settings'   => 'postmagazine_recentposts_title',
	) ) );	


// SECTION - FEATURED SLIDER

	$wp_customize->add_section( 'postmagazine_featured_slider' , array(
		'title'      => esc_html__( 'Slider Options', 'postmagazine' ),
		'priority' => 29,
	) );

	// Show Slider
	$wp_customize->add_setting( 'postmagazine_show_slider', array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'postmagazine_show_slider', array(
		'type'     => 'checkbox',
		'label'     => esc_html__( 'Show Slider', 'postmagazine' ),
		'description' => esc_html__( 'This lets you enable the Slick Slider - which will display on the front page of your website.', 'postmagazine' ),
		'section'   => 'postmagazine_featured_slider',
	));	
	
	// Setting group for slide width
	$wp_customize->add_setting( 'postmagazine_slide_width',	array(
		'default' => '1160',
		'sanitize_callback' => 'absint'
		));
		
	$wp_customize->add_control( 'postmagazine_slide_width', array(
		'type'        => 'number',
		'section'     => 'postmagazine_featured_slider',
		'label'       => 'Slider Width',
		'description' => 'This controls the width of your slide images because when uploading photos, this theme will crop the image to the size (width) you set here. The height is already set at 620px.',
		'input_attrs' => array(
				'min' => 1160, // Required. Minimum value for the slider
				'max' => 2560, // Required. Maximum value for the slider
				'step' => 100, // Required. The size of each interval or step the slider takes between the minimum and maximum values
		),
	) );
		
	// Slider category
	$wp_customize->add_setting( 'postmagazine_featured_cat', array(
		'default' => 0,
		'sanitize_callback' => 'postmagazine_sanitize_cat',
	) );

	$wp_customize->add_control( 'postmagazine_featured_cat', array(
		'type' => 'select',
		'label' => esc_html__( 'Choose a category', 'postmagazine' ),
		'description' => esc_html__( 'Choose your category to load slides from. Make sure your posts have featured images and we recommend also that you create a special category just for featured slide posts.', 'postmagazine' ),
		'choices' => postmagazine_cats(),
		'section' => 'postmagazine_featured_slider',
	) );
	
	// Slide count
	$wp_customize->add_setting( 'postmagazine_featured_limit', array(
		'default' => -1,
		'sanitize_callback' => 'postmagazine_sanitize_number',
	) );

	$wp_customize->add_control( 'postmagazine_featured_limit', array(
		'type' => 'number',
		'label' => esc_html__( 'Limit posts', 'postmagazine' ),		
		'description' => esc_html__( 'This lets you select how many slides to show from 1 to 5 slides.', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'input_attrs' => array(
            'min'   => 1,
            'max'   => 5,
            'step'  => 1,
        ),
	) );
	
	
	// show pagination
	$wp_customize->add_setting( 'featured_slider_pagination',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'featured_slider_pagination', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Slider pagination', 'postmagazine' ),
		'description' => esc_html__( 'This shows the small dot pagination at the bottom of your slides.', 'postmagazine' ),
		'section'  => 'postmagazine_featured_slider',
	) );	
	
	// show navigation next prev
	$wp_customize->add_setting( 'featured_slider_navigation',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'featured_slider_navigation', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Slider Navigation', 'postmagazine' ),
		'description' => esc_html__( 'This shows the Next and Previous arrows for slide navigation.', 'postmagazine' ),
		'section'  => 'postmagazine_featured_slider',
	) );	
	
	// autoplay
	$wp_customize->add_setting( 'featured_slider_autoplay',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'featured_slider_autoplay', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Slide Autoplay', 'postmagazine' ),
		'description' => esc_html__( 'This lets you turn on the autoplay which will rotate through the slides automatically. Disabling then requires manual navigation.', 'postmagazine' ),
		'section'  => 'postmagazine_featured_slider',
	) );	
	
	// autoplay speed
	$wp_customize->add_setting( 'featured_slider_autoplay',	array(
		'default' => true,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'featured_slider_autoplay', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Slide Autoplay', 'postmagazine' ),
		'description' => esc_html__( 'This lets you turn on the autoplay which will rotate through the slides automatically. Disabling then requires manual navigation.', 'postmagazine' ),
		'section'  => 'postmagazine_featured_slider',
	) );	
	
    $wp_customize->add_setting( 'postmagazine_autoplay_speed',  array(        
            'default'           => '3000', 
			'sanitize_callback' => 'absint',
        ) );
    $wp_customize->add_control( 'postmagazine_autoplay_speed', array(
        'type'        => 'number',
        'section'     => 'postmagazine_featured_slider',
        'label'       => esc_html__('Autoplay Speed', 'postmagazine'),
		'description' => esc_html__('You can change the speed of each slide when using the autoplay setting. Default is 3000', 'postmagazine'), 
        'input_attrs' => array(
            'min'   => 500,
            'max'   => 5000,
            'step'  => 500,
        ),
    ) );		
	
// prev next arrows
 	$wp_customize->add_setting( 'postmagazine_slider_arrows', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_arrows', array(
		'label'   => esc_html__( 'Next &amp; Prev Arrows', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_arrows',
	) ) );	

// slide pagination dots
 	$wp_customize->add_setting( 'postmagazine_slider_dots', array(
		'default'        => '#e0e0e0',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_dots', array(
		'label'   => esc_html__( 'Slide Pagination - Dots', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_dots',
	) ) );	

// slide pagination dots hover and active
 	$wp_customize->add_setting( 'postmagazine_slider_active_dots', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_active_dots', array(
		'label'   => esc_html__( 'Slide Pagination - Active Dots', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_active_dots',
	) ) );	

// slide category
 	$wp_customize->add_setting( 'postmagazine_slider_category', array(
		'default'        => '#c1dff9',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_category', array(
		'label'   => esc_html__( 'Slide Category', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_category',
	) ) );	

// slide title
 	$wp_customize->add_setting( 'postmagazine_slider_title', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_title', array(
		'label'   => esc_html__( 'Slide Title', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_title',
	) ) );	


// slide excerpt
 	$wp_customize->add_setting( 'postmagazine_slider_excerpt', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_excerpt', array(
		'label'   => esc_html__( 'Slide Excerpt', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_excerpt',
	) ) );	

// slide readmore
 	$wp_customize->add_setting( 'postmagazine_slider_readmore_button', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_readmore_button', array(
		'label'   => esc_html__( 'Slide Read More Button', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_readmore_button',
	) ) );	

// slide readmore label
 	$wp_customize->add_setting( 'postmagazine_slider_readmore_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_slider_readmore_label', array(
		'label'   => esc_html__( 'Slide Read More Label', 'postmagazine' ),
		'section' => 'postmagazine_featured_slider',
		'settings'   => 'postmagazine_slider_readmore_label',
	) ) );	

// SECTION - PROMO BOXES
	$wp_customize->add_section( 'postmagazine_promo_boxes', array(
		'title'    => esc_html__( 'Promo Boxes', 'postmagazine' ),
		'priority' => 31, 
	) );

 	// show imageboxes 
  	$wp_customize->add_setting( 'postmagazine_show_promoboxes',  array(
		'default' => false,
		'sanitize_callback' => 'postmagazine_sanitize_checkbox',
   	 ) );  
 	 $wp_customize->add_control( 'postmagazine_show_promoboxes', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Promo Boxes Section', 'postmagazine' ),
		'description' => esc_html__( 'Check this box to show the image boxes section.', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',
 	 ) ); 
	 

// promo box 1 image	   
$wp_customize->add_setting( 'postmagazine_promo_box1_image',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint'
   )
);
 
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'postmagazine_promo_box1_image',
   array(
      'label' => esc_html__( 'Promo Box 1 Image', 'postmagazine' ),
       'description'	=> esc_html__( 'Choose your first promo box image.', 'postmagazine' ),
      'section' => 'postmagazine_promo_boxes',
      'width' => 450, 
      'height' => 275, 
      'button_labels' => array( 
         'select' => esc_html__( 'Select Image', 'postmagazine' ),
         'change' => esc_html__( 'Change Image', 'postmagazine' ),
         'remove' => esc_html__( 'Remove', 'postmagazine' ),
         'default' => esc_html__( 'Default', 'postmagazine' ),
         'placeholder' => esc_html__( 'No image selected', 'postmagazine' ),
         'frame_title' => esc_html__( 'Select Image', 'postmagazine' ),
         'frame_button' => esc_html__( 'Choose Image', 'postmagazine' ),
      )
   )
) );	   
	   
	   
// promo box 2 image	   
$wp_customize->add_setting( 'postmagazine_promo_box2_image',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint'
   )
);
 
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'postmagazine_promo_box2_image',
   array(
      'label' => esc_html__( 'Promo Box 2 Image', 'postmagazine' ),
       'description'	=> esc_html__( 'Choose your second promo box image.', 'postmagazine' ),
      'section' => 'postmagazine_promo_boxes',
      'width' => 450, 
      'height' => 275, 
      'button_labels' => array( 
         'select' => esc_html__( 'Select Image', 'postmagazine' ),
         'change' => esc_html__( 'Change Image', 'postmagazine' ),
         'remove' => esc_html__( 'Remove', 'postmagazine' ),
         'default' => esc_html__( 'Default', 'postmagazine' ),
         'placeholder' => esc_html__( 'No image selected', 'postmagazine' ),
         'frame_title' => esc_html__( 'Select Image', 'postmagazine' ),
         'frame_button' => esc_html__( 'Choose Image', 'postmagazine' ),
      )
   )
) );	   
	   
// promo box 3 image	   
$wp_customize->add_setting( 'postmagazine_promo_box3_image',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint'
   )
);
 
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'postmagazine_promo_box3_image',
   array(
      'label' => esc_html__( 'Promo Box 3 Image', 'postmagazine' ),
       'description'	=> esc_html__( 'Choose your third promo box image.', 'postmagazine' ),
      'section' => 'postmagazine_promo_boxes',
      'width' => 450, 
      'height' => 275, 
      'button_labels' => array( 
         'select' => esc_html__( 'Select Image', 'postmagazine' ),
         'change' => esc_html__( 'Change Image', 'postmagazine' ),
         'remove' => esc_html__( 'Remove', 'postmagazine' ),
         'default' => esc_html__( 'Default', 'postmagazine' ),
         'placeholder' => esc_html__( 'No image selected', 'postmagazine' ),
         'frame_title' => esc_html__( 'Select Image', 'postmagazine' ),
         'frame_button' => esc_html__( 'Choose Image', 'postmagazine' ),
      )
   )
) );	   

// promo box 1 title
	$wp_customize->add_setting( 'postmagazine_promo_box1_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box1_title', array(
		'settings' => 'postmagazine_promo_box1_title',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 1 Title', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 

// promo box 2 title
	$wp_customize->add_setting( 'postmagazine_promo_box2_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box2_title', array(
		'settings' => 'postmagazine_promo_box2_title',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 2 Title', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 

// promo box 3 title
	$wp_customize->add_setting( 'postmagazine_promo_box3_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box3_title', array(
		'settings' => 'postmagazine_promo_box3_title',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 3 Title', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 

// promo box 1 button label
	$wp_customize->add_setting( 'postmagazine_promo_box1_button_label', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box1_button_label', array(
		'settings' => 'postmagazine_promo_box1_button_label',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 1 Button Label', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 	
	
// promo box 2 button label
	$wp_customize->add_setting( 'postmagazine_promo_box2_button_label', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box2_button_label', array(
		'settings' => 'postmagazine_promo_box2_button_label',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 2 Button Label', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) );	
	
// promo box 3 button label
	$wp_customize->add_setting( 'postmagazine_promo_box3_button_label', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box3_button_label', array(
		'settings' => 'postmagazine_promo_box3_button_label',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 3 Button Label', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) );	
	
// promo box 1 link
	$wp_customize->add_setting( 'postmagazine_promo_box1_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box1_link', array(
		'settings' => 'postmagazine_promo_box1_link',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 1 Link', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 
	
// promo box 2 link
	$wp_customize->add_setting( 'postmagazine_promo_box2_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box2_link', array(
		'settings' => 'postmagazine_promo_box2_link',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 2 Link', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 	
	
// promo box 3 link
	$wp_customize->add_setting( 'postmagazine_promo_box3_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'postmagazine_promo_box3_link', array(
		'settings' => 'postmagazine_promo_box3_link',
		'type'     => 'text',		
		'label'    => esc_html__( 'Promo Box 3 Link', 'postmagazine' ),
		'section'  => 'postmagazine_promo_boxes',				
	) ); 

	
// promo image colour
 	$wp_customize->add_setting( 'postmagazine_promo_image', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_promo_image', array(
		'label'   => esc_html__( 'Promo Image Widget Colour', 'postmagazine' ),
		'section' => 'postmagazine_promo_boxes',
		'settings'   => 'postmagazine_promo_image',
	) ) );		
	
// promo image text colour
 	$wp_customize->add_setting( 'postmagazine_promo_image_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_promo_image_text', array(
		'label'   => esc_html__( 'Promo Image Widget Text Colour', 'postmagazine' ),
		'section' => 'postmagazine_promo_boxes',
		'settings'   => 'postmagazine_promo_image_text',
	) ) );		
	
// promo image readmore
 	$wp_customize->add_setting( 'postmagazine_promo_image_readmore', array(
		'default'        => '#d3edff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_promo_image_readmore', array(
		'label'   => esc_html__( 'Promo Image Widget Read More', 'postmagazine' ),
		'section' => 'postmagazine_promo_boxes',
		'settings'   => 'postmagazine_promo_image_readmore',
	) ) );		
	
// SECTION - WOOCOMMERCE	
if( esc_attr(get_theme_mod( 'postmagazine_enable_woocommerce', false ) ) ) :	
	$wp_customize->add_section( 'postmagazine_woocommerce' , array(
		'title'      => esc_html__( 'WooCommerce Options', 'postmagazine' ),
		'priority'   => 32,
	) );	

    // product per page
    $wp_customize->add_setting( 'postmagazine_woocommerce_products_per_page',  array(          
            'default'           => '12',
			'sanitize_callback' => 'absint',
        ) );
    $wp_customize->add_control( 'postmagazine_woocommerce_products_per_page', array(
        'type'        => 'number',
        'section'     => 'postmagazine_woocommerce',
        'label'       => esc_html__('Products Per Page', 'postmagazine'),
		'description' => esc_html__('Select how many products you want to display per page in increments of 3 up to 21', 'postmagazine'), 
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 21,
            'step'  => 3,
        ),
    ) );	

    // gallery columns
    $wp_customize->add_setting( 'postmagazine_woocommerce_thumbnail_columns',  array(
            'sanitize_callback' => 'absint',
            'default'           => '3',
        ) );
    $wp_customize->add_control( 'postmagazine_woocommerce_thumbnail_columns', array(
        'type'        => 'number',
        'section'     => 'postmagazine_woocommerce',
        'label'       => esc_html__('Gallery Thumbnail Columns', 'postmagazine'),
		'description' => esc_html__('Select how many gallery thumbnail columns you want to display from 1 to 5.', 'postmagazine'), 
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 5,
            'step'  => 1,
        ),
    ) );
	
// woocommerce table heading background
 	$wp_customize->add_setting( 'postmagazine_woo_thead_bg', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_thead_bg', array(
		'label'   => esc_html__( 'WooCommerce Table Heading Background', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_thead_bg',
	) ) );	

// woocommerce table heading text
 	$wp_customize->add_setting( 'postmagazine_woo_thead_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_thead_text', array(
		'label'   => esc_html__( 'WooCommerce Table Heading Text', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_thead_text',
	) ) );	
	
// rating stars
 	$wp_customize->add_setting( 'postmagazine_woo_stars', array(
		'default'        => '#b1bf72',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_stars', array(
		'label'   => esc_html__( 'Rating Stars', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_stars',
	) ) );		
	
// onsale label background
 	$wp_customize->add_setting( 'postmagazine_woo_onsale_bg', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_onsale_bg', array(
		'label'   => esc_html__( 'Onsale Label Background', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_onsale_bg',
	) ) );		

// onsale label
 	$wp_customize->add_setting( 'postmagazine_woo_onsale_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_onsale_text', array(
		'label'   => esc_html__( 'Onsale Label Text', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_onsale_text',
	) ) );		

// woocommerce tab
 	$wp_customize->add_setting( 'postmagazine_woo_tab', array(
		'default'        => '#f1eee8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_tab', array(
		'label'   => esc_html__( 'WooCommerce Tab Colour', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_tab',
	) ) );	
// woocommerce active tab
 	$wp_customize->add_setting( 'postmagazine_woo_active_tab', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_active_tab', array(
		'label'   => esc_html__( 'WooCommerce Active Tab', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_active_tab',
	) ) );

// woocommerce price
 	$wp_customize->add_setting( 'postmagazine_woo_product_price', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_product_price', array(
		'label'   => esc_html__( 'WooCommerce Product Price', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_product_price',
	) ) );	
// woocommerce table header background
 	$wp_customize->add_setting( 'postmagazine_woo_thead_background', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_thead_background', array(
		'label'   => esc_html__( 'Shop Table Header Background', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_thead_background',
	) ) );

// woocommerce table header text
 	$wp_customize->add_setting( 'postmagazine_woo_thead_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_thead_text', array(
		'label'   => esc_html__( 'Shop Table Header Text', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_thead_text',
	) ) );
	
// woocommerce my account buttons
 	$wp_customize->add_setting( 'postmagazine_woo_myaccount_buttons', array(
		'default'        => '#f1eee8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_myaccount_buttons', array(
		'label'   => esc_html__( 'My Account Buttons', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_myaccount_buttons',
	) ) );	
	
// woocommerce my account buttons text
 	$wp_customize->add_setting( 'postmagazine_woo_myaccount_buttons_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_myaccount_buttons_text', array(
		'label'   => esc_html__( 'My Account Buttons Text', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_myaccount_buttons_text',
	) ) );		

// woocommerce my account hover buttons
 	$wp_customize->add_setting( 'postmagazine_woo_myaccount_hbuttons', array(
		'default'        => '#7dafd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_myaccount_hbuttons', array(
		'label'   => esc_html__( 'My Account Hover Buttons', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_myaccount_hbuttons',
	) ) );	
	
// woocommerce my account buttons hover text
 	$wp_customize->add_setting( 'postmagazine_woo_myaccount_buttons_htext', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postmagazine_woo_myaccount_buttons_htext', array(
		'label'   => esc_html__( 'My Account Buttons Hover Text', 'postmagazine' ),
		'section' => 'postmagazine_woocommerce',
		'settings'   => 'postmagazine_woo_myaccount_buttons_htext',
	) ) );	
	

endif;	
	
}
add_action( 'customize_register', 'postmagazine_customize_register' );


/**
 * SANITIZATION
 * Required for cleaning up bad inputs
 */

// Strip Slashes
	function postmagazine_sanitize_strip_slashes($input) {
		return wp_kses_stripslashes($input);
	}	
	
// Radio and Select	
	function postmagazine_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	 	
// Checkbox
	function postmagazine_sanitize_checkbox( $input ) {
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
// Array of valid image file types
	function postmagazine_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


// Adds sanitization callback function:  Category
function postmagazine_sanitize_cat( $input ) {

	if ( array_key_exists( $input, postmagazine_cats() ) ) {
		return $input;
	} else {
		return '';
	}
}

// Adds sanitization callback function: Number
function postmagazine_sanitize_number( $input ) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function postmagazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function postmagazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function postmagazine_customize_preview_js() {
	wp_enqueue_script( 'postmagazine-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'postmagazine_customize_preview_js' );
