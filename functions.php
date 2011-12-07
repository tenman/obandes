<?php
/**
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
    if(!defined('OBANDES_HEADER_BACKGROUND_COLOR')){
        define('OBANDES_HEADER_BACKGROUND_COLOR','#FFA500');
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


    add_action( 'widgets_init', 'obandes_widgets_init' );
    function obandes_widgets_init() {
        register_sidebar(array (
          'name' => __('Default Sidebar','obandes'),
          'id' => 'sidebar-1',
          'before_widget' => '<li class="widget default">',
          'after_widget' => '</li>',
          'before_title' => '<h2 class="widgettitle default h2">',
          'after_title' => '</h2>',
          'widget_id' => 'default',
          'widget_name' => 'default',
          'text' => "1"));
    }
    if(!defined('OBANDES_USE_LIST_EXCERPT')){
        define("OBANDES_USE_LIST_EXCERPT",false);
    }

/**
 * post_formats
 */
if(locate_template( array( 'formats/format.php' ))){

    add_theme_support(
        'post-formats',
        array(  'aside',
                'gallery',
                'chat',
                'link',
                'image',
                'status',
                'quote',
                'video'
            )
    );
}


add_custom_image_header( 'obandes_header_style', 'obandes_admin_header_style','obandes_admin_header_image');

if ( ! function_exists( 'obandes_header_style' ) ){
    function obandes_header_style(){

        ?>
        <style type="text/css">
        <?php echo 'header h1,header h1 a,header #site-description {color:#'.get_theme_mod( 'header_textcolor' ).'}';?>

        </style>
        <?php
    }
}

if ( ! function_exists( 'obandes_admin_header_style' ) ){
    function obandes_admin_header_style() {
    ?>
        <style type="text/css">
        /* Shows the same border as on front end */
        #headimg {
            -moz-border-radius-topleft:10px;
            -moz-border-radius-topright:10px;
            -webkit-border-top-left-radius:10px;
            -webkit-border-top-right-radius:10px;
            border-top-left-radius:10px;
            border-top-right-radius:10px;
            background:<?php echo obandes_get_condition('obandes_header_background_color');?>;
            padding-top:1em;
        }
        #headimg h1{
            font-family:Georgia, "Times New Roman", Times, serif!important;
            margin:0 10px!important;
            font-size:2em!important;
            text-align:left;
            text-decoration:none;
            text-align:left;
            font-weight:700;
            text-indent:10px;
        }
        #headimg img{
            border-bottom:2px solid #000;
            margin-bottom:-5px;
        }

        #headimg #site-description{
            text-indent:1em;
            margin:0;
            padding:12px;
            text-align:left;
        }

        #headimg #name {
            color:#000;
        }
        #headimg #desc {
            color:#000;
        }
        #headimg #access a,
        #headimg #access .menu,
        #headimg #access {
            background:#000;
            color:#fff;
        }
        #headimg #access {
            display: block;
            margin: 0;
            width: 100%;
        }
        #headimg #access .menu-header,
        div.menu {
            font-size: 13px;
            margin-left: 12px;
            width: 98.7%;
        }
        #headimg #access .menu-header ul,
        div.menu ul {
            list-style: none;
            margin: 0;
        }
        #headimg #access .menu-header li,
        div.menu li {
            float: left;
            position: relative;
            list-style:none;
            margin:0;
        }
        #headimg #access a {
            display: block;
            line-height: 3em;
            padding: 0 10px;
            text-decoration: none;
        }
        #headimg #access ul ul {
            display: none;
            position: absolute;
            top: 3em;
            left: 0;
            float: left;
            width: 180px;
            z-index: 99999;
        }
        #headimg #access ul ul li {
            min-width: 180px;
        }
        #headimg #access ul ul ul {
            left: 100%;
            top: 0;
        }
        #headimg #access ul ul a {
            line-height: 1em;
            padding: 10px;
            width: 160px;
            height: auto;
        }
        #headimg #access ul li:hover > ul {
            display: block;
        }
        </style>
    <?php
    }
}
if ( ! function_exists( 'obandes_admin_header_image' ) ){

    function obandes_admin_header_image(){
        $obandes_header_image = get_header_image();
    get_bloginfo( 'name' );

    $obandes_header_style = 'style="color:#'.get_theme_mod( 'header_textcolor' ).'"';



    ?>
    <div id="headimg">
                <h1 <?php echo $obandes_header_style;?>><a id="name" onclick="return false;" href="<?php esc_url( home_url( '/' ) );?>"><?php bloginfo( 'name' ); ?></a></h1>
        <div id="site-description" <?php echo $obandes_header_style;?>><?php bloginfo( 'description' ); ?></div>
<?php
if(isset($obandes_header_image) and !empty($obandes_header_image)){
?>
 <div id="access" role="navigation" class="clearfix">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
        </div>
<?php
    $obandes_header_image_format = '<div style="background:#000;overflow:visible"><img src="%s" width="%s" height="%s" alt="header image"  style="width:%spx;height:auto;" /></div>';

            printf( $obandes_header_image_format,
                    $obandes_header_image,
                    HEADER_IMAGE_WIDTH,
                    HEADER_IMAGE_HEIGHT,
                    obandes_document_width()
            );
}
?>
    </div>
    <?php
    }
}

/**
 * editor-style.css
 */
if(locate_template( array( 'admin/editor-style.css' ))){
     add_editor_style('admin/editor-style.css');
}
/**
 * admin panel and pages
 */
/**
 * horizon class demo colors
 */
$obandes_header_background_color = OBANDES_HEADER_BACKGROUND_COLOR;
$obandes_css_preset =<<< CSS_PRESET

body {
background:#5f7f5c;
}
body > #doc,body > #doc2,body > #doc3,body > #doc4 {
-moz-border-radius:10px;
-moz-box-shadow:0 0 15px rgba(0,0,0,1);
-webkit-border-radius:10px;
-webkit-box-shadow:0 0 15px rgba(0,0,0,1);
background:#c5d19b;
border-radius:10px;
box-shadow:0 0 15px rgba(0,0,0);
}
footer,header {
background:$obandes_header_background_color;
/*color:#fff;*/
}
nav h3:before,
h3.widget-title:before {
content:url(images/sidebar-title.png);
margin-right:.5em;
position:relative;
top:3px;
}
.ie8 h3.widget-title:before {
top:0;
}

nav > ul {
background:#c5d19b;
}
index article{
border:#eee 2px groove;
}
.ie6 article,.ie7 article,.ie8 article,#footer-widget-area,#fourth,#third,#second,#first,article {
background:#c5d19b;
}
#footer-widget-area h3{
background:#97a25e url(images/bg-1.png);
margin-bottom:0;
color:#333;
}
#access .menu,
#access {
background:#000;
color:#fff;
}
* html #access ul li.current-menu-ancestor a,
* html #access ul li.current-menu-item a,
* html #access ul li.current-menu-parent a,
* html #access ul li a:hover,
#access li:hover > a,
#access ul ul :hover > a ,
#access a ,
#access li > a,
#access ul ul > a ,
#access ul li.current_page_item > a,
#access ul li.current-menu-ancestor > a,
#access ul li.current-menu-item > a,
#access ul li.current-menu-parent > a {
    color: #999;
}
.fragment_identifier a:hover,
* html #access ul > li.current_page_item a,
* html #access ul > li.current-menu-ancestor a:hover,
* html #access ul > li.current-menu-item a:hover,
* html #access ul > li.current-menu-parent a:hover,
* html #access ul > li a:hover,
#access li:hover > a:hover,
#access ul ul  > a:hover,
#access a:hover,
#access li > a:hover,
#access ul ul > a ,
#access ul li.current_page_item > a:hover,
#access ul li.current-menu-ancestor > a:hover,
#access ul li.current-menu-item > a:hover,
#access ul li.current-menu-parent > a:hover {
    color: #333;
    background:#fff;
}
header img {
border-bottom:2px solid #000;
margin-bottom:-5px;
}
div.posted-in {
border-bottom:3px solid #bbb;
border-top:3px solid #bbb;
background:#eef;
background:rgba(255,255,255,0.3);
}
#commentform .form-submit {
line-height:3;
margin-bottom:1em;
}
.byuser,.commentlist > li,.reply,#commentform,div.tagcloud,.commentlist > li,.nopassword,.wp-caption,body.single-post .nocomments,.hentry th,.hentry td,.page-link,.bypostauthor
.chrome article .content .size-thumbnail,.gecko article .content .size-thumbnail,.home .sticky,blockquote {
border:1px solid #999;
}

article .content blockquote {
border-left:6px solid #777;
}
.not-found,
div.tagcloud,
footer,
.comment,
.pingback,
.nocomments,
article .content blockquote {
background:#eee;
background:rgba(255,255,255,0.3);
}



.h1,h1 {
font-family:Georgia, "Times New Roman", Times, serif;
/*font-size:2em;*/
}
.plate,.grad {
/*background:0 to(#669999));*/
}

header {
-moz-border-radius-topleft:10px;
-moz-border-radius-topright:10px;
-webkit-border-top-left-radius:10px;
-webkit-border-top-right-radius:10px;
border-top-left-radius:10px;
border-top-right-radius:10px;
}
footer {
-moz-border-radius-bottomleft:10px;
-moz-border-radius-bottomright:10px;
-webkit-border-bottom-left-radius:10px;
-webkit-border-bottom-right-radius:10px;
border-bottom-left-radius:10px;
border-bottom-right-radius:10px;
}
#footer-widget-area h3 {
-moz-border-radius-bottomright:10px;
-moz-border-radius-topleft:10px;
-webkit-border-bottom-right-radius:10px;
-webkit-border-top-left-radius:10px;
border-bottom-right-radius:10px;
border-top-left-radius:10px;
}
#wp-calendar th:nth-child(1),#wp-calendar th:nth-child(7) {
width:1em;
}
#doc,#doc2,#doc3,#doc4,#custom-doc{
}
header{
}
/*
 *horizontal navigation
 *
*/
#access{
}
/*
 *loop.php
*/
section{}
.index{}
.index article{}
.index article .title a{}
.index article .posted-on{}
.index article .posted-in{}
.index article .pagenate{}
/*
 *single.php
*/
.single-post{}
.single article{}
.single article .title{}
.single article .posted-on{}
.single article .posted-in{}
.single article .pagenate{}
/*
 *footer.php
*/
footer{}
#footer-widget-area{}
.horizontal-footer-widget{}
#footer-widget-area #first{}
#footer-widget-area #second{}
#footer-widget-area #third{}
#footer-widget-area #fourth{}
footer address{}
footer #site-genelator{}

#access a:hover{border:none;}
#access .children{
background:#eee;
background:rgba(255,255,255,0.9);
color:#333;
}
#access .children li:hover{
background:#dedede;
}

CSS_PRESET;

    $obandes_base_setting =array(
            array('option_id' =>'css',
            'blog_id' => 0 ,
            'option_name' => "obandes_css",
            'option_value' => "$obandes_css_preset\n",
            'autoload'=>'yes',
            'title'=> __('Base Color for Automatic Arrangement','obandes'),
            'excerpt1'=>'',
            'excerpt2'=>'',
             'validate'=>'obandes_css_validate'),

             array('option_id' =>'navigation=',
            'blog_id' => 0 ,
            'option_name' => "obandes_radio_options_navigation",
            'option_value' => 't5',
            'autoload'=>'yes',
            'title'=> __('Navi Col','obandes'),
            'excerpt1'=>'',
            'excerpt2'=>'',
             'validate'=>'obandes_radio_options_navigation_validate'),

             array('option_id' =>'pagetype',
            'blog_id' => 0 ,
            'option_name' => "obandes_radio_options_pagetype",
            'option_value' => 'doc2',
            'autoload'=>'yes',
            'title'=> __('Page Type','obandes'),
            'excerpt1'=>'',
            'excerpt2'=>'',
             'validate'=>'obandes_radio_options_pagetype_validate'),

             array('option_id' =>'headerbackgroundcolor',
            'blog_id' => 0 ,
            'option_name' => "obandes_header_background_color",
            'option_value' => '#FFA500',
            'autoload'=>'yes',
            'title'=> __('Header Background Color','obandes'),
            'excerpt1'=>'',
            'excerpt2'=>'',
             'validate'=>'obandes_header_background_color_validate'),



             );


    $obandes_query =  'obandes_setting';
    add_filter( 'use_default_gallery_style', '__return_false' );
    //add_action( 'admin_init', 'obandes_theme_init' );
    add_action('admin_menu', 'obandes_theme_options_add_page');
    add_action('load-themes.php', 'obandes_install_navigation');
    add_filter('contextual_help','obandes_help');
    add_action('init', 'obandes_init');
    add_custom_background();
    load_textdomain( 'obandes', get_template_directory().'/languages/'.get_locale().'.mo' );
   // add_custom_image_header( '', 'obandes_admin_header_style' );
    add_filter('body_class','obandes_add_body_class');
    add_filter("wp_head","obandes_embed_meta",'99');
    if(!function_exists("obandes_page_menu_args")){
        function obandes_page_menu_args( $args ) {
            $args['show_home'] = false;
            return $args;
        }
        add_filter( 'wp_page_menu_args', 'obandes_page_menu_args' );
    }
    if(function_exists('add_theme_support')) {
        add_theme_support('automatic-feed-links');
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
    }
    if(!isset($content_width)){
        $obandes_content_width = obandes_content_width();
    }
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'obandes' ),
    ) );
    register_default_headers( array(
        'default' => array(
            'url' => '%s/images/headers/wp3.jpg',
            'thumbnail_url' => '%s/images/headers/wp3-thumbnail.jpg',
            /* translators: header image description */
            'description' => __( 'obandes', 'obandes' )
        )
    ) );
/**
 * navibar
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
            'name' => __( 'First Footer Widget Area', 'obandes' ),
            'id' => 'first-footer-widget-area',
            'description' => __( 'The first footer widget area', 'obandes' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
        // Area 4, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'Second Footer Widget Area', 'obandes' ),
            'id' => 'second-footer-widget-area',
            'description' => __( 'The second footer widget area', 'obandes' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
        // Area 5, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'Third Footer Widget Area', 'obandes' ),
            'id' => 'third-footer-widget-area',
            'description' => __( 'The third footer widget area', 'obandes' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
        // Area 6, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'Fourth Footer Widget Area', 'obandes' ),
            'id' => 'fourth-footer-widget-area',
            'description' => __( 'The fourth footer widget area', 'obandes' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
        }
    }
    if (!function_exists('obandes_posted_on')) {
        function obandes_posted_on($display = true) {

            if (comments_open()){
                $obandes_comment_html = '<a href="%1$s" class="obandes-comment-link"><span class="obandes-comment-string">%3$s</span>%2$s</a>';
                if(get_comments_number() > 0 ){
                    $obandes_comment_string = _n('Comment','Comments',get_comments_number(),'obandes');
                    $obandes_comment_number = get_comments_number();
                }else{
                    $obandes_comment_string = 'Comment';
                    $obandes_comment_number = '';
                }
            }else{
                $obandes_comment_html   = '';
                $obandes_comment_string = '';
                $obandes_comment_number = '';

            }

        $result = sprintf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s  %4$s', 'obandes' ),
            'meta-prep meta-prep-author',
            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="date">%3$s</span></a>',
                get_permalink(),
                esc_attr( get_the_time() ),
                get_the_date()
            ),
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="vcard:url">%3$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ),
                sprintf( esc_attr__( 'View all posts by %s', 'obandes' ), get_the_author() ),
                get_the_author()
            ),
            sprintf($obandes_comment_html,get_comments_link(),$obandes_comment_number,$obandes_comment_string)
        );

        if($display == false){
            return $result;
        }else{
            echo $result;
        }

        }
    }
    function obandes_title(){
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;
        wp_title( "&nbsp;|&nbsp;", true, 'right' );
        // Add the blog name.
        bloginfo( 'name' );
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo "&nbsp;|&nbsp;" .$site_description;
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 ){
            echo "&nbsp;|&nbsp;" . sprintf( __( 'Page %s', 'obandes' ), max( $paged, $page ) );
        }
    }
    function obandes_init() {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        $page = basename($_SERVER['REQUEST_URI']);

        if (!is_admin() and !preg_match("|^wp-login\.php|si",$page)) {
        wp_register_style('html5reset', 'http://html5resetcss.googlecode.com/files/html5-reset-1.4.css',false,'1.4');
        wp_enqueue_style( 'html5reset');
        /*wp_register_style('Tangerine', 'http://fonts.googleapis.com/css?family=Tangerine',false,'0.1');
        wp_enqueue_style( 'Tangerine');*/
        if($is_chrome or $is_gecko){
        wp_register_style('css3',get_template_directory_uri().'/css3.css',false,'0.52');
        }
        wp_enqueue_style('css3');
        wp_register_script('yui-css','http://yui.yahooapis.com/2.8.0r4/build/yuiloader/yuiloader-min.js',false,'2.8.0r4');
        wp_enqueue_script('yui-css');
        wp_register_script('yui', get_template_directory_uri().'/yui.js', array('yui-css'), '0.1');
        wp_enqueue_script('yui');
        wp_register_script('obandes', get_template_directory_uri().'/obandes.js', array('jquery'), '0.1');
        wp_enqueue_script('obandes');

        wp_register_script('jquery-template', 'http://nje.github.com/jquery-tmpl/jquery.tmpl.js', array('jquery'), '0.1');
        wp_enqueue_script('jquery-template');

        }
    }

    if (!function_exists('obandes_add_body_class')) {
        function obandes_add_body_class($class) {

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
    function obandes_content_width(){
        $adjust = 16;
        $default = 400;
    if(DOCUMENT_WIDTH == 'doc'){
        $w = 750;
        $adjust = 16;
        if(SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }elseif(DOCUMENT_WIDTH == 'doc2'){
        $w = 950;
            $adjust = 16;
        if(SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }elseif(DOCUMENT_WIDTH == 'doc3'){
        $w = 750;
        if(SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }elseif(DOCUMENT_WIDTH == 'doc4'){
        $w = 974;
        $adjust = 16;
        if(SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }
    return $obandes_content_width;
    }
    function obandes_document_width(){
        global $content_width;
        switch(DOCUMENT_WIDTH){
        case('doc'):
            $result = 750 - 4; //4px is border
        break;
        case('doc2'):
            $result = 950 - 4;
        break;
        case('doc4'):
            $result = 974 - 4;
        break;
        default:
            $result = $content_width - 4;
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
            $result .= '<a class="size-thumbnail" href="'.esc_url(get_attachment_link($image->ID)).'/">'.wp_get_attachment_image( $image->ID, 'thumbnail' ).' </a>';
            }
        }else{
            return false;
        }
        return $result.'</div>';
        }
    if (!function_exists('obandes_comment')) {
        function obandes_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment; ?>
            <?php if ( '' == $comment->comment_type ) : ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                 <div style="width:48px;float:left;margin-top:6px;">
                    <?php echo get_avatar( $comment, 42 ); ?>
                </div>
                    <div style="overflow:hidden;*width:100%;padding-left:1em;" class="clearfix comment_author_block">
                    <?php printf( __( '%s <span class="says">says:</span>', 'obandes' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </div>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <div style="overflow:hidden;*width:100%;padding-left:1em;" class="clearfix">
                    <em><?php _e( 'Your comment is awaiting moderation.', 'obandes' ); ?></em>
                    <br />
                    </div>
                <?php endif; ?>
                <div class="comment-meta commentmetadata clearfix" style="overflow:hidden;*width:100%;padding-left:1em;"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'obandes' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'obandes' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
                <div class="comment-body clearfix" ><?php comment_text(); ?></div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
            </div><!-- #comment-##  -->
            <?php else : ?>
            <li class="post pingback"><?php _e( 'Pingback:', 'obandes' ); ?><?php comment_author_link(); ?><br />
            <?php edit_comment_link( __('(Edit)', 'obandes'), ' ' ); ?>
            <?php endif;
        }
    }

    function obandes_embed_meta($content){
        $result = "";
        global $post,$content_width,$is_safari;
    /**
     * insert into embed style ,javascript script and embed tags from custom field
     */
        if (is_single() || is_page()) {
            if(have_posts()){
             while (have_posts()) : the_post();
                $css = get_post_meta($post->ID, 'css', true);
                if (!empty($css) or $is_safari == true) {
                $result .= '<style type="text/css">';
                $result .= "\n/*<![CDATA[*/\n";
                $result .=  $css;
                if($is_safari and $content_width < 500 ){
                    $result .=  "\n".'.safari embed{width:'.$content_width.'!important;}';
                }
                $result .= "\n/*]]>*/\n";
                $result .= "</style>";
                }
                $javascript = get_post_meta($post->ID, 'javascript', true);
                if (!empty($javascript)) {
                $result .= '<script type="text/javascript">';
                $result .= "\n/*<![CDATA[*/\n";
                $result .= $javascript;
                $result .= "\n/*]]>*/\n";
                $result .= "</script>";
                }
                $meta = get_post_meta($post->ID, 'meta', true);
                if (!empty($meta)) {
                $result .= $meta;
                }
              endwhile;
            }else{
            }
        }
        echo $result;
        return $content;
    }
    function obandes_header_validate($header_image_val){


            return  $header_image_val;
    }
    function obandes_css_validate($css){
    $css = str_replace(array("<script",'</script>','<'.'?'),"",$css);
            return $css;
    }
    function obandes_radio_options_pagetype_validate($data){
            return esc_html($data);


    }
    function obandes_radio_options_navigation_validate($data){
            return esc_html($data);


    }
    function obandes_header_background_color_validate($data){
            return esc_html($data);
    }
    function obandes_first_only_msg($type=0) {
        global $obandes_query;
        if ( $type == 1 ) {
            $query  = 'obandes_settings';
            $link   = get_site_url('', 'wp-admin/themes.php', 'admin') . '?page='.$obandes_query;
            $msg    = sprintf(__('Thank you for adopting the %s theme. It is necessary to set it to this theme. Please move to a set screen clicking this <a href="%s">obandes settings view</a>.','obandes'),get_current_theme() ,$link);
        }

        if ( $type == 2 ) {
            $query  = 'obandes_settings';
            $link   = get_site_url('', 'wp-admin/themes.php', 'admin') . '?page='.$obandes_query;
            $msg    = sprintf(__('Thank you for adopting the %s theme. It is necessary to set it to this theme. Please move to a set screen clicking this <a href="%s">obandes settings view</a>.','obandes'),get_current_theme() ,$link);
            $msg    .= sprintf(__('     Note:Detected improperly option value. The value was corrected. ','obandes'));

        }


        return '<div id="testmsg" class="error"><p>' . $msg . '</p></div>' . "\n";
    }


/**
 * Option value set when install.
 *
 *
 *
 *
 */

    function obandes_theme_init(){
        global $wpdb,$obandes_base_setting;

        foreach($obandes_base_setting as $add){

            $option_name = $add['option_name'];

            if(!isset($obandes_theme_settings[$option_name])){
                $obandes_theme_settings[$option_name] = $add['option_value'];
            }

        }
        $obandes_theme_settings['install'] = true;

        update_option('obandes_theme_settings',$obandes_theme_settings,"",$add['autoload']);
    }
/*
 * Management of uninstall and install.
 *
 *
 *
 *
 */

    function obandes_install_navigation() {

        $install = get_option('obandes_theme_settings');
        if(!array_key_exists('install', $install) and is_array($install)){
            delete_option('obandes_theme_settings');
            add_action('admin_notices', create_function(null, 'echo obandes_first_only_msg(2);'));
             obandes_theme_init();
        } elseif (!array_key_exists('install', $install)) {
            add_action('admin_notices', create_function(null, 'echo obandes_first_only_msg(1);'));
            obandes_theme_init();
        } else {
            add_action('switch_theme', create_function(null, 'delete_option("obandes_theme_settings");'));
        }
    }



    function obandes_admin_print_styles() {

      wp_enqueue_style( 'farbtastic' );

    }

    function obandes_admin_print_scripts() {
      wp_enqueue_script( 'farbtastic' );
      wp_enqueue_script( 'quicktags' );
      wp_enqueue_script( 'obandes-picker', get_stylesheet_directory_uri() . '/admin/admin-script.js', array( 'farbtastic', 'quicktags' ), false, true );
    }

    function obandes_theme_options_add_page() {
        $obandes_hook_suffix = add_theme_page(__( 'Obandes Options','obandes'), __( 'Obandes Options' ,'obandes'),'edit_theme_options', 'obandes_setting',             'obandes_options_page_view' );
        add_action('admin_print_styles-'.$obandes_hook_suffix, 'obandes_admin_print_styles');
        add_action('admin_print_scripts-'.$obandes_hook_suffix, 'obandes_admin_print_scripts');
    }

    function obandes_options_page_view() {
        $obandes_result_message = '';
        global $select_options, $obandes_radio_options,$obandes_query;
        echo '<div>';
        screen_icon();
        echo '<h2 style="float:left;">' . get_current_theme() . __( ' Options' ,'obandes') . '</h2><br style="clear:both;" />';

            /**
             * POSTGET
             *
             *
             */
            if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_css'])){
                global $obandes_base_setting;

                $ok             = false;

                $option_value   = esc_html($_POST['obandes_setting']['obandes_css']);
                $option_name    = 'obandes_css';
                $valid_function = 'obandes_css_validate';

                if($option_value == $valid_function($option_value)){

                      $new_settings                 = get_option('obandes_theme_settings');

                      if($new_settings[$option_name] !== $option_value){
                          $new_settings[$option_name]   = $option_value;
                          update_option('obandes_theme_settings',$new_settings);
                          $obandes_result_message = __("Style ,",'obandes');
                      }

                }
            }

            if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_header'])){
                global $obandes_base_setting;
                $ok             = false;
                $option_value   = esc_html($_POST['obandes_setting']['obandes_header']);
                $option_name    = 'obandes_header';
                $valid_function = 'obandes_header_validate';

                if($option_value == $valid_function($option_value)){

                      $new_settings                 = get_option('obandes_theme_settings');
                      if($new_settings[$option_name] !== $option_value){
                          $new_settings[$option_name]   = $option_value;
                          update_option('obandes_theme_settings',$new_settings);
                          $obandes_result_message .= __("Header Image ",'obandes');
                      }

                }

            }




            if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_radio_options_pagetype'])){
                global $obandes_base_setting;
                $ok             = false;
                $option_value   = esc_html($_POST['obandes_setting']['obandes_radio_options_pagetype']);
                $option_name    = 'obandes_radio_options_pagetype';

                if($option_value == obandes_radio_options_pagetype_validate($option_value)){

                      $new_settings                 = get_option('obandes_theme_settings');
                      if($new_settings[$option_name] !== $option_value){
                          $new_settings[$option_name]   = $option_value;
                          update_option('obandes_theme_settings',$new_settings);
                          $obandes_result_message .= __("Page Width ",'obandes');
                      }

                }

            }


            if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_radio_options_navigation'])){
                global $obandes_base_setting;
                $ok             = false;
                $option_value   = esc_html($_POST['obandes_setting']['obandes_radio_options_navigation']);
                $option_name    = 'obandes_radio_options_navigation';

               if($option_value == obandes_radio_options_navigation_validate($option_value)){

                      $new_settings                 = get_option('obandes_theme_settings');
                      if($new_settings[$option_name] !== $option_value){
                          $new_settings[$option_name]   = $option_value;
                          update_option('obandes_theme_settings',$new_settings);
                          $obandes_result_message .= __("Navigation Setting ",'obandes');
                      }

               }

            }

            if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_header_background_color'])){
                global $obandes_base_setting;
                $ok             = false;
                $option_value   = esc_html($_POST['obandes_setting']['obandes_header_background_color']);
                $option_name    = 'obandes_header_background_color';

               if($option_value == obandes_radio_options_navigation_validate($option_value) and !empty($option_value)){

                      $new_settings                 = get_option('obandes_theme_settings');
                      if($new_settings[$option_name] !== $option_value){
                          $new_settings[$option_name]   = $option_value;
                          update_option('obandes_theme_settings',$new_settings);
                          $obandes_result_message .= __("Header Background Color",'obandes');
                      }

               }

            }

        echo '<div id="message" class="updated fade" title="Style Setting" >';

        if(isset($obandes_result_message) and !empty($obandes_result_message)){
            echo '<p>'.sprintf(__('<strong>%1$s</strong> updated  successfully.','obandes'),$obandes_result_message).'</p>';
        }else{
            echo '<p>'.sprintf(__('I am waiting your Change.','obandes')).'</p>';
        }
        echo '</div>';

        unset($obandes_result_message);
        echo '<div style="margin-top:1em;">';
        $action = "themes.php?page=".$obandes_query;
        echo '<form method="post" action="'.$action.'">';
        settings_fields( 'obandes_setting' );
        $obandes_current_settings   = get_option('obandes_theme_settings');
        $obandes_style              = $obandes_current_settings['obandes_css'];
        $obandes_header_background_color_val  = $obandes_current_settings['obandes_header_background_color'];

        $obandes_radio_options_pagetype = array(
            'fluid' => array('value' => 'doc3',
            'label' => __( 'fluid', 'obandes' ),'image' => 'obandes_admin_page_fluid.jpg'),
            'fix-950' => array('value' => 'doc2',
            'label' => __( 'fix 950px','obandes' ),'image' => 'obandes_admin_page_950.jpg'),
            'fix-974' => array('value' => 'doc4',
            'label' => __( 'fix 974px', 'obandes' ),'image' => 'obandes_admin_page_974.jpg'),
            'fix-750' => array('value' => 'doc',
            'label' => __( 'fix 750px', 'obandes' ),'image' => 'obandes_admin_page_750.jpg')
            );

        $obandes_radio_options_navigation = array(
            'left-narrow' => array('value' => 't1',
            'label' => __( 'Left narrow' ,'obandes'),'image' => 'obandes_admin_page_t1.png'),
            'left-middle' => array('value' => 't2',
            'label' => __( 'Left middle','obandes' ),'image' => 'obandes_admin_page_t2.png'),
            'left-wide' => array('value' => 't3',
            'label' => __( 'Left wide','obandes' ),'image' => 'obandes_admin_page_t3.png'),
            'right-narrow' => array('value' => 't4',
            'label' => __( 'Right narrow','obandes' ),'image' => 'obandes_admin_page_t4.png'),
            'right-middle' => array('value' => 't5',
            'label' => __( 'Right middle','obandes' ),'image' => 'obandes_admin_page_t5.png'),
            'right-wide' => array('value' => 't6',
            'label' => __( 'Right wide','obandes' ),'image' => 'obandes_admin_page_t6.png'),
            );

        if (!isset($checked)){
            $checked = '';
        }
        $rows =substr_count($obandes_style, "\n") * 1.5 + 10;
        echo '<p><input type="submit" value="'. __( 'Save Options' ,'obandes').'" class="button" /></p>';
        echo '<table summary="stylesheet" class="form-table">';
        echo '<col class="highlight tablenav" />';
        echo '<col class="tablenav" />';

        /////////////////////
        echo '<tr valign="top">';
        echo '<td class="title" style="font-weight:bold;vertical-align:middle;width:260px;border-bottom:3px solid #fff;">'.__( 'Column','obandes' ).'</td>';
        echo '<td><ul>';
        //$obandes_radio_options loop
        foreach ( $obandes_radio_options_navigation as $option ) {
            $radio_setting = $option['value'];
            if ( '' != $radio_setting ) {
                if ( $option['value'] == $obandes_current_settings['obandes_radio_options_navigation'] ) {
                    $checked = "checked=\"checked\"";
                } else {
                    $checked = '';
                }
            }
        $radio_block = '<li style="float:left"><label><input type="radio" name="%s" value="%s" %s />&nbsp;%s<div style="%s">&nbsp;</div></label><br />';

            printf($radio_block,
                    esc_attr('obandes_setting[obandes_radio_options_navigation]'),
                    esc_attr( $option['value']),
                    $checked,
                    esc_html($option['label']),
                    'width:150px;height:150px;background:url('.get_template_directory_uri().'/images/'.$option['image'].');'
                );
        }
        echo '</ul></td></tr>';

        ////////////////////////
        echo '<tr valign="top">';
        echo '<td class="title" style="font-weight:bold;vertical-align:middle;width:260px;border-bottom:3px solid #fff;">'.__( 'Page' ).'</td>';
        echo '<td>';
        //$obandes_radio_options loop
        foreach ( $obandes_radio_options_pagetype as $option ) {
            $radio_setting = $option['value'];
            if ( '' != $radio_setting ) {
                if ( $option['value'] == $obandes_current_settings['obandes_radio_options_pagetype'] ) {
                    $checked = "checked=\"checked\"";
                } else {
                    $checked = '';
                }
            }
        $radio_block = '<li style="float:left;list-style:none;"><label><input type="radio" name="%s" value="%s" %s />&nbsp;%s<div style="%s">&nbsp;</div></label><br />';

            printf($radio_block,
                    esc_attr('obandes_setting[obandes_radio_options_pagetype]'),
                    esc_attr( $option['value']),
                    $checked,
                    esc_html($option['label']),
                    'width:150px;height:150px;background:url('.get_template_directory_uri().'/images/'.$option['image'].');'

                );
        }
        echo '</td></tr>';
               echo '<tr valign="top">';
        echo '<td class="title" ><div style="font-weight:bold;vertical-align:top;">'.__( 'Header Background Color' ,'obandes' );
        echo '</div>';
        echo '</td>';
        echo '<td>';
                $obandes_text_field = '<div><input type="text" name="%1$s" id="%1$s" class="obandes-color-picker" value="%4$s" />'.
                                    '<a href="#" id="pickcolor" class="button">'.__("Select a Color","obandes").'</a>'.
                                    '<div id="colorpicker-selector" %3$s></div>';

                    printf($obandes_text_field,
                        esc_attr('obandes_setting[obandes_header_background_color]'),
                        esc_attr($obandes_header_background_color_val),
                        'style="z-index: 100; background:#fff; border:1px solid #ccc; position:absolute; display:none;"',
                        esc_attr(obandes_get_condition('obandes_header_background_color'))

                    );

        echo '</td></tr>';

        echo '<tr valign="top">';
        echo '<td class="title" ><div style="font-weight:bold;vertical-align:top;">'.__( 'CSS Edit' ,'obandes' );
                $obandes_text_field = '<div style="margin:1em; padding:1em;border:inset thin">
                <p style="font-weight:normal">Create Hex Color Code</p><input id="obandespastetextarea" type="text" name="%1$s" id="%1$s" class="obandes-color-picker2" value="" onClick="this.select();" />'.'<a href="#" id="pickcolor2" class="button">'.__("Select a Color","obandes").'</a>'.
'<div id="colorpicker-selector2" %3$s></div>';

                    printf($obandes_text_field,
                        esc_attr('obandes_setting[obandes_header_background_color]'),
                        esc_attr($obandes_header_background_color_val),
                        'style="z-index: 100; background:#fff; border:1px solid #ccc; position:absolute; display:none;"'

                    );

        echo '</div>';
        echo '</td>';
        echo '<td>';
        echo '<textarea class="obandes-css-textarea" id="obandes_setting[obandes_css]" cols="50" rows="10" name="obandes_setting[obandes_css]"';
        echo ' style="width:90%;height:'.$rows.'em;line-height:1.5;font-size:120%;font-family:"Courier New", Courier, mono;padding:3px;">';
        echo stripslashes( $obandes_style);
        echo '</textarea>';
        echo '</td></tr></table>';
        echo '<p><input type="submit" value="'. __( 'Save Options' ,'obandes').'" class="button" /></p>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
        if (!function_exists('obandes_help')) {
        function obandes_help($text){
        global $title,$obandes_query;
        if(isset($_GET['page']) and $obandes_query == $_GET['page']){
        $result = "<h2 class=\"h2\">".__('CSS links').'</h2>';
        $result .= "<ul>";
        $result .= sprintf('<li><a href="%s" title="%s">%s</a></li>',
                    esc_url("http://www.tenman.info/wp3/obandes/quick-start-obandes/"),
                    esc_attr(__("obandes Quick Start",'obandes')),
                    esc_html(__("obandes Quick Start",'obandes')));
        $result .= sprintf('<li><a href="%s" title="%s">%s</a></li>',
                    esc_url("http://www.tenman.info/csstidy/css_optimiser.php"),
                    esc_attr(__("CSS Tidy",'obandes')),
                    esc_html(__("CSS Tidy",'obandes')));
        $result .= sprintf('<li>%s</li>',
                        str_replace("\t","",
                            '<p>'.esc_html(__('Data is preserved in the data base.','obandes')).'</p>'.
                            '<p>'.esc_html(__('Your original CSS setting is not overwrited when Theme upgrade.','obandes')).'</p>'.
                            '<p>'.esc_html(__('obandes have special body classes.','obandes')).'</p>'.
                            '<p>'.esc_html(__('languages class e.g.  .ja','obandes')).'</p>'.
                            '<p>'.esc_html(__('browser class e.g.  .ie  .chrome .gecko(firefox)','obandes')).'</p>'.
                            '<p>'.esc_html(__('multiuser class  e.g. .b4 .b3','obandes')).'</p>'.
                            '<p>'.esc_html(__('horizon class e.g. .horizon-something','obandes')).'</p>'.
                            '<p>'.esc_html(__('Multiuser class can be specified even if there is no child theme if they are only a few changes.','obandes')).'</p>'.
                            '<p>'.esc_html(__('Browse class can free from complex CSS hack.','obandes')).'</p>'.
                            '<p>'.esc_html(__('languages class give happyness who not ASCII languege user.','obandes')).'</p>'.
                            '<p>'.esc_html(__('horizon class USEGE:','obandes')).'</p>'.
                            '<p>'.esc_html(__('horizon class is not multiclass use only horizontal layout.','obandes')).'</p>'.
                            '<p>'.esc_html(__('paste your entry this code.','obandes')).'</p>'.
                            '<p>'.esc_html(__('use html mode.','obandes')).'</p>'
                        )
                    );
        $result .= sprintf('<li><div style="border:1px solid #999;padding:2em;"><pre><code>%s</code></pre></div></li>',
                        str_replace("\t","",
                            htmlspecialchars('
                            <div class="horizon-1">
                            <div> your html block</div>
                            </div>
                            <div class="horizon-1">
                            <div> your html block</div>
                            </div>
                            <div class="horizon-1">
                            <div> your html block</div>
                            </div>
                            <div class="horizon-1">
                            <div> your html block</div>
                            </div>
                            <div class="horizon-2">
                            <div> your html block</div>
                            </div>
                            <div class="horizon-2">
                            <div> your html block</div>
                            </div>'
                            )
                        )
                    );
        $result .= "</ul>\n";
            return apply_filters("obandes_help",$result);
        }else{
            return $text;
        }
        }
    }

        function obandes_prev_next_post($position = "nav-above"){

            $obandes_max_length     = 40;
            $obandes_prev_length    = $obandes_max_length + 1;
        if(!is_attachment()){

            $obandes_max_length     = 40;
            $obandes_prev_post_id   = get_adjacent_post(true,'',true) ;
            $obandes_prev_length    = strlen(get_the_title($obandes_prev_post_id));
            $obandes_next_post_id   = get_adjacent_post(false,'',false) ;
            $obandes_next_length    = strlen(get_the_title($obandes_next_post_id));

        }
?>

<div id="<?php echo $position;?>" class="clearfix">
<?php if($obandes_prev_length < $obandes_max_length ){?>
  <span class="nav-previous"><?php previous_post_link('%link','<span class="button">%title</span>'); ?></span>
<?php }else{?>
  <span class="nav-previous"><?php previous_post_link('%link','<span class="long-title">%title</span>'); ?></span>
<?php }?>
<?php if($obandes_next_length < $obandes_max_length ){?>
  <div class="nav-next"><?php next_post_link('%link','<span class="button">%title</span>'); ?></div>
<?php }else{?>
  <div class="nav-next"><?php next_post_link('%link','<span class="long-title">%title</span>'); ?></div>
<?php }?>
</div>
<?php }?>
<?php

function obandes_detect_option($condition){
    $obandes_current_settings       = get_option('obandes_theme_settings');
    $config                 = $obandes_current_settings['obandes_css'];

    preg_match("!^$condition=(.+)$!mu",$config,$regs);

    if(isset($regs[1])){
        $result = strip_tags($regs[1]);
        $result = str_replace(array(" ","\n","\r"),"",$result);

        if( $result == 'narrow' or
            $result == 'middle' or
            $result == 'wide' or
            $result == 'fix' or
            $result == 'shrink' or
            $result == 'fix' or
            $result == 'left' or
            $result == 'right' or
            is_numeric($result)){

            return $result;
        }else{
            return false;
        }
    }else{
            return false;
    }

}

function obandes_get_condition($condition){
/*
e.g. shrink,fix
layout-type:fix
e.g. wide,narrow
letter-width:wide
e.g. right,left
menu-position:right
e.g. narrow,middle,wide
menu-width:wide
*/

    $obandes_current_settings       = get_option('obandes_theme_settings');
    if($condition == 'header_image'){
        $image  = $obandes_current_settings['obandes_header'];
        return trim($image);
    }

    if($condition == 'obandes_header_background_color'){
            $obandes_header_background_color  = $obandes_current_settings['obandes_header_background_color'];
        return trim($obandes_header_background_color);
    }

    if($condition == 'letter-width'){

    if(isset($obandes_current_settings['obandes_radio_options_pagetype'])){

        return $obandes_current_settings['obandes_radio_options_pagetype'];
    }

    $config = $obandes_current_settings['obandes_css'];
    $value = obandes_detect_option($condition);

    if($value === false){

        if($condition == 'letter-width'){
            return 'doc2';
        }

        if($condition == 'menu-position'){
            return 'yui-t5';
        }

    }






    if($value == 'narrow'){
        if( obandes_detect_option('layout-type') == 'fix'){
            return 'doc';
        }elseif(obandes_detect_option('layout-type') == 'shrink'){
            return 'doc3';
        }else{

            return 'doc2';
        }
    }elseif($value == 'wide'){
        if( obandes_detect_option('layout-type') == 'fix'){
            return 'doc2';
        }elseif(obandes_detect_option('layout-type') == 'shrink'){
            return 'doc3';
        }else{
            return 'doc2';
        }
    }else{
        if( obandes_detect_option('layout-type') == 'fix'){
            return 'doc';
        }elseif(obandes_detect_option('layout-type') == 'shrink'){
            return 'doc3';
        }else{
            return 'doc2';
        }
    }
}
if($condition == 'menu-position'){
if(isset($obandes_current_settings['obandes_radio_options_navigation'])){

    return 'yui-'.$obandes_current_settings['obandes_radio_options_navigation'];
}



    if($value == 'left'){
        if(obandes_detect_option('menu-width') == 'narrow'){
            return 'yui-t1';
        }elseif(obandes_detect_option('menu-width') == 'middle'){
            return 'yui-t2';
        }elseif(obandes_detect_option('menu-width') == 'wide'){
            return 'yui-t3';
        }else{
            return 'yui-t2';
        }

    }elseif($value == 'right'){
        if( obandes_detect_option('menu-width') == 'narrow'){
            return 'yui-t4';
        }elseif(obandes_detect_option('menu-width') == 'middle'){
            return 'yui-t5';
        }elseif(obandes_detect_option('menu-width') == 'wide'){
            return 'yui-t6';
        }else{
            return 'yui-t4';
        }
    }else{
        if( obandes_detect_option('menu-width') == 'narrow'){
            return 'yui-t4';
        }elseif(obandes_detect_option('menu-width') == 'middle'){
            return 'yui-t5';
        }elseif(obandes_detect_option('menu-width') == 'wide'){
            return 'yui-t6';
        }else{
            return 'yui-t5';
        }
    }
}

}
/**
 * image element has attribute 'width','height' and image size > column width
 * style max-width value 100% set when expand height height attribute value.
 *
 * IE filter
 *
 */

    add_filter('the_content','obandes_ie_height_expand_issue');

    function obandes_ie_height_expand_issue($content){
        global $is_IE,$content_width;

        if($is_IE){
            preg_match_all('#(<img)([^>]+)(height|width)(=")([0-9]+)"([^>]+)(height|width)(=")([0-9]+)"([^>]+)>#',$content,$images,PREG_SET_ORDER);

            foreach($images as $image){
                if(($image[3] == "width" and $image[5] > $content_width) or ($image[7] == "width" and $image[9] > $content_width)){
                    $content = str_replace($image[0],$image[1].$image[2].$image[6].$image[10].'>',$content);
                }
            }
            return $content;
        }else{

            return $content;
        }
    }

/**
 * onecolumn-page.php
 * condition this page, wp nav menu add footer widget area fragment identifier.
 *
 *
 *
 */

    function obandes_addHomeMenuLink($content, $args){

        $template_name = basename(get_page_template(),'.php');

        if('primary' == $args->theme_location and $template_name == 'onecolumn-page'){

                $class = 'class="fragment_identifier onecolumn-page"';


            $add = '<li ' . $class . '>' .
                            $args->before .
                            '<a href="#footer-widget-area" title="go to footer">' .
                                $args->link_before .
                                'Menu footer' .
                                $args->link_after .
                            '</a>' .
                            $args->after .
                            '</li>';

            return $add . $content;
        }

        return $content;
    }



/**
 * plugin API
 *
 *
 *
 *
 */

    function plugin_is_active($plugin_path) {
        $return_var = in_array( $plugin_path, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
        return $return_var;
    }

    if (plugin_is_active('tmn-quickpost/tmn-quickpost.php')) {

            global $base_info;

            foreach( $base_info['root'] as $key=>$val ) {
                $wp_cockneyreplace['%'.$key.'%'] = $val;
            }

        function obandes_import_post_meta(){

            global $post,$base_info;
            $r = get_post_meta($post->ID, 'template', true);

            foreach( $base_info['root'] as $key=>$val ) {
                $r = str_replace('%'.$key.'%', $val,$r);
            }

            if(class_exists('trans')){
                $n = new trans($r);
                return $n->text2html();
            }else{
                return $r;
            }
        }
    }
?>