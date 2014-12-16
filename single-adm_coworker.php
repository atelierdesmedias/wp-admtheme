<?php get_header(); ?>
<?php the_post(); ?>
<?php 
    require_once(__DIR__.'/functions/CoworkerModel.php');
    $coworker = new CoworkerModel($post);
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <aside class="content-preside">
            <div class="coworker-avatar">
                <?php the_post_thumbnail( array('220', '330') ); ?>
            </div>
            <div class="coworker-title">
                <div class="coworker-first-name"><?= $coworker->get('first_name'); ?></div>
                <div class="coworker-last-name"><?= $coworker->get('last_name'); ?></div>
                <div class="coworker-company"><?= $coworker->get('metier'); ?></div>
            </div>
            <?php
            $social_links = array(
                'facebook' => $coworker->get('facebook'),
                'twitter' => $coworker->get('twitter'),
                'linked_in' => $coworker->get('linked_in'),
                'viadeo' => $coworker->get('viadeo'),
                'pinterest' => $coworker->get('pinterest'),
                'googleplus' => $coworker->get('googleplus'),
                'skype' => $coworker->get('skype'),
            );
            if (array_filter($social_links)): ?>
                <div class="coworker-social">
                    <ul>
                        <?php foreach($social_links as $social_network => $social_link): ?>
                            <?php if (!empty($social_link)): ?>
                                <li>
                                    <a href="<?= $social_link; ?>" title="<?= $social_network; ?>">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/social-<?= $social_network; ?>.png" alt="<?= $social_network; ?>" />
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php $coworker_tags = $coworker->getTags();
            if (array_filter($coworker_tags)): ?>
                <div class="coworker-tags">
                    <ul>
                        <?php foreach ($coworker->getTags() as $tag): ?>
                            <li><a class="coworker-tag" href="<?= get_bloginfo('url') . '/' . 'metiers' . '/' . $tag->slug; ?>"><?= $tag->name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </aside>
    
        <div class="content">

            <header class="content-bandeau">
                <?php if ($coworker->has('banner')): ?>
                    <img class="content-bandeauImage" src="<?php echo wp_get_attachment_image_src($coworker->get('banner'), 'coworker-banner', false)[0]; ?>"/>
                <?php else: ?>
                    <img class="content-bandeauImage" src="<?php echo get_template_directory_uri(); ?>/images/bandeau-atelier-des-medias.png"/>
                <?php endif; ?>
            </header>

            <aside class="content-aside coworker-contact">
                <?php if ($coworker->has('phone3')): ?>
                    <a class="coworker-phone" href="tel:<?= $coworker->get('phone3'); ?>">
                        <?= $coworker->get('phone3'); ?>
                    </a>
                <?php endif; ?>
                <?php if ($coworker->has('emailpro')): ?>
                    <a class="coworker-email" href="mailto:<?= $coworker->get('emailpro'); ?>">
                        Envoyez-moi un mail!
                    </a>
                <?php endif; ?>
                <?php for ($i=1; $i<=3; $i++): ?>
                    <?php if ($coworker->has('website1'.$i)): ?>
                        <a class="coworker-website" href="<?= $coworker->get('website1'.$i); ?>">
                            <?= $coworker->get('website1'.$i); ?>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($coworker->has('citation')): ?>
                    <div id="coworker-quote-container">
                        <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                        <span id="coworker-quote">"<?= $coworker->get('citation'); ?>"</span>
                    </div>
                <?php endif; ?>
            </aside>
    
            <div class="entry-content coworker-description">
                <?php if ($coworker->has('public_quiesttu')): ?>
                    <h2>Qui es-tu ?</h2>
                    <p>
                        <?= $coworker->get('public_quiesttu'); ?>
                    </p>
                <?php endif; ?>
                <?php if ($coworker->has('public_quefaistu')): ?>
                    <h2>Que fais-tu ?</h2>
                    <p>
                        <?= $coworker->get('public_quefaistu'); ?>
                    </p>
                <?php endif; ?>
                <?php if ($coworker->has('public_pourquoicoworking')): ?>
                    <h2>Pourquoi le coworking ?</h2>
                    <p>
                        <?= $coworker->get('public_pourquoicoworking'); ?>
                    </p>
                <?php endif; ?>

                <?php var_dump($coworker); ?>
            </div>
        </div>
    </article>

<?php get_footer(); ?>
