<?php
/**
/**
 * Template Name: List Tags
 * @package: obandes
 * @since obandes 1.10
 */
?>
<?php get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<section id="list-tags">
  <article class="page hpage" id="post-<?php the_ID(); ?>">
<?php wp_tag_cloud( array( 'format' => 'list' ) ); ?>
  </article>
  <div class="clear"></div>
</section>
<?php get_footer();?>



