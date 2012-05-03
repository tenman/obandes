<?php
/**
/**
 * Template Name: List Categories
 * @package: obandes
 * @since obandes 1.10
 */
?>
<?php get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<section id="list-categories">

  <article class="page hpage" id="post-<?php the_ID(); ?>">
    <?php echo wp_list_categories();?>
  </article>
  <div class="clear"></div>
</section>
<?php get_footer();?>