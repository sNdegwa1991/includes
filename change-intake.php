<?php
require '../core/init.php';

	$json = $_POST['data'];
	$data = json_decode($json);

	$intakeId = $data[0];
    $batch = $data[1];
    
     $sql = "UPDATE application_batches SET `intake_id`='$intakeId' WHERE batch_code='$batch'";
    if ($con->query($sql) === TRUE) {
      echo "success";
    } else {
       echo "error";
    }
	 
?>