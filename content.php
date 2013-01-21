<article>
    <div  <?php post_class(); ?>>

        <?php if (has_post_thumbnail()): ?>

        <?php if (!is_single()): ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <?php endif; ?>
        <?php if (is_single()): ?>

            <?php the_post_thumbnail(); ?>

            <?php endif; ?>
        <?php endif; ?>


        <h1 class="post-h1">

            <?php if (is_single()): ?>
            <?php echo (the_title('', '', false) == '' ? 'Read More' : the_title('', '', false)); ?>
            <?php endif; ?>

            <?php if (!is_single()): ?>
            <a href="<?php the_permalink(); ?>">
                <?php echo (the_title('', '', false) == '' ? 'Read More' : the_title('', '', false)); ?>

            </a>
            <?php endif; ?>

        </h1>

        <div class="date muted-text"><?php echo get_the_date(); ?></div>





        <?php if (is_archive() || is_search()) : // Only display excerpts for archives and search. ?>
        <div class="post-text">
            <?php the_excerpt(); ?>
        </div>
        <?php else : ?>


        <div class="post-text">
            <?php the_content('Read More'); ?>
            <?php edit_post_link('(Edit)', '', ''); ?>
        </div>

        <?php if (is_single()) : ?>
            <div class="link-pages">
                <?php wp_link_pages(); ?>
            </div>
            <?php endif; ?>

        <?php endif; ?>



        <?php rebar_post_meta(); ?>


    </div>
</article>