<?php
require '../core/init.php';
	$json = $_POST['data'];
	$data = json_decode($json);

	$email = $data[0];

  $gpassword = substr(md5(microtime()), 0, 6);

  $_SESSION['myemail']=$email;
  $_SESSION['gpassword']=$gpassword;

 
  $sqls="SELECT stud_id,first_name FROM students WHERE email='$email'";
          $results=mysqli_query($con,$sqls) or die(mysql_error());
          while($rows=mysqli_fetch_array($results))
              {
               $stud_id=$rows['stud_id'];
               $first_name=$rows['first_name'];
              }

  if(empty($stud_id) === true)
  {

    echo "empty";

  } else {
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
    $mail->Password   = 'ayixqrewdxnjktyn'; //Phpcode@20222   bxbwlvxmsiyxehdr                         //SMTP password
    $mail->SMTPSecure = 'ssl';        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no_reply@consolatamedcollege.ac.ke', 'Sister Leonella Consolata Medical College');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('no_reply@consolatamedcollege.ac.ke');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Recovery';
    $mail->Body    = 'Dear '.$first_name.',<br> Welcome to Sister Leonella Consolata Medical College.<br>
    Your recovery password is <b>'.$gpassword.'</b>
    <br> <br>
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
     

 
?>