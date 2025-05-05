<?php
 include 'student-data.php';
	$json = $_POST['data'];
	$data = json_decode($json);
    
    $len = $data[0];
	$array_id = $data[1];
	$array_cos = $data[2];
	
	$array_size = count($array_cos);
	
	date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');

//--------------------------------get application code and intake
  $sqlbatch="SELECT * FROM  application_batches WHERE student_id='$id'";
  $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
  while($rowb=mysqli_fetch_array($resultbatch))
       { 
        $incode=$rowb['batch_code'];
        $intake_id=$rowb['intake_id'];
      }

    for ($i=1; $i < $array_size; $i++) { 
    	$cos_id = $array_id[$i];
    	 $sql1ap = "INSERT INTO `applicants` (`stud_id`,`batch_id`,`course_id`,`intake_id`, `date_applied`, `status`, `comment`) VALUES ('$id','$incode','$cos_id','$intake_id','$date','0','Pending...')";     
       if (!mysqli_query($con,$sql1ap)) { } else {}    
    }
    echo "success";
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
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('no_reply@consolatamedcollege.ac.ke');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Courses Application Confirmation';
    $mail->Body    = 'Dear '.$first_name.' '.$second_name.',<br> Your application number '.$incode.' has been submitted successfuly. Kindly follow procedures indicated in your portal and pay application fees. This application will be processed once your application fees is received.<br> <br>
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
   // echo "success";
} catch (Exception $e) {
    //echo json_encode(array("message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));
  // echo "error";

}


?>