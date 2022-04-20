<?php
header('Content-type: application/json; charset=utf-8');
if($_POST){
    $dni = json_decode($_POST['data'],true);
    $rptController = 'Se recibio datos en POST';
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero='.$dni,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    /* $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiperu.dev/api/ruc/20508268051?api_token=0d53e5edb39733c8195ede1fe0625e595676eeea145c779c055a4aed70dd9ebb",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        } */
}
elseif($_GET){
    $rptController = 'Se recibio datos en GET';
}
else{
    $rptController = 'no se recibio datos';
}
//echo $rptController;
?>