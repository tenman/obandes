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
<?php
if(WP_DEBUG == true){
    echo '<!--'.basename(__FILE__,'.php').'['.basename(dirname(__FILE__)).']-->'."\n";
}?>
<section id="yui-main">
<div id="author-infomation" <?php post_class('yui-b'); ?>>
  <?php $curauth = get_userdata(intval($author)); ?>
  <?php if ( get_the_author_meta( 'description' ) ) : ?>
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
</section>
<?php if ( is_active_sidebar( 'sidebar-1' ) ){ ?>
<nav class="yui-b" id="toc">
<ul>
    <?php dynamic_sidebar('sidebar-1');?>
  </ul>
</nav>
<?php }?>
<?php get_footer();?>
