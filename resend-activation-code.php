<?php
require '../core/init.php';
  $cemail = $_SESSION['myemail'];
  $code=rand(1111,9999);

    $sql = "UPDATE students SET `auth_code`='$code' WHERE email='$cemail'";
    if ($con->query($sql) === TRUE) {
      //Send email
            require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

     $mail = new PHPMailer\PHPMailer\PHPMailer(true);

               try {
                 //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'no_reply@consolatamedcollege.ac.ke';                     //SMTP username
    $mail->Password   = 'ayixqrewdxnjktyn'; //Phpcode@20222                              //SMTP password
    $mail->SMTPSecure = 'ssl'; //tls       //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;  //587                                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no_reply@consolatamedcollege.ac.ke', 'Sister Leonella Consolata Medical College');
    $mail->addAddress($cemail);     //Add a recipient
    $mail->addReplyTo('no_reply@consolatamedcollege.ac.ke');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Courses Application Account Confirmation';
    $mail->Body    = 'Dear Applicant,<br>Welcome to Sister Leonella Consolata Medical College. To continue with application kindly activate your account using the following code.<br>Your code is <b>'.$code.'</b><br> <br>
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
     } catch (Exception $e) {}
      echo "success";
    } else {
       echo "error";
    }
       
	 
?>