<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 */

get_header(); ?>
<div id="wrap">
    <!-- Post Loop -->

    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>

    <div id="right-column">

        <?php if (have_posts()) : ?>

        <header>
            <h2>
                <?php printf(__('Tag Archives: %s', 'rebar'), '<span>' . single_tag_title('', false) . '</span>'); ?>
            </h2>

            <?php if (tag_description()) : ?>
            <div>
                <?php echo tag_description(); ?>
            </div>
            <?php endif; ?>
        </header>

        <?php

        while (have_posts()) : the_post();

            get_template_part('content', 'post');

        endwhile;

        rebar_content_nav();

        ?>

        <?php else : ?>
        <?php get_template_part('content', 'noresults'); ?>
        <?php endif; ?>

    </div>

</div>

<?php get_footer(); ?>