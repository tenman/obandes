<?php
/**
 * search form for our theme.
 *
 *
 * @package WordPress
 * @subpackage obandes
 * @since obandes 0.41
 */
?>
<form method="get" name="searchform" id="searchform" action="<?php echo home_url(); ?>/"><div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" accesskey="s" tabindex="1" />&nbsp;<input type="submit" id="searchsubmit" value="<?php _e('Go','obandes');?>" accesskey="b" tabindex="2" /></div></form>
