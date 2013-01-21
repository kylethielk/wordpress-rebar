<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php

    if (is_singular() && comments_open() && get_option('thread_comments'))
    {
        wp_enqueue_script('comment-reply');
    }

    /*
	 * Loads our main stylesheet.
	 */
    wp_enqueue_style('rebar-style', get_stylesheet_uri());

    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
