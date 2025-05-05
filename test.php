<?php
  include 'student-data.php';
//$orderId = (isset($_GET['id']) ? $_GET['id']: '');
 $userId = $id;


class MpesaApi
{

    public function getAccessToken()
    {
         //---------------------------------from developer test
        // $consumerKey = 'QpdbeP2J5c1CUwJwWc534A15AxQVsWuH';
        // $consumerSecret = 'bwJAQT43nP41GxHo';
        
        $consumerKey = 'kvdQVed5DcpkKwcxOkAVP7buUevtXGlI';
        $consumerSecret = '1uvd8jAhyQvVKon6';

        $headers = ['Content-Type:application/json; charset=utf8'];

        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl_init = curl_init($url);
        curl_setopt($curl_init, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl_init, CURLOPT_HEADER, FALSE);
        curl_setopt($curl_init, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);

        $result = curl_exec($curl_init);
        $result = json_decode($result);

        $access_token = $result->access_token;
        curl_close($curl_init);
        return $access_token;
    }

    public function makeStk($phone, $amount, $order)
    {
        //  remove 07 for those that come with it

        if (substr($phone, 0, 2) == "07" || substr($phone, 0, 2) == "01") {
        $endphone = substr($phone, 2);
        $phone='2547'.$endphone;
        } else if (substr($phone, 0, 4) == "+2547" || substr($phone, 0, 4) == "+2541") {
            $endphone = substr($phone, 5);
            $phone='2547'.$endphone;
           
        }

        // $merchant_id = "174379";
        // $callback_url = "http://qwiqsoko.com/cos-app/applicant-dashboard/includes/mpesa_callback.php";
        // $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        
         $merchant_id = "339327";
        $callback_url = "https://qwiqsoko.com/cos-app/applicant-dashboard/includes/mpesa_callback.php";
        $passkey = "e538f9080a2d7f0283eecb6ca3f991b8626531a8f90fc7eba17353c6a0e98599";
        
        // $merchant_id = "339327";
        // $callback_url = "http://qwiqsoko.com/cos-app/applicant-dashboard/includes/mpesa_callback.php";
        // $passkey = "e538f9080a2d7f0283eecb6ca3f991b8626531a8f90fc7eba17353c6a0e98599";
        $account_reference = ' As '.$order;
        $transaction_description = 'Pay for app: ' . $order;

        $timestamp = date("YmdHis");
        $password = base64_encode($merchant_id . $passkey . $timestamp);

        $access_token = $this->getAccessToken();

        $curl = curl_init();
        $endpoint_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        curl_setopt($curl, CURLOPT_URL, $endpoint_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token)); //setting custom header

        $curl_post_data = array(
            'BusinessShortCode' => $merchant_id,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone,
            'PartyB' => $merchant_id,
            'PhoneNumber' => $phone,
            'CallBackURL' => $callback_url,
            'AccountReference' => $account_reference,
            'TransactionDesc' => $transaction_description
        );

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return $curl_response;
    }
}



function connect()
{
    $host = 'localhost';
    $user = 'kvjiotpu_application';
    $pass = 'Application@2023';
    $db = 'kvjiotpu_application';
    $con = new mysqli($host, $user, $pass, $db);

    return $con;
}

    $amount = $balance;
    $order = $incode;

    if ($amount <= 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid amount supplied'
        ]);
    } else {
        $api = new MpesaApi;
        $content = $api->makeStk($phone, $amount, $order);
        $content = json_decode($content);
        
        $con = connect();
        $sql = "insert into mpesa_request(`phone`,`application_batch`,`machant_id`,`amount`,`request_data`) values('". $phone . "','".$order."','" . $content->MerchantRequestID . "','" . $amount . "','" . json_encode($content) . "')";
        $con->query($sql) or die("Mysql error" . $sql);
        if ($content->ResponseCode == '0') {
             echo 'success';
           
        } else {
            echo 'error';
        
        }
    }

