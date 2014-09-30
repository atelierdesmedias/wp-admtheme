<?php

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

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

    <div class="blog">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <div class="post_text">
            <h2><?php the_title(); ?></h2>
            <?php the_category() ?>

            <div class="entry-meta entry-header">
                <span class="published">Publié le
                    <?php the_time(get_option('date_format')); ?>, </span>
                <span class="author">par <?php the_author_posts_link(); ?></span>
            </div>

            <?php the_content(); ?>
            <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'themename'), 'after' => '</div>')); ?>

            <?php
            $branchembed = get_post_meta($post->ID, 'branchembed', true);
            // check if the custom field has a value
            if ($branchembed != '') {
                echo '<div class="branchembed">' . $branchembed . '</div>';
            }
            ?>
        </div>
        <!-- .entry-content -->


        <!-- #entry-meta -->
    </article><!-- #post-<?php the_ID(); ?> -->

    <nav class="nav-single">
        <span class="nav-previous"><?php previous_post_link('%link', __('Article précédent', 'themename')); ?></span>
        <span class="nav-next"><?php next_post_link('%link', __('Article suivant', 'themename')); ?></span>
    </nav><!-- #nav-single -->

  </div> <!-- blog -->

<?php endwhile; // end of the loop. ?>

    </section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
