<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to obandes_comment which is
 * located in the functions.php file.
 *
 *
 * @package: obandes
 * @since obandes 0.1
 */
?>
<?php
/**
 * block comment when it is password entry.
 *
 *
 *
 *
 */
    if ( post_password_required() ){
        printf( '<div id="comments"><p class="nopassword">%s</p></div>',
                __( 'This post is password protected. Enter the password to view any comments.', 'obandes' )
        );
        return;
    }else{
       echo '<div id="comments">&nbsp;</div>';
    }
/**
 * Create comment view.
 *
 *
 *
 *
 */
    if ( have_comments() ){

        $obandes_response_message = sprintf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'obandes' ),
                                         number_format_i18n( get_comments_number() ),
                                         '<em>' . get_the_title() . '</em>'
                            );
        printf('<h3 id="comments-title">%s</h3>',$obandes_response_message);

        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ){
            obandes_comment_prev_next();
        }

        echo '<ol class="commentlist">';
        wp_list_comments( array( 'callback' => 'obandes_comment' ) );
        echo '</ol>';

        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ){
            obandes_comment_prev_next("comment-below");
        }

    }else{

        if ( ! comments_open() ){
            echo '<p class="nocomments">'.__( 'Comments are closed.', 'obandes' ).'</p>';
        }
    }
    comment_form();