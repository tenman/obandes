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
	$obandes_page_title = "";
	if(is_search()){
		$obandes_class_name = 'serch-result'; 
		$obandes_page_title = __("Search Results",'obandes');
		$obandes_page_title_c = get_search_query();
	}elseif(is_tag()){
		$obandes_class_name = 'tag-archives'; 
		$obandes_page_title = __("Tag Archives",'obandes');
		$obandes_page_title_c = single_term_title("", false);
	}elseif(is_category()){
		$obandes_class_name = 'category-archives'; 
		$obandes_page_title = __("Category Archives",'obandes');
		$obandes_page_title_c = single_cat_title('', false);
	}elseif (is_archive()){
		if (is_day()){
			$obandes_class_name = 'dayly-archives'; 
			$obandes_page_title = __('Daily Archives', 'obandes');
			$obandes_page_title_c = get_the_date(get_option('date_format'));
		}elseif (is_month()){
			$obandes_class_name = 'monthly-archives'; 
			$obandes_page_title = __('Monthly Archives', 'obandes');
			if(get_bloginfo("language") == 'ja'){
				$obandes_page_title_c = get_the_date('Y / F');
			}else{
				$obandes_page_title_c = get_the_date('F Y');
			}
		}elseif (is_year()){
			$obandes_class_name = 'yearly-archives'; 
			$obandes_page_title = __('Yearly Archives', 'obandes');
			$obandes_page_title_c = get_the_date('Y');
		}elseif (is_author()){
			$obandes_class_name = 'author-archives'; 
			$obandes_page_title =	__("Author Archives",'obandes');

			while (have_posts()){ the_post();
				$obandes_page_title_c = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'obandes_author_bio_avatar_size', 32 ) ).' '.get_the_author();
				break;
			}
			rewind_posts();
		}else{
			$obandes_class_name = 'blog-archives';
			$obandes_page_title = __("Blog Archives",'obandes');
		}
	}
	
echo '<ul class="index yui-b '.esc_attr($obandes_class_name).'">';
	
	if(!empty($obandes_page_title)){
		printf('<li class="h1" id="archives-title">%s <span>%s</span></li>',
				$obandes_page_title,
				$obandes_page_title_c
		);
	
	}

//if(!have_posts()){	get_template_part("404");}
	if ( $wp_query->max_num_pages > 1 ){ 
// Display navigation to next/previous pages when applicable  ?>
<li><div id="nav-above" class="clearfix"> <span class="nav-previous">
<?php next_posts_link( __( '<span class="button"><span class="meta-nav">&larr;</span> Older posts</span>', 'obandes' ) ); ?>
</span> <span class="nav-next">
<?php previous_posts_link( __( '<span class="button">Newer posts <span class="meta-nav">&rarr;</span></span>', 'obandes' ) ); ?>
</span> </div></li>

<?php } //end #nav-above?>
<?php while (have_posts()){ the_post(); ?>
<li>
<article id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
<h2 class="h2 title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
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
</li>
<?php }//endwhile ?>
  
<?php if ( $wp_query->max_num_pages > 1 ){ ?>
<li><div id="nav-below" class="clearfix">
<span class="nav-previous"><?php next_posts_link( __( '<span class="button"><span class="meta-nav">&larr;</span> Older posts</span>', 'obandes' ) ); ?></span><span class="nav-next"><?php previous_posts_link( __( '<span class="button">Newer posts <span class="meta-nav">&rarr;</span></span>', 'obandes' ) ); ?></span></div></li>
<?php }//end nav below ?></ul>