<?php
$postData = file_get_contents('php://input');

function connect()
{
    $host = 'localhost';
    $user = 'kvjiotpu_application';
    $pass = 'Application@2023';
    $db = 'kvjiotpu_application';
    $con = new mysqli($host, $user, $pass, $db);

     return $con;
}

    $result = json_decode($postData);
    $merchant_id = $result->Body->stkCallback->MerchantRequestID;
    $result_code = $result->Body->stkCallback->ResultCode;
    $result_desc = $result->Body->stkCallback->ResultDesc;
    $MpesaReceiptNumber= $result->Body->stkCallback->CallbackMetadata->Item[1]->Value;

    $sql_add = "insert into mpesa_response(`machant_id`,`response_data`) values('" . $merchant_id . "','" . json_encode($postData) . "')";
    $con = connect();
    $con->query($sql_add);


    $sql = "select phone,application_batch,amount from mpesa_request where machant_id='" . $merchant_id . "';";

    $result = $con->query($sql);

    $phone = '';
    $amount = '';
    $application_batch = '';

for($a=0;$a<$result->num_rows;$a++){
    $id = $name = '';
    $result->data_seek($a);   $phone = $result->fetch_assoc()['phone'];
    $result->data_seek($a);   $application_batch = $result->fetch_assoc()['application_batch'];
    $result->data_seek($a);   $amount =$result->fetch_assoc()['amount'];

   
  }
  // record payments
  date_default_timezone_set('Africa/Nairobi');
  $now = new DateTime();
  $payDate = $now->format('Y-m-d  H:i:s');
  if($result_desc === 'The service request is processed successfully.') {
    sendSms($phone,$result_desc, $amount,$application_batch,$MpesaReceiptNumber);
    $sql_pay = "insert into payments(`batch_code`,`mode`,`reference`,`amount`,`date`) values('".$application_batch."','Mpesa','" . $MpesaReceiptNumber . "','" . $amount . "','" . $payDate . "')";
    $con = connect();
    $con->query($sql_pay);

    $sql = "UPDATE application_batches SET payment='1' WHERE batch_code='$application_batch'";
             if ($con->query($sql) === TRUE) {
               
            } else {
                
            }
   
    
  } else {

  }


function sendSms($phone,$sms,$amount,$batch,$ref)
{
    require('AfricasTalkingGateway.php');
     $username  = "leonella1";
     $apikey    = "ba8f0f7190cd85a38a9881e566f53520e7972135d68e0e8e8e316f72a7e237e8";
    $gateway = new AfricasTalkingGateway($username, $apikey);
    $fb = 'sent';
    try {
        $message = "Dear Applicant, KES".$amount.".00 Mpesa Ref  ".$ref.", has been received by Sister Leonella Consolata Medical College. This money will be used in payment of your application number. ".$batch." Thanks";
        $results = $gateway->sendMessage($phone, $message,'SLCMC');
    } catch (AfricasTalkingGatewayException $e) {
        $fb = 'unsent';
    }
    return $fb;
}
?>
