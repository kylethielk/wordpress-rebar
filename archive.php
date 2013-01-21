<?php
/**
 * The template for displaying Archive pages.
 * Also see tag.php,author.php and category.php for those
 * specific archive pages.
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
            <h1 class="archive-title">
                <?php
                if (is_day()) :
                    printf(__('Daily Archives: %s', 'rebar'), '<span>' . get_the_date() . '</span>');
                elseif (is_month()) :
                    printf(__('Monthly Archives: %s', 'rebar'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'rebar')) . '</span>');
                elseif (is_year()) :
                    printf(__('Yearly Archives: %s', 'rebar'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'rebar')) . '</span>');
                else :
                    _e('Archives', 'rebar');
                endif;
                ?>
            </h1>
        </header><!-- .archive-header -->

        <?php
        /* Start the Loop */
        while (have_posts()) : the_post();

            get_template_part('content', 'post');

        endwhile;

        ?>

        <?php else : ?>
        <?php get_template_part('content', 'noresults'); ?>
        <?php endif; ?>

    </div>
</div>




<?php get_footer(); ?>