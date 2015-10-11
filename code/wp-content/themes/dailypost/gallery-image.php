<?php
/**
 * The default template for displaying content
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="postformat"><div class="format-icon"></div></div>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<span class="date-i fleft"><?php the_time('F jS, Y') ?></span>
	<?php edit_post_link( __( 'Edit', 'wplook' ), '<span class="edit-i">', '</span>' ); ?>
	
	
	<div class="entry-content">
	
								<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Original size: <a target="_blank" href="%1$s" title="Link to full-size image">%2$s &times; %3$s</a> in <a href="%4$s" title="Return to %5$s" rel="gallery">%5$s</a>', 'wplook' ),
								
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									get_the_title( $post->post_parent )
								);
							?>
			<div class="entry-attachment">
							<div class="attachment">
<?php
	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
	 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
	 */
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'wplook_attachment_size', 848 );
								echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
								?></a>
							</div><!-- .attachment -->
						</div><!-- .entry-attachment -->
	
	
	
	
	
	
	
	
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wplook' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
		<!-- .entry-content -->
		<div class="clear"></div>
		<footer class="entry-utility">
			<div class="alignright">
				<div class="newer-older">
					<?php if ( count( $attachments ) > 1 ) { 
						next_image_link( array( 66, 66 ) ); } ?>
					<!-- #nav-single -->

				</div>
			</div>
			<div class="alignleft">
            	<div class="newer-older">
					<?php if ( count( $attachments ) > 1 ) {
						previous_image_link( array( 66, 66 ) ); } ?> 
				</div>
             </div>
			<div class="clear"></div>
		</footer>
	</div>
	<!-- .entry-content -->
</article>
<?php comments_template( '', true ); ?>

