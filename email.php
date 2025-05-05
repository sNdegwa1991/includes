<?php
include 'student-data.php';
//..........................................Send Email
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 1;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'no_reply@consolatamedcollege.ac.ke';                     //SMTP username
    $mail->Password   = 'ayixqrewdxnjktyn'; //Phpcode@20222                              //SMTP password
    $mail->SMTPSecure = 'ssl';        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no_reply@consolatamedcollege.ac.ke', 'Sr. Leonella Consolata Medical College');
    $mail->addAddress('mwanikisamuel91@gmail.com');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('no_reply@consolatamedcollege.ac.ke');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Courses Application Confirmation';
    $mail->Body    = 'Dear Samuel,<br> Your application has been submitted successfuly. Kindly follow procedures indicated in your portal and pay application fees. This application will be processed once your application fees is received.<br> <br>
        Regards.<br>
        ---<br>
      The Principal,<br>  
      Sister Leonella Consolata Medical College<br>
      P.O Box 25 - 10100 Nyeri<br>
      Cell:  +254724303431<br>
      Physical Address:  Along Nyeri-Mathari-Ihururu Road<br>
      Website:  www.consolatamedcollege.ac.ke';
      //$mail->addAttachment('doc/'.$file_name);

    $mail->send();
    //echo json_encode(array("message" => "Message has been sent"));
    echo "success";
} catch (Exception $e) {
    //echo json_encode(array("message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));
   echo "error";

}
?>