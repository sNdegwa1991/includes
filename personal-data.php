<?php
require '../core/init.php';
session_start();
  $json = $_POST['data'];
  $data = json_decode($json);
  $firstName=$data[1];
  $sirname=$data[0];
  $gender=$data[2];
  $nationalID=$data[4];
  $middleName=$data[5];
  $phone=$data[7];
  $dob=$data[8];
  $country=$data[9];
  $address=$data[6];
  $county=$data[10];
  $district=$data[11];
  $deno=$data[12];
  $gurd_name = $data[13];
  $relationship = $data[14];
  $g_phone = $data[15];
  $disability = $data[16];
  $d_type = $data[17];
  $d_desc = $data[18];
  $email=$_SESSION['myemail'];
  

$sql = "UPDATE students SET phone='".$phone."',national_id='".$nationalID."',first_name='".$firstName."',second_name='".$middleName."',last_name='".$sirname."',post_address='".$address."',country='".$country."',county='".$county."',district='".$district."',denomination='".$deno."',dob='".$dob."',gender='".$gender."',`sponsor_name`='".$gurd_name."',`sponsor_phone`='".$g_phone."',`sponsor_relationship`='".$relationship."',`disability`='".$disability."',`disability_type`='".$d_type."',`disability_description`='".$d_desc."' WHERE email='".$email."'";

if ($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

?>