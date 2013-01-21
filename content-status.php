<div class="status-wrapper">

    <div class="status-author-wrapper">
        <div class="avatar-box ">
            <a href="<?php the_permalink(); ?>">
                <?php echo get_avatar($post->post_author, 60);
                ?>
            </a>
        </div>

    </div>

    <article <?php post_class("status-box"); ?>>

        <div class="status-details">
            Posted by
            <?php echo '<span class="bypostauthor">' . get_the_author_link() . '</span>'; ?>
            on

            <span><?php echo get_the_date(); ?></span>
            (<a href="<?php the_permalink(); ?>">Reply</a>)

        </div>

        <div class="status-text">
            <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'rebar')); ?>
        </div>

        <?php rebar_post_meta(); ?>

    </article>
</div>