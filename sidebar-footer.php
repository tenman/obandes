<?php
/**
 * The Footer widget areas.
 *
 *
 * @package: obandes
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

    /* horizon-footer-widget class display horizontal layout */
    $raindrops_add_class = 'list-footer-widget';
    if( obandes_get_condition('letter-width') !== 'doc3' ){
        $raindrops_add_class = 'horizon-footer-widget';
    }
?>

<div id="footer-widget-area" role="complementary">
  <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ){ ?>
  <div id="first" class="<?php echo $raindrops_add_class; ?>">
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
  <div id="second" class="<?php echo $raindrops_add_class; ?>">
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
  <div id="third" class="<?php echo $raindrops_add_class; ?>">
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
  <div id="fourth" class="<?php echo $raindrops_add_class; ?>">
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