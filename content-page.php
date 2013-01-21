<article>
    <div <?php post_class(); ?>>

        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <h2>
            <?php echo (the_title('', '', false) == '' ? 'Read More' : the_title('', '', false)); ?>
        </h2>

        <?php if (is_archive() || is_search()) : // Only display excerpts for archives and search. ?>
        <div class="post-text">
            <?php the_excerpt(); ?>
        </div>
        <?php else : ?>

        <div class="post-text">
            <?php the_content('Read More'); ?>
        </div>

        <div class="post-text clearfix">
            <?php edit_post_link('Edit Page'); ?>
        </div>

        <div class="link-pages">
            <?php wp_link_pages(); ?>
        </div>

        <?php endif; ?>

        <?php rebar_post_meta(); ?>


    </div>
</article>