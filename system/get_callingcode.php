<?php
// SCRIPT BY ARPANTEK
// COPYRIGHT © ITS ME ARPANTEK
// HARGAI W OK, JANGAN LO UBAH COPYRIGHT NYA

function get_client_code() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$url = 'http://ip-api.com/json/'.get_client_code();

// MEMPROSES DATA
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

// MENDAPATKAN DATA
$arpantekCodes = json_decode($data, TRUE);

$countryCode = $arpantekCodes['countryCode'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://country.io/phone.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$chresult = curl_exec($ch);
curl_close($ch);
$arpantekCallings = json_decode($chresult, true);
$arpantekCalling = '+'.$arpantekCallings[$countryCode];

echo $arpantekCalling;
?>