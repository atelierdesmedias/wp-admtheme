<?php
/**
 * Template Name: Apply Page
 * Description: Apply page template
 *
 */
get_header(); ?>
<?php the_post(); ?>

<?php 
    require_once(__DIR__.'/functions/ApplyMail.php');
?>

<script type="text/javascript" src="<?php echo( get_template_directory_uri() . '/js/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo( get_template_directory_uri() . '/js/bootstrap-datepicker/locales/bootstrap-datepicker.fr.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ( get_template_directory_uri() . '/js/bootstrap-datepicker/css/bootstrap-datepicker.css'); ?>" />

<?php add_filter( 'wp_mail_content_type', 'set_html_content_type' ); ?>

<section id="content" role="region">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">

            <?php $displayForm = true; ?>

            <?php if( !empty($_POST)): ?>
            <?php
                if(
                    !empty($_POST['lastname'])
                    && !empty($_POST['firstname'])
                    && !empty($_POST['email'])
                    && !empty($_FILES['photo']['name'])
                    && !empty($_POST['job'])
                    && !empty($_POST['date'])
                    && !empty($_POST['coworkerType'])
                    && !empty($_POST['group'])
                    && !empty($_POST['message'])
                    && $_POST['submit'] === "Envoyer"
                ):
                ?>
                    <?php
                    $applyMail = new ApplyMail($_POST, $_FILES);

                    if( !empty($applyMail->photo['error']) ): ?>
                        <p class="error"><?= $applyMail->photo['error']; ?></p>
                    <?php else: ?>
                        <?php
                        $teamMailErrors = $applyMail->sendMessageToTeam();
                        if ($teamMailErrors === true):
                        ?>
                            <p class="error">L'envoi de votre message a échoué ; veuillez réessayer.</p>
                        <?php else :?>
                            <?php $applicantMailErrors = $applyMail->sendMessageToApplicant(); ?>
                            <p class="success">Votre candidature a bien été envoyée. Merci !</p>
                            <p class="success">Un mail t'a été envoyé pour confirmer la réception.</p>
                            <?php $displayForm = false; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                <?php else: ?>
                    <p class="error">Des champs sont manquants ; veuillez vérifier votre saisie et soumettre le formulaire à nouveau.</p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($displayForm == true): ?>

                <?php the_content(); ?>
                <?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'themename' ) . '&after=</div>' ); ?>
                <?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>

                <form name="apply-form" id="apply-form" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="post" enctype= "multipart/form-data">

                    <!-- Lastname -->
                    <div>
                        <label for="lastname">Nom :</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Nom" required="required" />
                    </div>

                    <!-- Firstname -->
                    <div>
                        <label for="firstname">Prénom :</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Prénom" required="required" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email">Email : (adresse valide exigée, un mail de confirmation vous sera envoyé)</label>
                        <input type="email" id="email" name="email" placeholder="Email" required="required" />
                    </div>

                    <!-- Photo -->
                    <div>
                        <label for="photo">Photo :</label>
                        <input type="file" id="photo" name="photo" required="required" />
                        <span>Le fichier doit être de format .jpg ou .png et ne pas excéder 1Mo.</span>
                    </div>

                    <!-- Job -->
                    <div>
                        <label for="job">Profession :</label>
                        <input type="text" id="job" name="job" placeholder="Profession" required="required" />
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date">Date de la dernière rencontre avec le groupe Recrutement</label>
                        <input type="text" id="date" name="date" class="form-control" />
                        <script type="text/javascript">
                            (function($) {
                                $(document).ready(function(){
                                    $('#date').datepicker({
                                        endDate: "today",
                                        startView: 1,
                                        language: "fr",
                                        daysOfWeekDisabled: "0,6",
                                        autoclose: true,
                                    });
                                });
                            })(jQuery);
                        </script>
                        <style>
                        .datepicker{
                            position: absolute;
                            padding: 10px;
                            background: #fff;
                            border: 1px solid #EDECE4;
                        }
                        .datepicker-dropdown.datepicker-orient-bottom::before{
                            border-top: 6px solid #EDECE4;
                        }
                        </style>
                    </div>

                    <!-- Coworker type -->
                    <div>
                        <label for="coworker-type">Poste de travail souhaité :</label>
                        <select id="coworker-type" name="coworkerType" required="required">
                            <option value="" disabled="disabled">Type de poste</option>
                            <option value="Nomade">Nomade</option>
                            <option value="Fixe">Fixe</option>
                        </select>
                    </div>

                    <!-- Group -->
                    <div>
                        <label for="groupe">Choix du groupe ADM</label>
                        <select id="group" name="group" required="required">
                            <option value="" disabled="disabled">Groupe</option>
                            <option value="Communication extérieure">Communication extérieure</option>
                            <option value="Événements publiques">Événements publiques</option>
                            <option value="Recrutement">Recrutement</option>
                            <option value="Relations publiques">Relations publiques</option>
                            <option value="Trésorerie">Trésorerie</option>
                            <option value="Systèmes informatiques">Systèmes informatiques</option>
                            <option value="Vie associative">Vie associative</option>
                            <option value="Vie quotidienne">Vie quotidienne</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message">Message :</label>
                        <textarea id="message" name="message" placeholder="Exprimez vous !" required="required"></textarea>
                    </div>

                    <!-- Submit -->
                    <div>
                        <input type="submit" id="submit" name="submit" value="Envoyer" />
                    </div>

                </form>

            <?php endif; ?>

        </div><!-- .entry-content -->
    </article>
    <!-- #post-<?php the_ID(); ?> -->
    <?php // comments_template( '', true ); ?>
</section>

<?php get_footer(); ?>

