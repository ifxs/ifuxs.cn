<?php
/**
 * The header template
 *
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
?>
<?php global $options;
foreach ($options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
}?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( ' - ', true, 'right' );	?></title>
<?php wplook_meta_description();?>
<?php if ($wpl_meta_keywords != ''){ ?>
<meta name="keywords" content="<?php echo $wpl_meta_keywords; ?>" />
<?php } if ($wpl_favicon_url != ''){ ?>
<link rel="shortcut icon" href="<?php echo $wpl_favicon_url; ?>" />
<?php } 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php echo stripslashes($wpl_ga_code); ?>
<?php wp_head(); ?>
	</head>
	
<body <?php body_class(''); ?>>
	<div id="page">
		<div id="primary">
			<div id="contentcolumn">
                <hgroup id="mobile-version">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
                    <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                </hgroup>
				<?php
				//Code from 2011 theme by wordpress theme team
				//Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :	?>
                <div id="header-image">               
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
					<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			</a></div>
			<?php endif; // end check for removed header image ?>

			<?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>

<?php endif; ?>

