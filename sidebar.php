<div id="sidebar">
    <header>
        <h1 class="header-text"><a href="<?php echo esc_url(home_url('/')); ?>"
                                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a></h1>

        <h2 class="site-description header-text"><?php bloginfo('description'); ?></h2>
    </header>
</div><!-- sidebar -->

<?php dynamic_sidebar("sidebar-above-menu") ?>

<?php wp_nav_menu(array("location" => "sidebar")); ?>

<?php dynamic_sidebar("sidebar-below-menu") ?>

<?php wp_meta(); ?>
