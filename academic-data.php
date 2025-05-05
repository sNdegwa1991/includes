<?php
require '../core/init.php';
session_start();
  $json = $_POST['data'];
  $data = json_decode($json);
  $email=$_SESSION['myemail'];

  $primarySchool=$data[0];
  $secondarySchool=$data[1];
  $schoolPostal=$data[2];
  $primaryMarks=$data[3];
  $secondaryGrade=$data[4];
  $secoYear=$data[5];
  $terEdu=$data[6];
  $terGrade=$data[7];
  $kcpeYear=$data[8];
  $gradYear=$data[9];
  $post_level=$data[10];
  $sports=$data[11];
  $instrument=$data[12];
  $other_activities=$data[13];

  $sql = "UPDATE students SET `primary_name`='".$primarySchool."',`kcpeYear`='".$kcpeYear."',`primary_marks`='".$primaryMarks."',`secondary_name`='".$secondarySchool."',`secondary_grade`='".$secondaryGrade."',`secondary_address`='".$schoolPostal."',`secoYear`='$secoYear',`tertialyEdu`='".$terEdu."', `tertialyGrade`='$terGrade',`gradYear`='$gradYear',`post_level`='".$post_level."',`sports`='".$sports."',`play_instruments`='".$instrument."',`other_activities`='".$other_activities."' WHERE email='".$email."'";

if ($con->query($sql) === TRUE) {
  echo "success";
} else {
    echo "error";
}


?>