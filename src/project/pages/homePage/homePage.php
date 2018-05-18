
<?php
/**
 * @title: "homePage" PHP view component
 * @description: Ce fichier correspond à la vue PHP du composant
 */
?>
<div class="homePage">

        <header class="homePage_header">
            <h1 class="homePage_title">HomePage</h1>
            <?php
                // include "menu" component
//                $classElement = "homePage_navBar";
//                include(SRC_COMPONENTS_DIR. '/navBar/navBar.php');
            ?>

        </header>
        <section class="homePage_content" role="main">
            <?php while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>
        </section>


</div>
