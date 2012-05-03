<?php
/**
/**
 * Template Name: List Categories
 * @package: obandes
 * @since obandes 1.10
 */
?>
<?php get_header();?>
<?php
if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->'."\n";
}?>
<section id="yui-main" style="margin:0;width:100%;border:1px solid red">



<div id="archive-menu" role="navigation" class="clearfix">
<?php wp_nav_menu( array( 'container_class' => 'archive-menu', 'theme_location' => 'responsive', 'fallback_cb' => 'obandes_archive_menu') ); ?>
        </div>
<?php
	//get_template_part( 'loop', 'responsive' );
?>
<div class="clear"></div>
</section>

<?php echo wp_list_categories();?>


<?php //get_sidebar('1');?>
<?php get_footer();?>
