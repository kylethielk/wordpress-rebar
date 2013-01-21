<?php

/** Featured Image Support */
add_theme_support('post-thumbnails');
set_post_thumbnail_size(740, 200, true);

// Adds RSS feed links to <head> for posts and comments.
add_theme_support('automatic-feed-links');


// This theme uses wp_nav_menu() in one location.
register_nav_menu('primary', __('Primary Menu', 'rebar'));

// This theme supports a variety of post formats.
add_theme_support('post-formats', array('status'));


/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if (!isset($content_width))
{
    $content_width = 700;
}

/**
 * Register the sidebars.
 */

register_sidebar(array(
    'name' => 'sidebar-above-menu',
    'before_widget' => '<div class="sidebar-box">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="sidebar-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'name' => 'sidebar-below-menu',
    'before_widget' => '<div class="sidebar-box">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="sidebar-title">',
    'after_title' => '</h3>',
));

if (!function_exists('rebar_limit_tags')) :
    /**
     * Must be called in the loop. Limits the number of categories display.
     * Will call echo on results.
     * @param $max_tags = 2 Maximum tags to display.
     * @param $separator = ', ' The separator between each category.
     */
    function rebar_limit_tags($max_tags = 3, $separator = ', ')
    {
        $tags = get_the_tags();

        $output = '';
        if ($tags)
        {
            $count = 0;
            foreach ($tags as $tag)
            {
                if ($count >= $max_tags)
                {
                    break;
                }
                $output .= '<a href="' . get_tag_link($tag->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $tag->name)) . '">' . $tag->name . '</a>' . $separator;
                $count++;
            }

            $left_count = (count($tags) - $count);

            echo trim($output, $separator);

            if ($left_count > 0)
            {
                echo ', +' . $left_count . ' more.';
            }
        }
    }
endif;

if (!function_exists('rebar_limit_categories')) :
    /**
     * Must be called in "The Loop". Limits the number of categories displayed.
     * Will call echo on results.
     * @param $max_categories = 2 Maximum categories to display.
     * @param $separator = ', ' The separator between each category.
     */
    function rebar_limit_categories($max_categories = 2, $separator = ', ')
    {
        $categories = get_the_category();

        $output = '';
        if ($categories)
        {
            $count = 0;
            foreach ($categories as $category)
            {
                if ($count >= $max_categories)
                {
                    break;
                }
                $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
                $count++;
            }

            $left_count = (count($categories) - $count);

            echo trim($output, $separator);

            if ($left_count > 0)
            {
                echo ', +' . $left_count . ' more.';
            }

        }
    }
endif;

if (!function_exists('rebar_post_meta')) :
    /**
     * Prints post meta information: Comments, Tags, Categories.
     *
     * Call from within "The Loop"
     */
    function rebar_post_meta()
    {
        ?>
    <div class="categories-container clearfix post-meta">
        <div class="muted-hover comment-meta">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment-bubble.gif"/>&nbsp;<?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
        </div>
        <?php if (get_the_category() && !is_single()) : ?>
        <span class="muted-text categories">Posted in <?php rebar_limit_categories(); ?></span><br/>
        <?php endif; ?>
        <?php if (get_the_category() && is_single()) : ?>
        <span class="muted-text categories">Posted in <?php the_category(', '); ?></span><br/>
        <?php endif; ?>
        <?php if (get_the_tags() && !is_single()) : ?>
        <span class="muted-text categories">Tagged: <?php rebar_limit_tags(); ?></span>
        <?php endif; ?>
        <?php if (get_the_tags() && is_single()) : ?>
        <span class="muted-text categories">Tagged: <?php the_tags('', ', '); ?></span>
        <?php endif; ?>
    </div>
    <?php
    }

endif;

if (!function_exists('rebar_comment')) :
    /**
     * Template for comments and pingbacks.
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @since Rebar 1.0
     */
    function rebar_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks/pingback differently than normal comments.
                ?>
	<li <?php comment_class('pingback-box'); ?> id="comment-<?php comment_ID(); ?>">
<!--		<div class="pingback-box">-->
                <p>
                    <?php _e('Pingback:', 'rebar'); ?>
                    <?php comment_author_link(); ?>
                    <?php edit_comment_link(__('(Edit)', 'rebar'), '<span class="edit-link">', '</span>'); ?>
                </p>
                <!--        </div>-->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class('comment-wrapper'); ?> id="li-comment-<?php comment_ID(); ?>">

                    <div class="comment-author-wrapper">
                        <div class="avatar-box <?php  echo (($comment->user_id === $post->post_author) ? 'bypostauthor-box' : '');?>">
                            <a href="<?php echo get_comment_link($comment->comment_ID); ?>">
                                <?php echo get_avatar($comment, 60);
                                ?>
                            </a>
                        </div>

                    </div>

                    <article id="comment-<?php comment_ID(); ?>"
                             class="comment-box ">

                        <div class="comment-details">
                            Posted by
                            <?php
                            if ($comment->user_id === $post->post_author)
                            {
                                echo '<span class="bypostauthor">' . get_comment_author_link() . '</span>';
                            }
                            else
                            {
                                echo '<span>' . get_comment_author_link() . '</span>';
                            }
                            ?>

                            on

                            <span class="comment-date">
                                <a href="<?php echo get_comment_link($comment->comment_ID); ?>">
                                    <?php echo get_comment_date(); ?>
                                </a>
                            </span>

                        </div>
                        <!-- .comment-meta -->

                        <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'rebar'); ?></p>
                        <?php endif; ?>

                        <section class="comment-content comment">
                            <?php comment_text(); ?>
                            <?php edit_comment_link(__('Edit', 'rebar'), '<p class="edit-link">', '</p>'); ?>
                        </section>
                        <!-- .comment-content -->

                        <div class="reply">
                            <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'rebar'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <!-- .reply -->
                    </article>
                    <!-- #comment-## -->
                    <?php
                break;
        endswitch; // end comment_type check
    }
endif;

if (!function_exists('rebar_content_nav')) :
    /**
     * Displays navigation to next/previous pages when applicable.
     *
     * @since Rebar 1.0
     */
    function rebar_content_nav()
    {
        global $wp_query;


        if ($wp_query->max_num_pages > 1) : ?>

            <div class="page-links">
                <div id="older-posts" class="bottom-right"><?php next_posts_link('Older Posts >>'); ?></div>
                <div id="newer-posts" class="bottom-left"><?php previous_posts_link('<< Newer Posts'); ?></div>
            </div>

        <?php endif;
    }
endif;
?>