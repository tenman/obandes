<?php
/**
 * The format-standard for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.41
 */
?>
<?php
    if(WP_DEBUG == true){
		echo '<!--Single Category '.$cat.' start-->'."\n";
    }
	
	printf('<article id="post-%s" %s>',	
		$post->ID,
		'class="yui-b '.implode(' ',get_post_class('clearfix')).'"');
	
	obandes_prev_next_post('nav-above');
?>
<strong class="h2"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
  <?php the_title(); ?>
  </a></strong>
  <div class="entry-content clearfix">
    <?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
    <div class="clear"></div>
    <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
		
    <div class="entry-utility">
      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
	<?php obandes_prev_next_post('nav-below');?>
  </div>
  <div class="clear"></div>
  <?php comments_template( '', true ); ?>
</article>

