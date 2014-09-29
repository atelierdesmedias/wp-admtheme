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

<div class="sidebar">
<?= array_shift(get_post_meta( get_the_ID() , 'sidebar' )); ?>
</div>


<style>
.default-content{
display: inline-block;
vertical-align: top;
width: 680px;


	
	}
	
.sidebar{
	display: inline-block;
	vertical-align: top;
	background-color: #388fa9;
	color: #ffffff;
	margin: 20px 0;
	margin-left: 10px;
	text-align: center;
	width: 225px;
}
.sidebar h4{
	font-size: 22px;
	font-family: open sans;
	line-height: 0.9em;
	margin: 20px 0 0 0;
	text-transform: uppercase;
	font-weight: 300;
}
		
.sidebar h5{
	font-size: 12px;
	font-family: open sans;
	font-style: italic;
	margin: 0;
	
}
	


</style>
<?php get_footer(); ?>