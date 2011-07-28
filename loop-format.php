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
<?php
	
	$obandes_class_name = "";
	$page_title = "";
	if(is_search()){
		$obandes_class_name = 'serch-result'; 
		$page_title = __("Search Results",'obandes');
		$page_title_c = get_search_query();
	}elseif(is_tag()){
		$obandes_class_name = 'tag-archives'; 
		$page_title = __("Tag Archives",'obandes');
		$page_title_c = single_term_title("", false);
	}elseif(is_category()){
		$obandes_class_name = 'category-archives'; 
		$page_title = __("Category Archives",'obandes');
		$page_title_c = single_cat_title('', false);
	}elseif (is_archive()){
		if (is_day()){
			$obandes_class_name = 'dayly-archives'; 
			$page_title = __('Daily Archives', 'obandes');
			$page_title_c = get_the_date(get_option('date_format'));
		}elseif (is_month()){
			$obandes_class_name = 'monthly-archives'; 
			$page_title = __('Monthly Archives', 'obandes');
			if(get_bloginfo("language") == 'ja'){
				$page_title_c = get_the_date('Y / F');
			}else{
				$page_title_c = get_the_date('F Y');
			}
		}elseif (is_year()){
			$obandes_class_name = 'yearly-archives'; 
			$page_title = __('Yearly Archives', 'obandes');
			$page_title_c = get_the_date('Y');
		}elseif (is_author()){
			$obandes_class_name = 'author-archives'; 
			$page_title =	__("Author Archives",'obandes');

			while (have_posts()){ the_post();
				$page_title_c = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'obandes_author_bio_avatar_size', 32 ) ).' '.get_the_author();
				break;
			}
			rewind_posts();
		}else{
			$obandes_class_name = 'blog-archives';
			$page_title = __("Blog Archives",'obandes');
		}
	}
echo '<div class="index yui-b '.esc_attr($obandes_class_name).'">';
	
	if(!empty($page_title)){
		printf('<div class="h1" id="archives-title">%s <span>%s</span></li>',
				$page_title,
				$page_title_c
		);
	
	}
	
	if ( $wp_query->max_num_pages > 1 ){ 
// Display navigation to next/previous pages when applicable  ?>
		<div><div id="nav-above" class="clearfix">
			<span class="nav-previous"><?php next_posts_link( __( '<span class="button"><span class="meta-nav">&larr;</span> Older posts</span>', 'obandes' ) ); ?></span>
			<span class="nav-next"><?php previous_posts_link( __( '<span class="button">Newer posts <span class="meta-nav">&rarr;</span></span>', 'obandes' ) ); ?></span>
			</div>
		</div>
<?php 
	} //end #nav-above?>

<?php while (have_posts()){ the_post(); ?>

<?php
	global $is_IE;
	if(get_post_format( $post->ID ) === false or $is_IE == true){
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
 * recent group view create by post format without IE
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
			<div style="width:150px;float:left;margin-left:20px;">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php  echo $regs[1];?></a>
			</div>
			<div style="margin-left:200px;">
				<strong class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_excerpt();?>
				<?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			<hr class="clear" />';
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
		<strong class="h2 title" ><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" class="hide" rel="bookmark"><?php the_title(); ?></a></strong>
		
		<div class="content clearfix"  title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>">  
		<?php 
		$obandes_content = get_the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) );
		if(preg_match('|href="([^"]+)"|',$obandes_content,$regs)){
			echo '<a href="'.$regs[1].'" class="h2 title">'.get_the_title().'</a>';
		?>
		<p class="clear"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" style="margin-left:20px"><?php _e("[&nbsp;more&nbsp;]","obandes");?></a></p>
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
<div><div id="nav-below" class="clearfix">
	<span class="nav-previous"><?php next_posts_link( __( '<span class="button"><span class="meta-nav">&larr;</span> Older posts</span>', 'obandes' ) ); ?></span><span class="nav-next"><?php previous_posts_link( __( '<span class="button">Newer posts <span class="meta-nav">&rarr;</span></span>', 'obandes' ) ); ?></span></div></div>
<?php }//end nav below ?>
