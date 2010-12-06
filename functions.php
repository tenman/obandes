<?php

/**
 * 
 *
 * #doc - 750px centered (good for 800x600)
 * #doc2 - 950px centered (good for 1024x768)
 * #doc3 - 100% fluid (good for everybody)
 * #doc4 - 974px
 * #doc-custom - an example of a custom page width *
 *
 */
    if(!defined('DOCUMENT_WIDTH')){
        define('DOCUMENT_WIDTH', 'doc2' );
    }
	
/**
 *
 *
 * .yui-t1 - Two columns, narrow on left, 160px
 * .yui-t2 - Two columns, narrow on left, 180px
 * .yui-t3 - Two columns, narrow on left, 300px
 * .yui-t4 - Two columns, narrow on right, 180px
 * .yui-t5 - Two columns, narrow on right, 240px
 * .yui-t6 - Two columns, narrow on right, 300px
 *
 */
	
    if(!defined('SIDEBAR_WIDTH')){
        define('SIDEBAR_WIDTH', 'yui-t5' );
    }


    if(!defined('NO_HEADER_TEXT')){
        define('NO_HEADER_TEXT', false );
    }
    if(!defined('HEADER_TEXTCOLOR')){
        define('HEADER_TEXTCOLOR', 'ffffff');
    }
	
	
    if(!defined('HEADER_IMAGE')){
        define('HEADER_IMAGE', '%s/images/headers/wp3.jpg');
    }
     if(!defined('HEADER_IMAGE_WIDTH')){
        define('HEADER_IMAGE_WIDTH', 950);//auto or 999px
    }

    if(!defined('HEADER_IMAGE_HEIGHT')){
        define('HEADER_IMAGE_HEIGHT', 198);//auto or 999px
    }
    if(!defined('SHOW_HEADER_IMAGE')){
        define('SHOW_HEADER_IMAGE',true);
    }
    add_action( 'widgets_init', 'obandes_widgets_init' );

    function obandes_widgets_init() {

        register_sidebar(array (
          'name' => __('Default Sidebar'),
          'id' => 'sidebar-1',
          'before_widget' => '<li class="widget default">',
          'after_widget' => '</li>
        ',
          'before_title' => '<h2 class="widgettitle default h2">',
          'after_title' => '</h2>
        ',
          'widget_id' => 'default',
          'widget_name' => 'default',
      
	      'text' => "1"));
    }

//page exstra sidebar show
	$rsidebar_show = true;	
/** 
 *
 * editor-style.css 
 *
 *
 *
 */

 add_editor_style();

/**
 * navibar
 *
 *
 *
 *
 */

if(!function_exists("register_obandes_menus")){

	add_action( 'init', 'register_obandes_menus' );
	
	function register_obandes_menus() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Main Column Wiget Area', 'obandes' ),
		'id' => 'sidebar-1',
		'description' => __( 'The main colmun widget area', 'obandes' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	}
}



   register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'obandes' ),
    ) );



if(!function_exists("obandes_page_menu_args")){
function obandes_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'obandes_page_menu_args' );

}



 
add_custom_background();



if(function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	
}


if(!isset($content_width)){
	$content_width = content_width();
}


load_textdomain( 'obandes', get_template_directory().'/languages/'.get_locale().'.mo' );


if (!function_exists('obandes_posted_on')) {

    function obandes_posted_on() {
        printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'obandes' ),
            'meta-prep meta-prep-author',
            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
                get_permalink(),
                esc_attr( get_the_time() ),
                get_the_date()
            ),
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="vcard:url">%3$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ),
                sprintf( esc_attr__( 'View all posts by %s', 'obandes' ), get_the_author() ),
                get_the_author()
            )
        );
    }

}



function obandes_title(){
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
		echo '|' .$site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo '|' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

}



add_action('init', 'obandes_init');

function obandes_init() {
	if (!is_admin()) {
	
	wp_register_style('html5reset', 'http://html5resetcss.googlecode.com/files/html5-reset-1.4.css',false,'1.4');
	wp_enqueue_style( 'html5reset');
	
	/*wp_register_style('Tangerine', 'http://fonts.googleapis.com/css?family=Tangerine',false,'0.1');
	wp_enqueue_style( 'Tangerine');*/

	wp_register_script('yui-css','http://yui.yahooapis.com/2.8.0r4/build/yuiloader/yuiloader-min.js',false,'2.8.0r4');
	wp_enqueue_script('yui-css');
	wp_register_script('yui', get_template_directory_uri().'/yui.js', array('yui-css'), '0.1');
	wp_enqueue_script('yui');

	wp_register_script('obandes', get_template_directory_uri().'/obandes.js', array('jquery'), '0.1');
	wp_enqueue_script('obandes');
	
	}
}



register_default_headers( array(

        'default' => array(
            'url' => '%s/images/headers/wp3.jpg',
            'thumbnail_url' => '%s/images/headers/wp3-thumbnail.jpg',
            /* translators: header image description */
            'description' => __( 'obandes', 'obandes' )
        )

) );

add_custom_image_header( '', 'twentyten_admin_header_style' ); 
 
if ( ! function_exists( 'twentyten_admin_header_style' ) ){

	function twentyten_admin_header_style() {
	?>
		<style type="text/css">
		/* Shows the same border as on front end */
		#headimg {
			border-bottom: 1px solid #000000;
			border-top: 4px solid #000000;
		}
		
		/* If NO_HEADER_TEXT is false, you can style here the header text preview */
		#headimg #name {
		}
		
		#headimg #desc {
		}
		</style>
	<?php
	}
}

add_filter('body_class','add_body_class');
	
if (!function_exists('add_body_class')) {

function add_body_class($class) {

    /**
     * body class add lang
     *
     * example
     *
     * $classes= array('class1','class2');
     *
     */
    $lang = WPLANG;
    $classes= array($lang);
	$classes= array_merge($classes,$class);
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;


	switch(true){

        case($is_lynx):
			$classes[] = 'lynx';
        break;
        case($is_gecko):
            $classes[] = 'gecko';
        break;
        case($is_IE):
            preg_match(" |(MSIE )([0-9])(\.)|si",$_SERVER['HTTP_USER_AGENT'],$regs);
            $classes[] = 'ie'.$regs[2];
        break;
        case($is_opera):
             $classes[] = 'opera';
        break;
        case($is_NS4):
            $classes[]  = 'ns4';
        break;
        case($is_safari):
            $classes[]  = 'safari';
        break;
        case($is_chrome):
            $classes[]  = 'chrome';
        break;
        case($is_iphone):
            $classes[]  = 'iphone';
        break;
        default:
            $classes[]  = 'unknown';
        break;
        }

    return $classes;
	}
}



function content_width(){

	$adjust = 16;
	$default = 400;

if(DOCUMENT_WIDTH == 'doc'){
	$w = 750;
	$adjust = 16;
	if(SIDEBAR_WIDTH == 'yui-t1'){
		$content_width = $w - 160 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t2'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t3'){
		$content_width = $w - 300 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t4'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t5'){
		$content_width = $w - 240 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t6'){
		$content_width = $w - 300 - $adjust;
	}else{
		$content_width = $default;
	}
}elseif(DOCUMENT_WIDTH == 'doc2'){
	$w = 950;
		$adjust = 16;
	if(SIDEBAR_WIDTH == 'yui-t1'){
		$content_width = $w - 160 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t2'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t3'){
		$content_width = $w - 300 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t4'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t5'){
		$content_width = $w - 240 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t6'){
		$content_width = $w - 300 - $adjust;
	}else{
		$content_width = $default;
	}
}elseif(DOCUMENT_WIDTH == 'doc3'){
	$w = 750;
	if(SIDEBAR_WIDTH == 'yui-t1'){
		$content_width = $w - 160 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t2'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t3'){
		$content_width = $w - 300 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t4'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t5'){
		$content_width = $w - 240 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t6'){
		$content_width = $w - 300 - $adjust;
	}else{
		$content_width = $default;
	}
}elseif(DOCUMENT_WIDTH == 'doc4'){
	$w = 974;
	$adjust = 16;
	if(SIDEBAR_WIDTH == 'yui-t1'){
		$content_width = $w - 160 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t2'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t3'){
		$content_width = $w - 300 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t4'){
		$content_width = $w - 180 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t5'){
		$content_width = $w - 240 - $adjust;
	}elseif(SIDEBAR_WIDTH == 'yui-t6'){
		$content_width = $w - 300 - $adjust;
	}else{
		$content_width = $default;
	}
}

return $content_width;

}

function document_width(){
	global $content_width;
	
	switch(DOCUMENT_WIDTH){
	
	case('doc'):
	
		$result = 750;
	break;
	case('doc2'):
	
		$result = 950;
	break;
	case('doc4'):
	
		$result = 974;
	break;
	default:
	
		$result = $content_width;
	
	break;
	
	
	}
return $result;
}

if (!function_exists('obandes_posted_in')) {
    function obandes_posted_in() {
        // Retrieves tag list of current post, separated by commas.
        $tag_list = get_the_tag_list( '', ', ' );
        if ( $tag_list ) {
            $posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'obandes' );
        } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
            $posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'obandes' );
        } else {
            $posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'obandes' );
        }
        // Prints the string, replacing the placeholders.
        printf(
            $posted_in,
            get_the_category_list( ', ' ),
            $tag_list,
            get_permalink(),
            the_title_attribute( 'echo=0' )
        );
    }

}

function obandes_gallery_list(){
global $post;

$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 10 ) );

                    $total_images = count( $images );
						
	$result = '<div class="horizon-gallery">';
 
	if(isset($images)){
		foreach($images as $image){
		
		
		$result .= '<a class="size-thumbnail" href="'.get_permalink() .$image->post_title.'/">'.wp_get_attachment_image( $image->ID, 'thumbnail' ).' </a>';
		
		}
	}else{
	return false;
	
	}

	return $result.'</div>';

	}


?>