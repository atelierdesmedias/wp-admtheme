<?php
  

get_header(); ?>

    <header class="page-header">
        <h1 class="entry-title"><?php
						printf( __( 'Catégorie: %s', 'themename' ), '<span>' . single_cat_title( '', false ) . '</span>' );
        ?></h1>

					<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
    </header>

    <div class="blog">
      <?php get_template_part( 'loop', 'category' ); ?>
    </div>

</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
