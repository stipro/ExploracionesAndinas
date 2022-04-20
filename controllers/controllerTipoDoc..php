<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://ec2-3-129-187-68.us-east-2.compute.amazonaws.com:5000/api/atv/person',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "dni_query": "46879150"
}',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>