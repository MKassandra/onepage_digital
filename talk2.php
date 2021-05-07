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
  $email_subject = $subject . 'Form Submission';

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);


    /* $name = $_POST['Name']; // required
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
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  <section id="header-nav">
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom navbar-transparent navbar-product">
        <a class="navbar-brand" href="index.html"><img src="binangonan_logo.png" class="cashmate"><img src="images/brb_logo.png" class="brblogo"></a>
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ul-holder" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown about-dlist about-border ml-auto">
      
            <a class="nav-link about dropdown-toggle" href="about.html" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About</a>
              <div class="dropdown-menu w-100" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="about.html#who">Who we are</a>
                  <a class="dropdown-item" href="about.html#mission">Mission</a>
                  <a class="dropdown-item" href="about.html#vision">Vision</a>
                  <a class="dropdown-item" href="about.html#history-body">History</a>
                  <a class="dropdown-item" href="about.html#meet">Meet Our Team</a>
              </div>
          </li>
          <li class="nav-item dropdown services-border ml-auto">
            <a class="nav-link services dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Products and Services
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdownMenuLink">

              <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="product-service.html#1">Cards</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="product-service.html#cards">BRB Card</a></li>
                  <li><a class="dropdown-item" href="product-service.html#upi">Union Pay Card</a></li>
                  <li><a class="dropdown-item" href="product-service.html#cobrand">Cobranded Card</a></li>
              </li>
            </ul>
            <li><a class="dropdown-item" href="product-service.html#acquiring">Merchant Acquiring</a></li>
            <li><a class="dropdown-item" href="product-service.html#instapay">Instapay</a></li>
            <li><a class="dropdown-item" href="product-service.html#agency">EMI Agent Services</a></li>
          </li>
        </ul>
        </li>
  
            <li class="nav-item partners-border ml-auto">
              <a class="nav-link partners" href="partners.html">Partners</a>
            </li>
  
            <li class="nav-item letsTalk-border ml-auto">
              <a class="nav-link letsTalk" href="talk.html">Let's Talk</a>
            </li>
            
          </ul>
      </div>
    </nav>

  </section>
  <!--Main Content-->
    <section id="talk-body-content">

        
Thank you for contacting us. We will be in touch with you very soon." . " -" . "<a href='talk.html' style='text-decoration:none;color:#4c008a;'> Return Home</a> ;

        

    </section>



  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="scripts.js"></script>

  <section id="footer-content">
    <footer class="fixed-bottom">
      <a href="terms.html" class="footer-text"  style="color:white">Terms and Conditions</a> 
    </footer>
  </section>

  <script type="text/javascript" src="scripts-test.js"></script>
</body>
</html>