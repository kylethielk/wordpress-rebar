<?php get_header(); ?>


<div class="wrap">
    <!-- Post Loop -->

    <div class="left-column">
        <?php get_sidebar(); ?>
    </div>
    <div class="right-column">

        <?php while (have_posts()) : the_post(); ?>
        <div class="post-box">

            <?php if (has_post_thumbnail()): ?>
            <div align="center">
                <img class="featured-image"
                     src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php getFeaturedImageUrl(); ?>&h=200&w=690&zc=1"
                     alt=""/>
            </div>
            <?php endif; ?>


            <h2>
                <a href="<?php the_permalink(); ?>" class="header-text"><?php the_title(); ?></a>
            </h2>
            <!--            --><?php //edit_post_link('<div style="margin-left: 25px; width: 50px">Edit</div>'); ?>

            <div class="date muted-text"><?php the_date(); ?></div>





            <?php if (is_archive() || is_search()) : // Only display excerpts for archives and search. ?>

            <?php the_excerpt(); ?>

            <?php else : ?>

            <div class="post-text">
                <?php the_content('Read More'); ?>
            </div>

            <?php endif; ?>

            <div class="comment-bubble-container">
                <div class="muted-hover bottom-left">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment-bubble.gif"/><?php comments_popup_link(' 0 Comments', ' 1 Comment', ' % Comments'); ?>
                </div>

            </div>

            <div class="categories-container">
                <span class="muted-text categories bottom-right">Posted in <?php the_category(', '); ?></span>

                <div class="dots"></div>
            </div>


        </div>
        <!-- post -->

        <?php endwhile; ?>
        <div class="page-links">
            <div id="older-posts" class="bottom-right"><?php next_posts_link('Older Posts >>'); ?></div>
            <div id="newer-posts" class="bottom-left"><?php previous_posts_link('<< Newer Posts'); ?></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>