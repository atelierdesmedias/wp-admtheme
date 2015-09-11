<?php
/**
 * Handle Apply mails
 *
 */
class ApplyMail{

    protected $lastname;
    protected $firstname;
    protected $email;
    public $photo;
    protected $job;
    protected $date;
    protected $coworkerType;
    protected $group;
    protected $message;
    protected $teamMailErrors;
    protected $applicantMailErrors;


    public function __construct($postData, $filesData){
        // get posted data
        extract($postData);
        $this->lastname = $this->validateFormInput($lastname);
        $this->firstname = $this->validateFormInput($firstname);
        $this->email = $this->validateFormInput($email);
        $this->job = $this->validateFormInput($job);
        $this->date = $this->validateFormInput($date);
        $this->coworkerType = $this->validateFormInput($coworkerType);
        $this->group = $this->validateFormInput($group);
        $this->message = $this->validateFormInput($message);
        $this->photo = $this->validateFormPhoto($filesData['photo']);
    }

    /**
     * sendMessageToTeam
     * @return $mailErrors Function success callback
     */
    public function sendMessageToTeam() {

        // error toggle
        $this->mailErrors = false;

        // write the email content
        $mailHeader .= "MIME-Version: 1.0\n";
        $mailHeader .= "Content-Type: text/html; charset=utf-8\n";
        $mailHeader .= "From: contact@atelier-medias.org";

        $mailContent = "<h1>Nouveau candidat</h1>";
        $mailContent .= "<p><strong>Nom :</strong> $this->lastname</p>";
        $mailContent .= "<p><strong>Prénom :</strong> $this->firstname</p>";
        $mailContent .= "<p><strong>Email : </strong> $this->email</p>";
        // todo : add photo
        $mailContent .= "<p><strong>Profession : </strong> $this->job</p>";

        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $mailContent .= "<p><strong>Date de dernière rencontre avec le groupe Recrutement :</strong> " . strftime("%A %d %B %Y", strtotime($this->date)) . "</p>";

        $mailContent .= "<p><strong>Poste de travail souhaité :</strong> $this->coworkerType</p>";
        $mailContent .= "<p><strong>Choix du groupe ADM :</strong> $this->group</p>";

        $mailContent .= "<p><strong>Message :</strong></p><p>$this->message</p>";

        $mailSubject = "[Nouveau candidat] $this->firstname $this->lastname";
        $mailSubject = "=?utf-8?B?" . base64_encode($mailSubject) . "?=";

        $mailTo = "tclauzier@gmail.com";

        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        // send the email using wp_mail()
        if( !wp_mail($mailTo, $mailSubject, $mailContent, $mailHeader) ) {
            $this->teamMailErrors = true;
        }

        // reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

        return $this->teamMailErrors;

    }

    /**
     * sendMessageToApplicant
     */
    public function sendMessageToApplicant(){

        // write the email content
        $mailHeader .= "MIME-Version: 1.0\n";
        $mailHeader .= "Content-Type: text/html; charset=utf-8\n";
        $mailHeader .= "From: contact@atelier-medias.org";

        $mailContent = "<h1>Candidature à l'atelier des médias.</h1>";
        $mailContent .= "<p>Bonjour $this->firstname $this->lastname, nous avons bien reçu ta candidature.</p>";

        $mailContent .= "<p>Nous te remercions d'avoir pris le temps d'avoir rempli de formulaire.</p>";

        $mailSubject = "[Candidature à l'atelier des médias] $this->firstname $this->lastname";
        $mailSubject = "=?utf-8?B?" . base64_encode($mailSubject) . "?=";

        $mailTo = $this->email;

        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        // send the email using wp_mail()
        if( !wp_mail($mailTo, $mailSubject, $mailContent, $mailHeader) ) {
            $this->applicantMailErrors = true;
        }

        // reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

        return $this->applicantMailErrors;

    }

    /**
     * ValidateFormInput
     * @param $data string The string to be validated
     * @return $data string The validated string
     */
    protected function validateFormInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * ValidateFormPhoto
     * @param $data mixed The input to be validated
     * @return $data mixed The validated input
     */
    protected function validateFormPhoto($data){

        $target_dir = get_home_path() . "wp-content/uploads/apply-form-images/";

        $target_file = $target_dir . basename($_FILES['photo']['name']);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $data['target'] = $target_dir . basename('coworker-apply-' . time() . '.' . $imageFileType);

        $check = getimagesize($data["tmp_name"]);
        if ($check !== false) {
            if ($imageFileType == 'jpg' || $imageFileType == 'png'){
                var_dump($data['size']);
                if ($data['size'] <= 1000000){
                    if (move_uploaded_file($data['tmp_name'], $data['target'])) {
                        $data['success'] =  "Votre fichier ". basename( $data['name']). " a bien été téléchargé.";
                    }
                    else{
                        $data['error'] = "L'image est d'un poids supérieur à la limite autorisée.";
                    }
                }
            }
            else{
                $data['error'] = "Le format de l'image est incorrect.";
            }
        }
        else {
            $data['error'] = "Le fichier téléchargé n'est pas une image.";
        }

        return $data;
    }
}
?>

