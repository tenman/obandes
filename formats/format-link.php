<?php
/**
 * The format-standard for obandes.
 *
 *
 * @package: obandes
 * @since obandes 0.41
 */

	add_filter("the_content","obandes_transform_link");

	function obandes_transform_link($contents){
	
	global $post;
	
		preg_match("/(https?:\/\/)([-_.!*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)([^>]+>)([^<]+)</iu",$contents,$regs);
		
		$url = $regs[1].$regs[2];
		
		$link_title = $regs[4];
		
		if(strcmp(trim($url),trim(strip_tags($contents))) == 0){
			$contents = '<p><a href="'.$url.'">'.get_the_title($post->ID).'</a></p>';
		}
		
		
		$add_presentation = '<div class="horizon-format-link"><img src="'.esc_url("http://capture.heartrails.com/medium?".$url).'" title="'.$link_title.'"></div><div class="horizon-format-link">'.$contents.'</div>';
		
		return $add_presentation;
	}

    if(WP_DEBUG == true){
		echo '<!--format-link.php-->'."\n";
    }
	
	printf('<article id="post-%s" %s>',	
		$post->ID,
		'class="yui-b '.implode(' ',get_post_class('clearfix')).'"');
	
	obandes_prev_next_post('nav-above');
?>	
  <h2 class="h2 title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  <div class="meta posted-on"><?php obandes_posted_on(); ?></div>

  <div class="content clearfix">
    <?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
    <div class="clear"></div>
    <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
  </div>
     <div class="clear"></div>
  <div class="meta posted-in"><?php obandes_posted_in();?>
    <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
  </div>
<?php obandes_prev_next_post('nav-below');?>
  <?php comments_template( '', true ); ?>
</article>
<!-- #post-<?php the_ID(); ?> -->

