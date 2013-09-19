<?php
/**
 * The format-standard for obandes.
 *
 *
 * @package: obandes
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
	
?>
<strong class="h2 title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
  <?php the_title(); ?>
  </a></strong>
  <div class="content clearfix">
    <?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
    <div class="clear"></div>
    <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
		

      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
	<?php obandes_prev_next_post('nav-below');?>

  <div class="clear"></div>
  <?php comments_template( '', true ); ?>
</article>

