<?php
/**
 * The default template for displaying content
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
?>
			<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="postformat"><div class="format-icon"></div></div>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<span class="date-i fleft"><?php the_time('F jS, Y') ?></span>
	<?php edit_post_link( __( 'Edit', 'wplook' ), '<span class="edit-i">', '</span>' ); ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wplook' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
		<!-- .entry-content -->
		<div class="clear"></div>
<footer class="entry-utility">
	<div class="alignright">
		<?php // wplook_prev_next(); ?>
	</div>
	<div class="alignleft">
		<?php wplook_get_author(); ?>
		<?php if ( the_category ( '', ', ' ) ) { ?>
			<?php wplook_get_category(); ?>
        <?php } ?>
		<?php wplook_get_tag_list(); ?>
       
	</div><div class="clear"></div>
</footer>
	</div>
	<!-- .entry-content -->
</article>
<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			<?php endif; ?>