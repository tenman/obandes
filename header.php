<?php
/**
 * The Header for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
	if ( is_singular() and get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
?>
<title><?php trim(obandes_title());?></title>
<?php wp_head();?>
</head>
<body <?php body_class(); ?> onLoad="horizontal()">
<div id="<?php echo obandes_get_condition('letter-width'); ?>" class="<?php echo obandes_get_condition('menu-position');?>">
<header style="background:<?php echo obandes_get_condition('obandes_header_background_color');?>">
<?php	obandes_title_format();?>
	<div id="site-description"><?php bloginfo( 'description' ); ?></div>
	<div class="search-form"><?php get_search_form(); ?></div>
	<div id="access" role="navigation" class="clearfix">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>
<?php obandes_header_image_renderer();?>
</header>