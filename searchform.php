<?php
/**
 * search form for our theme.
 *
 *
 *
 * @package: obandes
 * @since obandes 0.41
 */
?>
<form method="get" name="searchform" id="searchform" action="<?php echo esc_url( home_url() ); ?>/"><div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" accesskey="s" tabindex="1" />&nbsp;<input type="submit" id="searchsubmit" value="" accesskey="b" tabindex="2" /></div></form>
