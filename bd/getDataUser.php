<?php
if ($_GET['option'] == 'gettoken') {
    try {
        echo file_get_contents('https://sns-intranet-imp.azurewebsites.net/token?key=' . $_GET['key']);
    } catch (\Throwable $th) {
        echo "Hubo un problema";
    }
} elseif ($_POST['option'] == 'getdatos') {
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sns-intranet-imp.azurewebsites.net/personas/info?cd=' . $_POST['cd'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_POST['token']
            ),
        ));

        echo curl_exec($curl);
        curl_close($curl);
    } catch (\Throwable $th) {
        echo "Hubo un problema";
    }
}
