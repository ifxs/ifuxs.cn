<?php
/**
 * Headerdata
 *
 * @package StylishWP
 * @subpackage DailyPost
 * @since DailyPost 1.0
 */

global $options;
foreach ($options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
}

// additional js and css
function wpl_scripts_include() {
	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'html5', 'http://html5shim.googlecode.com/svn/trunk/html5.js', '', '', '' );
}    
 
add_action('wp_enqueue_scripts', 'wpl_scripts_include');


function wplook_meta_description() {
	if (is_home() && get_option('wpl_meta_description') != '') {
		echo '<meta name="description" content="'.get_option('wpl_meta_description'). '" />';
	}
	
	if (is_single() || is_page()){
		$excerpt = get_the_excerpt();
		$title = get_the_title();		
			if ($excerpt == '') 
				echo '<meta name="description" content="'.$title.'" />';

			else 
				echo '<meta name="description" content="'.$excerpt.'" />';
		}
}

// Located in header.php 
// Creates the content of the Title tag
// Credits: Tarski Theme
function thematic_doctitle() {
					
	if ( is_home() || is_front_page() ) { 
		  $content = __('Latest posts', 'wplook'); 
		} 

	if ( is_search() ) { 
	  $content = __('<span>Search Results for:</span>', 'wplook'); 
	  $content .= ' ' . esc_html(stripslashes(get_search_query()));
	}

	elseif ( is_category() ) {
	  $content = __('<span>Category Archives:</span>', 'wplook');
	  $content .= ' ' . single_cat_title("", false);
	}

	elseif ( is_day() ) {
		$content = __( '<span>Daily Archives:</span>', 'wplook');
		$content .= ' ' . esc_html(stripslashes( get_the_date()));
	}
	
	elseif ( is_month() ) {
		$content = __( '<span>Monthly Archives:</span>', 'wplook');
		$content .= ' ' . esc_html(stripslashes( get_the_date( 'F Y' )));
	}
	elseif ( is_year()  ) {
		$content = __( '<span>Yearly Archives:</span>', 'wplook');
		$content .= ' ' . esc_html(stripslashes( get_the_date( 'Y' ) ));
	}		
	
	elseif ( is_tag() ) { 
	  $content = __('<span>Tag Archives:</span>', 'wplook');
	  $content .= ' ' . single_tag_title( '', false );
	}
	elseif (  is_singular()  || is_page() ) { 
	  $content = ' ';
	}

	elseif ( is_404() ) { 
	  $content = __('Not Found', 'wplook'); 
	}
	elseif (is_author() ) {
		
		$content = __('Posts by author', 'wplook');
		$author =  get_the_author_meta( 'display_name' );
		$content .= ' ' . $author;

		}

	
	$elements = array(
		'content' => $content
	);
	  
   

	// Filters should return an array
	$elements = apply_filters('thematic_doctitle', $elements);
	
	// But if they don't, it won't try to implode
		if(is_array($elements)) {
		  $doctitle = implode(' ', $elements);
		}
		else {
		  $doctitle = $elements;
		}

			if (is_singular() ) {
			$doctitle = $doctitle;
			}else {
				$doctitle = "<header class=\"page-header\"><h1 class=\"page-title\">" . $doctitle . "</h1><div class=\"left-corner\"></div></header>";
			}

	echo $doctitle;

} 

?>