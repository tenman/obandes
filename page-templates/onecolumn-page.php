<?php
/**
 * Template Name: One column
 * backward compatibility
 * @since obandes 0.52
 */


get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<div id="onecolumn">
  <?php while (have_posts()) : the_post(); ?>
  
  <article class="page hpage" id="post-<?php the_ID(); ?>">
    <h2 class="h2 title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <div class="content clearfix">
      <?php the_content('Read the rest of this entry &raquo;'); ?>
      <div class="clear"></div>
    </div>
    <div class="linkpage clearfix">
      <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
    </div>
    <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
    <?php comments_template( '', true ); ?>
  </article>
  <?php endwhile; ?>
  <div class="clear"></div>
</div>
<?php get_footer();?>

