<?php
/**
 * @title: "navBar" PHP view component
 * @description: Ce fichier correspond à la vue PHP du composant
 */
?>

<div class="navBar">
    <?php
        // include "menu" component
        $classElement = "navBar_menu";
        include(SRC_COMPONENTS_DIR .'/menu/menu.php');

        $classElement = "navBar_socialBlock";
        include(SRC_COMPONENTS_DIR .'/socialBlock/socialBlock.php');
    ?>
</div>
