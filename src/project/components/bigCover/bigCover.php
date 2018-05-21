<?php
/**
 * @title: "bigCover" PHP View component
 * @description:
 */
?>

<div class="bigCover <?php echo $classElement ?>">
    <?php // TODO : link image url "home-header.jpg" avec WP back post thumbnail (image à la une) ?>
    <div class="bigCover_logo">
        <?php echo file_get_contents(SRC_IMAGE_DIR . 'logo-adm-blanc.svg') ?>
    </div>
    <div class="bigCover_backgroundImage"
         style="background-image: url('<?php echo SRC_IMAGE_DIR . 'home-header.jpg' ?>')">

        <?php
            // include "eventBanner" component
            $classElement = "bigCover_eventBanner";
            include(SRC_COMPONENTS_DIR . '/eventBanner/eventBanner.php');
        ?>

        <div class="bigCover_banner">
            <p class="bigCover_bannerText">
                <?php // TODO DICO ?>
                Créé en 2008, l’Atelier des Médias est le 1er espace de coworking lyonnais.<br>
                C’est une association qui regroupe des professionnels des médias (journalisme, web, graphisme, traduction, vidéo/photo, etc.),<br>
                un vivier de compétences qui collabore et invente de nouveaux modes de travail dans ce lieu de 212 m2 en centre ville.
            </p>
            <div class="bigCover_arrowDown"></div>
        </div>
    </div>
</div>
