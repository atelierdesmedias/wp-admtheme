<?php
/**
 * Template Name: home page
 * Description: A template with the sidebar on the left
 *
 *
 */
get_header(); ?>

<?php the_post(); ?>

    <img class="content-bandeauImage" src="<?php echo get_template_directory_uri(); ?>/images/bandeau-atelier-des-medias.png"/>

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
