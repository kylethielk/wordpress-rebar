<?php
/**
 * The template for displaying 404 pages (Not Found).
 **/

get_header();
?>

<div id="wrap">
    <div id="left-column">
        <?php get_sidebar(); ?>
    </div>
    <div id="right-column">

        <div class="type-post">

            <header>
                <h2>Woops, an error occurred.</h2>
            </header>

            <div class="post-text">
                <p>Unfortunately the content you are looking for is not here. Sorry about that! Go to
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home">
                        <?php bloginfo('name'); ?>
                    </a>.
                </p>
            </div>

        </div>

    </div>
</div>

<?php get_footer(); ?>