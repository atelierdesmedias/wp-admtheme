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

<?php add_filter( 'wp_mail_content_type', 'set_html_content_type' ); ?>

<section id="content" role="region">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">

            <?php $displayForm = true; ?>

            <?php if( !empty($_POST)): ?>
                <?php if(
                    !empty($_POST['lastname'])
                    && !empty($_POST['firstname'])
                    && !empty($_POST['email'])
                    && !empty($_POST['job'])
                    && !empty($_POST['date'])
                    && !empty($_POST['message'])
                    && $_POST['submit'] === "Envoyer"
                ):
                ?>

                    <?php
                    $applyMail = new ApplyMail($_POST);
                    $teamMailErrors = $applyMail->sendMessageToTeam();
                    if ($teamMailErrors === true):
                    ?>
                        <p class="error">L'envoi de votre message a échoué ; veuillez réessayer.</p>
                    <?php else :?>
                        <?php $applicantMailErrors = $applyMail->sendMessageToApplicant(); ?>
                        <p class="success">Votre candidature a bien été envoyée. Merci !</p>
                        <?php $displayForm = false; ?>
                    <?php endif; ?>

                <?php else: ?>
                    <p class="error">Des champs sont manquants ; veuillez vérifier votre saisie et soumettre le formulaire à nouveau.</p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($displayForm == true): ?>

                <?php the_content(); ?>
                <?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'themename' ) . '&after=</div>' ); ?>
                <?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>

                <form name="apply-form" id="apply-form" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="post">

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

                    <!--Email -->
                    <div>
                        <label for="email">Email : (adresse valide exigée, un mail de confirmation vous sera envoyé)</label>
                        <input type="email" id="email" name="email" placeholder="Email" required="required" />
                    </div>

                    <!-- Job -->
                    <div>
                        <label for="job">Job :</label>
                        <input type="text" id="job" name="job" placeholder="Profession" required="required" />
                    </div>

                    <!-- Date -->
                    <div>
                        <?php
                        setlocale (LC_TIME, 'fr_FR.utf8','fra');
                        $startDate = date('Y-m-d');
                        $endDate = date('Y-m-d', strtotime('+1 month'));
                        $endDate = strtotime($endDate);
                        ?>
                        <label for="date">Date de colunching :</label>
                        <select id="date" name="date" required="required">
                            <option selected="true" disabled="disabled">Date de colunching</option>
                        <?php
                        for($i = strtotime('Tuesday', strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)):
                            ?>
                            <option value="<?= date('Y-m-d', $i); ?>"><?=  strftime("%A %d %B %Y", $i); ?></option>
                        <?php
                        endfor;
                        ?>
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

