<?php
get_header(); ?>
<?php the_post(); ?>

    <section id="coworkers-list-container">

        <?php get_template_part( 'coworkers_filterlist', 'index' ); ?>

        <ul id="coworkers-list">
            <?php
            require_once(__DIR__.'/functions/CoworkerModel.php');
            $type = 'adm_coworker';
            $args=array(
                'post_type' => $type,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'caller_get_posts'=> 1,
                'orderby' => 'rand'
            );
            $my_query = null;
            $my_query = new WP_Query($args);

            if( $my_query->have_posts() ) {
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <li class="coworkers-list-item">
                        <?php $coworker = new CoworkerModel($post); ?>
                        <a href="<?php the_permalink() ?>" title="Consulter le profil de <?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail( $post->ID )): ?>
                                <?php the_post_thumbnail('coworker-list-item'); ?>
                            <?php else: ?>
                                <img src="<?= get_bloginfo('template_url'); ?>/images/default-coworker-<?= rand(1, 5); ?>.png">
                            <?php endif; ?>
                            <div class="coworker-meta">
                                <?php $name = explode(" ",get_the_title()); ?>
                                <span class="coworker-firstname"><?= $coworker->get('first_name'); ?></span>
                                <span class="coworker-lastname"><?= $coworker->get('last_name'); ?></span>
                                <?php
                                if( strlen($coworker->get('metier')) > 20 )
                                {
                                    $coworker_metier = substr($coworker->get('metier'), 0, 20) . ' ...';
                                }
                                else
                                {
                                    $coworker_metier = $coworker->get('metier');
                                }
                                ?>
                                <span class="coworker-job"><?= $coworker_metier; ?></span>
                            </div>
                            <div class="coworker-rollover">
                                <img class="picto" src="<?= get_bloginfo('template_url'); ?>/images/picto-rollover.png" alt=""/>
                                <?php
                                $length = 70; //modify for desired width
                                if (strlen($coworker->get('public_pourquoicoworking')) <= $length) {
                                    $string = $coworker->get('public_pourquoicoworking'); //do nothing
                                } else {
                                    $string = substr($coworker->get('public_pourquoicoworking'),0,strpos($coworker->get('public_pourquoicoworking'),' ',$length));
                                    $string .= " ...";
                                }
                                ?>
                                <span class="citation">"<?= $string; ?>"</span>
                            </div>
                        </a>
                    </li>
                <?php
                endwhile;
            }
            wp_reset_postdata();
            ?>
        </ul>
    </section>
<?php get_footer(); ?>