<?php
/**
 * The Header for obandes.
 *
 *
 * @package: obandes
 * @since obandes 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right')?></title>
<?php wp_head();?>
</head>
<body <?php body_class(); ?> onLoad="horizontal()">
<div id="<?php echo obandes_get_condition('letter-width'); ?>" class="<?php echo obandes_get_condition('menu-position');?>">
<header id="obandes-page-header">
<?php if( get_header_textcolor() !== 'blank' ){?>
	<?php	obandes_title_format();?>
	<div id="site-description"><?php bloginfo( 'description' ); ?></div>
	<div class="search-form"><?php get_search_form(); ?></div>
<?php }?>
	<div id="access" role="navigation" class="clearfix">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div>
<?php obandes_header_image_renderer();?>
</header>