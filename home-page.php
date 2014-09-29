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
                    var latlng = new google.maps.LatLng(-34.397, 150.644);
                    var myOptions = {
                        zoom: 8,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("home_map_canvas"),
                      myOptions);
                }
                google.maps.event.addDomListener(window, "load", initialize);
            </script>
 
<?php get_footer(); ?>
