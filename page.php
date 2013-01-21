<?php get_header(); ?>

<div id="wrap">
    <!-- Post Loop -->


    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>

    <div id="right-column">


        <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', 'page'); ?>
        <?php comments_template('', true); ?>
        <?php endwhile; // end of the loop. ?>


    </div>
</div>

<?php get_footer(); ?>