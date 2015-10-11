<?php
/**
 * The right sidebar file. By default we show Archives and Meta
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
*/?>
</div>
<!--/contentcolumn-->
</div>
<!--/primary-->

<div id="secondary">
<div id="secondary-margins">
  <header id="branding">
    <hgroup id="desktop-version">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>">
        <?php bloginfo('name'); ?>
        </a></h1>
      <h2 class="site-description">
        <?php bloginfo('description'); ?>
      </h2>
    </hgroup>
  </header>
  <nav>
    <?php wp_nav_menu( array('depth' => '3', 'theme_location' => 'primary' )); ?>
  </nav>
  <div class="widget-area">
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
    <aside id="archives" class="widget">
      <div class="widget-title">
        <h3>
          <?php _e( 'Archives', 'wplook' ); ?>
        </h3>
        <div class="right-corner"></div>
      </div>
      <ul>
        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
      </ul>
    </aside>
    <aside id="meta" class="widget">
      <div class="widget-title">
        <h3>
          <?php _e( 'Meta', 'wplook' ); ?>
        </h3>
        <div class="right-corner"></div>
      </div>
      <ul>
        <?php wp_register(); ?>
        <li>
          <?php wp_loginout(); ?>
        </li>
        <?php wp_meta(); ?>
      </ul>
    </aside>
    <?php endif; // end sidebar widget area ?>
  </div>
</div>
