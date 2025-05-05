<?php
require '../core/init.php';
session_start();
  $json = $_POST['data'];
  $data = json_decode($json);
  $email=$_SESSION['myemail'];

  $marital=$data[0];
  $motherName=$data[1];
  $fatherName=$data[2];
  $physicalStatus=$data[3];
  $motherPhone=$data[4];
  $fatherPhone=$data[5];
  $sponsor=$data[6];
  $sponsorPhone=$data[7];


  $sql = "UPDATE students SET `p_marital_status`='$marital',`p_physical_status`='$physicalStatus',`mother_name`='$motherName',`mother_phone`='$motherPhone',`father_name`='$fatherName',`father_phone`='$fatherPhone',`sponsor_name`='$sponsor',`sponsor_phone`='$sponsorPhone' WHERE email='$email'";

if ($con->query($sql) === TRUE) {
   echo "success";
} else {
    echo "error";
}

?>