<?php
/**
 * The footer template
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
</div><!--/secondary-->
<div id="social-icons">
	<div id="social-icons-margins">
		<a href="http://stylishwp.com/dailypost/" target="_blank" title="<?php _e('Design by StylishWP', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/wplook.png" width="22" height="22" /></a>
		<?php if ($wpl_rss != '') { ?>
		<a href="<?php echo $wpl_rss; ?>" target="_blank" title="<?php _e('Subscribe to RSS', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/rss.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_twitter != '') { ?>
		<a href="<?php echo $wpl_twitter; ?>" target="_blank" title="<?php _e('Twitter', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_facebook != '') { ?>
		<a href="<?php echo $wpl_facebook; ?>" target="_blank" title="<?php _e('FaceBook', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_googleplus != '') { ?>
		<a href="<?php echo $wpl_googleplus; ?>" target="_blank" title="<?php _e('Google +', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/google.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_pinterest != '') { ?>
		<a href="<?php echo $wpl_pinterest; ?>" target="_blank" title="<?php _e('Pinterest', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/pinterest.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_linkedin != '') { ?>
		<a href="<?php echo $wpl_linkedin; ?>" target="_blank" title="<?php _e('Linkedin', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/linkedin.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_tumblr != '') {	?>
		<a href="<?php echo $wpl_tumblr; ?>" target="_blank" title="<?php _e('Tumblr', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/tumblr.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_delicious != '') {	?>
		<a href="<?php echo $wpl_delicious; ?>" target="_blank" title="<?php _e('Delicious', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/delicious.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_digg != '') {	?>
		<a href="<?php echo $wpl_digg; ?>" target="_blank" title="<?php _e('Digg', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/digg.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_stumbleupon != '') {	?>
		<a href="<?php echo $wpl_stumbleupon; ?>" target="_blank" title="<?php _e('Stumbleupon', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/stumbleupon.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_flickr != '') {	?>
		<a href="<?php echo $wpl_flickr; ?>" target="_blank" title="<?php _e('Flickr', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/flickr.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_picasa != '') {	?>
		<a href="<?php echo $wpl_picasa; ?>" target="_blank" title="<?php _e('Picasa', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/picasa.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_youtube != '') {	?>
		<a href="<?php echo $wpl_youtube; ?>" target="_blank" title="<?php _e('YouTube', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/youtube.png" width="22" height="22" /></a>
		<?php } ?>
		<?php if ($wpl_dribbble != '') {	?>
		<a href="<?php echo $wpl_dribbble; ?>" target="_blank" title="<?php _e('Dribble', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/dribbble.png" width="22" height="22" /></a>
		<?php } ?>
<!--<a title="<?php _e('HTML5, CSS3 and mobile compatible design', 'wplook'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/html5.png" width="22" height="22" /></a>-->
	</div><!--/social-icons-margins-->
</div><!--/social-icons-->
<div class="clear"></div>


</div>
<?php wp_footer(); ?>
</body></html>