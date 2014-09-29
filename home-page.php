<?php
/**
 * Template Name: home page
 * Description: A template with the sidebar on the left
 *
 *
 */

get_header(); ?>
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






<section id="home-coworkers">
    <ul id="home-coworkers-filterlist">
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Les coworkers</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Graphisme</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Web</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Pige</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Rédaction</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Photographie</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Traduction</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Tourisme</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Communication</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Graphisme</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Web</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Pige</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Rédaction</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Photographie</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Traduction</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Tourisme</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Communication</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Graphisme</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Web</a></li>
        <li class="home-coworkers-filterlist-item"><a href="javascript: void(0);">Pige</a></li>
    </ul>

    <ul id="home-coworkers-list">
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker1.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Thomas</span>
                    <span class="coworker-lastname">Zilliox</span>
                    <span class="coworker-job">Développeur</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker2.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Amélie</span>
                    <span class="coworker-lastname">Morin-Fontaine</span>
                    <span class="coworker-job">Edition livres numériques</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker3.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Pierre</span>
                    <span class="coworker-lastname">Goyou-Beauchamps</span>
                    <span class="coworker-job">Traducteur</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker4.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Philippe</span>
                    <span class="coworker-lastname">Vouillon</span>
                    <span class="coworker-job">Journaliste</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker5.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Laurent</span>
                    <span class="coworker-lastname">Victorino</span>
                    <span class="coworker-job">Développeur Jeux vidéos</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>

        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker1.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Thomas</span>
                    <span class="coworker-lastname">Zilliox</span>
                    <span class="coworker-job">Développeur</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker2.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Amélie</span>
                    <span class="coworker-lastname">Morin-Fontaine</span>
                    <span class="coworker-job">Edition livres numériques</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker3.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Pierre</span>
                    <span class="coworker-lastname">Goyou-Beauchamps</span>
                    <span class="coworker-job">Traducteur</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker4.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Philippe</span>
                    <span class="coworker-lastname">Vouillon</span>
                    <span class="coworker-job">Journaliste</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
        <li class="home-coworkers-list-item">
            <a href="javascript: void(0);">
                <img src="<?= get_bloginfo('template_url'); ?>/images/coworkers/coworker5.png" />
                <div class="coworker-meta">
                    <span class="coworker-firstname">Laurent</span>
                    <span class="coworker-lastname">Victorino</span>
                    <span class="coworker-job">Développeur Jeux vidéos</span>
                </div>
                <div class="coworker-rollover">
                    <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                    <span class="citation">"Lorem ipsum et blablabdsfz dfg atern iol de tues avec de petits pois dans la cuisine"</span>
                    <span class="desc">Elu coworker fou par dénonciation le 10/02/2014</span>
                </div>
            </a>
        </li>
    </ul>
</section>



<?php get_footer(); ?>
