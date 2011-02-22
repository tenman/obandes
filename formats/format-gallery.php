<?php
/**
 * format-gallery.php.
 *
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.41
 */
?>
<?php
    if(WP_DEBUG == true){
		echo '<!--format-gallery.php-->'."\n";
    }
	
	printf('<article id="post-%s" %s>',	
		$post->ID,
		'class="yui-b '.implode(' ',get_post_class('clearfix')).'"');
	
	obandes_prev_next_post('nav-above');
?>

<h2 class="entry-title h2"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
  <?php the_title(); ?>
  </a></h2>
<div class="entry-meta">
  <?php obandes_posted_on(); ?>
</div>
<div class="entry-content"> <?php echo obandes_gallery_list();?>
  <div class="horizon-gallery">
    <?php the_content( '' ); ?>
    <div class="clear"></div>
    <div class="entry-utility">
      <?php obandes_posted_in();?>
      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
    </div>
  </div>
  <div class="clear"></div>
  <?php obandes_prev_next_post('nav-below');?>
  <?php comments_template( '', true ); ?>
</div>
<!-- #entry-utility -->
</article>
