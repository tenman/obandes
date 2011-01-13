<?php
/**
 * The html5 loop for obandes.
 *
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
 ?>
<?php if(is_author()){  ?>

<div id="author-infomation" <?php post_class('clearfix'); ?>>
  <?php $curauth = get_userdata(intval($author)); ?>
  <?php
if ( get_the_author_meta( 'description' ) ) : ?>
  <dl class="<?php echo basename(__FILE__,'.php');?> <?php echo basename(dirname(__FILE__));?>">
    <dt style="border:none;"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'obandes_author_bio_avatar_size', 60 ) ); ?><br />
      <?php printf( __( 'About %s', 'obandes' ), get_the_author() ); ?></dt>
    <dd style="border:none;">
      <?php the_author_meta( 'description' ); ?>
    </dd>
  </dl>
  <?php endif; ?>
  <div class="horizon-author"> <?php echo get_avatar(htmlspecialchars($curauth->user_email)); ?> </div>
  <div class="horizon-author">
    <h2> <?php echo sprintf(__("About %s",'obandes'),esc_html($curauth->user_nicename)); ?></h2>
    <dl class="<?php echo esc_attr(basename(__FILE__,'.php'));?> <?php echo esc_attr(basename(dirname(__FILE__)));?>">
      <?php if(!empty($curauth->user_url)){ ?>
      <dt>
        <?php _e("Website",'obandes');?>
      </dt>
      <dd><a href="<?php echo esc_url($curauth->user_url); ?>"><?php echo esc_url($curauth->user_url); ?></a></dd>
      <?php } //!empty($curauth->user_url) ?>
      <?php if(!empty($curauth->user_email) and is_email($curauth->user_email)){ ?>
      <dt>
        <?php _e("email",'obandes');?>
      </dt>
      <dd><a href="mailto:<?php echo htmlspecialchars($curauth->user_email); ?>"><?php echo htmlspecialchars($curauth->user_email); ?></a></dd>
      <?php } //!empty($curauth->user_email) ?>
      <?php if(!empty($curauth->user_nicename)){ ?>
      <dt>
        <?php _e("nicename",'obandes');?>
      </dt>
      <dd><?php echo esc_html($curauth->user_nicename); ?></dd>
      <?php } //!empty($curauth->user_nicename) ?>
      <dt>
        <?php _e("registered",'obandes');?>
      </dt>
      <dd><?php echo esc_html( $curauth->user_registered); ?></dd>
      <?php if(!empty($curauth->user_displayname)){ ?>
      <dt>
        <?php _e("displayname",'obandes');?>
      </dt>
      <dd><?php echo $curauth->user_displayname; ?></dd>
      <?php } //!empty($curauth->user_displayname) ?>
      <?php if(!empty($curauth->user_description)){ ?>
      <dt>
        <?php _e("description",'obandes');?>
      </dt>
      <dd><?php echo $curauth->user_description; ?></dd>
      <?php } //!empty($curauth->user_description) ?>
    </dl>
   <div class="clear"></div>
  </div>
</div>
<h2 class="h2"> <?php echo sprintf(__("Posts by %s",'obandes'),$curauth->nickname);?> </h2>
<?php } ?>
<?php
/**
 * Display navigation to next/previous pages when applicable
 *
 *
 *
 *
 */

 if ( $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-above" class="clearfix"> <span class="nav-previous">
  <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?>
  </span> <span class="nav-next">
  <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
  </span> </div>
<!-- #nav-above -->
<?php endif; ?>
<?php

/**
 * 404not found
 *
 *
 *
 *
 */
 if ( ! have_posts() ) : ?>
<div id="post-0" class="post error404 not-found">
  <h1 class="entry-title h1">
    <?php _e( 'Not Found', 'obandes' ); ?>
  </h1>
  <div class="entry-content">
    <p>
      <?php _e( 'Apologies, but no results were found for the requested Archive. Perhaps searching will help find a related post.', 'obandes' ); ?>
    </p>
    <?php get_search_form(); ?>
  </div>
  <!-- .entry-content -->
</div>
<!-- #post-0 -->
<?php endif; ?>
<?php if(is_single()){

/**
 * when Single page
 *
 *
 *
 *
 */
?>
<?php while (have_posts()) : the_post(); ?>
<?php

if ( in_category( "blog" )){
    $cat = "blog";
}elseif ( in_category( "gallery" )){
    $cat = "gallery";


}else{
    $cat = "default";

}

echo "<!--cat ".$cat."-->";
?>
<?php

    switch($cat){

            case ('blog'):

/**
 * category blog
 *
 *
 *
 *
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
<div class="yui-gf">

    <div class="yui-u first">

          <ul class="entry-meta">
            <li class="published">
              <?php the_time(get_option('date_format')) ?>
            </li>
            <li>
              <?php _e('Category:');?>
              <?php the_category(' ') ?>
            </li>
            <li>
              <?php _e('Tags:');?>
              <?php the_tags(); ?>
            </li>
            <li>
              <?php _e('Auther:');?>
               <?php  echo sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s"   rel="vcard:url">%2$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author() );?>
            </li>
            <li>
              <?php comments_popup_link( __( 'Leave a comment', 'obandes' ), __( '1 Comment', 'obandes' ), __( '% Comments', 'obandes' ) ); ?>
            </li>
            <li><?php if ( function_exists('the_shortlink') ) the_shortlink( __('Permalink', 'obandes'), __('bookmark it?', 'obandes'), '.' );?></li>

              <li><?php edit_post_link('Edit', '', ' '); ?></li>
          </ul>
    </div>




     <div class="entry-content yui-u">

        <h2 class="entry-title  clearfix h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

        <div class="entry-content clearfix">
          <?php the_content(__('Read the rest of this entry &raquo;', 'obandes')) ?>
            <div class="clear"></div>
          <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ) ); ?>
        </div>
          <?php comments_template( '', true ); ?>
    </div>

</div>
</div>

<?php

            break;


/**
 * category gallery
 *
 *
 *
 *
 */

            case("gallery"):
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <h2 class="entry-title h2"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

  <div class="entry-meta"><?php obandes_posted_on(); ?></div>

  <div class="entry-content">
    <?php echo obandes_gallery_list();?>
    <div class="horizon-gallery">
      <?php the_content( '' ); ?>
         <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="entry-utility">
  <?php obandes_posted_in();?>
      <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
  </div>
  <!-- #entry-utility -->
  <?php comments_template( '', true ); ?>
</div>
<?php

            break;

            default:

/**
 * other single page
 *
 *
 *
 *
 */

            ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <h2 class="h2 entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'obandes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

  <div class="entry-meta"><?php obandes_posted_on(); ?></div>
  <?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>

  <div class="entry-summary">
    <?php the_excerpt( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
  </div>

  <?php else : ?>

  <div class="entry-content clearfix">
    <?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?>
    <div class="clear"></div>
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'obandes' ), 'after' => '</div>' ) ); ?>
  </div>
     <div class="clear"></div>

  <?php endif;?>


  <div class="entry-utility"><?php obandes_posted_in();?>
    <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
  </div>
  <?php comments_template( '', true ); ?>
</div>
<!-- #post-<?php the_ID(); ?> -->
<?php }?>
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-below" class="clearfix">
<span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?></span>
<span class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?></span></div>
<!-- #nav-above -->
<?php endif; ?>
<?php }else{
/**
 * list post
 *
 *
 *
 *
 */
?>
<!-- not single-->
<ul class="index">
  <?php while (have_posts()) : the_post(); ?>
  <li>
    <div id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
      <h2 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

      <div class="entry-meta">
        <?php obandes_posted_on(); ?><?php echo sprintf( __( '<span class="time-diff">(Passage of %s)</span>', 'obandes' ), human_time_diff(get_the_time('U'),time()) );?>
       </div>
      <div class="entry-content clearfix">
        <?php  the_excerpt();?>
        <div class="clear"></div>
       </div>
        <div class="clear"></div>

        <div class="entry-utility">
        <?php obandes_posted_in();?>
        <?php edit_post_link( __( 'Edit', 'obandes' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
        </div>
      <br class="clear" />
    </div>
  </li>
  <?php endwhile; ?>
</ul>


<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-below" class="clearfix">
<span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'obandes' ) ); ?></span><span class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'obandes' ) ); ?></span></div>
<?php endif; ?>
<?php }?>