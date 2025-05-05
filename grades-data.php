<?php
require '../core/init.php';
session_start();
  $json = $_POST['data'];
  $data = json_decode($json);
  $email=$_SESSION['myemail'];
  
  $eng=$data[0];
  $mat=$data[2];
  $kis=$data[1];
  $che=$data[3];
  $bio=$data[5];
  $phy=$data[4];
  $geo=$data[6];
  $his=$data[7];
  $rel=$data[8];
  $agr=$data[9];
  $other=$data[11];
  $bst=$data[10];

  $sql = "UPDATE students SET `eng`='$eng',`kis`='$kis',`mat`='$mat',`che`='$che',`phy`='$phy',`bio`='$bio',`his`='$his',`geo`='$geo',`cre`='$rel',`agr`='$agr',`bst`='$bst',`other`='$other' WHERE email='$email'";

if ($con->query($sql) === TRUE) {
   echo "success";
} else {
    echo "error";
}
?>