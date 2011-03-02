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
        define('DOCUMENT_WIDTH', 'doc3' );
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
    if(!defined('HEADER_IMAGE')){
        define('HEADER_IMAGE', '%s/images/headers/wp3.jpg');
    }
     if(!defined('HEADER_IMAGE_WIDTH')){
        define('HEADER_IMAGE_WIDTH', 950);//auto or 999px
    }
    if(!defined('HEADER_IMAGE_HEIGHT')){
        define('HEADER_IMAGE_HEIGHT', 198);//auto or 999px
    }

    if(get_option("obandes_header") !== 'show'){
        header_image_alert();
    }
    add_action( 'widgets_init', 'obandes_widgets_init' );
    function obandes_widgets_init() {
        register_sidebar(array (
          'name' => __('Default Sidebar'),
          'id' => 'sidebar-1',
          'before_widget' => '<li class="widget default">',
          'after_widget' => '</li>',
          'before_title' => '<h2 class="widgettitle default h2">',
          'after_title' => '</h2>',
          'widget_id' => 'default',
          'widget_name' => 'default',
          'text' => "1"));
    }
    if(!defined('TMN_USE_LIST_EXCERPT')){
        define("TMN_USE_LIST_EXCERPT",false);
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
                'image'
            )
    );
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
$css_preset =<<< CSS_PRESET
/*
Welcome obandes CSS setting.
Please read this theme in help of this page.
*/
/**
 *  background
 */
.pagenate a span,
h2 a,
h3 a,
h4 a,
h5 a,
h6 a,
.h2 a,
.h3 a,
.h4 a,
.h5 a,
.h6 a ,
#access,
.horizon-gallery.col1 .size-thumbnail,
.widget_tag_cloud a:hover{
    background:none;
}
.commentlist > li.pingback{

}
.nopassword,
.long-title,
.wp-caption,
nav li a:hover,
.comment-body blockquote,
.comment-body blockquote blockquote,
body.single-post .nocomments,
#access ul ul a,
#access li:hover > a,
#access ul ul :hover > a,
* html #access ul li.current_page_item a,
* html #access ul li.current-menu-ancestor a,
* html #access ul li.current-menu-item a,
* html #access ul li.current-menu-parent a,
* html #access ul li a:hover,
#access li:hover > a,
#access ul ul :hover > a,
#access ul li.current_page_item > a,
#access ul li.current-menu-ancestor > a,
#access ul li.current-menu-item > a,
#access ul li.current-menu-parent > a ,
.pagenate span,
.comment-body blockquote blockquote blockquote{
    background:#eef;
}
blockquote{
    background:#fff;
}


.home article.hentry,
nav,
article.hentry{
/*background:#fff;*/
background-color: rgba(255, 255, 255, 0.5);
padding:0 3px 10px!important;
}
.index article.hentry{
padding:0 10px 10px!important;
}
#access,
nav:hover,
article.hentry:hover {
background-color: rgba(255, 255, 255, 1);
padding:0 3px;
}

#commentform,
.plate{
    padding:2em;
    background:#cccccc;
    background:-moz-linear-gradient(center top , #aaaaaa, #cccccc) repeat scroll 0 0 #aaaaaa;
    background:-webkit-gradient(linear,left top , left bottom,from(#aaaaaa), to(#cccccc));
    _background:#cccccc;
}
.reply,
#searchsubmit,
#commentform input[type="submit"],
.pagenate,
.grad,
.button{
    background:#aaaaaa;
    background:-moz-linear-gradient(center top , #cccccc, #aaaaaa) repeat scroll 0 0 #aaaaaa;
    background:-webkit-gradient(linear,left top , left bottom,from(#cccccc), to(#aaaaaa));
    _background:#aaaaaa;
}
.reply:hover,
#searchsubmit:hover,
#commentform input[type="submit"]:hover,
.button:hover{
    background:-moz-linear-gradient(center top, #aaaaaa , #cccccc) repeat scroll 0 0 #aaaaaa;
    background:-webkit-gradient(linear,left top , left bottom,from(#aaaaaa), to(#cccccc));
    _background:#cccccc;
}

h2 a:after,
h3 a:after,
h4 a:after,
h5 a:after,
h6 a:after,
.h2 a:after,
.h3 a:after,
.h4 a:after,
.h5 a:after,
.h6 a:after {
     content: url("images/external.png"); padding-left: 5px;
}
hr{
    background:url(images/hr.png);
    background-position:center top;
    background-repeat:no-repeat
}
/**
 *  colors
 */
h1 a,
h2 a,
h3 a,
h4 a,
h5 a,
h6 a,
.h2 a,
.h3 a,
.h4 a,
.h5 a,
.h6 a {
    color:#000;
}
.pagenate span,
nav,
nav li a,
* html #access ul li.current_page_item a,
* html #access ul li.current-menu-ancestor a,
* html #access ul li.current-menu-item a,
* html #access ul li.current-menu-parent a,
* html #access ul li a:hover,
#access li:hover > a,
#access ul ul :hover > a ,
nav li a:hover,
#access a ,
#access li > a,
#access ul ul > a ,
#access ul li.current_page_item > a,
#access ul li.current-menu-ancestor > a,
#access ul li.current-menu-item > a,
#access ul li.current-menu-parent > a {
    color: #333;
}
.home .entry-meta,
.home .entry-utility,
#site-generator,
#site-generator a,
address a{
    color:#777;
}
#site-title a{
    color: #000;
}
.reply a,
.bar-text,
.text,
#searchsubmit,
#commentform input[type="submit"],
.pagenate,
.grad,
.button{
    color:#fff;
}
CSS_PRESET;

    $obandes_base_setting =array(
            array('option_id' =>'null',
            'blog_id' => 0 ,
            'option_name' => "obandes_css",
            'option_value' => "$css_preset\n",
            'autoload'=>'yes',
            'title'=> __('Base Color for Automatic Arrangement','obandes'),
            'excerpt1'=>'',
            'excerpt2'=>'',
             'validate'=>'obandes_css_validate'),

             array('option_id' =>'null',
            'blog_id' => 0 ,
            'option_name' => "obandes_header",
            'option_value' => 'hide',
            'autoload'=>'yes',
            'title'=> __('Header image','obandes'),
            'excerpt1'=>'',
            'excerpt2'=>'',
             'validate'=>'obandes_header_validate')
             );

    $obandes_query =  'obandes_setting';
    add_action( 'admin_init', 'obandes_theme_init' );
    add_action('admin_menu', 'obandes_theme_options_add_page');
    add_action('load-themes.php', 'tmn_install_navigation');
    add_filter('contextual_help','obandes_help');
    add_action('init', 'obandes_init');
    add_custom_background();
    load_textdomain( 'obandes', get_template_directory().'/languages/'.get_locale().'.mo' );
    add_custom_image_header( '', 'obandes_admin_header_style' );
    add_filter('body_class','obandes_add_body_class');
    add_filter("wp_head","tmn_embed_meta",'99');
    if(!function_exists("obandes_page_menu_args")){
        function obandes_page_menu_args( $args ) {
            $args['show_home'] = true;
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

        $result = sprintf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'obandes' ),
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

        $page = basename($_SERVER['REQUEST_URI']);

        if (!is_admin() and !preg_match("|^wp-login\.php|si",$page)) {
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

        wp_register_script('jquery-template', 'http://nje.github.com/jquery-tmpl/jquery.tmpl.js', array('jquery'), '0.1');
        wp_enqueue_script('jquery-template');

        }
    }
    if ( ! function_exists( 'obandes_admin_header_style' ) ){
        function obandes_admin_header_style() {
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
                 <div style="width:40px;float:left;margin-top:6px;">
                    <?php echo get_avatar( $comment, 32 ); ?>
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
    function tmn_embed_meta($content){
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
     function obandes_theme_init(){
        global $obandes_base_setting;
        unset($setting);
        if(isset($obandes_base_setting)){
            foreach($obandes_base_setting as $setting){
                register_setting( 'obandes_setting', $setting['option_name'], $setting['validate'] );
                add_option($setting['option_name'], $setting['option_value'], '', $setting['autoload']);
            }
        }
    }
    function obandes_header_validate($header_image_val){


            return  $header_image_val;
    }
    function obandes_css_validate($css){
        $css = esc_html($css);
        $css = str_replace( '&#039;',"'",  $css );
            return $css;
    }
    function obandes_first_only_msg($type=0) {
        global $obandes_query;
        if ( $type == 1 ) {
            $query  = 'obandes_settings';
            $link   = get_site_url('', 'wp-admin/themes.php', 'admin') . '?page='.$obandes_query;
            $msg    = sprintf(__('Thank you for adopting the %s theme. It is necessary to set it to this theme. Please move to a set screen clicking this <a href="%s">obandes settings view</a>.','obandes'),get_current_theme() ,$link);
        }
        return '<div id="testmsg" class="error"><p>' . $msg . '</p></div>' . "\n";
    }
    function tmn_install_navigation() {
        if ( false === get_option('obandes_install') ) {
            add_action('admin_notices', create_function(null, 'echo obandes_first_only_msg(1);'));
            add_option('obandes_install', true);
        } else {
            add_action('switch_theme', create_function(null, 'delete_option("obandes_install");'));
            add_action('switch_theme', 'bye_obandes');
        }
    }
    function bye_obandes(){
        global $obandes_base_setting;
        foreach( $obandes_base_setting as $bye){
            delete_option($bye['option_name']);
        }
    }
    function obandes_theme_options_add_page() {
    add_theme_page(__( 'Obandes Options' ), __( 'Obandes Options' ),'edit_theme_options', 'obandes_setting',             'obandes_options_page_view' );
    }
    function obandes_options_page_view() {
        global $select_options, $radio_options,$obandes_query;
        echo '<div>';
        screen_icon();
        echo '<h2 style="float:left;">' . get_current_theme() . __( ' Options' ) . '</h2><br style="clear:both;" />';

        if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_css'])){
            $post_val = esc_html($_POST['obandes_setting']['obandes_css']);
            update_option( 'obandes_css', stripslashes($post_val) );
            $obandes_result_message = __("Style",'obandes');
        }

        if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandes_setting']['obandes_header'])){
            $post_val = esc_html($_POST['obandes_setting']['obandes_header']);
            update_option('obandes_header', $post_val);
            $obandes_result_message = __("Heade Image",'obandes');

        }
        echo '<div id="message" class="updated fade" title="Style Setting" ><p>'.
        sprintf(__('<strong>%1$s</strong> updated  successfully.'),$obandes_result_message).'</p></div>';

        echo '<div style="margin-top:1em;">';
        $action = "themes.php?page=".$obandes_query;
        echo '<form method="post" action="'.$action.'">';
        settings_fields( 'obandes_setting' );
        $style = get_option( 'obandes_css' );
        $header_image_show = get_option( 'obandes_header' );

        $radio_options = array(
            'yes' => array('value' => 'show',
            'label' => __( 'show' )),
            'no' => array('value' => 'hide',
            'label' => __( 'hide' ))
            );

        if (!isset($checked)){
            $checked = '';
        }
        $rows =substr_count($style, "\n") * 1.5 + 10;
        echo '<p><input type="submit" value="'. __( 'Save Options' ).'" /></p>';
        echo '<table summary="stylesheet" width="100%">';
        echo '<tr valign="top">';
        echo '<th scope="row">'.__( 'Show Header Image' ).'</th>';
        echo '<td>';
        //$radio_options loop
        foreach ( $radio_options as $option ) {
            $radio_setting = $option['value'];
            if ( '' != $radio_setting ) {
                if ( $option['value'] == $header_image_show ) {
                    $checked = "checked=\"checked\"";
                } else {
                    $checked = '';
                }
            }
        $radio_block = '<label><input type="radio" name="%s" value="%s" %s />%s;</label><br />';

            printf($radio_block,
                    esc_attr('obandes_setting[obandes_header]'),
                    esc_attr( $option['value']),
                    $checked,
                    esc_html($option['label'])
                );
        }
        echo '</td></tr>';
        echo '<tr valign="top">';
        echo '<th scope="row">'.__( 'CSS Edit' ).'</th>';
        echo '<td>';
        echo '<textarea id="obandes_setting[obandes_css]" cols="50" rows="10" name="obandes_setting[obandes_css]"';
        echo ' style="width:90%;height:'.$rows.'em;line-height:1.5;">';
        echo stripslashes( $style);
        echo '</textarea>';
        echo '</td></tr></table>';
        echo '<p><input type="submit" value="'. __( 'Save Options' ).'" /></p>';
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
  <span class="nav-previous"><?php previous_post_link('%link','<span class="long-title">&laquo;prev: %title</span>'); ?></span>
<?php }?>
<?php if($obandes_next_length < $obandes_max_length ){?>
  <div class="nav-next"><?php next_post_link('%link','<span class="button">%title</span>'); ?></div>
<?php }else{?>
  <div class="nav-next"><?php next_post_link('%link','<span class="long-title">next: %title &raquo; </span>'); ?></div>
<?php }?>
</div>
<?php }?>
<?php
/**
 * Alert when SHOW_HEADER_IMAGE false
 *
 *
 *
 *
 */

    function header_image_alert(){
        if(isset($_GET['page']) and $_GET['page'] == 'custom-header'){
        printf('<script type="text/javascript">alert(\'%s\');</script>',__('Please open obandes option, and set the value of Show Header Image to show.','obandes'));
        }
    }
?>