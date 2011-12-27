WordPress Theme obandes
-------------------------------------------------
Author:Tenman
email:a.tenman@gmail.com
WEB Site:http://www.tenman.info
Infomation of obandes theme:http://www.tenman.info/wp3/obandes/
This themes contents is especially the thing without clear statement of a license 
supply under below license.

copyright	Copyright (c) 2010-2011, Tenman
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

	When select	a format gallery
		if your post has gallery image then show gallery images left column
		without when you write a gallery shortcode in the post.
		

Writing helpers:

	lessphp CSS prefroccesor support where Options CSS editor
	
		see http://leafo.net/lessphp/docs/
	
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
		firld value: <meta name="description" content="How to obandes">

		
		auto embeding elements below.
		
			<meta name="description" content="How to obandes">
			
		
