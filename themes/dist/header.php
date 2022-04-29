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
<body class="home">
<a href="#content" class="screen-reader-text">Zum Inhalt springen</a>
<div id="navbar" class="container">
    <div id="brand">
        <a href="index.html">
            <img src="img/logo.svg" alt="Logo Web Developer">
        </a>
    </div>
    <input type="checkbox" id="nav-trigger">
    <label for="nav-trigger" id="burger-button">
        <span class="burger-icon" aria-hidden="true"></span>
        <span class="screen-reader-text">Navigation öffnen/schließen</span>
    </label>
    <nav id="main-nav">
        <ul class="nav-menu">
            <li class="current-menu-item">
                <a href="index.html">Home</a>
            </li>
            <li id="menu-item-2" class="menu-item-has-children">
                <a href="leistungen.html">Leistungen</a>
                <!-- TODO: Sub-Menu Toggle via JS einfügen
                <input type="checkbox" id="menu-item-2-toggle">
                <label for="menu-item-2-toggle" class="menu-toggle">
                    <span class="toggle-icon" aria-hidden="true"></span>
                    <span class="screen-reader-text">Submenu öffnen/schließen</span>
                </label>
                -->
                <ul class="sub-menu">
                    <li>
                        <a href="leistungen/web-entwicklung.html">Web Entwicklung</a>
                    </li>
                    <li>
                        <a href="leistungen/web-design.html">Web Design</a>
                    </li>
                    <li>
                        <a href="leistungen/schulungen.html">Schulungen</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="ueber-uns.html">Über uns</a>
            </li>
            <li>
                <a href="blog.html">Blog</a>
            </li>
            <li class="cta">
                <a href="#kontakt">Kontakt</a>
            </li>
        </ul>
    </nav>
</div>
<header id="page-header">
    <h1 class="page-title animate zoom-in">WIFI Web Developer</h1>
    <a href="#content" class="scroll-down">
        <span class="icon-arrow-down" aria-hidden="true"></span>
        <span class="screen-reader-text">Zum Inhalt</span>
    </a>
</header>