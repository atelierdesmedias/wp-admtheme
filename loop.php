<?php
  
?>

<?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <div class="post_text">
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
        </div>

        <?php if (has_post_thumbnail(get_the_ID())) { ?>
            <div class="thumbnail">
                <?php the_post_thumbnail('blog-list'); ?>
            </div>
        <?php } ?>

    </article>

<?php endwhile; ?>

