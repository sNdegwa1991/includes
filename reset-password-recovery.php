<?php
require '../core/init.php';
  $cemail = $_SESSION['myemail'];
  //$cemail = 'mwanikisamuel91@gmail.com';
	$json = $_POST['data'];
	$data = json_decode($json);

	$pass1 = $data[0];
  $pass2 = $data[1];
  $pass3 = $data[2];

  $email=$_SESSION['myemail'];
  $gpassword=$_SESSION['gpassword'];


  if($gpassword === $pass1)
  {
    if($pass2 === $pass3)
    {
    
    $sql = "UPDATE students SET `password`='$pass2' WHERE email='$email'";
    if ($con->query($sql) === TRUE) {
      echo "success";
    } else {
       echo "error";
    }
    } else {
      echo "mismatch";
    }
  
  } else {
    echo "different";
  }           
	 
?>