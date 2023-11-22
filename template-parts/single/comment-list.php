<?php

    $tag       = 'li';
    $add_below = 'div-comment';

?>

<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

<?php
// Switch between different comment types
switch ( $comment->comment_type ) :
    case 'pingback' : ?>
    <div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'goza' ); ?></span> <?php comment_author_link(); ?></div>
<?php
    break;
    default : ?> 

    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">   
        <div class="comment-meta">
            <div class="comment-author vcard">
                <?php
                $avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 40;
                if ( $avatar_size != 0 ) {
                    echo get_avatar( $comment, $avatar_size );
                }
                printf( __( '<cite class="fn">%s</cite>', 'goza' ), get_comment_author( $comment->comment_ID ) ); ?>
            </div>
            <a class="comment-date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                printf(
                    __( '%1$s', 'goza' ),
                    get_comment_date()
                ); ?>
            </a>
            <?php edit_comment_link( __( '(Edit)', 'goza' ), '  ', '' ); ?>
            <div class="reply"><?php
                $depth = 1;
                $max_depth = ( get_option( 'thread_comments' ) !== 1 )? get_option( 'thread_comments_depth' ) : 1;
                $args = array(
                    'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $max_depth
                );
                comment_reply_link( $args ); ?>
            </div>
        </div>
        <div class="comment-details">
            <div class="comment-text"><?php comment_text(); ?></div>
            <?php if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'goza' ); ?></em><br/>
            <?php } ?>
        </div>
    </div>
    <?php

    break;
endswitch; 

