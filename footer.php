<?php
/**
 * The footer for obandes.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
?>
<br class="clear" />
<footer class="bar">
<?php 
	if(is_page() or is_single()){
		printf('<a href="%s" class="go-page-top">PageTop</a>',esc_url(get_permalink($post->ID)));
	}else{
		printf('<a href="%s" class="go-page-top">PageTop</a>',esc_url('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
	}	 
?>

  <div id="colophon">
    <?php    get_sidebar('footer');?>
    <address>
    <a href="<?php echo esc_url( __('http://www.tenman.info/wp/obandes/', 'obandes') ); ?>" rel="home"><?php printf( __('Theme: %s', 'obandes'), 'obandes' ); ?></a>
    </address>
    <!-- #site-info -->
    <div id="site-generator"> <a href="<?php echo esc_url( __('http://wordpress.org/', 'obandes') ); ?>"                      title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'obandes'); ?>" rel="generator"><?php printf( __('Proudly powered by %s.', 'obandes'), 'WordPress' ); ?> </a> </div>
    <!-- #site-generator -->
  </div>
  <!-- #colophon -->
</footer>
</div>
<?php wp_footer();?>
</body>
</html>