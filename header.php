<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="Rémi LEDUC, artisan tolier-formeur. Construction et restauration de véhicules anciens, modelage, formation professionnelle. Découvrez notre travail sur ce site." />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'atelier' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'template_url' ); ?>/css/demo1/style.css" />
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon.png" />
<link rel="shortcut icon" type="image/x-icon" href="http://static.atelierformeauto.com/favicon.ico" />
<!--<script type="text/javascript" src="http://gettopup.com/releases/latest/top_up-min.js"></script> -->
<!--<script src="<?php bloginfo('template_url'); ?>/js/top_up-min.js" type="text/javascript" charset="utf-8"></script>-->

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
//	if ( is_singular() && get_option( 'thread_comments' ) )
//		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.qtip.js" type="text/javascript" charset="utf-8"></script>
<script src='<?php bloginfo('template_url'); ?>/js/infogrid.js' type='text/javascript' charset="utf-8"></script>
</head>

<body <?php body_class(); ?>>
<div id="header">
  <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
  <a href="<?php echo get_page_link(62); ?>" id="contact" title="Contacter Atelier Forme Auto"><img src="<?php bloginfo('template_url'); ?>/images/banniere.png" alt="Rémi Leduc, carrossier indépendant" /></a>
</div>
