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
	

		preg_match("/(https?:\/\/)([-_.!*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)\.(jpg|jpeg|gif|png)/iu",$contents,$regs);

		$url = $regs[1].$regs[2].'.'.$regs[3];
		
	if(!empty($url)){
							
		$json_res =  wp_remote_get("http://api.zoom.it/v1/content/?url=".$url);		
			
	
	
		if( is_wp_error( $json_res ) ) {
		   return $contents;
		} else {
			$json_decode = json_decode($json_res['body']);
			
			$contents = preg_replace("|(<img)([^>]+>)|i",'',$contents,1);
		
			return str_replace('&','&amp;',$json_decode->embedHtml)."<p><a href=\"$url\">$url</a></p>".$contents;
		}
	
	}else{
	
		return $contents;
	}

	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('yui-b'); ?>>
<?php obandes_prev_next_post();?>
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

