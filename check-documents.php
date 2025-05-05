<?php
include '../core/init.php';
$email=$_SESSION['myemail'];
     $sql="SELECT * FROM  students WHERE email='$email'";
  $result=mysqli_query($con,$sql) or die(mysql_error());
  while($row=mysqli_fetch_array($result))
       { 
        $id_attachment=$row['front_id'];
        $kcse_slip=$row['kcse_slip'];
        $higher_attachment=$row['higher_attachment'];
        $leaving=$row['leaving_certificate'];
       }
       
       if($applicationLevel == 1){
        //--------------------------higher diploma
      if ((empty($id_attachment) === true) || (empty($kcse_slip) === true) || ($leaving === 'no') || (empty($leaving) === true) || (empty($higher_attachment) === true) || ($higher_attachment === 'no')) {
         echo "incomplete";
       } else {
           $sqli = "UPDATE students SET `higher_attachment`='no' WHERE email='$email'";
            if ($con->query($sqli) === TRUE) {
               echo "success";
           } else {
                echo "error";
             }
       }
       } else {
        //---------------------------------Dip/Cert
      if ((empty($id_attachment) === true) || (empty($kcse_slip) === true) || ($leaving === 'no') || (empty($leaving) === true)) {
         echo "incomplete";
       } else {
           $sqli = "UPDATE students SET `higher_attachment`='no' WHERE email='$email'";
            if ($con->query($sqli) === TRUE) {
               echo "success";
           } else {
                echo "error";
             }
       }


       }

      
?>