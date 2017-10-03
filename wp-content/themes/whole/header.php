<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
global $opt_theme_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if ( $opt_theme_options['rtl'] ) { ?>dir="rtl"<?php } ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body id="cms-theme" <?php body_class(); ?>>
	<?php 
		whole_body_border(); 
		whole_get_page_loading(); 
	?>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header">
		<?php whole_header(); ?>
	</header><!-- #masthead -->
    <?php whole_page_title(); ?><!-- #page-title -->
	<div id="cms-content" class="site-content">