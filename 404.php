<?php
/**
 * The page not found for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.41
 */
?>
<?php get_header();?>
<?php
if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->'."\n";
}?>
<section id="yui-main">
<article id="post-0" class="post error404 not-found yui-b">
  <h2 class="title h2">
    <?php _e( 'Not Found', 'obandes' ); ?>
  </h2>
  <div class="content">
    <p>
      <?php _e( 'Apologies, but no results were found for the requested Archive. Perhaps searching will help find a related post.', 'obandes' ); ?>
    </p>
    <?php get_search_form(); ?>
  </div>
</article>
<div class="clear"></div>	
</section>
<?php get_sidebar('1');?>
<?php get_footer();?>
