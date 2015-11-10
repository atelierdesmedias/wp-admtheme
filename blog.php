<?php
/*
 Template Name: Blog page
 */
?>

<?php get_header(); ?>

    <section id="content" role="region" class="default-content mod left w70">

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

        <div class="nav-single">
            <span class="nav-previous"><?php previous_posts_link( '&laquo; Articles précédents' ); ?></span>
            <span class="nav-next"><?php next_posts_link( 'Articles suivants &raquo;', '' ); ?></span>
        </div>

    </section>

    <div class="sidebar-container" id="blog-sidebar-container">
        <?php get_sidebar( $name ); ?>
    </div>

<?php get_footer(); ?>

