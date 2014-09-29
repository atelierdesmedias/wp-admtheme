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

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

                <h2><a href="<?php the_permalink(); ?>"
                       title="<?php get_the_title() ?>"
                       rel="bookmark"><?php the_title(); ?></a></h2>

                <?php the_category() ?>

                <?php the_excerpt(); ?>

                <div class="entry-meta entry-header">
                    <span class="published">Publié le
                        <?php the_time(get_option('date_format')); ?>,</span>

                    <span class="author">par <?php the_author_posts_link(); ?></span>
                </div>

                <?php if (has_post_thumbnail(get_the_ID())) { ?>
                    <div class="thumbnail">
                        <?php the_post_thumbnail('blog-list'); ?>
                    </div>
                <?php } ?>

            </article>

        <?php endwhile; ?>
    </section>

<?php get_footer(); ?>