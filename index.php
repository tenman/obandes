<?php
/**
 * The index for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
?>
<?php get_header();?>
<?php
if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->'."\n";
}?>
<section id="yui-main">
<?php

if(is_home() === false){
	get_template_part( 'loop', 'default' );
	
}else{
	get_template_part( 'loop', 'format' );
} 

?>
<div class="clear"></div>
</section>
<?php get_sidebar('1');?>
<?php get_footer();?>
