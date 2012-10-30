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
<h2 class="h2 title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<?php the_title(); ?>
</a></h2>
<div class="meta posted-on">
<?php obandes_posted_on(); ?>
<?php //echo sprintf( __( '<span class="time-diff">(Published for %s)</span>', 'obandes' ), human_time_diff(get_the_time('U'),time()) );?> </div>
<div class="content clearfix">
<?php the_content();?>
<div class="clear"></div>
<?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
</div>
<div class="clear"></div>
<div class="meta posted-in">
<?php obandes_posted_in();?>
<?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div>
<br class="clear" />
<?php comments_template( '', true ); ?>
<br class="clear" />
<?php obandes_prev_next_post('nav-below');?>
</article>
<?php
            }

        }
    }
?>

</section>
<?php get_sidebar('1');?>
<?php get_footer();?>