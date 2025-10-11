<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('feng-blog-body'); ?>>
    <div class="feng-blog-container">
        <!-- Header -->
        <header class="feng-header">
            <div class="feng-container feng-header-container">
                <div class="feng-logo">
                 <?php bloginfo('name'); ?><span>Blog</span>
                </div>
                <button class="feng-mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="feng-nav">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary-menu',
                        'container'      => false,
                        'items_wrap'     => '<ul>%3$s</ul>',
                        'fallback_cb'    => false
                    ]);
                    ?>
                </nav>
            </div>
        </header>