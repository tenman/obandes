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
<div id="yui-main">
  <div class="yui-b" >
    <div class="<?php if(isset($yui_inner_layout)){echo $yui_inner_layout;}else{echo 'yui-ge';}?>" id="container">
      <!-- content -->
      <div class="yui-u first" <?php if($rsidebar_show == false){echo "style=\"width:100%;\"";} ?>>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="entry page hpage">
          <div id="post-<?php the_ID(); ?>">
            <h2 class="h2 title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

            <div style="entry-content clearfix">
              <?php the_content('Read the rest of this entry &raquo;'); ?>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
                 <p class="page-meta">
              <abbr class="date published" title="<?php the_time('c') ?>"><?php the_time(get_option('date_format')) ?></abbr>
              &nbsp;
               <?php  echo sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s"   rel="vcard:url">%2$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author() );?>
              </p>
            <div class="linkpage clearfix">
              <?php wp_link_pages('before=<p class="pagenate">&after=</p>&next_or_number=number&pagelink=<span>%</span>'); ?>
            </div>
           <div class="clear"></div>
            <p class="postmetadata"><?php the_category(', ') ?>&nbsp;<?php edit_post_link('Edit', '', ' '); ?></p>
            <?php comments_template( '', true ); ?>
          </div>
        </div>
        <?php endwhile; ?>
        <?php if ( $wp_query->max_num_pages > 1 ) : ?>

        <div id="nav-below" class="clearfix"> <span class="nav-previous">
          <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?>
          </span> <span class="nav-next">
          <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
          </span> </div>
        <!-- #nav-above -->
        <?php endif; ?>
        <?php else : ?>
        <div class="entry">
          <div id="not-found">
            <h2 class="h2">
              <?php _e("Not Found","obandes"); ?>
            </h2>
            <p><br />
              <small>
              <?php _e("Sorry, but you are looking for something that isn't here.","obandes");?>
              </small></p>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <!-- navigation 1 -->
      <div class="yui-u">
        <!--rsidebar start-->
        <?php if($rsidebar_show){get_sidebar('2');} ?>
        <!--rsidebar end-->
      </div>
    </div>
  </div>
  <!--main-->
</div>
<!--sidebar-->
<div class="yui-b" >
  <?php get_sidebar('1'); ?>
</div>
<!--sidebar-->

<?php get_footer(); ?>