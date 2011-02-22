<?php
/**
 * pages for our theme.
 *
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<article id="yui-main">
  <div class="yui-b" >
    <section>
      <div class="yui-u first">
        <?php while (have_posts()) : the_post(); ?>
        <div class="entry page hpage">
          <div id="post-<?php the_ID(); ?>">

  <h2 class="h2 entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <div style="entry-content clearfix">
              <?php the_content('Read the rest of this entry &raquo;'); ?>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="linkpage clearfix">
			<?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
			</div>
           <div class="clear"></div>
            <p class="postmetadata"><?php the_category(', ') ?>&nbsp;<?php edit_post_link('Edit', '', ' '); ?></p>
            <?php comments_template( '', true ); ?>
          </div>
        </div>
        <?php endwhile; ?>
       </div>
      <div class="clear"></div>
    </section>
  </div>
</article>
<?php if ( is_active_sidebar( 'sidebar-1' ) ){ ?>
<nav class="yui-b" id="toc">
<ul>
<?php dynamic_sidebar('sidebar-1');?>
</ul>
</nav>
<?php }?>
<?php get_footer();?>