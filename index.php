<?php
/**
 * @title: WP page file of blogPage component
 * @Description: Cette page inclu la vue Twig de la page correspondante
 * le traitement des pages se fait directement dans :
 * "src/project/pages/blogPage/blogPage.twig"
 *
 */

require 'config.php';

/**
 * ----------------------------------------------------------------------------- INCLUDE TEMPLATE
 */

get_header();

// include "blogPage" component
$context = Timber::get_context();
Timber::render(SRC_PAGES_DIR . '/blogPage/blogPage.twig', $context);

get_footer();


