<?php
/**
 * Template Name: Front Page Template
 *
 * @package: obandes
 * @since obandes 1.32
 */
?>
<?php get_header( 'front' );?>

<div class="front-page-template">
<?php
    if ( is_active_sidebar( 'front-page-template-left-widget-area'  )
        and is_active_sidebar( 'front-page-template-right-widget-area' ) ){
	
		/* Remove header image background color */
		add_filter( 'obandes_header_image_renderer', 'front_header_image' );
		
		function front_header_image($content){
			return preg_replace( '!id\s*=\s*"[^"]+"!','',$content);
		}
	
        $style = 'style="float:left;width:50%;"';
    }else{
        $style = '';
	}
?>
<div <?php echo $style;?>>
<?php obandes_header_image_renderer();?>
<?php dynamic_sidebar( 'front-page-template-left-widget-area' ); ?>
</div>
<div <?php echo $style;?>>
<?php dynamic_sidebar( 'front-page-template-right-widget-area' ); ?>
</div>
</div>
<div class="clear"></div>
<?php get_footer();?>