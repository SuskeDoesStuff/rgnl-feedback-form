<?php
//print_r($_POST);


$mobileNumber = (int)('91' . $_POST['mobileNumber']);


// if($_POST['mobileNumber']=='9953206495'){
// header('Location: otp.html');
// }

// Account details
$apiKey = urlencode('Nzc0MTQ5NmY3MjQ2MzM0MzMwNWEzNDRlMzA1MTRkNTM=');

// Message details
$numbers = array($mobileNumber);
$sender = urlencode('TXTLCL');
$message = rawurlencode('Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/');

$numbers = implode(',', $numbers);

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // to stop SSL error 60  : This is Dangerous , will leave vunerable to mtm attacks
$response = curl_exec($ch);

if (curl_errno($ch)) {
    // Handle cURL error
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Process your response here
    echo $response;
}
curl_close($ch);


?>
