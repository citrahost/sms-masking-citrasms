<?php 
#Kirim SMS dengan SMS Masking Citrasms#
$no=$_POST['telepon'];
$sms=$_POST['sms'];

$oth=""; // Outh key bisa digenerate pada halaman API
$sec=""; // Secret key bisa digenerate pada halaman API
$url = "https://sms.citrahost.com/citra-sms.api.php?action=send&outhkey=".$oth."&secret=".$sec."&pesan=".urlencode($sms)."&to=".$no."";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_URL, $url);
$results = curl_exec($curl);
curl_close($curl);
$hasil=explode("|",$results);
if(strtolower($hasil[0])=='success'){
header("location:index.php?status=success");
}else{
header("location:index.php?status=error");
}
?>