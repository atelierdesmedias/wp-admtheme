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

// get_header();
// include( ROOT_PATH .'/src/project/pages/homePage/homePage.php');
// get_footer();

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$post = new Timber\Post();
$context['post'] = $post;
Timber::render( array('page-home.twig'), $context );
//
//$context = Timber::get_context();
//$template = 'page-home.twig';
//// Posts
//$context['posts'] = Timber::get_posts();
//Timber::render($template, $context);
//
//
