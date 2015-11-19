<?php
/*
Template Name: Events page
*/
?>

<?php get_header(); ?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/adm/functions/FacebookEvents.php'); ?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/adm/vendor/autoload.php'); ?>

<?php
// get events
$appId = '1040421439303293';
$appSecret = 'a1ae719c2b79fad77591c5ad76bc97f8';
$accessToken = '1040421439303293|9yw1YLLVS7D8JwI8LqE4pORvULU';
$maxEvents = 10;
$futureEvents = false;
$timeOffset = 7;
$newWindow = false;
$calSeparate = false;
$fix_events_query = false;
$session = "";

$fb = new Facebook\Facebook([
    'app_id'     => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.5',
]);

$fb->setDefaultAccessToken($accessToken);

$event_id = (int) get_query_var( 'event_id' );

// Single event view
if($event_id > 0): ?>

    <?php
    $response = $fb->get($event_id);
    $graphObject = $response->getGraphObject();
    $event = json_decode($graphObject, true);
    ?>

    <div class="contentWrapper">
        <section class="content">
            <article id="" class="" role="article">
                <header class="entry-header">
                    <h1 class="entry-title"><?= $event['name']; ?></h1>
                </header>
                <div class="entry-content">
                    <div class="calendar-event-single">
                        <div class="calendar-single-inner">
                            <div class="calendar-info">
                                <div class="calendar-img"></div>
                                <?php $date_format = "%a %d %B"; ?>
                                <?php $time_format = "H:i"; ?>
                                <div class="calendar-date">
                                    <h2 class="calendar-title"><?= strftime('%a %d %B', date("U", strtotime($event['start_time']))); ?><br><small class="calendar-time"><?= date_format(date_create($event['start_time']), $time_format); ?></small></h2>
                                </div>
                            </div>
                            <div class="calendar-excerpt">
                                <p><?= nl2br($event['description']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-map"></div>
                </div>
            </article>
        </section>
    </div>
</div>

<?php
// Events list view
else:
?>
<div id="events-list-container">

    <?php
    $response = $fb->get('/Coworkinglyon/events');
    $graphObject = $response->getGraphEdge();
    $events = json_decode($graphObject, true);
    ?>

    <ul id="events-list">
        <?php foreach($events as $k => $event):
        $event_date = date_create($event['start_time']['date']);
        $now_date = new DateTime(); ?><!--
        --><li>
            <div class="calendar-event <?php if ($event_date < $now_date) :?>eme-past-event<?php endif; ?>">
            <a href="/les-evenements/<?= $event['id']; ?>/">
                    <div class="calendar-circle"></div>
                </a>
                <?php $date_format = "j/m/y"; ?>
                <?php $time_format = "H:i"; ?>
                <span class="calendar-date"><?= date_format(date_create($event['start_time']['date']), $date_format); ?> - <?= date_format(date_create($event['start_time']['date']), $time_format); ?></span>
                <div class="calendar-info">
                <span class="calendar-title"><?= getExcerpt($event['name'], 0, 60); ?></span>
                </div>
                <div class="calendar-excerpt"><?= getExcerpt($event['description']); ?></div>
            </div>
        </li><!--
        --><?php if($k >= 11):
        break;
        endif;
        endforeach; ?>
    </ul>
</div><!--
--><div class="sidebar-calendar">
    <div class="sidebar-calendar-inner">
        <div class="sidebar-calendar-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/images/iconeEvent.png" alt="">
        </div>
        <h4>Vous souhaitez organiser un événement à l’Atelier des Médias ?</h4>
        <ol>
            <li>Votre évènement doit être gratuit et ouvert à tous</li>
            <li>A visée non commerciale</li>
            <li>Se dérouler en semaine à partir de 18h30 (ouverture exceptionnelle le WE)</li>
            <li>Capacité maximale de 40 personnes</li>
        </ol>
        <p class="contact">
            Ecrivez à :
        <a href="mailto:evenements@atelier-medias.org">evenements@atelier-medias.org</a>
        <br/>ou passez manger avec nous un mardi à 12H45 lors de notre colunching hebdomadaire.</p>
    </div>
</div>

<script>
    var colors = ["#58C2E1","#388fa9","#88BA30","#498808","#EF8741"];

    jQuery('.calendar-event').each(function(i) {
        var random_color = colors[Math.floor(Math.random() * colors.length)];
        jQuery(this).find('.calendar-circle').css("background-color", random_color)
        jQuery(this).find('.calendar-title a').css("color", random_color)
    });
</script>

<?php
endif;
?>


<?php get_footer(); ?>
