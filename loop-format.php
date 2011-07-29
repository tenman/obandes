<?php
/**
 * The html5 loop for obandes.
 * index archive page loop
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
 ?>

<div class="index yui-b">
  <?php if ( $wp_query->max_num_pages > 1 ){ ?>
  <div>
    <div id="nav-above" class="clearfix"> <span class="nav-previous">
      <?php next_posts_link( __( '<span class="button"><span class="meta-nav">&larr;</span> Older posts</span>', 'obandes' ) ); ?>
      </span> <span class="nav-next">
      <?php previous_posts_link( __( '<span class="button">Newer posts <span class="meta-nav">&rarr;</span></span>', 'obandes' ) ); ?>
      </span> </div>
  </div>
  <?php 	} //end #nav-above	?>
  <?php while (have_posts()){ the_post(); ?>
  <?php if(get_post_format( $post->ID ) === false ){ 
/**
 *
 *
 *
 *
 *
 */
?>
  <div>
    <article id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
      <h2 class="h2 title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <div class="meta posted-on">
        <?php obandes_posted_on(); ?>
        <?php echo sprintf( __( '<span class="time-diff">(Published for %s)</span>', 'obandes' ), human_time_diff(get_the_time('U'),time()) );?> </div>
      <div class="content clearfix">
        <?php
if(OBANDES_USE_LIST_EXCERPT == true){
the_excerpt();
}else{
the_content();
}?>
        <div class="clear"></div>
        <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
      </div>
      <div class="clear"></div>
      <div class="meta posted-in">
        <?php obandes_posted_in();?>
        <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
      </div>
      <br class="clear" />
    </article>
  </div>
  <?php }elseif(is_home()){
/**
 * recent group view create by post format where only home
 *
 *
 *
 *
 */
	$obandes_format_name 	= get_post_format( $post->ID );
	$obandes_format_class 	= 'class="horizon-'.$obandes_format_name.'"';	
	if(WP_DEBUG == true){
		echo '<!--loop-format.php case:'.$obandes_format_name.' start-->'."\n";
	}
	
	switch($obandes_format_name){
/**
 *
 *
 *
 *
 *
 */
	case("video"):
?>
  <div <?php echo $obandes_format_class;?>>
    <?php
			printf('<article id="post-%s" %s>',	
				$post->ID,
				'class="'.implode(' ',get_post_class('clearfix')).'"');
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
    <div class="clear"></div>
    <?php comments_template( '', true ); ?>
    </article>
  </div>
  <?php		
	break;
/**
 *
 *
 *
 *
 *
 */
	case("quote"):
?>
  <div <?php echo $obandes_format_class;?>>
    <?php
		printf('<article id="post-%s" %s %s>',	
			$post->ID,
			'class="'.implode(' ',get_post_class('clearfix')).'" ',
			'style="background:#eee;background:rgba(255,255,255,0.3);border-left:6px solid #777;"');
		?>
    <strong class="h2 title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php the_title(); ?>
    </a></strong>
    <div class="content clearfix">
      <?php the_excerpt( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
      <div class="clear"></div>
      <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
    <div class="clear"></div>
    <?php comments_template( '', true ); ?>
    </article>
  </div>
  <?php
	break;
/**
 *
 *
 *
 *
 *
 */
	case("image"):
	
		$obandes_content = get_the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) );
		
		if(preg_match("|(<img[^>]+>)|",$obandes_content,$regs)){
			$regs[1] = preg_replace('#(<img)([^>]+)(height|width)(=")([0-9]+)"([^>]+)(height|width)(=")([0-9]+)"([^>]+)>#','$1$2$6$10>',$regs[1]);
?>
  <div style="width:150px;float:left;margin-left:20px;"> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php  echo $regs[1];?>
    </a> </div>
  <div style="margin-left:200px;"> <strong class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php the_title(); ?>
    </a></strong>
    <?php the_excerpt();?>
    <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
  <hr class="clear" />
  ';
  <?php		
		}
	break;

/**
 *
 *
 *
 *
 *
 */
	case("link"):
?>
  <div <?php echo $obandes_format_class;?>>
    <?php
			printf('<article id="post-%s" %s>',	
				$post->ID,
				'class="'.implode(' ',get_post_class('clearfix')).'"');
		?>
    <strong class="h2 title" ><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" class="hide" rel="bookmark">
    <?php the_title(); ?>
    </a></strong>
    <div class="content clearfix"  title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>">
      <?php 
		$obandes_content = get_the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) );
		if(preg_match('|href="([^"]+)"|',$obandes_content,$regs)){
			echo '<a href="'.$regs[1].'" class="h2 title">'.get_the_title().'</a>';
		?>
      <p class="clear"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" style="margin-left:20px">
        <?php _e("[&nbsp;more&nbsp;]","obandes");?>
        </a></p>
      <?php	
		}else{
			the_content();
		}
		?>
      <div class="clear"></div>
      <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
    <div class="clear"></div>
    <?php comments_template( '', true ); ?>
    </article>
  </div>
  <?php
	break;
/**
 *
 *
 *
 *
 *
 */
	default:
?>
  <div <?php echo $obandes_format_class;?>>
    <?php
		printf('<article id="post-%s" %s>',	
			$post->ID,
			'class="'.implode(' ',get_post_class('clearfix')).'"');
	?>
    <strong class="h2 title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php the_title(); ?>
    </a></strong>
    <div class="content clearfix">
      <?php the_excerpt( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
      <div class="clear"></div>
      <?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>
      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
    <div class="clear"></div>
    <?php comments_template( '', true ); ?>
    </article>
  </div>
  <?php 	}//end switch ?>
  <?php
	}//endif?>
  <?php
}//endwhile ?>
</div>

<?php if ( $wp_query->max_num_pages > 1 ){ ?>
<div>
  <div id="nav-below" class="clearfix"> <span class="nav-previous">
    <?php next_posts_link( __( '<span class="button"><span class="meta-nav">&larr;</span> Older posts</span>', 'obandes' ) ); ?>
    </span><span class="nav-next">
    <?php previous_posts_link( __( '<span class="button">Newer posts <span class="meta-nav">&rarr;</span></span>', 'obandes' ) ); ?>
    </span></div>
</div>
<?php }//end nav below ?>
