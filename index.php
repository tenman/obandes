<?php
/**
 * The index for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
?>
<?php get_header();?>
<article id="yui-main">
  <div class="yui-b" >
    <section>
      <?php get_template_part( 'loop', 'default' );?>
      <br style="clear:both" />
    </section>
  </div>
</article>
<?php get_sidebar('1'); ?>
<?php get_footer();?>
