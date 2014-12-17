<?php


get_header(); ?>
<section id="content" role="region" class="default-content mod left w70">
    <header class="page-header">
        <h1 class="entry-title"><?php
						printf( __( 'Catégorie: %s', 'themename' ), '<span>' . single_cat_title( '', false ) . '</span>' );
        ?></h1>

					<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
    </header>

    <div class="blog">
      <?php get_template_part( 'loop', 'category' ); ?>
    </div>
    <div class="nav-single">
<span class="nav-previous"><?php previous_posts_link( '&laquo; Articles précédents' ); ?></span>
<span class="nav-next"><?php next_posts_link( 'Articles suivants &raquo;', '' ); ?></span>
</div>

</section>

<div class="sidebar-blog">
<?php get_sidebar( $name ); ?>
</div>
<?php get_footer(); ?>
