<?php
/**
 * Theme Framework functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;
	
/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */
function whole_setup() {

	// load language.
	load_theme_textdomain( 'whole' , get_template_directory() . '/languages' );

	// Adds title tag
	add_theme_support( "title-tag" );
	
	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'quote') );


	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'whole' ) );
	register_nav_menu( 'pr_menu_left', esc_html__( 'Main Menu Left', 'whole' ) );
	register_nav_menu( 'pr_menu_right', esc_html__( 'Main Menu Right', 'whole' ) );
	register_nav_menu( 'pr_menu_popup', esc_html__( 'Main Menu Popup', 'whole' ) );
	register_nav_menu( 'pr_menu_sidebar', esc_html__( 'Main Menu Sidebar', 'whole' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array('default-color' => 'e6e6e6',) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size('whole_blog_890x496', 890, 496, true);
	add_image_size('whole_blog_617x490', 617, 490, true);
	add_image_size('whole_team_337x400', 337, 400, true);
	add_image_size('whole_team_400x400', 400, 400, true);
	add_image_size('whole_shop_470x550', 470, 550, true);
	add_image_size('whole_portfolio_670x488', 670, 488, true);
	add_image_size('whole_portfolio_gallery_700x700', 700, 700, true);
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
}

add_action( 'after_setup_theme', 'whole_setup' );

/**
 * Custom params & remove VC Elements.
 * 
 * @author FOX
 */

function whole_vc_after_init(){
    
    require_once ( get_template_directory() . '/vc_params/vc_custom_heading.php' );
    require_once ( get_template_directory() . '/vc_params/cms_custom_pagram_vc.php' );
    require_once ( get_template_directory() . '/vc_params/vc_pie.php' );
    
    vc_remove_element( "vc_button" );
    vc_remove_element( "vc_button2" );
    vc_remove_element( "vc_cta_button" );
    vc_remove_element( "vc_cta_button2" );
    vc_remove_element( "vc_cta" );
    vc_remove_element( "cms_fancybox" );
    vc_remove_element( "cms_counter" );
}
add_action('vc_after_init', 'whole_vc_after_init');

/* Include CMS Shortcode */
function whole_shortcodes_list(){
	$whole_shortcodes_list = array(
		'cms_carousel',
		'cms_grid',
		'cms_fancybox_single',
		'cms_counter_single',
		'cms_progressbar',
		);

	return $whole_shortcodes_list;
}

function whole_get_post_meta($post_id = 0){
	global $post;
	if(!$post_id) $post_id = $post->ID;

	$_post_meta = maybe_unserialize(get_post_meta($post_id, 'opt_meta_options', true));

	if($_post_meta) return $_post_meta;

	return null;
}

/**
 * Add new elements for VC
 * 
 * @author FOX
 */

function whole_vc_elements(){
    
    if(class_exists('CmsShortCode')) {
    	add_filter('cms-shorcode-list', 'whole_shortcodes_list');

	    require_once( get_template_directory() . '/inc/elements/button/cms_button.php' );
	    require_once( get_template_directory() . '/inc/elements/googlemap/cms_googlemap.php' );
	    require_once( get_template_directory() . '/inc/elements/heading/cms_heading.php' );
	    require_once( get_template_directory() . '/inc/elements/videopopup/cms_videopopup.php' );
	    require_once( get_template_directory() . '/inc/elements/list/cms_list.php' );
	    require_once( get_template_directory() . '/inc/elements/cta/cms_cta.php' );
	    require_once( get_template_directory() . '/inc/elements/pricing/cms_pricing.php' );
	    require_once( get_template_directory() . '/inc/elements/timeline/cms_timeline.php' );
	    require_once( get_template_directory() . '/inc/elements/process/cms_process.php' );
	    require_once( get_template_directory() . '/inc/elements/countdown/cms_countdown.php' );
	    require_once( get_template_directory() . '/inc/elements/dropcap/cms_dropcap.php' );
	    require_once( get_template_directory() . '/inc/elements/restaurantmenu/cms_restaurantmenu.php' );
	    require_once( get_template_directory() . '/inc/elements/typingout/cms_typingout.php' );
	    require_once( get_template_directory() . '/inc/elements/alerts/cms_alerts.php' );
	}
}
add_action('vc_before_init', 'whole_vc_elements');

/* Add widgets */
require_once( get_template_directory() . '/inc/widgets/social.php' );
require_once( get_template_directory() . '/inc/widgets/recent-posts.php' );

/* Add Custom Editor VC */
require( get_template_directory() . '/inc/tinymce/tinymce.php' );

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function whole_front_end_scripts() {

	/*------------------------------------- JavaScript ---------------------------------------*/
	
	/** --------------------------libs--------------------------------- */
	
	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.2');

	/* Adds Magnific Popup. */
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0.0');

	/* Add main.js */
	wp_enqueue_script('whole-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
	
	/* Add menu.js */
	wp_enqueue_script('whole-menu', get_template_directory_uri() . '/assets/js/menu.js', array(), '1.0.0', true);
    
	/* Comment */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Add Same Height */
    wp_enqueue_script('matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( 'jquery' ), '1.0.0', true);

    /* Slick */
	wp_register_style('cms-slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.1');
	wp_register_script('cms-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0.0', true);

	/* Style Scroll */
    wp_enqueue_script('scroll-bar', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), '1.0.0', true);

    /* animation column */
    wp_enqueue_script('animation-column', get_template_directory_uri() . '/assets/js/animation-column.js', array( 'jquery' ), '1.0.0', true);
    
    /*pie chart*/
	wp_enqueue_script('progressCircle', get_template_directory_uri() . '/assets/js/process_cycle.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('vc_pie_custom', get_template_directory_uri() . '/assets/js/vc_pie_custom.js', array( 'jquery' ), '1.0.0', true);
	
	/** ----------------------------------------------------------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads fonts stylesheet. */
	wp_enqueue_style('whole-fonts', get_template_directory_uri() . '/assets/css/fonts.css');

	/* Loads Magnific Popup stylesheet. */
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0');

	/* Font Material Icon */
	wp_enqueue_style('font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '4.3.0');
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'whole-style', get_stylesheet_uri(), array( 'bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'whole-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'whole-style' ), '2.0' );
	
	/* ie */
	wp_style_add_data( 'whole-ie', 'conditional', 'lt IE 9' );

	/* Loads Pe Icon. */
	wp_enqueue_style('whole-pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');
	
	/* Load static css*/
	wp_enqueue_style('whole-static', get_template_directory_uri() . '/assets/css/static.css', array( 'whole-style' ), '1.0.0');

	/* Loads animations stylesheet. */
	wp_enqueue_style('animations', get_template_directory_uri() . '/assets/css/animations.css');
	
}

add_action( 'wp_enqueue_scripts', 'whole_front_end_scripts' );

/**
 * load admin scripts.
 * 
 * @author FOX
 */
function whole_admin_scripts(){

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	$screen = get_current_screen();

	/* load js for edit post. */
	if($screen->post_type == 'post'){
		/* post format select. */
		wp_enqueue_script('post-format', get_template_directory_uri() . '/assets/js/post-format.js', array(), '1.0.0', true);
	}
}

add_action( 'admin_enqueue_scripts', 'whole_admin_scripts' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function whole_widgets_init() {

	global $opt_theme_options;

	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'whole' ),
		'id' => 'main-sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'whole' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '<span class="line1"></span><span class="line2"></span><span class="line3"></span></h3>',
	) );

	register_sidebar(array(
        'name' => 'Woocommerce Sidebar',
        'id' => 'woocommerce-widget-area',
        'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '<span class="line1"></span><span class="line2"></span><span class="line3"></span></h3>',
    ));

    register_sidebar(array(
        'name' => 'Newsletter',
        'id' => 'newletter',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Hidden Sidebar',
        'id' => 'hidden-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '<span class="line1"></span><span class="line2"></span><span class="line3"></span></h3>',
    ));

	/* Footer Top */
	if(!empty($opt_theme_options['footer-top-column'])) {

		for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){
			register_sidebar(array(
				'name' => sprintf(esc_html__('Footer Top - Column %s', 'whole'), $i),
				'id' => 'sidebar-footer-top-' . $i,
				'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'whole'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
		}
	}

	register_sidebar( array(
		'name' => esc_html__( 'Footer Bottom', 'whole' ),
		'id' => 'footer-bottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Fixed', 'whole' ),
		'description' => esc_html__( 'Apply Footer layout 5.', 'whole' ),
		'id' => 'footer-fixed',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'whole_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function whole_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}

add_filter( 'wp_page_menu_args', 'whole_page_menu_args' );



/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function whole_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'whole' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'whole' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'whole' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function whole_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation cms-paging-navigation clearfix" role="navigation">
			<div class="pagination loop-pagination">
				<?php echo wp_kses_post($links); ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function whole_post_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) )
    {
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links row clearfix">
			<div class="nav-link-prev col-sm-6 col-xs-12 text-left">
				<?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
						<?php 
							$url_prev = wp_get_attachment_url( get_post_thumbnail_id($previous_post->ID, 'medium') );
						?>
						<span class="nav-image" style="background-image: url(<?php echo esc_url($url_prev); ?>);"></span>
						<div class="nav-inner">
				  			<span><?php echo esc_html_e('Previous Post', 'whole') ?></span>
					  		<h3><?php echo get_the_title( $previous_post->ID ); ?></h3>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
			<div class="nav-link-next col-sm-6 col-xs-12 text-right">
				<?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
						<?php 
							$url_next = wp_get_attachment_url( get_post_thumbnail_id($next_post->ID), 'medium'); 
						?>
						<span class="nav-image" style="background-image: url(<?php echo esc_url($url_next); ?>);"></span>
						<div class="nav-inner">
				  			<span><?php echo esc_html_e('Next Post', 'whole') ?></span>
					  		<h3><?php echo get_the_title( $next_post->ID ); ?></h3>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
    }
}

function whole_portfolio_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) )
    {
    ?>
	<nav class="portfolio-navigation row">
		<div class="nav-link-prev col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center-xs">
			<?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
				<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
					<i class="fa fa-angle-left"></i>
					<span class="nav-portfolio-subtitle ft-dsi"><?php esc_html_e('Previous Project', 'whole'); ?></span>
					<span class="nav-portfolio-title ft-psb"><?php echo get_the_title( $previous_post->ID ); ?><span>
			  	</a>
			<?php } ?>
		</div>
		<div class="nav-all-portfolio col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
			<a href="<?php echo esc_url(home_url('/')); ?>?post_type=portfolio">
				<i class="fa fa-th-large"></i>
			</a>
		</div>
		<div class="nav-link-next col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right text-center-xs">
			<?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
				<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
					<span class="nav-portfolio-subtitle ft-dsi"><?php esc_html_e('Next Project', 'whole'); ?></span>
					<span class="nav-portfolio-title ft-psb"><?php echo get_the_title( $next_post->ID ); ?><span>
			  		<i class="fa fa-angle-right"></i>
			  	</a>
			<?php } ?>
		</div>
	</nav><!-- .navigation -->
	<?php
    }
}
/* End Portfolio */

/* Add Custom Comment */
function whole_custom_list_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-inner">
	    <div class="comment-author vcard">
	        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	        <div class="comment-right">
	        	<cite class="fn"><?php printf( '%s' , get_comment_author_link() ); ?></cite>
		        <span class="comment-date">
					<?php
						echo get_comment_date() .' - '. get_comment_time();
					?>
				</span>
		    </div>
	    </div>
	    <?php if ( $comment->comment_approved == '0' ) : ?>
	         <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'whole' ); ?></em>
	          <br />
	    <?php endif; ?>

	</div>
	<div class="commetn-text">
    	<?php comment_text(); ?>
    	<div class="reply">
	        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    </div>
	    <div class="line-comment"></div>
    </div>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}


/* core functions. */
require_once( get_template_directory() . '/inc/functions.php' );

/* Add Template Woocommerce */
if(class_exists('Woocommerce')){
	require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
	require_once( get_template_directory() . '/woocommerce/wc-template-hooks.php' );
}

add_action( 'after_setup_theme', 'whole_pr_gallery' );
function whole_pr_gallery() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'vc_before_init', 'whole_integrate_with_vc' );
function whole_integrate_with_vc() {
	vc_add_param("vc_tta_section", array(
			"type" => "css_editor",
			"param_name" => 'body_css',
			"group" => esc_html__("Style", 'whole'),
		)
	);
}


/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'whole_user_fields' );
add_action( 'edit_user_profile', 'whole_user_fields' );
function whole_user_fields($user){

	$user_facebook = get_user_meta($user->ID, 'user_facebook', true);
	$user_twitter = get_user_meta($user->ID, 'user_twitter', true);
	$user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
	$user_skype = get_user_meta($user->ID, 'user_skype', true);
	$user_google = get_user_meta($user->ID, 'user_google', true);
	$user_youtube = get_user_meta($user->ID, 'user_youtube', true);
	$user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
	$user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
	$user_rss = get_user_meta($user->ID, 'user_rss', true);
	$user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
	$user_instagram = get_user_meta($user->ID, 'user_instagram', true);
	$user_yelp = get_user_meta($user->ID, 'user_yelp', true);

	?>
	<h3><?php esc_html_e('Social', 'whole'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'whole'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'whole'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'whole'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'whole'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'whole'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'whole'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'whole'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'whole'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_rss"><?php esc_html_e('Rss', 'whole'); ?></label></th>
            <td>
                <input id="user_rss" name="user_rss" type="text" value="<?php echo esc_attr(isset($user_rss) ? $user_rss : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'whole'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'whole'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'whole'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'whole_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'whole_save_user_custom_fields' );
function whole_save_user_custom_fields( $user_id )
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	if(isset($_POST['user_facebook']))
		update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
	if(isset($_POST['user_twitter']))
		update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
	if(isset($_POST['user_linkedin']))
		update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
	if(isset($_POST['user_skype']))
		update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
	if(isset($_POST['user_google']))
		update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
	if(isset($_POST['user_youtube']))
		update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
	if(isset($_POST['user_vimeo']))
		update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
	if(isset($_POST['user_tumblr']))
		update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
	if(isset($_POST['user_rss']))
		update_user_meta( $user_id, 'user_rss', $_POST['user_rss'] );
	if(isset($_POST['user_pinterest']))
		update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
	if(isset($_POST['user_instagram']))
		update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
	if(isset($_POST['user_yelp']))
		update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}

/* Update CSS within in Admin */
function whole_admin_style() {
  wp_enqueue_style('whole_admin_style', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'whole_admin_style');

/**
 * Demo Data
 */
add_filter('ef3-theme-options-opt-name', 'whole_set_demo_opt_name');

function whole_set_demo_opt_name(){
	return 'opt_theme_options';
}

add_filter('ef3-replace-content', 'whole_replace_content', 10 , 2);

function whole_replace_content($replaces, $attachment){
	return array(
		'/tax_query:/' => 'remove_query:',
		'/categories:/' => 'remove_query:',
	);
}

add_filter('ef3-replace-theme-options', 'whole_replace_theme_options');

function whole_replace_theme_options(){
	return array(
		'dev_mode' => 0,
	);
}

add_filter('ef3-enable-create-demo', 'whole_enable_create_demo');

function whole_enable_create_demo(){
	return false;
}

/**
 * End Demo Data
 */