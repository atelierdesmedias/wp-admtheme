<?php

get_header(); ?>

<article id="post-0" class="post error404 not-found" role="article">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Mais vous vous êtes perdu ?', 'themename' ); ?></h1>
				</header>

				<div class="entry-content">
          <div id="image-404" class="content-404">
            <img src="<?= get_bloginfo('template_url'); ?>/images/404.png" style="display:block;margin:auto;"/>
          </div><!--
          --><div id="links-404" class="content-404">
            <nav>
              <ul>
                <li><a class="green-link" href="/">Accueil</li>
                <li><a class="green-link" href="/le-coworking">Qu'est ce que le coworking?</li>
                <li class="nav-next"><a class="green-link" href="/coworkers">Trouvez un freelance</li>
                <li><a class="green-link" href="/les-evenements">Participez à un évènements</li>
                <li><a class="green-link" href="/le-blog">Voir notre blog</li>
              </ul>
            </nav>
          </div>
        </div>
</article>
</section>

<?php get_footer(); ?>
