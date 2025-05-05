<?php
require '../core/init.php';
session_start();
	$json = $_POST['data'];
	$data = json_decode($json);
  $code=rand(1111,9999);
	$phone = $data[0];
	$email1 = $data[1];
	$email2 = $data[2];
	$pass1=$data[3];
	$pass2=$data[4];
  $national_id=$data[5];
	date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $sqls="SELECT email FROM students WHERE email='$email1' OR national_id='$national_id'";
          $results=mysqli_query($con,$sqls) or die(mysql_error());
          while($rows=mysqli_fetch_array($results))
              {
               $dbemail=$rows['email'];
              }
  if (empty($dbemail)==true) {
              	           
if ($email1==$email2) {
	if ($pass1==$pass2) {

  $sql1 = "INSERT INTO `students` (`email`, `phone`, `password`, `register_date`,`auth_code`) VALUES ('".$email1."','".$phone."','".$pass2."','".$date."','".$code."')";
            
    if (!mysqli_query($con,$sql1)) {
                                 
     echo 'error';
      }
                                    
        else
          {
            $_SESSION['myemail']= $email1;

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
    $mail->SMTPSecure = 'ssl';        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no_reply@consolatamedcollege.ac.ke', 'Sister Leonella Consolata Medical College');
    $mail->addAddress($email1);     //Add a recipient
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
           }
}
else
{
	//password not matching
	echo "passwords";
}
}
else
{
	//emails not matching
	echo "emails";
}
}
else
{
	//email registered
	echo "account-exist";

}
?>