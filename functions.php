<?php
/**
 *
 *
 *
 *
 *
 */
    if ( ! defined('ABSPATH' ) ) {
        exit;
    }
/**
 *
 *
 *
 *
 *
 */
    $obandes_check_wp_version       = explode('-',$wp_version);
    $obandes_wp_version             = $obandes_check_wp_version[0];

    if ( $obandes_wp_version >= '3.4' ) {

        $obandes_theme_data = wp_get_theme();

        $obandes_theme_uri          = $obandes_theme_data->ThemeURI;
        $obandes_author_uri         = $obandes_theme_data->Author_URI;
        $obandes_version            = $obandes_theme_data->Version;
        $obandes_current_theme_name = $obandes_theme_data->Name;
        $obandes_description        = $obandes_theme_data->Description;
        $obandes_author             = $obandes_theme_data->Author;
        $obandes_template           = $obandes_theme_data->Template;
        $obandes_tags               = $obandes_theme_data->Tags;
        $obandes_tags               = implode(',',$obandes_tags);

    } else {
        $obandes_theme_uri          = "http://www.tenman.info/wp3/obandes/";
        $obandes_author_uri         = "http://www.tenman.info/wp3/";
        $obandes_version            = "";
        $obandes_current_theme_name = "obandes";
        $obandes_description        = "";
        $obandes_author             = "";
        $obandes_template           = "";
        $obandes_tags               = "";

    }

    $obandes_lessc_exists           = locate_template( 'lib/lessc.inc.php' );
/**
 *
 *
 *
 *
 *
 */
    if( $obandes_wp_version >= '3.4' ){
        add_action( 'customize_register', 'obandes_customize_register' );
    }
    if( ! function_exists( 'obandes_customize_register' ) and $obandes_wp_version >= '3.4'){
        function obandes_customize_register( $wp_customize ) {

            $wp_customize->add_section( 'obandes_theme_setting'
                , array(
                        'title' => __( 'obandes theme setting', 'obandes' )
                        , 'priority' => 10,
                    )
            );

            $wp_customize->add_setting( 'obandes_theme_settings[obandes_header_background_color]', array(
                'default'        => 'cccccc',
                'type'           => 'option',
                'capability'        => 'edit_theme_options'
            ) );

            $wp_customize->add_setting( 'obandes_theme_settings[obandes_radio_options_navigation]', array(
                'default'        => 't5',
                'type'           => 'option',
                'capability'    => 'edit_theme_options'
            ) );
            $wp_customize->add_setting( 'obandes_theme_settings[obandes_radio_options_pagetype]', array(
                'default'        => 'doc3',
                'type'           => 'option',
                'capability'    => 'edit_theme_options'
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize
                    , 'obandes_header_background_color'
                    , array(
                        'label'   => __( 'Header background', 'obandes' )
                        , 'section' => 'obandes_theme_setting'
                        , 'settings'   => 'obandes_theme_settings[obandes_header_background_color]'
                        )
                )
            );
            $wp_customize->add_control( 'obandes_radio_options_navigation'
                , array(
                    'label'      => __( 'Sidebar width and position', 'obandes' ),
                    'section'    => 'obandes_theme_setting',
                    'settings'   => 'obandes_theme_settings[obandes_radio_options_navigation]',
                    'type'       => 'radio',
                    'choices'    => array(    't1'=>   __( 'Left narrow' , 'obandes' )
                                            , 't2' => __( 'Left middle', 'obandes' )
                                            , 't3' => __( 'Left wide', 'obandes' )
                                            , 't4' => __( 'Right narrow', 'obandes' )
                                            , 't5' => __( 'Right middle', 'obandes' )
                                            , 't6' => __( 'Right wide', 'obandes' )
                                        )
                    )
            );
            $wp_customize->add_control( 'obandes_radio_options_pagetype'
                , array(
                    'label'      => __( 'Page width and type', 'obandes' ),
                    'section'    => 'obandes_theme_setting',
                    'settings'   => 'obandes_theme_settings[obandes_radio_options_pagetype]',
                    'type'       => 'radio',
                    'choices'    => array( 'doc3' => __( 'fluid', 'obandes' )
                                            , 'doc2' => __( 'fix 950px','obandes' )
                                            , 'doc4' => __( 'fix 974px', 'obandes' )
                                            , 'doc' => __( 'fix 750px', 'obandes' )
                                       )
                    )
            );
        }
    }
/**
 * #doc - 750px centered (good for 800x600)
 * #doc2 - 950px centered (good for 1024x768)
 * #doc3 - 100% fluid (good for everybody)
 * #doc4 - 974px
 * #doc-custom - an example of a custom page width *
 *
 */
    if( ! defined('OBANDES_DOCUMENT_WIDTH')){
        define('OBANDES_DOCUMENT_WIDTH', 'doc3' );
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
   if( ! defined('OBANDES_SIDEBAR_WIDTH')){
        define('OBANDES_SIDEBAR_WIDTH', 'yui-t5' );
    }
/**
 *
 *
 *
 *
 *
 */
    if( ! defined('OBANDES_HEADER_BACKGROUND_COLOR')){
        define('OBANDES_HEADER_BACKGROUND_COLOR','#ccc');
    }

/**
 *
 *
 *
 *
 *
 */

    if( ! defined('OBANDES_HEADER_BACKGROUND_IMAGE')){
        define('OBANDES_HEADER_BACKGROUND_IMAGE','');
    }

/**
 *
 *
 *
 *
 *
 */

    if( ! defined('OBANDES_USE_LIST_EXCERPT')){
        define( "OBANDES_USE_LIST_EXCERPT",false);
    }

    if( $obandes_wp_version < '3.4' ){

        if( ! defined('NO_HEADER_TEXT')){
            define('NO_HEADER_TEXT', false );
        }
        if( ! defined('HEADER_TEXTCOLOR')){
            define('HEADER_TEXTCOLOR', 'ffffff');
        }
        if( ! defined('HEADER_IMAGE')){
            define('HEADER_IMAGE', '%s/images/headers/wp3.jpg');
        }
         if( ! defined('HEADER_IMAGE_WIDTH')){
            define('HEADER_IMAGE_WIDTH', 960 );//auto or 999px
        }
        if( ! defined('HEADER_IMAGE_HEIGHT')){
            define('HEADER_IMAGE_HEIGHT', 198);//auto or 999px
        }
    }

/**
 *
 *
 *
 *
 */
    $obandes_header_blank_color = 'ffffff';
    add_action( 'after_setup_theme', 'obandes_theme_setup' );
/**
 *
 *
 *
 *
 *
 */

if( !function_exists( 'obandes_theme_setup' ) ){
    function obandes_theme_setup(){
        global $obandes_wp_version;
        load_theme_textdomain( 'obandes', get_template_directory() . '/languages' );
        add_action( 'wp_enqueue_scripts', 'obandes_enqueue_comment_reply' );
        add_action('wp_footer','obandes_small_device_helper');
        add_filter( 'use_default_gallery_style', '__return_false' );
        add_filter('body_class','obandes_add_body_class');
        add_filter( 'wp_page_menu_args', 'obandes_page_menu_args' );
        add_filter('wp_title','obandes_wp_title',10,3);
        add_filter('the_content','obandes_ie_height_expand_issue');
        //@since ver 1.32
        add_action( 'wp_head', 'obandes_mobile_meta');
/**
 *
 *
 *
 *
 */
        if( locate_template( array( 'formats/format.php' ))){

            add_theme_support( 'post-formats',
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
/**
 *
 *
 *
 *
 *
 */
        if( $obandes_wp_version >= '3.4' ){ // WordPress 3.4 check
            $args = array(
                    'default-text-color' => 'fff'
                    , 'width' => apply_filters( 'obandes_header_image_width', '950' )
                    , 'flex-width' => true
                    , 'height' => apply_filters( 'obandes_header_image_height', '198' )
                    , 'flex-height' => true
                    , 'header-text' => true
                    , 'default-image' => '%s/images/headers/wp3.jpg'
                    , 'wp-head-callback' => 'obandes_embed_meta'
                    , 'admin-preview-callback' => 'obandes_admin_header_image'
                    , 'admin-head-callback' => 'obandes_admin_header_style'
                );

            add_theme_support( 'custom-header', $args );

            $args = array('default-color' => '#ccc'
                        ,'default-image' => ''
                    );
            add_theme_support( 'custom-background', $args );
        }
/**
 *
 *
 *
 *
 */
        add_theme_support('automatic-feed-links');
        add_theme_support( 'post-thumbnails' );

    if( $obandes_wp_version >= '3.4' ){
        set_post_thumbnail_size( get_custom_header()->width, get_custom_header()->height, true );
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

    add_action( 'widgets_init', 'obandes_register_menus' );


    }
}
/**
 *
 *
 *
 *
 *
 */
if ( ! function_exists( 'obandes_admin_header_style' ) ){
    function obandes_admin_header_style() {
        $header_background = obandes_get_condition('obandes_header_background_color').' url('. get_stylesheet_directory_uri().'/images/d1-head.png);';
   $admin_header_style=<<<CSS
        /* Shows the same border as on front end */
        #headimg {
            -moz-border-radius-topleft:10px;
            -moz-border-radius-topright:10px;
            -webkit-border-top-left-radius:10px;
            -webkit-border-top-right-radius:10px;
            border-top-left-radius:10px;
            border-top-right-radius:10px;
            background:$header_background;
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
        #headimg #access .menu > ul > li > a:hover,
        #headimg #access a,
        #headimg #access .menu,
        #headimg #access {
            background:#000;
            color:#fff;
        }
        #headimg #access,
        #headimg #access .menu > ul,
        #headimg #access .menu > ul > li > a,
        #headimg #access .menu{
            background:#999;
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
CSS;

        echo '<style type="text/css">'.obandes_compress_css($admin_header_style,WP_DEBUG).'</style>';

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
            $obandes_header_image_format = '<div style="background:#999;overflow:visible"><img src="%s" width="%s" height="%s" alt="header image"  style="width:%spx;height:auto;" /></div>';
                    printf( $obandes_header_image_format,
                            $obandes_header_image,
                            HEADER_IMAGE_WIDTH,
                            HEADER_IMAGE_HEIGHT,
                            obandes_OBANDES_DOCUMENT_WIDTH()
                    );
        }
?>
    </div>
    <?php
    }
}
/**
 * editor-style.css
 *
 *
 *
 *
 */
if(locate_template( array( 'admin/editor-style.css' ))){
     add_editor_style('admin/editor-style.css');
}

/**
 * horizon class demo colors
 *
 *
 *
 *
 */
if( ! isset($obandes_header_background_color)){
    $obandes_header_background_color = OBANDES_HEADER_BACKGROUND_COLOR;
}

if( !isset($obandes_css_preset) and file_exists( $obandes_lessc_exists ) ){
$obandes_css_preset =<<< CSS_PRESET
/*============= lessphp =============*/
@primary-navigation-background:#444;
@primary-navigation-background-color-hover: #333333;
@primary-navigation-color:#ffffff;
@primary-navigation-color-hover: #ffffff;
/*============= style rules =============*/
#access .menu,
#access {
background:@primary-navigation-background;

color:@primary-navigation-color;
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
color:@primary-navigation-color;
background:@primary-navigation-background;
}
#access ul li .children a{
background:#444;
color:#ddd;
}
.fragment_identifier a:hover,
* html #access ul > li.current_page_item a,
* html #access ul > li.current-menu-ancestor a:hover,
* html #access ul > li.current-menu-item a:hover,
* html #access ul > li.current-menu-parent a:hover,
* html #access ul > li a:hover,
#access li:hover > a:hover,
#access ul ul > a:hover,
#access a:hover,
#access li > a:hover,
#access ul ul > a ,
#access ul li.current_page_item > a:hover,
#access ul li.current-menu-ancestor > a:hover,
#access ul li.current-menu-item > a:hover,
#access ul li.current-menu-parent > a:hover {
color: @primary-navigation-color-hover;
background:@primary-navigation-background-color-hover;
}
CSS_PRESET;
}elseif( !file_exists( $obandes_lessc_exists ) ){
    $obandes_css_preset = '/* Please write your own CSS */';
}


if( file_exists( $obandes_lessc_exists ) ){
        $obandes_option_lessc_update = get_option( 'obandes_theme_settings',false );
    if( $obandes_option_lessc_update !== false and trim( strip_tags( $obandes_option_lessc_update['obandes_css'] ) ) == '/* Please write your own CSS */' ){
        $obandes_option_lessc_update['obandes_css'] = wpautop( $obandes_css_preset )."\n";

        update_option( 'obandes_theme_settings', $obandes_option_lessc_update );
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! isset($obandes_base_setting)){
    $obandes_base_setting =array(
        array('option_id' =>'css',
        'blog_id' => 0 ,
        'option_name' => "obandes_css",
        'option_value' => wpautop($obandes_css_preset)."\n",
        'autoload'=>'yes',
        'title'=> __('Base Color for Automatic Arrangement','obandes'),
        'excerpt1'=>'',
        'excerpt2'=>'',
         'validate'=>'obandes_css_validate'),
         array('option_id' =>'navigation=',
        'blog_id' => 0 ,
        'option_name' => "obandes_radio_options_navigation",
        'option_value' => str_replace( 'yui-', '', OBANDES_SIDEBAR_WIDTH ),
        'autoload'=>'yes',
        'title'=> __('Navi Col','obandes'),
        'excerpt1'=>'',
        'excerpt2'=>'',
         'validate'=>'obandes_radio_options_navigation_validate'),
         array('option_id' =>'pagetype',
        'blog_id' => 0 ,
        'option_name' => "obandes_radio_options_pagetype",
        'option_value' => OBANDES_DOCUMENT_WIDTH,
        'autoload'=>'yes',
        'title'=> __('Page Type','obandes'),
        'excerpt1'=>'',
        'excerpt2'=>'',
         'validate'=>'obandes_radio_options_pagetype_validate'),
         array('option_id' =>'headerbackgroundcolor',
        'blog_id' => 0 ,
        'option_name' => "obandes_header_background_color",
        'option_value' => OBANDES_HEADER_BACKGROUND_COLOR,
        'autoload'=>'yes',
        'title'=> __('Header Background Color','obandes'),
        'excerpt1'=>'',
        'excerpt2'=>'',
         'validate'=>'obandes_header_background_color_validate'),
     );
}
/**
 *
 *
 *
 *
 *
 */
    if( ! isset($obandes_query)){
        $obandes_query =  'obandes_setting';
    }
/**
 *
 *
 *
 *
 *
 */
    add_action('admin_menu', 'obandes_theme_options_add_page');
    add_action('load-themes.php', 'obandes_install_navigation');
    add_action('wp_enqueue_scripts', 'obandes_init');
/**
 *
 *
 *
 *
 *
 */
    if( ! function_exists( "obandes_page_menu_args") ){
        function obandes_page_menu_args( $args ) {
            $args['show_home'] = true;
            return $args;
        }
    }
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_register_menus" ) ){
    function obandes_register_menus() {
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
    register_sidebar( array(
        'name' => __( 'Page Sidebar Widget Area', 'obandes' ),
        'id' => 'sidebar-2',
        'description' => __( 'Page Sidebar Widget area', 'obandes' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Front Page Template Left Widget Area', 'obandes' ),
        'id' => 'front-page-template-left-widget-area',
        'description' => __( 'Front Page Template Left Wiget Area', 'obandes' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Front Page Template Right Widget Area', 'obandes' ),
        'id' => 'front-page-template-right-widget-area',
        'description' => __( 'Front Page Template right Wiget Area', 'obandes' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    }
}
/**
 *
 *
 *
 *
 *
 */
if ( ! function_exists('obandes_posted_on' ) ) {
    function obandes_posted_on( $display = true ) {
                $obandes_date_format = get_option('date_format'). ' '. get_option( 'time_format' );
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

    if ( has_post_format( 'aside' ) or
         has_post_format( 'image' ) or
         has_post_format( 'quote' ) or
         has_post_format( 'video' ) or
         has_post_format( 'audio' ) or
         has_post_format( 'gallery' ) or
         has_post_format( 'status' ) or
         has_post_format( 'chat' ) or
         has_post_format( 'link' )
    ){

        $format = get_post_format( );

        $post_format = sprintf( '<span class="post-format %2$s"><span class="format-label">%3$s</span><a class="post-format-link" href="%1$s">&nbsp;<span>%2$s</span></a></span>',
                esc_url( get_post_format_link( $format ) ),
                esc_attr( get_post_format_string( $format ) ),
                __( 'formatted with', 'obandes' )
        );
    }else{
        $post_format = '';
    }


    $result = sprintf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s  %4$s %5$s', 'obandes' ),
        'meta-prep meta-prep-author',
        sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="date">%3$s</span></a>',
            get_permalink(),
            esc_attr( get_the_time( $obandes_date_format ) ),
            get_the_date( $obandes_date_format )
        ),
        sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
            get_author_posts_url( get_the_author_meta( 'ID' ) ),
            sprintf( esc_attr__( 'View all posts by %s', 'obandes' ), get_the_author() ),
            get_the_author()
        ),
        $post_format,
        sprintf($obandes_comment_html,get_comments_link(),
                $obandes_comment_number,
                $obandes_comment_string
        )

        );

        if($display == false){
            return $result;
        }else{
            echo $result;
        }
    }
}
/**
 *
 *
 *
 *
 * since obandes 0.93
 */
    if ( ! function_exists( 'obandes_wp_title' ) ){
        function obandes_wp_title( $title, $sep = true, $seplocation = 'right' ){
            global $page, $paged;
            $page_info          = '';
            $add_title          = array();
            $site_description   = get_bloginfo( 'description', 'display' );

            if( ! empty($title)){
                $add_title[]    = str_replace($sep,'',$title);
            }
                $add_title[]    = get_bloginfo( 'name' );

            if ( !empty($site_description) and ( is_home() or is_front_page() ) ){
                $add_title[]    = $site_description;
            }
            // Add a page number
            if ( $paged > 1 or $page > 1 ){
                $page_info      = sprintf( __( ' Page %s', 'obandes' ), max( $paged, $page ) );
            }
            if('right' == $seplocation){
                $add_title      = array_reverse( $add_title );
                $title          = implode( " $sep ", $add_title ). $page_info;
            }else{
                $title          = implode( " $sep ", $add_title ). $page_info;
            }
            return  $title ;
        }
    }
/**
 * Deprecated function
 *
 *
 *
 *
 */
if ( ! function_exists('obandes_title' ) ) {
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
}
/**
 *
 *
 *
 *
 *
 */
if ( ! function_exists('obandes_init' ) ) {
    function obandes_init() {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $obandes_current_theme_name, $obandes_version;
        $page = basename($_SERVER['REQUEST_URI']);


        if( file_exists( get_stylesheet_directory().'/lib/' ) ){
            $stylesheet_directory= get_stylesheet_directory_uri();
        }else{
            $stylesheet_directory= get_template_directory_uri();
        }
$flag = false;
        if ( ! is_admin() and !preg_match( "|^wp-login\.php|si",$page)) {

        $locate_file = locate_template( array('lib/css/reset/reset.css') );

        if( file_exists( $locate_file ) ){
            wp_register_style('html5reset',
            $stylesheet_directory.'/lib/css/reset/reset.css',
            false, $obandes_version );

        }else{
            wp_register_style('html5reset',
             'http://html5resetcss.googlecode.com/files/html5-reset-1.4.css',
             false,
             $obandes_version
             );
        }

        wp_enqueue_style( 'html5reset');

        $locate_file = locate_template( array('lib/css/grids/grids.css') );

        if( file_exists( $locate_file ) ){
            wp_register_style( 'html5grids',
                                $stylesheet_directory.'/lib/css/grids/grids.css',
                                false,
                                $obandes_version
                            );

        }else{
            $flag = true;
        }

        wp_enqueue_style( 'html5grids');

        $locate_file = locate_template( array('lib/css/fonts/fonts.css') );

        if( file_exists( $locate_file ) ){
            wp_register_style(
                    'html5fonts',
                    $stylesheet_directory.'/lib/css/fonts/fonts.css',
                    false,
                    $obandes_version
            );

        }else{
            $flag = true;
        }

        wp_enqueue_style( 'html5fonts');

            wp_register_style('style',
            get_stylesheet_uri(),
            array( 'html5reset' ),
            $obandes_version
            );

        wp_enqueue_style( 'style' );


        if($flag == true ){
            wp_register_script('yui-css',
            'http://yui.yahooapis.com/2.8.0r4/build/yuiloader/yuiloader-min.js',
            false,
            $obandes_version
            );
        }
        wp_enqueue_script('yui-css');

            wp_register_script(
                'yui',
                get_template_directory_uri().'/yui.js',
                array('yui-css'), $obandes_version
            );
            wp_enqueue_script('yui');

            wp_register_script(
                'obandes',
            get_template_directory_uri().'/obandes.js',
            array('jquery'),
            $obandes_version
            );

        wp_enqueue_script('obandes');

        }

        if($is_IE){

            $locate_file = locate_template('lib/html5shiv/html5shiv.js');

            if( empty( $locate_file ) ){
                wp_register_script('html5shiv',
                $stylesheet_directory.'/lib/html5shiv/html5shiv.js', array(), '3', false );
            }else{
                wp_register_script('html5shiv', 'http://html5shiv.googlecode.com/svn/trunk/html5.js', array(), '3', false);
            }

            wp_enqueue_script('html5shiv');
        }
    }
}
/**
 *
 *
 *
 *
 *
 */
if ( ! function_exists('obandes_add_body_class' ) ) {
    function obandes_add_body_class($class) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $current_blog;
        $lang = WPLANG;
        $classes= array($lang);
        $classes= array_merge($classes,$class);

        if(isset($current_blog)){
            $this_blog = array( "b". $current_blog->blog_id);
            $classes= array_merge($classes,$this_blog);
        }
        switch(true){
            case($is_lynx):
                $classes[] = 'lynx';
            break;
            case($is_gecko):
                $classes[] = 'gecko';
            break;
            case($is_IE):
                preg_match( " |(MSIE )([0-9])(\.)|si",$_SERVER['HTTP_USER_AGENT'],$regs);
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
        if( obandes_get_condition('letter-width') == 'doc3' ){
                $classes[]  = 'fluid';
        }
        $header_image = get_header_image();
        if( empty( $header_image ) ){
                $classes[]  = 'header-image-none';

        }
        switch( obandes_get_condition('menu-position') ){
            case( 'yui-t1' ):
                $classes[]  = 'col-left';
                $classes[]  = 'col-w-160';
            break;
            case( 'yui-t2' ):
                $classes[]  = 'col-left';
                $classes[]  = 'col-w-180';
            break;
            case( 'yui-t3' ):
                $classes[]  = 'col-left';
                $classes[]  = 'col-w-300';
            break;
            case( 'yui-t4' ):
                $classes[]  = 'col-right';
                $classes[]  = 'col-w-180';

            break;
            case( 'yui-t5' ):
                $classes[]  = 'col-right';
                $classes[]  = 'col-w-240';

            break;
            case( 'yui-t6' ):
                $classes[]  = 'col-right';
                $classes[]  = 'col-w-300';
            break;
        }

        return $classes;
        }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_content_width" ) ){
    function obandes_content_width(){
        $adjust = 16;
        $default = 400;
    if(OBANDES_DOCUMENT_WIDTH == 'doc'){
        $w = 750;
        $adjust = 16;
        if(OBANDES_SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }elseif(OBANDES_DOCUMENT_WIDTH == 'doc2'){
        $w = 950;
            $adjust = 16;
        if(OBANDES_SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }elseif(OBANDES_DOCUMENT_WIDTH == 'doc3'){
        $w = 600;
        if(OBANDES_SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }

    }elseif(OBANDES_DOCUMENT_WIDTH == 'doc4'){
        $w = 974;
        $adjust = 16;
        if(OBANDES_SIDEBAR_WIDTH == 'yui-t1'){
            $obandes_content_width = $w - 160 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t2'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t3'){
            $obandes_content_width = $w - 300 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t4'){
            $obandes_content_width = $w - 180 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t5'){
            $obandes_content_width = $w - 240 - $adjust;
        }elseif(OBANDES_SIDEBAR_WIDTH == 'yui-t6'){
            $obandes_content_width = $w - 300 - $adjust;
        }else{
            $obandes_content_width = $default;
        }
    }
    return $obandes_content_width;
    }
}

    if( ! isset($content_width)){
        $content_width = obandes_content_width();

    }
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_OBANDES_DOCUMENT_WIDTH" ) ){
    function obandes_OBANDES_DOCUMENT_WIDTH(){
        global $content_width;
        switch(OBANDES_DOCUMENT_WIDTH){
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
            $result = 'underfind-';
        break;
        }
    return $result;
    }
}

/**
 *
 *
 *
 *
 *
 */

if ( ! function_exists( 'obandes_posted_in' ) ) {
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
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_gallery_list" ) ){
    function obandes_gallery_list(){
        global $post;
        $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 10 ) );
                        $total_images = count( $images );

        if(isset($images) and !preg_match( "|\[gallery|",$post->post_content)){
        $result = '<div class="horizon-gallery">';
            foreach($images as $image){
            $result .= '<a class="size-thumbnail" href="'.esc_url(get_attachment_link($image->ID)).'/">'.wp_get_attachment_image( $image->ID, 'thumbnail' ).' </a>';
            }
            return $result.'</div>';

        }else{
            return false;
        }
    }
}
/**
 *
 *
 *
 *
 *
 */
if ( ! function_exists( 'obandes_comment' ) ) {
        function obandes_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment; ?>
            <?php if ( '' == $comment->comment_type ) : ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                 <div class="obandes-comment-avatar-wrapper">
                    <?php echo get_avatar( $comment, 42 ); ?>
                </div>
                    <div class="clearfix comment_author_block">
                    <?php printf( __( '%s <span class="says">says:</span>', 'obandes' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </div>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <div class="obandes-awaiting-moderation-block clearfix">
                    <em><?php _e( 'Your comment is awaiting moderation.', 'obandes' ); ?></em>
                    <br />
                    </div>
                <?php endif; ?>
                <div class="comment-meta commentmetadata clearfix"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
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
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_embed_meta" ) ){
    function obandes_embed_meta( $content ){
        $result = "";
        global $post,$content_width,$is_safari,$obandes_header_blank_color;
        $header_background_color = obandes_get_condition('obandes_header_background_color');
        $header_background_image = ' url('. get_template_directory_uri().'/images/d1-head.png )!important;';

        $header_text_color = get_theme_mod( 'header_textcolor'  );

        $css = "/* obandes header style start */
        header h1,
        header h1 a,
        header #site-description{
            color:#" . $header_text_color .";}
        #obandes-page-header{
            background-color:". strtolower( $header_background_color ).'!important;'
        . ' background-image: '. $header_background_image
        ."}
        /* obandes header style end */";

//body background
        $body_background                = get_theme_mod( "background_color" );
        $body_background_image          = get_theme_mod( "background_image" );
        $body_background_repeat         = get_theme_mod( "background_repeat" );
        $body_background_position_x     = get_theme_mod( "background_position_x" );
        $body_background_attachment     = get_theme_mod( "background_attachment" );

        $css .= '/*obandes body style start */';
        if( $body_background !== false and !empty( $body_background ) and !empty( $body_background_image ) ){
            $css .= "\nbody{background:#".$body_background.' url('. $body_background_image. ');}';
        }elseif( $body_background !== false and !empty( $body_background ) ){
            $css .= "\nbody{background:#".$body_background.';}';
        }elseif( !empty( $body_background_image ) ){
            $css .= "\nbody{background: url(". $body_background_image. ');}';
        }

        if( isset( $body_background_repeat ) and !empty( $body_background_repeat ) ){
            $css                    .= "\nbody{background-repeat: ". $body_background_repeat. ';}';
        }
        if( isset( $body_background_position_x ) and !empty( $body_background_position_x ) ){
            $css                    .= "\nbody{background-position:top ". $body_background_position_x. ';}';
        }
        if( isset( $body_background_attachment ) and !empty( $body_background_attachment ) ){
            $css                    .= "\nbody{background-attachment: ". $body_background_attachment. ';}';
        }
        $css .= '/*obandes body style end */';
        $css .= obandes_embed_style();
/**
 *
 *
 *
 *
 *
 */
    if ( 'blank' == get_theme_mod('header_textcolor') ){
        add_filter( 'wp_page_menu_args', 'obandes_page_menu_args' );
    }
    /**
     * insert into embed style ,javascript script and embed tags from custom field
     */
        if (is_single() || is_page()) {
            if(have_posts()){
             while (have_posts()) : the_post();
                $css .= get_post_meta($post->ID, 'css', true);
                if ( ! empty($css) or $is_safari == true) {
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
                if ( ! empty($javascript)) {
                $result .= '<script type="text/javascript">';
                $result .= "\n/*<![CDATA[*/\n";
                $result .= $javascript;
                $result .= "\n/*]]>*/\n";
                $result .= "</script>";
                }
                $meta = get_post_meta($post->ID, 'meta', true);
                if ( ! empty($meta)) {
                $result .= $meta;
                }
              endwhile;
            }else{
            }
        }else{
                $result .= '<style type="text/css">';
                $result .= "\n/*<![CDATA[*/\n";
                $result .=  $css;
                if($is_safari and $content_width < 500 ){
                    $result .=  "\n".'.safari embed{width:'.$content_width.'!important;}';
                }
                $result .= "\n/*]]>*/\n";
                $result .= "</style>";
        }
        echo $result;
        return $content;
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_header_validate" ) ){
    function obandes_header_validate($header_image_val){
            return  $header_image_val;
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_radio_options_pagetype_validate" ) ){
    function obandes_css_validate($css){
    //$css = strip_tags( $css );
    $css = str_replace(array( "<script",'</script>','<'.'?'),"",$css);
            return $css;
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_radio_options_pagetype_validate" ) ){
    function obandes_radio_options_pagetype_validate($data){
            return esc_html($data);
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_radio_options_navigation_validate" ) ){
    function obandes_radio_options_navigation_validate( $data ){

        $option_name  = 'obandes_radio_options_navigations';
        $new_settings     = get_option('obandes_theme_settings');

        if( preg_match('!t[1-5]!',$data,$regs) ){

        if($new_settings[$option_name] !== $data){
            $new_settings[$option_name]   = $data;
            update_option('obandes_theme_settings',$new_settings);
          }
            return esc_html($regs[0]);
        }else{
            return $data;

        }
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_header_background_color_validate" ) ){
    function obandes_header_background_color_validate($data){
            return esc_html($data);
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_first_only_msg" ) ){
    function obandes_first_only_msg($type=0) {
        global $obandes_query, $obandes_current_theme_name;
        if ( $type == 1 ) {
            $query  = 'obandes_settings';
            $link   = get_site_url('', 'wp-admin/themes.php', 'admin') . '?page='.$obandes_query;
            $msg    = sprintf(__('Thank you for adopting the %s theme. It is necessary to set it to this theme. Please move to a set screen clicking this <a href="%s">obandes settings view</a>.','obandes'), $obandes_current_theme_name ,$link);
        }
        if ( $type == 2 ) {
            $query  = 'obandes_settings';
            $link   = get_site_url('', 'wp-admin/themes.php', 'admin') . '?page='.$obandes_query;
            $msg    = sprintf(__('Thank you for adopting the %s theme. It is necessary to set it to this theme. Please move to a set screen clicking this <a href="%s">obandes settings view</a>.','obandes'), $obandes_current_theme_name ,$link);


            $msg    .= sprintf(__('     Note:Detected improperly option value. The value was corrected. ','obandes'));
        }
        return '<div id="testmsg" class="error"><p>' . $msg . '</p></div>' . "\n";
    }
}
/**
 * Option value set when install.
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_theme_init" ) ){
    function obandes_theme_init(){
        global $wpdb,$obandes_base_setting;
        foreach($obandes_base_setting as $add){
            $option_name = $add['option_name'];
            if( ! isset($obandes_theme_settings[$option_name])){
                $obandes_theme_settings[$option_name] = $add['option_value'];
            }
        }

        $obandes_theme_settings['install'] = true;
        update_option('obandes_theme_settings',$obandes_theme_settings,"",$add['autoload']);
    }
}
/*
 * Management of uninstall and install.
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_install_navigation" ) ){
    function obandes_install_navigation() {
        $install = get_option('obandes_theme_settings', array() );

        if(is_array($install) and !array_key_exists('install', $install)){
            delete_option('obandes_theme_settings');
            //add_action('admin_notices', 'obandes_first_only_msg_2' );
             obandes_theme_init();
        } elseif ( ! array_key_exists('install', $install)) {
            //add_action('admin_notices', 'obandes_first_only_msg_1' );
            obandes_theme_init();
        } else {
            add_action('switch_theme', 'obandes_uninstall' );
        }
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_first_only_msg_2" ) ){
    function obandes_first_only_msg_2(){
        echo obandes_first_only_msg(2);
    }
}
/**
 *
 *
 *
 *
 *
 */

if( ! function_exists( "obandes_first_only_msg_1" ) ){
    function obandes_first_only_msg_1(){
        echo obandes_first_only_msg(1);
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_uninstall" ) ){
    function obandes_uninstall(){
        delete_option( "obandes_theme_settings");
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_admin_print_styles" ) ){
    function obandes_admin_print_styles() {
        global $obandes_wp_version, $obandes_version;
        wp_enqueue_style( 'farbtastic' );
      if( file_exists( get_stylesheet_directory_uri().'/admin/admin-style.css' ) ){
        $src      = get_stylesheet_directory_uri().'/admin/admin-style.css';
      }else{
        $src      = get_template_directory_uri().'/admin/admin-style.css';
      }
      $deps     = array();
      $ver      = $obandes_version;
      $media    = 'screen';

      wp_register_style( 'obandes_admin_style', $src, $deps, $ver, $media );
      wp_enqueue_style( 'obandes_admin_style' );
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_admin_print_scripts" ) ){
    function obandes_admin_print_scripts() {
      wp_enqueue_script( 'farbtastic' );
      wp_enqueue_script( 'quicktags' );
      wp_enqueue_script( 'obandes-picker', get_stylesheet_directory_uri() . '/admin/admin-script.js', array( 'farbtastic', 'quicktags' ), false, true );
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_theme_options_add_page" ) ){
    function obandes_theme_options_add_page() {
        global $wp_version;
        $obandes_hook_suffix = add_theme_page(__( 'Obandes Options','obandes'), __( 'Obandes Options' ,'obandes'),'edit_theme_options', 'obandes_setting',             'obandes_options_page_view' );
        add_action('admin_print_styles-'.$obandes_hook_suffix, 'obandes_admin_print_styles');
        add_action('admin_print_scripts-'.$obandes_hook_suffix, 'obandes_admin_print_scripts');
        $obandes_check_wp_version = explode('-',$wp_version);
        if ( $obandes_hook_suffix and $obandes_check_wp_version[0] >= 3.3){
            add_action( 'load-' . $obandes_hook_suffix, 'obandes_help' );
        }
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_options_page_view" ) ){
    function obandes_options_page_view() {
        $obandes_result_message = '';
        global $select_options, $obandes_radio_options,$obandes_query, $obandes_current_theme_name,$obandes_wp_version;

    $obandes_navigation_list  = '<ul class="obandes-wp-native-style">';
    if( $obandes_wp_version >= '3.4' ){
        $obandes_navigation_list  .= '<ul class="obandes-wp-native-style"><li class="obandes-customizer obandes-wp-native-style-settings-link"><a href="'.admin_url( 'customize.php' ).'">'.__( 'Customizer','obandes').'</a><div class="obandes_customizer_description">'.__('Preview with settings','obandes').'<br />'.__('The obandes Setting change of a theme can also be performed. ','obandes').'</div></li>';
    }
        $obandes_navigation_list  .= '<li class="obandes-wp-native-style-settings-link"><a href="'.admin_url( 'widgets.php' ).'">'.__( 'Widget','obandes').'</a><div class="obandes_customizer_description">'.__('Add Widgets Sidebar and Footer','obandes').'<br />'.__('The obandes theme supports 6 positions of widgets area','obandes').'</div></li>';


        $obandes_navigation_list  .= '<li class="obandes-wp-native-style-settings-link"><a href="'.admin_url( 'theme-editor.php' ).'">'.__( 'Theme Editor','obandes').'</a><div class="obandes_customizer_description">'.__('Edit All Theme Files Manualy','obandes').'</div></li></ul>';

        echo '<div id="obandes-admin-settings">';
            screen_icon();
            echo '<h2 style="float:left;">' . __( ' WordPress Native Design Options' ,'obandes') . '</h2>';
            echo '<br style="clear:both;" />';
            echo $obandes_navigation_list;
            echo '<br style="clear:both;" />';
            screen_icon();
            echo '<h2 style="float:left;">' . $obandes_current_theme_name . __( ' Options' ,'obandes') . '</h2>';
            echo '<br style="clear:both;" />';

        /**
         * POSTGET
         *
         *
         */
        if (isset( $_POST['action'] ) == 'update' and isset($_POST['reset']) ){
            remove_theme_mods();
            $obandes_result_message = __( "Theme Customizer Options ,",'obandes');
        }
        if (isset( $_POST['action'] ) == 'update' and isset($_POST['obandessettingcss'])){
            global $obandes_base_setting;
            $ok             = false;
            $option_value   = esc_html($_POST['obandessettingcss']);
            $option_name    = 'obandes_css';
            $valid_function = 'obandes_css_validate';
            if($option_value == $valid_function($option_value)){
                  $new_settings                 = get_option('obandes_theme_settings');
                  if($new_settings[$option_name] !== $option_value){
                      $new_settings[$option_name]   = $option_value;
                      update_option('obandes_theme_settings',$new_settings);
                      $obandes_result_message = __( "Style ,",'obandes');
                  }
            }
        }
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
                      $obandes_result_message = __( "Style ,",'obandes');
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
                      $obandes_result_message .= __( "Header Image ",'obandes');
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
                      $obandes_result_message .= __( "Page Width ",'obandes');
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
                      $obandes_result_message .= __( "Navigation Setting ",'obandes');
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
                      $obandes_result_message .= __( "Header Background Color",'obandes');
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
        if ( ! isset($checked)){
            $checked = '';
        }
        $rows =substr_count($obandes_style, "\n") * 1.5 + 10;
        echo '<p><input type="submit" value="'. __( 'Save Options' ,'obandes').'" class="button" />&nbsp;';
        echo '<input type="submit" name="reset" value="'. __( 'Reset Customizer Options' ,'obandes').'" class="button" /></p>';
        echo '<table summary="stylesheet" class="form-table">';
        echo '<col class="highlight tablenav" />';
        echo '<col class="tablenav" />';
        echo '<tr valign="top">';
        echo '<td class="title obandes-left-col-title" >'.__( 'Column','obandes' ).'</td>';
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
        echo '<tr valign="top">';
        echo '<td class="title  obandes-left-col-title">'.__( 'Page' ).'</td>';
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
        echo '<td class="title obandes-left-col-title" ><div style="font-weight:bold;vertical-align:top;">'.__( 'Header Background Color' ,'obandes' );
        echo '</div>';
        echo '</td>';
        echo '<td>';
                $obandes_text_field = '<div><input type="text" name="%1$s" id="%1$s" class="obandes-color-picker" value="" />'.
                                    '<a href="#" id="pickcolor" class="button">'.__( "Select a Color","obandes").'</a>'.
                                    '<div id="colorpicker-selector" %3$s></div>';
                    printf($obandes_text_field,
                        esc_attr('obandes_setting[obandes_header_background_color]'),
                        esc_attr($obandes_header_background_color_val),
                        'style="z-index: 100; background:#fff; border:1px solid #ccc; position:absolute; display:none;"',
                        esc_attr(obandes_get_condition('obandes_header_background_color'))
                    );
        echo '</td></tr>';
        echo '<tr valign="top">';
        echo '<td class="title obandes-left-col-title" style="vertical-align:top;"><div>'.__( 'CSS Edit' ,'obandes' );
                $obandes_text_field = '<div style="margin:1em; padding:1em;border:inset thin">
                <p style="font-weight:normal">Create Hex Color Code</p><input id="obandespastetextarea" type="text" name="%1$s" id="%1$s" class="obandes-color-picker2" value="" onClick="colorpicker-selector2.select();" />'.'<a href="#" id="pickcolor2" class="button">'.__( "Select a Color","obandes").'</a>'.
'<div id="colorpicker-selector2" %3$s></div>';
                    printf($obandes_text_field,
                        'cleate-color',
                        esc_attr($obandes_header_background_color_val),
                        'style="z-index: 100; background:#fff; border:1px solid #ccc; position:absolute; display:none;"'
                    );
        echo '</div>';
        echo '<p>Full Size Edit: alt+shift+g</p>';
        echo '<p>back to theme option: alt+shift+g</p>';
        echo '</td>';
        echo '<td>';
            if( $obandes_wp_version >= '3.4' ){ // WordPress 3.4 check
                $obandes_wp_editor_settings = array(
                'wpautop' => false, //not work?
                'quicktags' => false,
                'media_buttons' => true,
                'textarea_rows' => get_option('default_post_edit_rows', 10) * 2,
                'teeny' => true
                );

                $obandes_style = stripslashes( $obandes_style);
                $obandes_style = html_entity_decode( $obandes_style );

                wp_editor( $obandes_style, 'obandessettingcss', $obandes_wp_editor_settings );
            }else{
                echo '<textarea class="obandes-css-textarea" id="obandes_setting[obandes_css]" cols="50" rows="10" name="obandes_setting[obandes_css]"';
                echo ' style="width:90%;height:'.$rows.'em;line-height:1.5;font-size:120%;font-family:"Courier New", Courier, mono;padding:3px;">';
                echo stripslashes( $obandes_style);
                echo '</textarea>';
            }
            echo '</td></tr></table>';
            echo '<p><input type="submit" value="'. __( 'Save Options' ,'obandes').'" class="button" /></p>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
/**
 *
 *
 *
 *
 *
 */
        if ( ! function_exists('obandes_help')) {
        function obandes_help($text){
        global $title,$obandes_query;
        $result = "<h2 class=\"h2\">".__('CSS links').'</h2>';
        $result .= "<ul>";
        $result .= sprintf('<li><a href="%s" title="%s">%s</a></li>',
                    esc_url( "http://www.tenman.info/wp3/obandes/quick-start-obandes/"),
                    esc_attr(__( "obandes Quick Start",'obandes')),
                    esc_html(__( "obandes Quick Start",'obandes')));
        $result .= sprintf('<li><a href="%s" title="%s">%s</a></li>',
                    esc_url( "http://www.tenman.info/csstidy/css_optimiser.php"),
                    esc_attr(__( "CSS Tidy",'obandes')),
                    esc_html(__( "CSS Tidy",'obandes')));
        $result .= sprintf('<li>%s</li>',
                        str_replace( "\t","",
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
                        str_replace( "\t","",
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
        $screen = get_current_screen();
        $screen -> add_help_tab(array('id' => 'obandes-theme-help','title' => 'Tips obandes','content' => $result));
            }
    }
}


/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_prev_next_post" ) ){
        function obandes_prev_next_post($position = "nav-above"){
            $obandes_max_length     = 40;
            $obandes_prev_length    = $obandes_max_length + 1;
            if( ! is_attachment() and is_singular( 'post' ) ){
                $obandes_max_length     = 40;
                $obandes_prev_post_id   = get_adjacent_post(true,'',true) ;
                $obandes_prev_length    = strlen(get_the_title($obandes_prev_post_id));
                $obandes_next_post_id   = get_adjacent_post(false,'',false) ;
                $obandes_next_length    = strlen(get_the_title($obandes_next_post_id));

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
<?php
            }
       }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_detect_option" ) ){
    function obandes_detect_option($condition){
        $obandes_current_settings       = get_option('obandes_theme_settings');
        $config                 =  $obandes_current_settings['obandes_css'];
        preg_match( "!^$condition=(.+)$!mu",$config,$regs);
        if(isset($regs[1])){
            $result = strip_tags($regs[1]);
            $result = str_replace(array( " ","\n","\r"),"",$result);
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
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_get_condition" ) ){
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
}
/**
 * image element has attribute 'width','height' and image size > column width
 * style max-width value 100% set when expand height height attribute value.
 *
 * IE filter
 *
 */

if( ! function_exists( "obandes_ie_height_expand_issue" ) ){
           function obandes_ie_height_expand_issue( $content ) {
            global $is_IE, $content_width;
            if ( $is_IE) {
                preg_match_all( '#(<img )([^>]+)(height|width)(=" )([0-9]+)"([^>]+)(height|width)(=" )([0-9]+)"([^>]*)>#', $content, $images,PREG_SET_ORDER);
                foreach( $images as $image) {
                    if (( $image[3] == "width" and $image[5] > $content_width) or ( $image[7] == "width" and $image[9] > $content_width) ) {
                        $content = str_replace( $image[0], $image[1].$image[2].$image[6].$image[10].'>', $content );
                    }
                }

                return $content;
            } else {
                return $content;
            }
        }
}
/**
 * onecolumn-page.php
 * condition this page, wp nav menu add footer widget area fragment identifier.
 *
 *
 *
 */
if( ! function_exists( "obandes_addHomeMenuLink" ) ){
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
}
/**
 * plugin API
 *
 *
 *
 *
 */
if( ! function_exists( "plugin_is_active" ) ){
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
}
/**
 *
 *
 *
 *
 *
 */

if( ! function_exists( "obandes_embed_style" ) ){
     function obandes_embed_style(){
     global $post,$obandes_lessc_exists;
    if( file_exists( $obandes_lessc_exists ) ){
        require_once( get_template_directory().'/lib/lessc.inc.php');
        if(  class_exists( 'lessc' ) ){
                    $less = new lessc();
        }

    }

        $embed_style = get_option('obandes_theme_settings');

        if(is_single()){
            $embed_style['obandes_css'] = $embed_style['obandes_css'] . get_post_meta($post->ID, 'less', true);
        }

        if( isset( $embed_style['obandes_css'] ) and !empty( $embed_style['obandes_css'] ) ){
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

        $obandes_template_dir   = get_template_directory_uri();

        $embed_style = preg_replace('!(url\()([^(\)|:)]+)(\))!',"$1{$obandes_template_dir}/$2$3",$embed_style);
        $embed_style = strip_tags( $embed_style );


        $embed_style = obandes_compress_css($embed_style,WP_DEBUG);

        if( isset( $less ) ){
            try {
                $embed_style            = $less->parse($embed_style);
            } catch (exception $ex) {
                exit('<div><h1>'.__( 'Style Rule ERROR', 'obandes' ).'</h1>'.$ex->getMessage().'</div>');
            }
        }


            $embed_style = str_replace(array('\&#039;','&#039;','\&quot;','&quot;','&nbsp;'),array('\'','\'','"','"',"\n"),$embed_style);

        return  "\n/* obandes embed style start */\n".obandes_compress_css($embed_style, WP_DEBUG )."/* obandes embed style end */";
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_compress_css" ) ){
    function obandes_compress_css($rules="",$remove_n = false){
            $rules = preg_replace( "|\s{2,}|"," ",$rules);
            $rules          = str_replace(array('&lt;','&#60;','&#x3c;','PA==','%3C','!/```'),' !less than ',$rules);
            $rules          = str_replace(array('\&#039;','&#039;','\&quot;','&quot;'),array('\'','\'','"','"'),$rules);
            if($remove_n !== true){
            $rules          = str_replace(array( "\n","\r","\t"),array( " "," "," "),"$rules");
            }else{
            $rules          = str_replace(array(',','{','}',';'),array( ",\n","{\n","\n}\n",";\n"),$rules);
            $rules          = preg_replace_callback( "|\([^\)]+\)|" , 'obandes_compress_callback' , $rules );

            }
            return $rules;
    }
}
if( ! function_exists( "obandes_compress_callback") ){
    function obandes_compress_callback( $matches ){
        return str_replace( "\n"," ",$matches[0]);
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_get_header_image_renderer") ){

    function obandes_get_header_image_renderer( $obandes_image_uri = '' ){
        global $post;
        $width                  = 930;
        $height                 = 178;
        $marginally             = false;
        $image_data             = get_custom_header( );
		
		$url        = get_theme_mod( 'header_image' );

		if( empty( $url ) ){ //When child theme $url empty
			$url    = get_header_image();
		}

		if( $url == 'random-uploaded-image'){
			$url = get_random_header_image();
		}

        if ( empty($obandes_image_uri ) and $url !== 'remove-header' ) {
            $obandes_image_uri  = $image_data -> url;
            $width              = $image_data -> width;
            $height             = $image_data -> height;
        }
        if( ! empty( $obandes_image_uri ) ) {

            if( has_post_thumbnail( $post->ID ) and is_singular()){
                $marginally = '<div id="header-image" class="header-image-marginally-style">';
                    $marginally .= get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
                $marginally .= '</div>';

                return $marginally;
            }

         $header_image_format = '<div id="header-image" class="%1$s"><img src="%2$s" style="width;%3$s; height:%4$s;" alt="header image"  class="%5$s %6$s" /></div>';

                switch(obandes_get_condition('letter-width')){
                    case( "doc"):
                    if( $width < 750 ){
                        $marginally = true;
                        $obandes_header_image_width = 'doc-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = $width.'px';
                        $obandes_header_image_height_numeric = $height.'px';
                    }else{
                        $obandes_header_image_width = 'covered-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = '100%';
                        $obandes_header_image_height_numeric = 'auto';
                    }

                    break;
                    case( "doc2"):
                    if( $width < 950){
                        $marginally = true;
                        $obandes_header_image_width = 'doc2-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = $width.'px';
                        $obandes_header_image_height_numeric = $height.'px';
                    }else{
                        $obandes_header_image_width = 'covered-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = '100%';
                        $obandes_header_image_height_numeric = 'auto';
                    }
                    break;
                    case( "doc4"):
                    if( $width < 974){
                        $marginally = true;
                        $obandes_header_image_width = 'doc2-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = $width.'px';
                        $obandes_header_image_height_numeric = $height.'px';
                    }else{
                        $obandes_header_image_width = 'covered-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = '100%';
                        $obandes_header_image_height_numeric = 'auto';
                    }

                    break;

                    default:
                        $marginally = false;
                        $obandes_header_image_width = 'covered-header-image-width';
                        $obandes_header_image_height = 'auto-header-image-height';
                        $obandes_header_image_width_numeric = '100%';
                        $obandes_header_image_height_numeric = 'auto';
                    break;

                }
                if( $marginally == true ){
                $class = 'header-image-marginally-style'; }else{$class = "background-none";}
                return sprintf( $header_image_format,
                        $class,
                        $obandes_image_uri,
                        $obandes_header_image_width_numeric,
                        $obandes_header_image_height_numeric,
                        $obandes_header_image_width,
                        $obandes_header_image_height
                );
        }
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_header_image_renderer" ) ){
    function obandes_header_image_renderer($obandes_image_uri = ''){
        echo apply_filters( 'obandes_header_image_renderer', obandes_get_header_image_renderer() );
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_get_title_format" ) ){
    function obandes_get_title_format($heading_elememt='h1'){

        $obandes_text_color = get_header_textcolor();

        if( $obandes_text_color  !== 'blank' ){

            $title_format = '<%6$s class="h1" id="site-title"><a href="%2$s" title="%3$s" rel="%4$s" class="obandes-site-header-text-color" style="color:#%7$s"><span>%5$s</span></a></%6$s>';
            return sprintf(
                $title_format,
                $heading_elememt,
                home_url(),
                esc_attr(get_bloginfo( 'name', 'display' )),
                "home",
                get_bloginfo( 'name', 'display' ),
                $heading_elememt,
                $obandes_text_color
                );
        }
        return;
    }

}
if( ! function_exists( "obandes_title_format" ) ){
    function obandes_title_format($heading_elememt='h1'){
       echo apply_filters( 'obandes_title_format', obandes_get_title_format($heading_elememt));
    }
}
/**
 *
 *
 *
 *
 *
 */
if( ! function_exists( "obandes_enqueue_comment_reply" ) ){
    function obandes_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
if( ! function_exists( "obandes_comment_prev_next" ) ){

        function obandes_comment_prev_next($position = "comment-above"){ ?>
<div id="<?php echo $position;?>" class="navigation clearfix">
<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'obandes' ) ); ?></div>
<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?></div>
</div>
<?php }
}
/**
 *
 *
 *
 *
 *
 */

if ( ! function_exists( 'obandes_small_device_helper' ) ) {
    function obandes_small_device_helper(){
        global $is_IE;
    ?>
        <script type="text/javascript">
        (function(){
        jQuery(function(){
            var width = jQuery(window).width();
        <?php
        /**
        * Site title , description font size resize and header height ajust
        */
        ?>
            function obandes_Resize(){

                if( width < 1281 ){
                    body_class = 'obandes-w-sxga';
                }
                if( width < 1025 ){
                    body_class = 'obandes-w-xga';
                }
                if( width < 801 ){
                    body_class = 'obandes-w-svga';
                }
                if( width < 641 ){
                    body_class = 'obandes-w-vga';
                }
                if( width < 481 ){
                    body_class = 'obandes-w-iphone';
                }
                if( width < 321 ){
                    body_class = 'obandes-w-qvga';
                }
                if( width < 241 ){
                    body_class = 'obandes-w-keitai';
                }
                if( width > 641 ){

                }

                /* remove old width[0-9]+ class*/
                var element = jQuery( "body");
                var classes = element.attr('class').split(/\s+/);

                var pattern = /^obandes-w/;

                for(var i = 0; i < classes.length; i++){
                  var className = classes[i];

                  if(className.match(pattern)){
                    element.removeClass(className);
                  }
                }

                jQuery('body').addClass( body_class );


    <?php
    /**
     * Check window size and mouse position
     * Controll childlen menu show right or left side.
     *
     *
     *
     */
     ?>
                jQuery( "#access").mousemove(function(e){
                    var menu_item_position = e.pageX ;
                    if( width - 200 < menu_item_position){
                       // jQuery('#access .children .children').addClass('left');
                        jQuery('#access ul ul ul').addClass('left');
                    }else if( width / 2 >  menu_item_position){
                      //  jQuery('#access .children .children').removeClass('left');
                        jQuery('#access ul ul ul').removeClass('left');
                    }
                });
            }

            obandes_Resize();
            jQuery(window).resize( function () {
                obandes_Resize();
            });
        });
        })(jQuery);
        </script>
        <?php
    }
}
/**
 *
 *
 *
 *
 */
if( ! function_exists( 'obandes_mobile_meta' ) ){
    function obandes_mobile_meta(){
        if( wp_is_mobile() ){
    ?>
        <meta name="viewport" content="width=device-width" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style"      content="default">
    <?php
        }
    }
}
?>