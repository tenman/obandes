<?php
/**
 * sidebar-1 for our theme.
 *
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
?>
<nav class="yui-b" id="toc">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-1') ) : else : ?>
<?php wp_list_pages('title_li=<h2 class="h2">'.__('Pages','obandes').'</h2>' ); ?>
<li>
<h2 class="h2">Archives</h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>
<?php wp_list_categories('show_count=0&title_li=<h2 class="h2">'.__('Categories','obandes').'</h2>'); ?>
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
<?php wp_list_bookmarks(); ?>
<li>
<h2 class="h2"><?php _e("Meta",'obandes');?></h2>
<ul>
<?php wp_register(); ?>
<li>
<?php wp_loginout(); ?>
</li>
<?php wp_meta(); ?>
</ul>
</li>
<?php } ?>
<?php endif; ?>
</ul>
</nav>