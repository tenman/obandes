WordPress Theme obandes
-------------------------------------------------
Author:Tenman
email:a.tenman@gmail.com
WEB Site:http://www.tenman.info
Infomation of obandes theme:http://www.tenman.info/wp3/obandes/


Theme images:

wp3-thumbnail.jpg,wp3.jpg,wp3.png,author-archives.png,bg-1.png,bg.png,c.gif,category-archives.png,d1-head.png,daily-archives.png,external.png,footer.png,footerbck.gif,footerbck.png,h2.gif,h2.png,h2b.png,h2c.png,header.png,hr.png,icons-b.png,icons.png,info.png,ja-em.png,list-marker.png,login.png,monthly-archives.png,login.png,monthly-archives.png,rext.png,obandes_admin_page.png,obandes_admin_page_750.jpg,obandes_admin_page_950.jpg,obandes_admin_page_974.jpg,obandes_admin_page_fluid.jpg,obandes_admin_page_t1.jpg,obandes_admin_page_t2.jpg,obandes_admin_page_t3.jpg,obandes_admin_page_t4.jpg,obandes_admin_page_t5.jpg,obandes_admin_page_t6.jpg,pagetop.png,previous.png,require.png,rss.png,search-result.png,search-results.png,sidebar-sepalate-line.png,sidebar-title.png,stop.png,tag-archives.png,title-bg.png,topbck.gif,topbck.png,topbck.gif,topbck.png,wp-logo.png,y.gif,yearly-archives.png,screenshot.png

Above images License

copyright   Copyright (c) 2010-2012, Tenman
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This themes contents is especially the thing without clear statement of a license
supply under below license.

copyright   Copyright (c) 2010-2011, Tenman
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html

USAGE:http://www.tenman.info/wp3/obandes/quick-start-obandes/

External API:
    This theme use some External API for display the post.

    API use display will shown when display single.


    When select a format chat.
        If you write coron(:) separate notation where the post.like below.
        tom:hello world
        this hello world display width speachbubble.

        Using Google Chart Tools API
        see http://code.google.com/apis/chart/

    When select a format image
        If you write a image URI where the post.
        first image will display with Zoom it.

        Using Zoom it API
        see http://zoom.it/

    When select a format link
        If you write a URL where the post.
        The post with Capture image will display.

        see http://heartrails.com/

Another format:

    When select a format gallery
        if your post has gallery image then show gallery images left column
        without when you write a gallery shortcode in the post.


Writing helpers:

    lessphp CSS prefroccesor support where Options CSS editor

        see http://leafo.net/lessphp/docs/

        Note:obandes lessphp can not use @import rule.

    Yahoo user interface nesting grid support where templates and the post

        see http://developer.yahoo.com/yui/examples/grids/grids-g.html

    horizon-something class

        prefix horizon- class is create a horizontal layout

        Same class name div block is display horizon and grouping.

        see theme options help tab.

    Custom field special field names

        Field name css can auto embed style where template head when display single

        example

        field name : css
        firld value: h1 a {color:#ff0000!important}

        auto embeding style rule below.

            <style type="text/css">
            /*<![CDATA[*/
            h1 a{color:#ff0000!important}
            /*]]>*/
            </style>

        Field name javascript can auto embed scripts where template head when display single

        example

        field name : javascript
        firld value: alert( 'hello world' );

        auto embeding script below.

            <script type="text/javascript">
            /*<![CDATA[*/
            alert( 'hello world' );
            /*]]>*/
            </script>

        Field name meta can auto embed elements where template head when display single

        example

        field name : meta
        field value: <meta name="description" content="How to obandes">


        auto embeding elements below.

            <meta name="description" content="How to obandes">

        Field name 'less' convert less notation to CSS rules and embed style rules
        when display single.
        since ver0.99

        example

        field name : less
        field value: @color-1:#555; p{background:@color-1;}

ver 1.20
        header image note:
         when fixed layout image size
            Smaller than page width image shows image width and position center.
            Larger than page width image shows to the limit of page width.
         when fluid layout image size
            It displays to the limit of page width.

ver 1.49
        obandes1.49 is lessphp. It stopped being attached.
        The user who uses now is http://leafo.net/lessphp/
        Please download and set lessc.inc.php to a lib directory.
