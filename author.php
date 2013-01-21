<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); ?>

<div id="wrap">
    <!-- Post Loop -->

    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>

    <div id="right-column">


        <?php if (have_posts()) : ?>

        <?php
        /* Queue the first post, that way we know
         * what author we're dealing with (if that is the case).
         *
         * We reset this later so we can run the loop
         * properly with a call to rewind_posts().
         */
        the_post();
        ?>

        <header>
            <h1 class="archive-title">
                <?php printf(translate
                ('Author Archives: %s', 'rebar'),
                '<span class="vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta("ID"))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>');
                ?>
            </h1>
        </header><!-- .archive-header -->

        <?php
        /* Since we called the_post() above, we need to
         * rewind the loop back to the beginning that way
         * we can run the loop properly, in full.
         */
        rewind_posts();
        ?>


        <?php /* Start the Loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'post'); ?>
            <?php endwhile; ?>

        <?php rebar_content_nav(); ?>

        <?php else : ?>
        <?php get_template_part('content', 'noresults'); ?>
        <?php endif; ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>