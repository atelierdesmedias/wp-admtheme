<?php
/**
 * Handle Apply mails
 *
 */
class ApplyMail{

    protected $lastname;
    protected $firstname;
    protected $email;
    protected $job;
    protected $date;
    protected $message;
    protected $teamMailErrors;
    protected $applicantMailErrors;


    public function __construct($data){
        // get posted data
        extract($data);
        $this->lastname = $this->validateFormInput($lastname);
        $this->firstname = $this->validateFormInput($firstname);
        $this->email = $this->validateFormInput($email);
        $this->job = $this->validateFormInput($job);
        $this->date = $this->validateFormInput($date);
        $this->message = $this->validateFormInput($message);
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
        $mailContent .= "<p><strong>Profession : </strong> $this->job</p>";

        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $mailContent .= "<p><strong>Date de colunching sélectionnée :</strong> " . strftime("%A %d %B %Y", strtotime($this->date)) . "</p>";

        $mailContent .= "<p><strong>Profession :</strong> $this->job</p>";
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
        $mailContent .= "<p>Nous t'attendons le " . strftime("%A %d %B %Y", strtotime($this->date)) . " a 12h30 pour notre colunching !</p>";

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

}

?>

