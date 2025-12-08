<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="format-detection" content="telephone=no">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();

$logo = get_field('logo', 'option');
$header_text = get_field('header_text', 'option');
?>

<span class="hamburger">
    <span class="line line-1"></span>
    <span class="line line-2"></span>
</span>

<nav class='mobile-nav'>
    <div class='content'>
        <div class='nav'>
            <div class='flex-wrapper'>
                <?php wp_nav_menu(['theme_location' => 'mobile-nav']); ?>

                <?php if (empty($header_button) === false) {
                    echo sprintf('<a class="btn cta-btn" href="%s" target="%s">%s</a>', $header_button['url'], $header_button['target'], $header_button['title']);
                } ?>
            </div>
        </div>
    </div>
</nav>

<header class='header'>
    <div class='container'>
        <div class="top-bar">
            <div class="flex-wrapper">
                <a href='/' class='logo'>
                    Logo Marleen de Bruijn
                    <?php if (empty($logo) === false) : ?>
                        <img src='<?php echo $logo['sizes']['large']; ?>' alt='<?php echo $logo['alt']; ?>'>
                    <?php endif; ?>
                </a>

                <?php wp_nav_menu(['theme_location' => 'header-top-nav']); ?>
            </div>
        </div>

        <div class="bottom-bar">
            <div class="flex-wrapper">
                <?php if (empty($header_text) === false) : ?>
                    <p><?php echo $header_text; ?></p>
                <?php endif; ?>

                <?php wp_nav_menu(['theme_location' => 'header-nav']); ?>
            </div>
        </div>
    </div>
</header>

<main id="main-content" class="page-content" role="main">
