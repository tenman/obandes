<?php
/**
 * pages for our theme.
 *
 *
 *
 * @package: obandes
 * @since obandes 0.1
 */
get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<section id="yui-main">
  <?php while (have_posts()) : the_post(); ?>
  
  <article class="page hpage yui-b" id="post-<?php the_ID(); ?>">
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
  </section>
  <nav class="yui-b" id="toc">
    <ul>
      <?php if ( dynamic_sidebar('sidebar-1') ) : else : ?>
      <?php wp_list_pages('title_li=<h2 class="h2">'.__('Pages','obandes').'</h2>' ); ?>
      <li>
        <h2 class="h2">Archives</h2>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </li>
      <?php wp_list_categories('show_count=0&title_li=<h2 class="h2">'.__('Categories','obandes').'</h2>'); ?>
      <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
      <?php wp_list_bookmarks(); ?>
      <li>
        <h2 class="h2">
          <?php _e("Meta",'obandes');?>
        </h2>
        <ul>
          <?php wp_register(); ?>
          <li>
            <?php wp_loginout(); ?>
          </li>
          <?php wp_meta(); ?>
        </ul>
      </li>
      <?php } ?>
      <?php endif; ?>
    </ul>
  </nav>

  <?php get_footer();?>
