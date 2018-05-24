<?php 
/**
 * footer.php
 * IMPORTANT : Une partie du template appartient aux anciennes pages que l'on
 * garde visible dans un premier temps
 */
?>

<?php
    // include "mainFooter" component
    $context = Timber::get_context();
    Timber::render(SRC_COMPONENTS_DIR . '/mainFooter/mainFooter.twig', $context);
?>

</main>

<?php wp_footer(); ?>

</body>
</html>

