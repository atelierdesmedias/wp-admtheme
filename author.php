<?php
  

get_header(); ?>
<?php the_post(); ?>

    <section class="blog">
				<h1 class="entry-title" ><?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'themename' ), get_the_author()); ?></h1>

				<?php rewind_posts(); ?>

				<?php get_template_part( 'loop', 'author' ); ?>
    </section>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
