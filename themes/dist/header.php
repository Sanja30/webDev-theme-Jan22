<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width,initial-scale=1">

 <!--
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&display=swap"
          rel="stylesheet">
--> 
</head>
<body <?php body_class(); ?>>
<?php if(is_front_page()):?>
<a href="#content" class="screen-reader-text"><?php _e('Zum Inhalt springen', 'wifi'); ?></a>
<?php endif; ?>
<div id="navbar" class="container">
    <div id="brand">

    <?php 
       if(function_exists('the_custom_logo')){
        the_custom_logo();
       }
    ?>   

    </div>
    <input type="checkbox" id="nav-trigger">
    <label for="nav-trigger" id="burger-button">
        <span class="burger-icon" aria-hidden="true"></span>
        <span class="screen-reader-text"><?php _e('Navogation öffnen/schließen', 'wifi'); ?></span>
    </label>
    <nav id="main-nav">
       <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'nav-menu',
            'depth' => 2,
            'fallback_cb' => false
        ));
         ?>
    </nav>
</div>
<?php if(is_front_page()):?>
<header id="page-header" style="background-image: url('<?php the_field('headerimage');?>');">
    <h1 class="page-title animate zoom-in"><?php the_title(); ?></h1>
    <a href="#content" class="scroll-down">
        <span class="icon-arrow-down" aria-hidden="true"></span>
        <span class="screen-reader-text"><?php _e('Zum Inhalt', 'wifi'); ?></span>
    </a>
</header>
<?php else: ?>
   <div id="page-header" style="background-image: url('<?php the_field('headerimage'); ?>');"></div>
<?php endif; ?>    