<?php
/*
 Template Name: Blog page
 */
?>

<?php get_header(); ?>

    <section class="blog">

        <h1 class="entry-title">
            <?php
                $blogPage = get_page_by_path('blog');
            ?>
            <a href="<?php get_permalink($blogPage->ID); ?>"
               title="Blog"
               rel="bookmark">
                Blog
            </a>
        </h1>

        <?php get_template_part( 'loop', 'category' ); ?>

   </section>

<?php get_footer(); ?>
