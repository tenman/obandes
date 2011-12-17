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

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<?php
$embed_style = get_option('obandes_theme_settings');
if($embed_style['obandes_css'] !== ""){

/**
 * CSS e.g. url(images/something.png) change absolute URL.
 * url(http://example.com/wp/wp-content/themes/obandes/images/something.png)
 *
 */
    $embed_style = htmlspecialchars_decode($embed_style['obandes_css'], ENT_NOQUOTES);
}else{
    global $css_preset;
    $embed_style = $css_preset;
}

$obandes_template_dir = get_template_directory_uri();
$embed_style = preg_replace('!(url\()([^\)]+)(\))!',"$1{$obandes_template_dir}/$2$3",$embed_style);
$embed_style = str_replace(array('&lt;','&#60;','&#x3c;','PA==','%3C','!/```'),' !less than ',$embed_style);

echo str_replace(array("\n","\r","\t",'&quot;'),array("","","",'"'),"\n<style type=\"text/css\"><!--\n".$embed_style."--></style>");
?>

<?php wp_head();?>
</head>
<body <?php body_class($this_blog); ?> onLoad="horizontal()">
<div id="<?php echo obandes_get_condition('letter-width'); ?>" class="<?php echo obandes_get_condition('menu-position');?>">
<header style="background:<?php echo obandes_get_condition('obandes_header_background_color');?>">
<?php
    $heading_elememt = 'h1';

    $title_format = '<%s class="h1" id="site-title"><a href="%s" title="%s" rel="%s"><span>%s</span></a></%s>';

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
<div class="search-form"><?php get_search_form(); ?></div>
<div id="access" role="navigation" class="clearfix">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>
<?php
    $obandes_image_uri = get_header_image();

    if(!empty($obandes_image_uri)){

        if ( is_singular()
                and has_post_thumbnail( $post->ID )
                and (  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) )
                and $image[1] >= HEADER_IMAGE_WIDTH
            ){
                echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
        }elseif(!empty($obandes_image_uri)){

$header_image_format = '<div id="header-image" style="%s"><img src="%s" width="%s" height="%s" alt="header image"  style="width:%s;height:auto;" /></div>';

switch(obandes_get_condition('letter-width')){
case("doc3"):
case("doc4"):
$obandes_header_image_width = '100%';
$obandes_header_image_height = '100%';

break;
default:
$obandes_header_image_width = HEADER_IMAGE_WIDTH.'px';
$obandes_header_image_height = HEADER_IMAGE_HEIGHT.'px';
break;
}
            printf( $header_image_format,
                    "background:none;",
                    $obandes_image_uri,
                    $obandes_header_image_width,
                    $obandes_header_image_height,
                   $obandes_header_image_width
            );

        }

    }
?>
</header>
<?php
require("example.php");
echo $var;
echo hello_world();
?>