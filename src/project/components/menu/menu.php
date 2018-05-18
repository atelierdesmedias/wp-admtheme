
<?php
/**
 * "menu" component
 */
?>
<nav class="menu <?php echo $classElement ?>">

    <?php
    wp_nav_menu( array(
        'class' => 'menu_wrapper',
        'theme_location' => 'primary'
    ));
    ?>

</nav>
