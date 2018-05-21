<?php
/**
 * @title: "navBar" PHP view component
 * @description:
 */
?>

<div class="navBar <?php echo $classElement ?>">
    <?php
        // include "menu" component
        $classElement = "navBar_menu";
        include(SRC_COMPONENTS_DIR .'/menu/menu.php');

        $classElement = "navBar_socialBlock";
        include(SRC_COMPONENTS_DIR .'/socialBlock/socialBlock.php');

        $classElement = "navBar_intranetConnection";
        include(SRC_COMPONENTS_DIR .'/intranetConnection/intranetConnection.php');
    ?>
</div>
