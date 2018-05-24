<?php
/**
 Template Name: agenda
 * @title: WP page file of agendaPage component
 * @Description: Cette page inclu la vue Twig de la page correspondante
 * le traitement des pages se fait directement dans :
 * "src/project/pages/agendaPage/agendaPage.twig"
 */

require 'config.php';

/**
 * ----------------------------------------------------------------------------- INCLUDE TEMPLATE
 */

  get_header();

     // include "agendaPage" component
     $context = Timber::get_context();
     Timber::render(SRC_PAGES_DIR . '/agendaPage/agendaPage.twig', $context);

  get_footer();


