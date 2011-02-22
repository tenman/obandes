<?php
/**
 * The format-chat for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.41
 */
	add_filter("the_content","obandes_transform_chat");

	function obandes_transform_chat($contents){
		preg_match_all('|([^<>]+)?(\:)([^<>]+)?|si',$contents,$regs,PREG_SET_ORDER);
		foreach($regs as $reg){
		
		if(strlen($reg[3]) < 50){
			
		$res = '<img src="http://chart.apis.google.com/chart?chst=d_bubble_texts_big&chld=bb|008888|FFFF88|'.urlencode($reg[3]).'">';


		}else{
		$res = '<span style="display:block;margin:2em 0;background:#ccc;color:#333;padding:1em;">'.$reg[3].'</span>';		
		
		}

		$contents = str_replace($reg[3].'<',$res.'<',$contents);
			
		}
		
		return $contents;
	}

    if(WP_DEBUG == true){
		echo '<!--format-chat.php-->'."\n";
    }
	
	printf('<article id="post-%s" %s>',	
		$post->ID,
		'class="yui-b '.implode(' ',get_post_class('clearfix')).'"');
	
	obandes_prev_next_post('nav-above');
?>
  <h2 class="h2 entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  <div class="entry-meta"><?php obandes_posted_on(); ?></div>
  <div class="entry-content clearfix">
    <?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
    <div class="clear"></div>
    <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
  </div>
     <div class="clear"></div>
  <div class="entry-utility"><?php obandes_posted_in();?>
    <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
  </div>
  <?php obandes_prev_next_post('nav-below');?>
  <?php comments_template( '', true ); ?>
</article>
