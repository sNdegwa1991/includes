<?php
include 'student-data.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $course_id=$data[0];
    //--------------------------------get application code and intake
  $sqlbatch="SELECT * FROM  application_batches WHERE student_id='$id'";
  $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
  while($rowb=mysqli_fetch_array($resultbatch))
       { 
        $incode=$rowb['batch_code'];
        $intake_id=$rowb['intake_id'];
      }

      $code=$incode;
      
//.........................Check number if same course have been applied, this intake.
  $sqlnum="SELECT * FROM  applicants WHERE stud_id = '$id' AND course_id = '$course_id' AND intake_id = '$intake_id'";
  $resultnum=mysqli_query($con,$sqlnum) or die(mysql_error());
  while($rownum=mysqli_fetch_array($resultnum))
       { 
        $courseCheck=$rownum['course_id'];
      }
//........................Get course category
  $sqlcat="SELECT * FROM courses WHERE  course_id = '$course_id'";
  $resultcat=mysqli_query($con,$sqlcat) or die(mysql_error());
  while($rowcat=mysqli_fetch_array($resultcat))
       { 
        $course_cat=$rowcat['cat_id'];
      }      
 //...................Check courses applied for this intake.
 $sql="SELECT * FROM applicants INNER JOIN courses ON applicants.course_id=courses.course_id WHERE applicants.stud_id='$id' AND courses.cat_id='$course_cat'";
  $result=mysqli_query($con,$sql) or die(mysql_error());
  $totalCourses=0;
  while($row=mysqli_fetch_array($result))
       { 
       $cide=$row['applicant_id'];
        $totalCourses++;
       }      
   if(empty($courseCheck) == true)
      {
    if($totalCourses != 0)
    {
       echo "maximum";
    }else {
      $sql1ap = "INSERT INTO `applicants` (`stud_id`,`batch_id`,`course_id`,`intake_id`, `date_applied`, `status`, `comment`) VALUES ('$id','$code','$course_id','$intake_id','$date','0','Pending...')";     
       if (!mysqli_query($con,$sql1ap)) {
                                 
               echo 'error';
           }                          
             else
             {
                 echo "success";
             }    

       }   
          
      } else {
        echo "Applied";
      }

?>