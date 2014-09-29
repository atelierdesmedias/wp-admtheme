<?php
/**
 * Template Name: home page
 * Description: A template with the sidebar on the left
 *
 *
 */
get_header(); ?>

<?php the_post(); ?>

     <section class="home-bandeau">
        <header class="content-bandeau">
            <img class="content-bandeauImage" src="<?php echo get_template_directory_uri(); ?>/images/bandeau-atelier-des-medias.png"/>
        </header>
     </section>

     <section class="home-map-container">
        <div id="map_canvas"/>
        <script type="text/javascript">
            function initialize() {
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var myOptions = {
                zoom: 8,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
              myOptions);
            }
            google.maps.event.addDomListener(window, "load", initialize);

        </script>
    </section>

   <section class="content">
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
