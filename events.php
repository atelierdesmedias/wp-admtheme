<?php
/*
Template Name: Events page
*/
?>

<?php get_header(); ?>
<div class="calendar-events-list">
    <div class="main-calendar">
        <?php eme_get_events_list("limit=30&scope=all&order=DESC"); ?>
    </div>
    <script>
        var colors = ["#58C2E1","#388fa9","#88BA30","#498808","#EF8741"];

        jQuery('.calendar-event').each(function(i) {
            var random_color = colors[Math.floor(Math.random() * colors.length)];
            jQuery(this).find('.calendar-circle').css("background-color", random_color)
            jQuery(this).find('.calendar-title a').css("color", random_color)
        });
    </script>
    <div class="sidebar-calendar">
        <div class="sidebar-calendar-inner">
            <div class="sidebar-calendar-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/images/iconeEvent.png" alt="">
            </div>
            <h4>
                Vous souhaitez organiser un évènement à l’Atelier des Médias ?
            </h4>

            <ol>
                <li>Votre évènement doit être gratuit et ouvert à tous</li>
                <li>A visée non commerciale</li>
                <li>Se dérouler en semaine à partir de 18h30 (ouverture exceptionnelle le WE)</li>
                <li>Capacité maximale de 40 personnes</li>
            </ol>
            <p class="contact">
                Ecrivez à :
            <a href="mailto:evenements@coworkinglyon.org">evenements@coworkinglyon.org</a>
            <br/>ou passez manger avec nous un mardi à 12H45 lors de notre colunching hebdomadaire.</p>
        </div>
    </div>
</div>
<?php get_footer(); ?>
