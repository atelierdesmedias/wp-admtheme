<?php
/**
 * Template Name: home page
 * @Description:
 */
?>

<?php get_header(); ?>

<div class="homePage">
    <header class="homePage_header">
        <h1 class="homePage_title">
            Test Title super
        </h1>
    </header>
    <section class="homePage_content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
    </section>
</div>

<?php get_footer(); ?>
