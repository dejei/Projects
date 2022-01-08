<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
require 'mail/Exception.php';
require 'dbd.php';

if (isset($_POST['email'])) {

    $emailTo = $_POST['email']; 
    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    $code = uniqid(true); // true for more uniqueness 
    $query = mysqli_query($con,"INSERT INTO reset (code, email) VALUES('$code','$emailTo')"); 
    if (!$query) {
       exit('Error'); 
    }
    try {
        //Server settings
      //  $mail->SMTPDebug = 0;     // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = "true";                               // Enable SMTP authentication
        $mail->Username = 'documentcas@gmail.com';                 // SMTP username
        $mail->Password = 'casdocument20212022';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;   // for tls                                 // TCP port to connect to
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('documentcas@gmail.com'); // from who? 
        $mail->addAddress($_POST["email"]);     // Add a recipient

        //Content
        // this give you the exact link of you site in the right page 
        // if you are in actual web server, instead of http://" . $_SERVER['HTTP_HOST'] write your link 
        $url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']). "/resetPassword.php?code=$code"; 
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your Password Reset Link';
        $mail->Body    = "<h1> You requested a password reset </h1>
                         <p>Click <a href='$url'>this link</a> to do so</p>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


        $mail->send();
        echo ("<script>
    window.alert('Please check your inbox or spam folder. You may close this tab.');
    </script>");
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

?>

