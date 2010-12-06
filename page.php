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
<!--<?php echo basename(__FILE__,'.php');?>[<?php echo basename(dirname(__FILE__));?>]-->
<div id="yui-main">
  <div class="yui-b" >
       <div class="<?php if(isset($yui_inner_layout)){echo $yui_inner_layout;}else{echo 'yui-ge';}?>" id="container">
      <!-- content -->
      <div class="yui-u first" <?php if($rsidebar_show == false){echo "style=\"width:100%;\"";} ?>>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="entry page">
          <div id="post-<?php the_ID(); ?>">
            <h2 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <p style="margin-left:25px;" class="entry-date"><small><?php the_time(get_option('date_format')) ?>&nbsp;<?php the_author() ?></small></p>

<div style="entry-content clearfix">
            <?php the_content('Read the rest of this entry &raquo;'); ?>
</div>
            <div class="linkpage clearfix">
                <?php wp_link_pages('before=<p class="pagenate">&after=</p>&next_or_number=number&pagelink=<span>%</span>'); ?>
            </div>
<br style="clear:both;" />

            <p class="postmetadata"><?php the_category(', ') ?>&nbsp;<?php edit_post_link('Edit', '', ' '); ?></p>



            <?php comments_template( '', true ); ?>


          </div>
        </div>

        <?php endwhile; ?>


        <?php if ( $wp_query->max_num_pages > 1 ) : ?>

        <div id="nav-below" class="clearfix">
          <span class="nav-previous">
            <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?>
          </span>
          <span class="nav-next">
            <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
          </span>
        </div>
        <!-- #nav-above -->
        <?php endif; ?>

        <?php else : ?>
        <div class="entry">
                 <div id="not-found">
            <h2 class="h2"><?php _e("Not Found","Raindrops"); ?></h2>
            <p><br />
              <small><?php _e("Sorry, but you are looking for something that isn't here.","Raindrops");?></small></p>
          </div>
        </div>
        <?php endif; ?>
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
</div>

<?php get_footer(); ?>