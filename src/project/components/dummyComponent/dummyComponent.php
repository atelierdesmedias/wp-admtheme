
<?php
/**
 * @title: "dummyComponent" PHP view component
 * @description: Ce fichier correspond à la vue PHP du composant
 * On y insère de la DOM et on l'inclu ensuite là où l'on souhaite l'utiliser
 *
 *
 * Ex : depuis homePage.php
 *
 * 1. définir une class element qui sera appliqué sur le bloque du composant inclu :
 * <?php $classElement = "homePage_dummyComponent" ?>
 *
 * 2. inclure le composant :
 * <?php include (SRC_COMPONENTS_DIR . '/dummyComponent/dummyComponent.php'); ?>
 *
 */
?>
<div class="dummyComponent <?php echo $classElement?> ">
    dummyComponent
</div>
