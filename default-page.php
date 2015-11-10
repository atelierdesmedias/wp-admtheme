<?php
/**
 * Template Name: Default Page
 * Description: A template with the sidebar on the left
 *
 *
 */

get_header(); ?>
<?php the_post(); ?>

<section id="content" role="region" class="default-content mod left w70">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'themename' ) . '&after=</div>' ); ?>
            <?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->

    <?php // comments_template( '', true ); ?>
</section>

<div class="sidebar-container" id="page-sidebar-container">
    <?= array_shift(get_post_meta( get_the_ID() , 'sidebar' )); ?>
</div>

<?php get_footer(); ?>
