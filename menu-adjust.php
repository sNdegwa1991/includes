<?php
$sql="SELECT * FROM  students WHERE email='$email'";
  $result=mysqli_query($con,$sql) or die(mysql_error());
  while($row=mysqli_fetch_array($result))
       { 
        $id=$row['stud_id'];
        $national_id=$row['national_id'];
        $p_marital_status=$row['p_marital_status'];
        $secondary_name=$row['secondary_name'];
        $eng=$row['eng'];
        $id_attachment=$row['id_attachment'];
        $kcse_slip=$row['kcse_slip'];

       }

  $sql1="SELECT * FROM  applicants WHERE stud_id='$id'";
  $result1=mysqli_query($con,$sql1) or die(mysql_error());
  $no=0;
  while($row1=mysqli_fetch_array($result1))
       { 
          $applicant_id=$row1['applicant_id'];
          $no++;
       }
?>