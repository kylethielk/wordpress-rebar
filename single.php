<?php get_header(); ?>


<div id="wrap">
    <!-- Post Loop -->

    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>
    <div id="right-column">

        <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
        <!-- post -->
        <?php comments_template('', true); ?>
        <?php endwhile; ?>
        <div class="page-links">
            <div id="older-posts" class="bottom-right"><?php next_posts_link('Older Posts >>'); ?></div>
            <div id="newer-posts" class="bottom-left"><?php previous_posts_link('<< Newer Posts'); ?></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>