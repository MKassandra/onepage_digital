<?php
     $name = $_POST['Name']; // required
     $contact = $_POST['Contact']; // required
     $email = $_POST['Email']; // required
     $message = $_POST['Message']; // required

    $email_from = $email;

   
     $email_subject = "Schedule Request Submission";

     $email_body ="Name: $name.\n".   
                  "Contact: $contact.\n".;
                  "Email: $email.\n".;
                  "Message: $message.\n".;
                  
    $email_to = "kassandra.bernabe@brbdigital.net"; 
                  
    $headers = "From: $email \r\n";

    $headers . = "Reply-To: $email \r\n";

    mail($to,$email_subject,$email_body,$headers);
    
    header("Location: talk.html");

?>