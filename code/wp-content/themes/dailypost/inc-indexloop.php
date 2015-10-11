<?php
/**
 * The loop for home page (index)
 *
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
?>

	<div id="content">
	
	<?php if ( is_home() || is_front_page() || is_404()) {
		
	} else {
		?><?php thematic_doctitle();?>
	<?php } ?>
<?php if ( have_posts() ) : ?>
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	<?php  wplook_content_nav( 'nav-below' ); ?>
<?php else : ?>
	<article id="post-0" class="post no-results not-found">
				<div class="postformat"><div class="format-icon"></div></div>

				<header class="entry-header"><h1 class="entry-title"><?php _e( 'Nothing Found', 'wplook' ); ?></h1></header><!-- .entry-header -->
			<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'wplook' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
		</article><!-- #post-0 -->
<?php endif; ?>
</div><!-- #content -->
<div class="clear"></div>