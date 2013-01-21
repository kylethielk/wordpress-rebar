<?php
/**
 * The template for displaying Comments.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required())
{
    return;
}
?>
<div id="comments">


    <?php if (have_comments()) : ?>
    <h2 class="comments-title">
        <?php
        printf(_n('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'rebar'),
            number_format_i18n(get_comments_number()), '<span>' . (get_the_title() == '' ? 'Untitled' : get_the_title()) . '</span>');
        ?>
    </h2>

    <ol class="comment-list">
        <?php wp_list_comments(array('callback' => 'rebar_comment', 'style' => 'ol')); ?>
    </ol><!-- .commentlist -->

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="comment-page-links" role="navigation">
            <div class="bottom-left"><?php previous_comments_link(__('&larr; Older Comments', 'rebar')); ?></div>
            <div class="bottom-right"><?php next_comments_link(__('Newer Comments &rarr;', 'rebar')); ?></div>
        </nav>
        <?php endif; ?>



    <?php endif; // have_comments() ?>

    <?php
    /* If there are no comments and comments are closed, let's leave a note.
     * But we only want the note on posts and pages that had comments in the first place.
     */
    if (!comments_open()) : ?>
        <p class="nocomments-box">Comments are closed.</p>
        <?php endif; ?>

    <?php  if ('open' == $post->comment_status): ?>
    <div class="comment-box"
         style="<?php echo (get_comments_number() == 0 ? "margin: 5px 0 0 8px;" : "margin-left: 95px"); ?>">
        <?php comment_form(array("comment_notes_after" => '')); ?>
    </div>
    <?php endif; ?>

</div>