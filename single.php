<?php
/**
 * The index for obandes.
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
<?php

    if ( have_posts()) {
        while (have_posts()){

        the_post();

            if (function_exists('get_post_format') and locate_template( array( 'formats/format-standard.php' ))){
                    get_template_part( 'formats/format', get_post_format() );

            }else{
?>
<article id="post-<?php echo $post->ID; ?>" <?php post_class('yui-b'); ?>>
<?php obandes_prev_next_post();?>
<h2 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<?php the_title(); ?>
</a></h2>
<div class="entry-meta">
<?php obandes_posted_on(); ?>
<?php echo sprintf( __( '<span class="time-diff">(Passage of %s)</span>', 'obandes' ), human_time_diff(get_the_time('U'),time()) );?> </div>
<div class="entry-content clearfix">
<?php the_content();?>
<div class="clear"></div>
<?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
</div>
<div class="clear"></div>
<div class="entry-utility">
<?php obandes_posted_in();?>
<?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div>
<br class="clear" />
<?php obandes_prev_next_post('nav-below');?>
</article>
<?php
            }

        }
    }
?>
</section>
<?php if ( is_active_sidebar( 'sidebar-1' ) ){ ?>
<nav class="yui-b" id="toc">
<ul>
    <?php dynamic_sidebar('sidebar-1');?>
  </ul>
</nav>
<?php }?>
<?php get_footer();?>
