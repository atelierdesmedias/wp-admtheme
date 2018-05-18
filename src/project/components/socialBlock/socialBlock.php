<?php
/**
 * @title: "socialBlock" PHP View component
 * @description: block icon social
 */
?>

<div class="socialBlock <?php echo $classElement ?>">
    <ul class="socialBlock_items">

        <?php // Facebook ?>
        <li class="socialBlock_item">
            <a class="socialBlock_link">
                <i class="socialBlock_icon socialBlock_icon-facebook">
                    <?php echo file_get_contents( SRC_IMAGE_DIR . 'icon-facebook.svg') ?>
                </i>
            </a>
        </li>

        <?php // Twitter ?>
        <li class="socialBlock_item">
            <a class="socialBlock_link">
                <i class="socialBlock_icon socialBlock_icon-twitter">
                    <?php echo file_get_contents( SRC_IMAGE_DIR . 'icon-twitter.svg') ?>
                </i>
            </a>
        </li>

    </ul>
</div>
