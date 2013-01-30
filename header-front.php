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
<?php
$obandes_text_color = get_header_textcolor();
if( $obandes_text_color  !== 'blank' ){?>
    <?php   obandes_title_format();?>
    <div id="site-description"><?php bloginfo( 'description' ); ?></div>
    <div class="search-form"><?php get_search_form(); ?></div>
<?php }?>
<p class="obandes-mobile-menu"><a href="#access" class="open" style="color:#<?php echo $obandes_text_color;?>">+</a><span class="menu-text" style="color:#<?php echo $obandes_text_color;?>">menu</span><a href="#<?php echo obandes_get_condition('letter-width'); ?>" class="close" style="color:#<?php echo $obandes_text_color;?>">-</a></p>
	<div id="access" role="navigation" class="clearfix">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div>
</header>