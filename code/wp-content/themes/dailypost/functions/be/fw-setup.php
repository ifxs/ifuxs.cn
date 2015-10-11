<?php

/**
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0.0
*/
function wplook_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'StylishWP Panel', 'wplook' ),
	'href' => FALSE,
	'meta' => array('title' => 'StylishWP Options Panel', 'class' => 'wplookpanel') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'wpl_option',
	'parent' => 'custom_menu',
	'title' => __( 'DailyPost Options', 'wplook' ),
	'href' => $admin_dir .'admin.php?page=fw-options.php',
	'meta' => array('title' => 'DailyPost - Theme options') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'wpl_themes',
	'parent' => 'custom_menu',
	'title' => __( 'StylishWP Themes', 'wplook' ),
	'href' => 'http://stylishwp.com/',
	'meta' => array('title' => 'Premium Wordpress Themes from StylishWP')) );

	$wp_admin_bar->add_menu( array(
	'id' => 'wpl_fb',
	'parent' => 'custom_menu',
	'title' => __( 'Facebook', 'wplook' ),
	'href' => 'https://www.facebook.com/StylishWP',
	'meta' => array('target' => 'blank', 'title' => 'Become a fan on Facebook') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'wpl_tw',
	'parent' => 'custom_menu',
	'title' => __( 'Twitter', 'wplook' ),
	'href' => 'https://twitter.com/stylishwp',
	'meta' => array('target' => 'blank', 'title' => 'Follow us on Twitter')
		) );
}
add_action('admin_bar_menu', 'wplook_bar_menu', '1000');


/*	----------------------------------------------------------
	Display feed in dashboard
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */


add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets() {
	global $wp_meta_boxes;
	unset(
		$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
		$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
		$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
	);
		wp_add_dashboard_widget( 'dashboard_custom_feed', 'StylishWP News' , 'dashboard_custom_feed_output' );
}

function dashboard_custom_feed_output() {
		echo '<div class="rss-widget rss-wplook">';
	wp_widget_rss_output(array(
		'url' => 'http://stylishwp.com/feed/',
		'title' => 'StylishWP News',
		'items' => 5,
		'show_summary' => 1,
		'show_author' => 0,
		'show_date' => 0
		));
		echo '</div>';
}
