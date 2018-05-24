<?php 
/**
 * footer.php
 */
// include "mainFooter" component
$context = Timber::get_context();
Timber::render(SRC_COMPONENTS_DIR . '/mainFooter/mainFooter.twig', $context);

?>
</main>

<?php wp_footer(); ?>

</body>
</html>

