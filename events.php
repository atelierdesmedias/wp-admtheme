<?php
/*
Template Name: Events page
*/
?>

<?php get_header(); ?>
<div class="main-calendar">
    <?php eme_get_events_list("limit=5&scope=all&order=DESC"); ?>
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
            <li>Votre évènement doit être ouvert à tous et gratuit.</li>
            <li>La règle 2</li>
            <li>La règle 3</li>
            <li>Envoyer un mail avec un descriptif écrit de votre évènement ainsi d’un visuel</li>
        </ol>
        <p class="contact">
            Ecrivez-nous à :
        <a href="mailto:event@coworkinglyon.org">event@coworkinglyon.org</a></p>
    </div>
</div>
<?php get_footer(); ?>
