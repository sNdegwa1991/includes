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
        $passport=$row['passport'];
        $leaving=$row['leaving_certificate'];
       }
    $d1=0;
    $d2=0;
  ?>
<form action="" id="document-data-form" method="POST" name="document_form" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12">
<div>
<h4 class="btn btn-info" style="width:100%">SECTION D: Documents Attachment</h4>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<h6>Choose document and upload it bellow one by one(Must be Image format)</h6>

</div>
  
</div>
<div class="row">
<div class="col-sm-12">
ID/Birth Certificate*
</div>
</div>
<div class="row">
<div class="col-sm-12">

<?php
if (empty($id_attachment) == true) {
 ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/noimage.jpg" style="height:30px;"></div>
  </span>
  <input type="file" name="identity" class="form-control">
  <input type="submit" name="submit-documents-identity" id="sub" class="btn btn-secondary" value="Upload" style="height:40px;">
  </div>
 <?php
} else {
?>
 <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/<?php echo $id_attachment;?>" style="height:30px;"></div>
  </span>
  <input type="file" name="identity1" class="form-control">
   <button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> OK</button>
  </div>
<?php
}
?>

</div>
</div>

 <div class="row">
<div class="col-sm-12">
Photo Passport(Attach your photo maximu size 1MB)*
</div>
</div>
<div class="row">
<div class="col-sm-12">

<?php
if (empty($passport) == true) {
 ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/noimage.jpg" style="height:30px;"></div>
  </span>
  <input type="file" name="passport_img" class="form-control">
  <input type="submit" name="submit-documents-passport" id="sub" class="btn btn-secondary" value="Upload" style="height:40px;">
  </div>
 <?php
} else {
?>
 <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/<?php echo $passport;?>" style="height:30px;"></div>
  </span>
  <input type="file" name="passport_upload" class="form-control">
   <button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> OK</button>
  </div>
<?php
}
?>

</div>
</div>

<br>
<div class="row">
<div class="col-sm-12">
KCSE Certificate/Results Slip*
</div>
</div>
<div class="row">
<div class="col-sm-12">
 <?php
 if (empty($kcse_slip) == true) {
   ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/noimage.jpg" style="height:30px;"></div>
  </span>
  <input type="file" name="kcse" class="form-control"  >
 <input type="submit" name="submit-documents-kcse" id="sub" class="btn btn-secondary" value="Upload" style="height:40px;">
  </div>
   <?php
 } else {
  ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/<?php echo $kcse_slip;?>" style="height:30px;"></div>
  </span>
  <input type="file" name="kcse1" class="form-control">
 <button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> OK</button>
  </div>
  <?php

 }
 ?>
</div>
</div>

<br>
<div class="row">
<div class="col-sm-12">
Secondary Leaving Certificate*
</div>
</div>
<div class="row">
<div class="col-sm-12">
 <?php
 if (empty($leaving) || $leaving === 'no') {
   ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/noimage.jpg" style="height:30px;"></div>
  </span>
  <input type="file" name="leaving-img" class="form-control"  >
 <input type="submit" name="submit-documents-leaving" id="leaving-img" class="btn btn-secondary" value="Upload" style="height:40px;">
  </div>
   <?php
 } else {
  ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/<?php echo $leaving;?>" style="height:30px;"></div>
  </span>
  <input type="file" name="leaving1" class="form-control">
 <button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> OK</button>
  </div>
  <?php

 }
 ?>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
Post Secondary Certificate (If available)
</div>
</div>
<div class="row">
<div class="col-sm-12">
<?php
if (empty($higher_attachment) || $higher_attachment === 'no') {
 ?>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/noimage.jpg" style="height:30px;"></div>
  </span>
  <input type="file" name="higher" class="form-control">
 <input type="submit" name="submit-documents-higher" id="sub" class="btn btn-secondary" value="Upload" style="height:40px;">
  </div>
 <?php
} else {
?>
<div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><img src="./uploads/<?php echo $higher_attachment;?>" style="height:30px;"></div>
  </span>
  <input type="file" name="higher1" class="form-control">
  <button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> OK</button>
  </div>
<?php
}

?>

</div>
</div>

<div class="row">
<div class="col-sm-12">
<br><br>
</div>
</div>
</form>
<button class="btn btn-success" id="submit-all-documents"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit All Attachments</button>
<script>
  $(function(){
     $("#submit-all-documents").click(function(){
      $.get("includes/check-documents.php",function(data,status){
        if(data === 'incomplete')
        {
          Toastify({ 
                    text: "Error!\n Please attach ID/Birth Certificate, KCSE Certificate/Results Slip and Leaving Certificate.",
                    duration: 6000,
                    className: "danger",
                   style: {
                       background: "linear-gradient(to right, #F6182B, #96c93d)",
                     }
                }).showToast();
        } else {
          if(data === 'success')
          {
           
            document.location.href='./';
          
          } else {
            Toastify({ 
                    text: "Error!\n Unable to submit documents\n Kindly check your internet",
                    duration: 6000,
                    className: "danger",
                   style: {
                       background: "linear-gradient(to right, #F6182B, #96c93d)",
                     }
                }).showToast();
          }
        }
      });
    });
     });
</script>