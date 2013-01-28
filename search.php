<?php
/**
 * search for obandes theme.
 *
 *
 *
 * @subpackage obandes
 * @since obandes 0.1
 */
$i = 0; 
?>
<?php get_header("xhtml1"); ?>
<section id="yui-main">
  <?php if(WP_DEBUG == true){echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';}?>
        <?php if (have_posts()){ ?>

  
  <div class="yui-b">
        <h2 class="pagetitle h1" id="search-results-title">Search Results</h2>  
        <ul class="search-results">
		<li>		
        <?php
	 	if ( $wp_query->max_num_pages > 1 ){ ?>
        <div id="nav-above" class="clearfix"> <span class="nav-previous">
          <?php 	next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?>
          </span><span class="nav-next">
          <?php 	previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
          </span></div>
        <?php 	}?>
		</li>
      <?php while (have_posts()){ the_post(); ?>
          <li>
            <article id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
			
			
              <h3 class="h4 title">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h3>
              <div class="meta posted-on"><?php obandes_posted_on();?></div>			

              <div class="content clearfix"><?php		the_excerpt();?></div>
              <div class="meta posted-in">
			  	<?php obandes_posted_in();?>
                <?php 	edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link">', '</span>' ); ?>
              </div>
              <br class="clear" />
            </article>
          </li>
		  
      <?php $i++; }?>
        <li>
        <?php if ( $wp_query->max_num_pages > 1 ){ ?>
        <div id="nav-below" class="clearfix"><span class="nav-previous">
          <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?>
          </span><span class="nav-next">
          <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
          </span> </div>
        <?php }?>
		</li>
		</ul>
  </div>		
        <?php }else{ ?>
		
		<article class="fail-search yui-b">
  <h2 class="title h2">
    <?php _e( 'Not Found', 'obandes' ); ?>
  </h2>
  <div class="content">
    <p>
      <?php _e("Nothing was found though it was regrettable. Please change the key word if it is good, and retrieve it.","obandes");?>
    </p>
    <?php get_search_form(); ?>
  </div>
</article>
        <?php } ?>
</section>
<?php get_sidebar('1'); ?>
<?php get_footer(); ?>