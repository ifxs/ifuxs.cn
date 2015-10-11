<?php
/**
 * The default template for displaying content
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="postformat">
    <div class="format-icon"></div>
  </div>
  <?php if ( is_single() ): ?>
  <header class="entry-header">
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>
  </header>
  <span class="date-i fleft">
  <?php the_time('F jS, Y') ?>
  </span>
  <?php edit_post_link( __( 'Edit', 'wplook' ), '<span class="edit-i">', '</span>' ); ?>
  <?php else : ?>
  <header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wplook' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h1>
  </header>
  <span class="date-i fleft"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wplook' ), the_title_attribute( 'echo=0' ) ); ?>" rel="nofollow">
  <?php the_time('F jS, Y') ?>
  </a></span>
  <?php edit_post_link( __( 'Edit', 'wplook' ), '<span class="edit-i">', '</span>' ); ?>
  <?php endif; ?>
  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-content">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  <?php elseif ( is_single() ): ?>
  <div class="entry-content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wplook' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
    <!-- .entry-content -->
    <div class="clear"></div>
  </div>
  <footer class="entry-utility">
    <div class="alignright">
      <?php wplook_prev_next(); ?>
    </div>
    <div class="alignleft">
      <?php wplook_get_author(); ?>
      <?php wplook_get_category(); ?>
      <?php wplook_get_tag_list(); ?>
    </div>
    <div class="clear"></div>
  </footer>
  <?php else : ?>
  <div class="entry-content">
    <?php the_content( __( '', 'wplook' )); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'wplook' ) . '</span>', 'after' => '</div>' ) ); ?>
    <footer class="read-more"><a href="<?php the_permalink(); ?>">
      <?php _e('Read More', 'wplook'); ?>
      </a><span class="meta-nav">&rarr;</span></footer>
    <div class="clear"></div>
  </div>
  <!-- .entry-content -->
  <?php endif; ?>
</article>
<?php comments_template( '', true ); ?>
