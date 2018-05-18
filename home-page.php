<?php
/**
 * Template Name: home page
 * @Description: Cette page inclu la vue PHP de la page correspondante
 * NOTE : le traitement des pages se fait directement dans
 * "src/project/page/maPage/maPage.php"
 *
 */
?>
<?php get_header(); ?>
    <?php include_once('src/project/pages/homePage/homePage.php') ?>
<?php get_footer(); ?>
