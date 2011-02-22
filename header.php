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
<?php 
	if ( is_singular() and get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
	}
?>

<title><?php trim(obandes_title());?></title>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri().'/style.css'; ?>" />
<?php
if(get_option( 'obandes_css' ) !== ""){
echo str_replace(array("\n","\r","\t"),"","\n<style type=\"text/css\"><!--".get_option( 'obandes_css' )."--></style>");
}?>

<?php wp_head();?>
</head>
<body <?php body_class($this_blog); ?> onLoad="horizontal()">
<div id="<?php echo DOCUMENT_WIDTH; ?>" class="<?php echo SIDEBAR_WIDTH;?>">
<header class="clearfix">
<?php
    if( is_home() or is_front_page() ){
        $heading_elememt = 'h1';
    }else{
        $heading_elememt = 'div';
    }
    $title_format = '<%s class="h1 clear-fix" id="site-title"><span><a href="%s" title="%s" rel="%s">%s</a></span></%s>';

    printf(
        $title_format,
        $heading_elememt,
        home_url(),
        esc_attr(get_bloginfo( 'name', 'display' )),
        "home",
        get_bloginfo( 'name', 'display' ),
        $heading_elememt
        );
		// class="horizon-header"
?>
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
<div class="search-form"><?php //get_search_form(); ?></div>
<div id="access" role="navigation">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>
<?php
	if(get_option("obandes_header") == 'show'){
	
		if ( is_singular() 
				and has_post_thumbnail( $post->ID ) 
				and (  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) 
				and $image[1] >= HEADER_IMAGE_WIDTH 
			){
			
				echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
		}else{
		 
$header_image_format = '<img src="%s" width="%s" height="%s" alt="header image"  style="width:%spx;height:auto;" />';
		
			printf(	$header_image_format,
					get_header_image(),
					HEADER_IMAGE_WIDTH,
					HEADER_IMAGE_HEIGHT,
					obandes_document_width()
			);
				 
		}
	  
	}
?>

</header>

