<?php
  

get_header(); ?>

<article id="post-0" class="post error404 not-found" role="article">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Mais vous vous êtes perdu ?', 'themename' ); ?></h1>
				</header>

				<div class="entry-content">
        <img src="<?= get_bloginfo('template_url'); ?>/images/404.png" style="display:block;margin:auto;"/>
        </div>
</article>
</section>

<?php get_footer(); ?>
