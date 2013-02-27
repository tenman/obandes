<?php
/**
 * sidebar-2 for our theme.
 *
 *
 *
 * @package: obandes
 * @since obandes 1.10
 */
?>
<nav class="yui-b" id="toc">
<?php if( obandes_get_condition('letter-width') !== 'doc3' ){ ?>
<div class="wrap-toggle">
<span id="nav-toggle">1col</span>
</div>
<?php } ?>

<ul class="nav-toggle">
<?php
 if ( is_active_sidebar( 'sidebar-2' ) ){
 	dynamic_sidebar('sidebar-2');
 }elseif( is_active_sidebar( 'sidebar-1' ) ){
 	dynamic_sidebar('sidebar-1');
 }else{ ?>
<?php wp_list_pages('title_li=<h3 class="widget-title h3">'.__('Pages','obandes').'</h3>' ); ?>
<li>
<h3 class="widget-title h3">Archives</h3>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>
<?php wp_list_categories('show_count=0&title_li=<h3 class="widget-title h3">'.__('Categories','obandes').'</h3>'); ?>
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
<li>
<h3 class="widget-title h3"><?php _e("Meta",'obandes');?></h3>
<ul>
<?php wp_register(); ?>
<li>
<?php wp_loginout(); ?>
</li>
<?php wp_meta(); ?>
</ul>
</li>
<?php } ?>
<?php } ?>
</ul>
</nav>