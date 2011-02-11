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
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<article id="yui-main">
  <div class="yui-b" >
    <section>
      <?php get_template_part( 'loop', 'default' );?>
      <div class="clear"></div>
    </section>
  </div>
</article>
<?php get_sidebar('1'); ?>
<?php get_footer();?>