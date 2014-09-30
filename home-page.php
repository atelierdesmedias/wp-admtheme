<?php
/**
 * Template Name: home page
 * Description: A template with the sidebar on the left
 *
 *
 */
get_header(); ?>

<?php the_post(); ?>

    <img id="home_picture" class="content-bandeauImage" src="<?php echo get_template_directory_uri(); ?>/images/cdcicdff.gif"/>

    <section id="coworkers-list-container">
        <ul id="coworkers-filterlist">
            <?php
            // no default values. using these as examples
            $taxonomies = array( 'adm_coworker_tag');
            $args = array(
                'orderby'           => 'name',
                'order'             => 'ASC',
                'hide_empty'        => true,
                'exclude'           => array(),
                'exclude_tree'      => array(),
                'include'           => array(),
                'number'            => '',
                'fields'            => 'all',
                'slug'              => '',
                'parent'            => '',
                'hierarchical'      => true,
                'child_of'          => 0,
                'get'               => '',
                'name__like'        => '',
                'description__like' => '',
                'pad_counts'        => false,
                'offset'            => '',
                'search'            => '',
                'cache_domain'      => 'core'
            );
            $terms = get_terms($taxonomies, $args);
            foreach ($terms as $term): ?>
            <li class="coworkers-filterlist-item"><a href="<?= get_bloginfo('url') . '/' . $term->taxonomy . '/' . $term->slug; ?>"><?= $term->name; ?></a></li>
            <?php endforeach; ?>
        </ul>

        <ul id="coworkers-list">
            <?php
            require_once(__DIR__.'/functions/CoworkerModel.php');
            $type = 'adm_coworker';
            $args=array(
                'post_type' => $type,
                'post_status' => 'publish',
                'posts_per_page' => 10,
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
                                <img src="<?= get_bloginfo('template_url'); ?>/images/default-coworker-<?= rand(1, 5); ?>">
                            <?php endif; ?>
                            <div class="coworker-meta">
                                <?php $name = explode(" ",get_the_title()); ?>
                                <span class="coworker-firstname"><?= $coworker->get('first_name'); ?></span>
                                <span class="coworker-lastname"><?= $coworker->get('last_name'); ?></span>
                                <span class="coworker-job"><?= $coworker->get('metier'); ?></span>
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
            ?>
        </ul>
    </section>

    <div id="home_map_and_text">
        <div id="home_map_container">
            <div id="home_map_canvas"></div>
        </div>
        <div id="home_text">
            <?php the_content(); ?>
            <?php wp_link_pages(array('before' => '<div class="page-link">Pages : ', 'after' => '</div>')); ?>
            <?php edit_post_link('Editer', '<span class="edit-link">', '</span>'); ?>
        </div>
    </div>

    <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng(45.7711896, 4.8377912);
            var myOptions = {
                zoom: 14,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("home_map_canvas"),
                myOptions);

            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: "L'Atelier des Medias"
            });
        }
        google.maps.event.addDomListener(window, "load", initialize);
    </script>

<?php get_footer(); ?>
