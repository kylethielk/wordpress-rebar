<?php get_header(); ?>

<div id="wrap">
    <!-- Post Loop -->

    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>

    <div id="right-column">

        <?php if (have_posts()) : ?>
        <header>
            <h1 class="archive-title">
                <?php printf(__('Category Archives: %s', 'rebar'), '<span>' . single_cat_title('', false) . '</span>'); ?>
            </h1>

            <?php if (category_description()) : // Show an optional category description ?>
            <div class="archive-meta">
                <?php echo category_description(); ?>
            </div>
            <?php endif; ?>

        </header>
        <?php
        /* Start the Loop */
        while (have_posts()) : the_post();

            get_template_part('content', 'post');

        endwhile;

        rebar_content_nav();
        ?>

        <?php else : ?>
        <?php get_template_part('content', 'noresults'); ?>
        <?php endif; ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>