<?php
/**
 * @title: "mainHeader" PHP View component
 * @description:
 */
?>

<header class="mainHeader <?php echo $classElement ?>">
    <?php
        // include "navBar" component
        $classElement = "mainHeader_navBar";
        include(SRC_COMPONENTS_DIR . '/navBar/navBar.php');
    ?>
</header>
