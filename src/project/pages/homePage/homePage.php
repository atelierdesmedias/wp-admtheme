
<?php
/**
 * @title: "homePage" PHP view component
 * @description: Ce fichier correspond à la vue PHP du composant
 */
?>
<div class="homePage">

    <header class="homePage_header">
        <?php
            // include "bigCover" component
            $classElement = "homePage_bigCover";
            include(SRC_COMPONENTS_DIR . '/bigCover/bigCover.php');
        ?>
    </header>
    <section class="homePage_content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>
    </section>


</div>
