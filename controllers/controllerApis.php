<?php
header('Content-type: application/json; charset=utf-8');
if($_POST){
    $rptController = 'Se recibio datos en POST';
    $arrayForm = json_decode($_POST['data'],true);
    $accion = $arrayForm['accion'];
    //Inicia sesión cURL
    $curl = curl_init();
    switch ($accion) {
        case 'get_dniNombres':
            $dni = $arrayForm['data'];
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
            /*// API OBTENER NOMBRES (https://api.apis.net.pe/)
            $curl = curl_init();
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
    
            break;
        case 'get_generoNombre':
            // API PARA IDENTIFICAR GENERO (https://gender-api.com/)
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gender-api.com/get-stats?&key=6ERMRWSlbWGQthZqRNgK3C9BNu5RHwvPkJxy',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
            break;
        case 'get_statusGender':
            // API PARA IDENTIFICAR GENERO (https://gender-api.com/)
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gender-api.com/get-stats?&key=6ERMRWSlbWGQthZqRNgK3C9BNu5RHwvPkJxy',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
            break;
        default:
            
    }
}
elseif($_GET){
    $rptController = 'Se recibio datos en GET';
}
else{
    $rptController = 'no se recibio datos';
}
//echo $rptController;
?>