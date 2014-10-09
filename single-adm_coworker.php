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
            <div class="coworker-social">
                Facebook, Twitter, etc.
            </div>
            <div class="coworker-tags">
                <?php foreach ($coworker->getTags() as $tag): ?>
                  <a class="coworker-tag" href="/adm_coworker_tag/<? $tag ?>">
                        <?= $tag->name ?>
                  </a>
                <?php endforeach; ?>
            </div>
            
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
            </div>
        </div>
    </article>

<?php get_footer(); ?>
