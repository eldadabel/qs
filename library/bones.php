<?php
define( "BONES_URI", get_stylesheet_directory_uri() );

/* Welcome to Bones :)
This is the core Bones file where most of the
main functions & features reside. If you have
any custom functions, it's best to put them
in the functions.php file.

Developed by: Eddie Machado
URL: http://themble.com/bones/

  - head cleanup (remove rsd, uri links, junk css, ect)
  - enqueueing scripts & styles
  - theme support functions
  - custom menu output & fallbacks
  - related post function
  - page-navi function
  - removing <p> from around images
  - customizing the post excerpt

*/

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bones_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );

} /* end bones head cleanup */

// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;

  // Don't affect in feeds.
  if ( is_feed() ) return $title;

  // Add the blog's name
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " {$sep} {$site_description}";
  }

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }

  return $title;

} // end better title

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function bones_scripts_and_styles() {

  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {
		// enqueue stylesheets
		wp_enqueue_style( 'bones-royaslider', BONES_URI . '/library/js/royalslider/royalslider.css' );
		wp_enqueue_style( 'bones-royaslider-skin', BONES_URI . '/library/js/royalslider/skins/default/rs-default.css' );    
		wp_enqueue_style( 'bones-stylesheet', BONES_URI . '/library/css/style.css', array(), '1.1');    
		wp_enqueue_style( 'bones-stylesheet-responsive', BONES_URI . '/library/css/responsive.css' );
        
        // enqueue scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('bones-stellar', BONES_URI . '/library/js/libs/jquery.stellar.min.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-masonry', BONES_URI . '/library/js/libs/masonry.pkgd.min.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-picturefill', BONES_URI . '/library/js/libs/picturefill.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-royalslider', BONES_URI . '/library/js/royalslider/jquery.royalslider.min.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-modernizr', BONES_URI . '/library/js/libs/modernizr.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-touchswipe', BONES_URI . '/library/js/libs/jquery.touchSwipe.min.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-mousewheel', BONES_URI . '/library/js/libs/jquery.mousewheel.min.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-methode', BONES_URI . '/library/js/libs/methode.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-imagesloaded', BONES_URI . '/library/js/libs/imagesloaded.pkgd.min.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-muzeme', BONES_URI . '/library/js/libs/muzeme.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-ajax-contact', BONES_URI . '/library/js/libs/php/ajax_contact.js', array('jquery'), '1.1', true );
        wp_enqueue_script('bones-smooth-scroll', BONES_URI . '/library/js/libs/smooth-scroll.js', array('jquery'), '1', true );
        wp_enqueue_script('bones-waypoinys', BONES_URI . '/library/js/libs/jquery.waypoints.min.js', array('jquery'), '1', true );
      
        // update form ajax script with correct URL
        $js_array = array(
            'theme_url' => BONES_URI,
            'thank_you_message' => ot_get_option( 'contact_form_thank_you_message' ),
            'thank_you_message_ajax' => ot_get_option( 'contact_form_thank_you_message_ajax' ),
        );
        wp_localize_script( 'bones-ajax-contact', 'QS_DATA', $js_array );
        
	}
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(355, 186);
    add_image_size('featured-thumbnail', 734, 380);
    add_image_size('latest-thumbnail', 100, 60);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Menu', 'bonestheme' ),
        'main-social' => __( 'Main Menu Social', 'bonestheme' ),
        'footer-social' => __( 'Footer Menu Social', 'bonestheme' ),
        'footer-menu' => __( 'Footer Menu', 'bonestheme' ),        
        'blog-menu' => __( 'Blog Menu', 'bonestheme' ),
        'blog-footer-menu-1' => __( 'Blog Footer Menu 1', 'bonestheme' ),
        'blog-footer-menu-2' => __( 'Blog Footer Menu 2', 'bonestheme' ),
        'blog-footer-menu-3' => __( 'Blog Footer Menu 3', 'bonestheme' ),
        'blog-footer-menu-4' => __( 'Blog Footer Menu 4', 'bonestheme' ),
        'blog-footer-menu-5' => __( 'Blog Footer Menu 5', 'bonestheme' ),
        'blog-footer-menu-6' => __( 'Blog Footer Menu 6', 'bonestheme' ),
      )
    );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

} /* end bones theme support */


/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
} /* end bones related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '',
    'next_text'    => '',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', 'bonestheme' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

function bones_get_post_thumb($post_id) {
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'post');
    
    if ( $thumb ) {
        $thumb = $thumb[0];
    }
    
    return $thumb;
}

function bones_get_next_post($post_type) {
    $next_post = get_next_post(); 
    
    // reached last post - go back to the first post
    if ( empty($next_post) ) {
        $args = array(
            'post_type' => $post_type, // change this to the post type you registered
            'posts_per_page' => 1,
            'order' => 'ASC',
        );
        $posts = get_posts($args); 
        $next_post = $posts[0];
    }
    
    return $next_post;
}


function bones_get_prev_post($post_type) {
    $prev_post = get_previous_post(); 
    
    // reached last post - go back to the first post
    if ( empty($prev_post) ) {
        $args = array(
            'post_type' => $post_type, // change this to the post type you registered
            'posts_per_page' => 1,
            'order' => 'DESC',
        );
        $posts = get_posts($args); 
        $prev_post = $posts[0];
    }
    
    return $prev_post;
}


function bones_bg_image($field_name, $is_sub = false) {
    if ( $is_sub ) {
        $img = get_sub_field( $field_name );
    }
    else {
        $img = get_field( $field_name );
    }
    
    if ($img) {
        $url = $img['url'];
        
        echo "style='background-image: url($url);'";
    }
}


function bones_get_menu_name( $menu_location ) {
  $menu_locations = get_nav_menu_locations();
  $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
  $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

  echo esc_html($menu_name);
}

/**
 * If more than one page exists, return TRUE.
 */
function bones_show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

?>
