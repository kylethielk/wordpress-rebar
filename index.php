<?php get_header(); ?>


<div id="wrap">
    <!-- Post Loop -->

    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>

    <div id="right-column">

        <?php if (is_search()) : ?>
        <header>
            <h1 class="archive-title">
                Searching for: <?php echo esc_attr($_GET['s']); ?>
            </h1>
        </header>
        <?php endif; ?>
        <?php while (have_posts()) : the_post(); ?>

        <!-- post -->
        <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile;

        rebar_content_nav('nav-below');
        ?>

        <?php if (!have_posts()): ?>
        <?php get_template_part('content', 'noresults'); ?>
        <?php endif; ?>


    </div>

</div>

<?php get_footer(); ?>