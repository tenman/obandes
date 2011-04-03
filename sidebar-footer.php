<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.1
 */
?>
<?php
    if (   ! is_active_sidebar( 'first-footer-widget-area'  )
        && ! is_active_sidebar( 'second-footer-widget-area' )
        && ! is_active_sidebar( 'third-footer-widget-area'  )
        && ! is_active_sidebar( 'fourth-footer-widget-area' )
    ){
        return;
    }
?>

<div id="footer-widget-area" role="complementary">
  <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ){ ?>
  <div id="first" class="horizon-footer-widget">
    <ul class="xoxo">
      <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
    </ul>
  </div>
  <?php
if(WP_DEBUG == true){
    echo '<!-- #first .horizon-footer-widget -->';
}?>
  <?php } ?>
  <?php if ( is_active_sidebar( 'second-footer-widget-area' ) ){ ?>
  <div id="second" class="horizon-footer-widget">
    <ul class="xoxo">
      <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
    </ul>
  </div>
  <?php
if(WP_DEBUG == true){
    echo '<!-- #second .horizon-footer-widget -->';
}?>
  <?php } ?>
  <?php if ( is_active_sidebar( 'third-footer-widget-area' ) ){ ?>
  <div id="third" class="horizon-footer-widget">
    <ul class="xoxo">
      <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
    </ul>
  </div>
  <?php
if(WP_DEBUG == true){
    echo '<!-- #third .horizon-footer-widget -->';
}?>
  <?php } ?>
  <?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ){ ?>
  <div id="fourth" class="horizon-footer-widget">
    <ul class="xoxo">
      <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
    </ul>
  </div>
  <?php
if(WP_DEBUG == true){
    echo '<!-- #fourth .horizon-footer-widget -->';
}?>
  <?php } ?>
</div>
