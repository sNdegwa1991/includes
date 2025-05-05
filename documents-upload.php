<?php
if ($_POST['submit-documents-identity']) {
  $category=$_POST['doc-category'];
  date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $mytime=$date.' At '.$time;
    $countTime=$now->format('YmdHi');
    $code=rand(111111,999999);
    $email=$_SESSION['myemail'];

    // name of the uploaded file
    $filename = $code.'_'.$_FILES['identity']['name'];

    // destination of the file on the server
    $destination = 'uploads/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['identity']['tmp_name'];
    $size = $_FILES['identity']['size'];

    if (!in_array($extension, ['jpg','png','jpeg','PNG'])) {
        echo "<h6 style='color:red;'>Error!! Document not uploaded. You file must be in Image format. </h6>";
    } elseif ($_FILES['identity']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "<h6 style='color:red;'>File too large! Maximum of 2MB pdf allowed. Resize your document</h6>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
             $sql = "UPDATE students SET front_id='$filename' WHERE email='$email'";
             if ($con->query($sql) === TRUE) {
       
                echo "<h6 style='color:green;'>Identification Uploaded successifuly</h6>";
       } else {
          echo "<h6 style='color:red;'>Error updating record </h6> ";
        } 
            
       
        } else {
            echo "<h6 style='color:red;'>Failed to upload file.</h6>";
        }
    }
}
if ($_POST['submit-documents-passport']) {
  $category=$_POST['doc-category'];
  date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $mytime=$date.' At '.$time;
    $countTime=$now->format('YmdHi');
    $code=rand(111111,999999);
    $email=$_SESSION['myemail'];

    // name of the uploaded file
    $filename = $code.'_'.$_FILES['passport_img']['name'];

    // destination of the file on the server
    $destination = 'uploads/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['passport_img']['tmp_name'];
    $size = $_FILES['passport_img']['size'];

    if (!in_array($extension, ['jpg','JPG','png','PNG','jpeg','PNG'])) {
        echo "<h6 style='color:red;'>Error!! Document not uploaded. You file must be in Image format. </h6>";
    } elseif ($_FILES['identity']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "<h6 style='color:red;'>File too large! Maximum of 2MB pdf allowed. Resize your document</h6>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
             $sql = "UPDATE students SET passport='$filename' WHERE email='$email'";
             if ($con->query($sql) === TRUE) {
       
                echo "<h6 style='color:green;'>Identification Uploaded successifuly</h6>";
       } else {
          echo "<h6 style='color:red;'>Error updating record </h6> ";
        } 
            
       
        } else {
            echo "<h6 style='color:red;'>Failed to upload file.</h6>";
        }
    }
}


if ($_POST['submit-documents-leaving']) {
  $category=$_POST['doc-category'];
  date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $mytime=$date.' At '.$time;
    $countTime=$now->format('YmdHi');
    $code=rand(111111,999999);
    $email=$_SESSION['myemail'];

    // name of the uploaded file
    $filename = $code.'_'.$_FILES['leaving-img']['name'];

    // destination of the file on the server
    $destination = 'uploads/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['leaving-img']['tmp_name'];
    $size = $_FILES['leaving-img']['size'];

    if (!in_array($extension, ['jpg','JPG','png','PNG','jpeg','PNG'])) {
        echo "<h6 style='color:red;'>Error!! Document not uploaded. You file must be in Image format. </h6>";
    } elseif ($_FILES['identity']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "<h6 style='color:red;'>File too large! Maximum of 2MB pdf allowed. Resize your document</h6>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
             $sql = "UPDATE students SET leaving_certificate='$filename' WHERE email='$email'";
             if ($con->query($sql) === TRUE) {
       
                echo "<h6 style='color:green;'>Leaving Certificate Uploaded successifuly</h6>";
       } else {
          echo "<h6 style='color:red;'>Error updating record </h6> ";
        } 
            
       
        } else {
            echo "<h6 style='color:red;'>Failed to upload file.</h6>";
        }
    }
}

if ($_POST['submit-documents-kcse']) {
  date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $mytime=$date.' At '.$time;
    $countTime=$now->format('YmdHi');
    $code=rand(111111,999999);
    $email=$_SESSION['myemail'];

    // name of the uploaded file
    $filename = $code.'_'.$_FILES['kcse']['name'];

    // destination of the file on the server
    $destination = 'uploads/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['kcse']['tmp_name'];
    $size = $_FILES['kcse']['size'];

    if (!in_array($extension, ['jpg','png','jpeg','PNG'])) {
        echo "<h6 style='color:red;'>Error!! Document not uploaded. You file must be in Image formats. </h6>";
    } elseif ($_FILES['kcse']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "<h6 style='color:red;'>File too large! Maximum of 2MB pdf allowed. Resize your document</h6>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
             $sql = "UPDATE students SET  kcse_slip='$filename' WHERE email='$email'";
             if ($con->query($sql) === TRUE) {
       
                echo "<h6 style='color:green;'>KCSE Results Uploaded successifuly</h6>";
       } else {
          echo "<h6 style='color:red;'>Error updating record </h6> ";
        } 
            
       
        } else {
            echo "<h6 style='color:red;'>Failed to upload file.</h6>";
        }
    }
}

if ($_POST['submit-documents-higher']) {
  $category=$_POST['doc-category'];
  date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $mytime=$date.' At '.$time;
    $countTime=$now->format('YmdHi');
    $code=rand(111111,999999);
    $email=$_SESSION['myemail'];

    // name of the uploaded file
    $filename = $code.'_'.$_FILES['higher']['name'];

    // destination of the file on the server
    $destination = 'uploads/'.$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['higher']['tmp_name'];
    $size = $_FILES['higher']['size'];

    if (!in_array($extension, ['jpg','png','jpeg','PNG'])) {
        echo "<h6 style='color:red;'>Error!! Document not uploaded. You file must be in Image formats. </h6>";
    } elseif ($_FILES['higher']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "<h6 style='color:red;'>File too large! Maximum of 2MB pdf allowed. Resize your document</h6>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
             $sql = "UPDATE students SET  higher_attachment='$filename' WHERE email='$email'";
             if ($con->query($sql) === TRUE) {
       
                echo "<h6 style='color:green;'>Post Secondary Education Certificate Uploaded successifuly</h6>";
       } else {
          echo "<h6 style='color:red;'>Error updating record </h6> ";
        } 
            
       
        } else {
            echo "<h6 style='color:red;'>Failed to upload file.</h6>";
        }
    }
}
?>