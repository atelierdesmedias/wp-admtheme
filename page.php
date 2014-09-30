<?php get_header(); ?>
<?php the_post(); ?>

    <section class="content">
        <header class="content-bandeau">
            <img class="content-bandeauImage" src="<?php echo get_template_directory_uri(); ?>/images/bandeau-atelier-des-medias.png"/>
        </header>
        
        <aside class="content-aside">
        </aside>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages(array('before' => '<div class="page-link">Pages : ', 'after' => '</div>')); ?>
                <?php edit_post_link('Editer', '<span class="edit-link">', '</span>'); ?>
            </div>
        </article>
    </section>

<?php get_footer(); ?>
