<?php
if (isset($_POST['Email'])) {

  
    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Contact']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Subject']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $contact = $_POST['Contact']; // required
    $email = $_POST['Email']; // required
    $subject = $_POST['Subject']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }
    
    $number_exp = '/^[A-Za-z0-9]/';
     if (!preg_match($number_exp, $contact)) {
        $error_message .= 'The Contact number you entered does not appear to be valid.<br>';
    }

 

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Contact: " . clean_string($contact) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Subject: " . clean_string($subject) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";
  
    // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "kassandra.bernabe@brbdigital.net";
  $email_subject = "Form Submission";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

   
   

<?php
echo 

"<center>Thank you for contacting us. We will be in touch with you very soon." . " -" . "<a href='talk.html' style='text-decoration:none;color:#4c008a;'> Return Home</a> </center>";
}
?>