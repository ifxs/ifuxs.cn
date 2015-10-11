<?php
/**
 * The default template for displaying content
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
?>
<?php if ( is_single() ) {
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="postformat"><div class="format-icon"></div></div>

	<span class="date-i fleft">
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wplook' ), the_title_attribute( 'echo=0' ) ); ?>" rel="nofollow"><?php the_time('F jS, Y') ?></a>
	</span>
	<?php edit_post_link( __( 'Edit', 'wplook' ), '<span class="edit-i">', '</span>' ); ?>
	
	
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wplook' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
		<!-- .entry-content -->
		<div class="clear"></div>
<footer class="entry-utility">
	<div class="alignright">
		<?php wplook_prev_next(); ?>
	</div>
	<div class="alignleft">
		<?php wplook_get_author(); ?>
		<?php wplook_get_category(); ?>
		<?php wplook_get_tag_list(); ?>
	</div><div class="clear"></div>
</footer>	</div>
	<!-- .entry-content -->
</article>
<?php comments_template( '', true ); ?>


<?php } else { ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="postformat">
		<div class="format-icon"></div>
	</div>

	<span class="date-i fleft"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wplook' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_time('F jS, Y') ?></a></span>
	<?php edit_post_link( __( 'Edit', 'wplook' ), '<span class="edit-i">', '</span>' ); ?>
	<div class="entry-content">
		<?php the_content(''); ?>

		<!-- .entry-content -->
		<div class="clear"></div>

		<footer class="read-more"><a href="<?php the_permalink(); ?>"><?php _e('Read More', 'wplook'); ?></a><span class="meta-nav">&rarr;</span></footer>
	</div>
	<!-- .entry-content -->
</article>
<?php }  ?>
