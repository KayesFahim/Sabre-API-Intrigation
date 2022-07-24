<?php

//Fly Far Z01K
$client_id= base64_encode("V1:username:PCC:AA");
$client_secret = base64_encode("password");

$token = base64_encode($client_id.":".$client_secret);
$data='grant_type=client_credentials';

    $headers = array(
        'Authorization: Basic '.$token,
        'Accept: /',
        'Content-Type: application/x-www-form-urlencoded'
    );

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://api-crt.cert.havail.sabre.com/v2/auth/token");
    //curl_setopt($ch,CURLOPT_URL,"https://api.havail.sabre.com/v2/auth/token");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);
    $resf = json_decode($res,1);
    $access_token = $resf['access_token']; // token provided from sabre
   // print_r($access_token);

   $authtoken = fopen("token.txt", "w") or die ("Unable to open file!");;
    fwrite($authtoken, $access_token);
    fclose($authtoken);
?>