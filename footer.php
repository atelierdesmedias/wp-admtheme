<?php 
/**
 * footer.php
 * IMPORTANT : Une partie du template appartient aux anciennes pages que l'on
 * garde visible dans un premier temps
 */
?>


<?php
if
// tout ce contenu doit continuer à apparaitre sur le site
// si l'on est pas sur la nouvelle home page
( !is_home() && !is_front_page() ) :
?>


</div><!-- #main  -->
</div><!-- .container -->

<div id="page-footer-container">
    <footer id="page-footer" class="container" role="contentinfo">
        <div id="page-footer-information">
            <img id="page-footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png" />
            <span id="page-footer-adress">9 quai André Lassagne - 69001 Lyon</span>
            <span id="page-footer-phone">Tel : 09 72 33 20 92</span>
        </div>
        <nav id="page-footer-links">
            <a href="<?php echo home_url('/credits'); ?>">Crédits</a> -
            <a href="<?php echo home_url('/mentions-legales'); ?>">Mentions légales</a> -
            <a href="<?php echo home_url('/nos-partenaires'); ?>">Nos partenaires</a> -
            <a href="<?php echo home_url('/espace-presse'); ?>">Espace presse</a>
        </nav>
    </footer>
</div>


<?php
// si on est sur la nouvelle home page :
else : ?>

    <?php
        // include "mainFooter" component
        $classElement = "app_mainFooter";
        include(SRC_COMPONENTS_DIR . '/mainFooter/mainFooter.php');
    ?>

</main>

<?php endif; ?>

<?php wp_footer(); ?>

<!-- JS files -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

</body>

</html>

