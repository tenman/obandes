<?php
/**
 * The format-standard Single post module for obandes relate in_category.
 *
 *
 * @package: obandes
 * @since obandes 0.41
 */
?><?php
    $cat = "default";
    if ( in_category( "blog" )){    $cat = "blog";      }
    if ( in_category( "gallery" )){ $cat = "gallery";   }

    if(WP_DEBUG == true){
		echo '<!--format-standard '.$cat.' start-->'."\n";
    }
	
	printf('<article id="post-%s" %s>',	
		$post->ID,
		'class="yui-b '.implode(' ',get_post_class('clearfix')).'"');
	
	obandes_prev_next_post('nav-above');

	switch($cat){
/**
 *	in category blog
 *
 *
 *
 *
 */
		case ('blog'):
		 

?>
<div class="yui-gf">
<div class="yui-u first">
<ul class="meta">
<li class="published h2">
<?php the_time(get_option('date_format')) ?>
</li>
<li><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'obandes_author_bio_avatar_size', 150 ) ); ?></li>
<li>
<?php _e('Category:','obandes');?>
<?php the_category(' ') ?>
</li>
<li>
<?php _e('Tags:','obandes');?>
<?php the_tags(); ?>
</li>
<li>
<?php _e('Auther:','obandes');?>
<?php  echo sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s"   rel="vcard:url">%2$s</a></span>',
get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author() );?>
</li>
<li>
<?php comments_popup_link( __( 'Leave a comment', 'obandes' ), __( '1 Comment', 'obandes' ), __( '% Comments', 'obandes' ) ); ?>
</li>
<li><?php if ( function_exists('the_shortlink') ) the_shortlink( __('Permalink', 'obandes'), __('bookmark it?', 'obandes'), '.' );?></li>
<?php edit_post_link('Edit', '<li>', '</li>'); ?>
</ul>
</div>
<div class="content yui-u">
<h2 class="title h2"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="content clearfix">
<?php the_content(__('Read the rest of this entry &raquo;', 'obandes')) ?>
		  <div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<?php
	break;

/**
 * in category gallery
 *
 *
 *
 *
 */

	case("gallery"):
	
	$module =<<<LAYOUT

	  <h2 class="title h2"><a href="%s" title="%s" rel="bookmark">%s</a></h2>
	  <div class="meta">%s
	  </div>
	  <div class="content">%s
		<div class="horizon-gallery">
		  %s
		  <div class="clear"></div>
		</div>
		<div class="clear"></div>
LAYOUT;

	$obandes_content = get_the_content(__('Read the rest of this entry &raquo;', 'obandes'));
	$obandes_content = apply_filters('the_content', $obandes_content);
	$obandes_content = str_replace(']]>', ']]&gt;', $obandes_content);

	printf($module,
		get_permalink($post->ID),
		sprintf( esc_attr__( 'Permalink to %s', 'obandes' ), 
				the_title_attribute( 'echo=0' ) 
		),
		the_title('','',false),
		obandes_posted_on(false),
		obandes_gallery_list(),
		$obandes_content
	);

	

	break;//end in category gallery
/**
 * single page not in special category e.g. blog,gallery   
 *
 *
 *
 *
 */
	
	default:
	
	$module =<<<LAYOUT
<div>
<h2 class="h2 title"><a href="%s" title="%s" rel="bookmark">%s</a></h2>
<div class="meta">%s</div>
<div class="content clearfix">%s<div class="clear"></div></div>
<div class="clear"></div>
LAYOUT;

	$obandes_content = get_the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) );
	$obandes_content = apply_filters('the_content', $obandes_content);
	$obandes_content = str_replace(']]>', ']]&gt;', $obandes_content);

	printf($module,
		get_permalink($post->ID),
		sprintf( esc_attr__( 'Permalink to %s', 'obandes' ), 
				the_title_attribute( 'echo=0' ) 
		),
		the_title('','',false),
		obandes_posted_on(false),
		$obandes_content
	);

	break;
 }
?>
<?php wp_link_pages( array( 'before' => '<div class="pagenate">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ,'link_before'=>'<span>','link_after'=>'</span>') );?>

<div class="meta posted-in"><?php obandes_posted_in();?>
<?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div>
<?php obandes_prev_next_post('nav-below');?>
<?php comments_template( '', true ); ?>

</div>
</article>