<?php
/**
 * The Header for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
global $current_blog;
if(isset($current_blog)){
    $this_blog = array("b". $current_blog->blog_id);
}else{
    $this_blog = array();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--Include jQuery: -->
<?php if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );?>
<title><?php obandes_title();?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri().'/style.css'; ?>" />
<?php
if(get_option( 'obandes_css' ) !== ""){

echo str_replace(array("\n","\r","\t"),"",'<style type="text/css">'.get_option( 'obandes_css' ).'</style>'."\n");

}?>
<?php wp_head();?>
</head>
<body <?php body_class($this_blog); ?> onLoad="horizontal()">
<div id="<?php echo DOCUMENT_WIDTH; ?>" class="<?php echo SIDEBAR_WIDTH;?>">
<header>
<?php

    if( is_home() or is_front_page() ){
        $heading_elememt = 'h1';
    }else{
        $heading_elememt = 'div';
    }
    $title_format = '<%s class="h1"><span><a href="%s" title="%s" rel="%s">%s</a></span></%s>';

    printf(
        $title_format,
        $heading_elememt,
        home_url(),
        esc_attr(get_bloginfo( 'name', 'display' )),
        "home",
        get_bloginfo( 'name', 'display' ),
        $heading_elememt
        );
?>
  <div class="horizon-header" id="site-description">
    <?php bloginfo( 'description' ); ?>
  </div>
  <div class="horizon-header" style="text-align:right;">
    <?php get_search_form(); ?>
  </div>
  <div id="access" role="navigation">
    <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
  </div>
  <?php
if(SHOW_HEADER_IMAGE == true){
if ( is_singular() && has_post_thumbnail( $post->ID ) && ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) && $image[1] >= HEADER_IMAGE_WIDTH ) :
    // Houston, we have a new header image!
    echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
    else : ?>
  <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="header image"  style="width:<?php echo obandes_document_width();?>px;height:auto;" />
  <?php endif; }?>
</header>
<br style="clear:both;" />
