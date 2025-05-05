<?php
require '../core/init.php';
  $cemail = $_SESSION['myemail'];
  //$cemail = 'mwanikisamuel91@gmail.com';
	$json = $_POST['data'];
	$data = json_decode($json);

	$incode = $data[0];

 //get stored code
  $sqls="SELECT auth_code FROM students WHERE email='$cemail'";
          $results=mysqli_query($con,$sqls) or die(mysql_error());
          while($rows=mysqli_fetch_array($results))
              {
               $dbcode=$rows['auth_code'];
              }

  if($incode === $dbcode)
  {
    //Activation process
    $sql = "UPDATE students SET `auth_status`='1' WHERE email='$cemail'";
    if ($con->query($sql) === TRUE) {
      echo "success";
    } else {
       echo "error";
    }
  } else {
    echo "different";
  }           
	 
?>