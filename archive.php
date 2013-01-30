<?php
/**
 * The archives for obandes.
 *
 *
 * @package: obandes
 * @since obandes 1.1
 */
?>
<?php get_header();?>
<?php
if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->'."\n";
}?>
<div id="yui-main">
<?php
    get_template_part( 'loop', 'default' );
?>
<div class="clear"></div>
</div>
<?php get_sidebar('1');?>
<?php get_footer();?>