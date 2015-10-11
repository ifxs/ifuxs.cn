<?php 
/**
 * Setup
 *
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
 
add_action( 'after_setup_theme', 'wplook_setup' );
if ( ! function_exists( 'wplook_setup' ) ):
	function wplook_setup() {
	
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	// Add default posts and comments RSS feed links to head
	
	
	function register_my_menus() {
		register_nav_menus(
		array('primary' => __( 'StylishWP Main Navigation', 'wplook' ),) 
		);
	}

	add_action( 'init', 'register_my_menus' );

	wp_create_nav_menu( 'StylishWP Main Menu', array( 'slug' => 'primary' ) );

}

endif;

/*	----------------------------------------------------------
	Styles the header image and text displayed on the blog
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */

if ( ! function_exists( 'wplook_header_style' ) ) :
	function wplook_header_style() {
		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
		if ( HEADER_TEXTCOLOR == get_header_textcolor() )
			return;
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
			// Has the text been hidden?
			if ( 'blank' == get_header_textcolor() ) :
		?>
			.site-title,
			.site-description {
				position: absolute !important;
				clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo get_header_textcolor(); ?> !important;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif; // wplook_header_style

/*	----------------------------------------------------------
	Styles the header image displayed on the Appearance > Header admin panel.
	Referenced via add_custom_image_header() in wplook_setup().
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */

if ( ! function_exists( 'wplook_admin_header_style' ) ) :
	function wplook_admin_header_style() {
		?>
		<style type="text/css">

		<?php
			// If the user has set a custom color for the text use that
			if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo get_header_textcolor(); ?>;
			}
		<?php endif; ?>
		
		</style>
	<?php
	}
endif; // wplook_admin_header_style

/*	----------------------------------------------------------
	Custom header image markup displayed on the Appearance > Header admin panel.
	Referenced via add_custom_image_header() in wplook_setup().
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
if ( ! function_exists( 'wplook_admin_header_image' ) ) :
	function wplook_admin_header_image() { ?>
		<div id="headimg">
			<?php
			if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
				$style = ' style="display:none;"';
			else
				$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
			?>
			<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
			<?php endif; ?>
		</div>
	<?php }
endif; // wplook_admin_header_image

/*	----------------------------------------------------------
	Set the content width
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
if ( ! isset( $content_width ) )
	$content_width = 620;

/*	----------------------------------------------------------
	Add theme support functions
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'  ) );

	/*	----------------------------------------------------------
	 	Add support for custom backgrounds
	 = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	  
	$wplook_bg_defaults = array(
		'default-color'			=> 'ffffff',
		'default-image' 		=> get_template_directory_uri() . '/images/primary-bg.png',
		'wp-head-callback'		=> '_custom_background_cb',
		'admin-head-callback'	=> '',
		'admin-preview-callback'=> ''
	);
	add_theme_support( 'custom-background', $wplook_bg_defaults );

	/*	----------------------------------------------------------
		Add support for custom header
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	$wplook_ch_defaults = array(
		//'default-image'			=> '%s/images/headers/ipad.jpg',
		'random-default'		=> true,
		'width'					=> 620,
		'height'				=> 250,
		'flex-height'			=> true,
		'flex-width'			=> true,
		'header-text'			=> true,
		'default-text-color'	=> 'f3f3f3',
		'uploads'				=> true,
		'wp-head-callback'		=> 'wplook_header_style',
		'admin-head-callback'	=> 'wplook_admin_header_style',
		'admin-preview-callback'=> 'wplook_admin_header_image',
	);
	add_theme_support( 'custom-header', $wplook_ch_defaults );

	/*	----------------------------------------------------------
		Default Post Thumbnail dimensions (cropped)
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
		

	set_post_thumbnail_size( 150, 100, true ); // default Post Thumbnail dimensions (cropped)

	
	/*	----------------------------------------------------------
		Display navigation to next/previous pages when applicable
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	function wplook_content_nav( $nav_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous fleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wplook' ) ); ?></div>
				<div class="nav-next fright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wplook' ) ); ?></div>
				<div class="left-corner"></div>
				<div class="clear"></div>
			</nav><!-- #nav-above -->
		<?php endif;
	}

	
	
	/*	----------------------------------------------------------
		Display Autor (microformats)
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	function wplook_get_author() { ?>
		<div class="author-i">
		<?php _e('<b>Author:</b> ', 'wplook'); ?>
		<span class="vcard"> 
		<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
		</span></div >
	<?php
	}
	

	
	/*	----------------------------------------------------------
		Display Category
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	function wplook_get_category() { ?>
	<div class="category">
	<b> <?php _e('Category:', 'wplook'); ?></b> <?php the_category(', ') ?>	
	</div>
	<?php
	}
	

	
	/*	----------------------------------------------------------
		Display Tag list
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	function wplook_get_tag_list() { ?>
	<?php if ( get_the_tag_list( '', ', ' ) ) { ?>
				<div class="tag"><b><?php _e('Tag:', 'wplook'); ?></b> <?php echo get_the_tag_list('',', ',''); ?> </div>
			<?php } ?>
	<?php
	}
	

	
	/*	----------------------------------------------------------
		Display next and prev linksin post
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	function wplook_prev_next() { ?>
			<div class="newer-older">
				<?php previous_post_link('%link', '<img  src="'.get_template_directory_uri().'/images/forword.png">'); ?>
				<?php next_post_link('%link', '<img src="'.get_template_directory_uri().'/images/next.png">'); ?>
			</div>
	<?php
	}
}
?>