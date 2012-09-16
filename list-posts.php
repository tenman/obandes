<?php
/*
Template Name: list of post
*/
////////////////////////////
$query = get_query_var('paged');
$per_page = 20;
if($query == 0){
$start = 1;
}else{
$start = ($query - 1) * $per_page + 1;
}
query_posts( 'post_status=publish&posts_per_page='.$per_page.'&paged='.$query ); ?>
<?php get_header();?>
<?php if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->';
}?>
<section id="list-posts">
  <article class="page hpage" id="post-<?php the_ID(); ?>">
<?php if (have_posts()) : ?>

<ol start="<?php echo $start;?>" class="list-of-post">

<?php while (have_posts()) : the_post(); ?>

<li ><span ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span><p>

<?php       edit_post_link( __( 'Edit', 'obandes' ), '<span class="edit-link" style="display:inline-block;width:100px;text-align:center;background:#efefef;margin:1px;">', '</span>' ); ?></li>

<?php 
endwhile; 

endif;


?>

</ol>
<div class="alignleft">
<?php next_posts_link(__('&laquo; Older Entries', 'obandes' )) ?>
</div>

<div class="alignright">
<?php previous_posts_link(__('Newer Entries &raquo;', 'obandes' )) ?>
</div>


  </article>
  <div class="clear"></div>
</section>
<?php get_footer();?>


