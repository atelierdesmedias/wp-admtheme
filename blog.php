<?php
/*
 Template Name: Blog page
 */
?>

<?php get_header(); ?>

    <section class="blog">

        <header class="content-bandeau">
            <img class="content-bandeauImage" src="<?php echo get_template_directory_uri(); ?>/images/bandeau-blog.png"/>
        </header>

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
