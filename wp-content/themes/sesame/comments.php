<?php
/**
 * Comment List. Can be used in Single Post page or any other Single post type. 
 * @author Realtyna Inc.
 */
 if(isset($_SERVER['SCRIPT_FILENAME']) and 'comments.php' == basename(sanitize_text_field(wp_unslash($_SERVER['SCRIPT_FILENAME'])))) return;
 ?>
<section id="comments" class="re-comments">
    <?php
    if(have_comments()):
        global $sesame_comments_by_type;
        $sesame_comments_by_type = separate_comments($comments);
        if(!empty($sesame_comments_by_type['comment'])):
            ?>
            <section id="comments-list" class="comments-list">
                <h4 class="comments-title re-page-title">
                    <?php comments_number(); ?>
                    <span class="re-title-separator"></span>
                </h4>
                <?php if(get_comment_pages_count() > 1): ?>
                    <nav id="comments-nav-above" class="comments-navigation" role="navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
                <ul>
                    <?php wp_list_comments('type=comment'); ?>
                </ul>
                <?php if(get_comment_pages_count() > 1): ?>
                    <nav id="comments-nav-below" class="comments-navigation" role="navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
            </section>
        <?php
        endif;

        if(!empty($sesame_comments_by_type['pings'])):
            $sesame_ping_count = count($sesame_comments_by_type['pings']);
            ?>
            <section id="trackbacks-list" class="comments">
                <h3 class="comments-title"><?php echo '<span class="ping-count">' . esc_html($sesame_ping_count) . '</span> ' . (esc_html($sesame_ping_count) > 1 ? esc_html__('Trackbacks', 'sesame') : esc_html__('Trackback', 'sesame')); ?></h3>
                <ul>
                    <?php wp_list_comments('type=pings&callback=sesame_custom_pings'); ?>
                </ul>
            </section>
        <?php
        endif;
    endif;

    if(comments_open())
    {
        $sesame_commenter = wp_get_current_commenter();
        $sesame_req       = get_option( 'require_name_email' );
        $sesame_aria_req  = ( $sesame_req ) ? " aria-required='true'" : '';
        $sesame_html_req  = ( $sesame_req ) ? " required='required'" : '';
        $sesame_html5     = ( 'html5' === current_theme_supports( 'html5', 'comment-form' ) ) ? 'html5' : 'xhtml';
        $sesame_current_user = wp_get_current_user();

        $sesame_fields = array();

        $sesame_fields['author'] = '<div id="comment-input" class="comment-input re-row"><div class="re-col-md-4 re-col-sm-4"><input id="author" name="author" type="text" value="' . esc_attr( $sesame_commenter['comment_author'] ) . '" placeholder="' . esc_attr__( 'Name (required)', 'sesame' ) . '" size="30"' . $sesame_aria_req . $sesame_html_req . ' aria-label="' . esc_attr__( 'Name', 'sesame' ) . '"/></div>';
        $sesame_fields['email']  = '<div class="re-col-md-4 re-col-sm-4"><input id="email" name="email" ' . ( $sesame_html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $sesame_commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Email (required)', 'sesame' ) . '" size="30" ' . $sesame_aria_req . $sesame_html_req . ' aria-label="' . esc_attr__( 'Email', 'sesame' ) . '"/></div>';
        $sesame_fields['url']    = '<div class="re-col-md-4 re-col-sm-4"><input id="url" name="url" ' . ( $sesame_html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $sesame_commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website', 'sesame' ) . '" size="30" aria-label="' . esc_attr__( 'URL', 'sesame' ) . '" /></div></div>';

        $sesame_comments_args = array(
            'fields'               => apply_filters( 'sesame_comment_form_default_fields', $sesame_fields ),
            'comment_field'        => '<div id="comment-textarea" class="comment-textarea"><textarea name="comment" id="comment" cols="45" rows="8" aria-required="true" required="required" tabindex="0" class="textarea-comment" placeholder="' . esc_attr__( 'Leave A Comment', 'sesame' ) . '"></textarea></div>',
            'title_reply'          => esc_attr__( 'Leave A Comment', 'sesame' ),
            'title_reply_to'       => esc_attr__( 'Leave A Comment', 'sesame' ),
            /* translators: 1 and 2 are for putting login link */
            'must_log_in'          => '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a comment.', 'sesame' ), '<a href="' . wp_login_url( get_permalink() ) . '">', '</a>' ) . '</p>',
            /* translators: 1 and 2 are for printing name of logged in user and 3 is for logout link */
            'logged_in_as'         => '<p class="logged-in-as">' . sprintf( esc_html__( 'Logged in as %1$s. %2$sLog out &raquo;%3$s', 'sesame' ), '<a href="' . admin_url( 'profile.php' ) . '">' . esc_html($sesame_current_user->user_login) . '</a>', '<a href="' . wp_logout_url( get_permalink() ) . '" title="' . esc_attr__( 'Log out of this account', 'sesame' ) . '">', '</a>' ) . '</p>',
            'comment_notes_before' => '',
            'id_submit'            => 'comment-submit',
            'class_submit'         => 're-btn re-btn-default',
            'label_submit'         => esc_html__( 'Post Comment', 'sesame' ),
        );

        comment_form($sesame_comments_args);
    }
    ?>
</section>