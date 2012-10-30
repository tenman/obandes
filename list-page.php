<?php
/**
/**
 * Template Name: List Page
 * @package: obandes
 * @since obandes 1.10
 */
?>
<?php get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<section id="list-pages">
  <article class="page hpage" id="post-<?php the_ID(); ?>">
<?php echo wp_list_pages();?>
    <div class="linkpage clearfix">
      <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
    </div>
  </article>
  <div class="clear"></div>
</section>
<?php get_footer();?>