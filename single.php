<?php

get_header(); ?>
    <section id="content" role="region" class="default-content mod left w70">


<?php if (have_posts()) while (have_posts()) : the_post(); ?>

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
        <?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
            <span class="nav-previous"><?php previous_post_link('%link', __('Article précédent', 'themename')); ?></span>
        <?php endif; ?>
        <?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
            <span class="nav-next"><?php next_post_link('%link', __('Article suivant', 'themename')); ?></span>
        <?php endif; ?>
    </nav><!-- #nav-single -->

  </div> <!-- blog -->

<?php endwhile; // end of the loop. ?>

 </section>
   

<div class="sidebar-blog">
<?php get_sidebar( $name ); ?>
</div>
<?php get_footer(); ?>

