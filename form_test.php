<?php
if(!empty($_POST["send"])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    
    $toEmail = "kassandra.bernabe@brbdigital.net";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
    }
}
require_once "form-test.php";



  /*    $name = $_POST['name']; 
      $contact = $_POST['contact']; 
      $visitor_email = $_POST['email'];
      $message = $_POST['message']; 

    $email_from = $visitor_email;
    $email_subject = "New Form";

    $email_body = "Name: $name. \n". 
    "Contact: $contact. \n". 
    "email: $visitor_email. \n". 
    "message: $message. \n". 
    ;

    $to = "kassandra.bernabe@brbdigital.net";

    $headers = "From: $email_from \r\n";
    
    $headers = "Reply-To: $visitor_email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    header("Location: form-test.html");
    */
?>