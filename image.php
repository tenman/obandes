<?php
/**
 * The single post for obandes.
 *
 * @package: obandes
 * @since obandes 0.41
 */
?>
<?php get_header();?>
<?php
if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->'."\n";
}?>
<section id="yui-main" class="clearfix">
<?php

    if ( have_posts()) {
        while (have_posts()){

        the_post();

            if (!locate_template( array('formats/format-'.get_post_format().'.php'), true ) ) {
?>
<article id="post-<?php echo $post->ID; ?>" <?php post_class('yui-b'); ?>>
<?php obandes_prev_next_post();?>
<p class="parent-entry">
</p>
<h2 class="h2 title"><?php _e("Entry : ",'obandes');?>
              <a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a>&nbsp;<span style="display:block;font-size:100%!important;text-align:right;"><?php _e("Attachment : ",'obandes');?>&nbsp;<?php the_title(); ?></span></h2>
			
<div class="meta posted-on">
<?php obandes_posted_on(); ?>
<?php //echo sprintf( __( '<span class="time-diff">(Published for %s)</span>', 'obandes' ), human_time_diff(get_the_time('U'),time()) );?> </div>

<div class="content clearfix">
            <?php $image = get_post_meta($post->ID, 'image', true); ?>
            <?php $image = wp_get_attachment_image_src($image, 'full'); ?>
            <p class="image"><a href="<?php echo $image[0];?>" ><img src="<?php echo $image[0];?>" width="100%"  alt="<?php the_title_attribute(); ?>" /></a></p>
            <div class="caption">
              <dl>
                <dd class="caption">
                  <?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?>
                </dd>
                <dd class="serif">
                  <?php the_content('<p >Read the rest of this entry &raquo;</p>'); ?>
                  <br class="clear" />
                </dd>
              </dl>
            </div>
<div class="clear"></div>
<?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
</div>

<div class="clear"></div>
<div class="attachment-navigation">
              <div class="nav-previous">
                <?php previous_image_link(0) ?>
              </div>
              <div class="nav-next">
                <?php next_image_link(0) ?>
              </div>
              <br class="clear" />
</div>
<div class="meta posted-in">
<?php obandes_posted_in();?>
<?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div>
<br class="clear" />
<?php comments_template( '', true ); ?>
<br class="clear" />
</article>
<?php
            }

        }
    }
?>
</section>
<?php get_sidebar('1');?>
<?php get_footer();?>