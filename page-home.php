<?php
/**
 * Template Name: home page
 * @Description: Cette page inclu la vue PHP de la page correspondante
 * NOTE : le traitement des pages se fait directement dans
 * "src/project/page/maPage/maPage.php"
 */

require 'config.php';

/**
 * ----------------------------------------------------------------------------- TEMPLATE
 */

get_header();

    // include "homePage" component
    $context = Timber::get_context();
    Timber::render(SRC_PAGES_DIR . '/homePage/homePage.twig', $context);

get_footer();

