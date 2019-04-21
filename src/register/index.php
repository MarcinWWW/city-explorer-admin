<?php 
/*
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo "LINK = " .  $link;

echo "<br>" . $_SERVER[HTTP_HOST];
echo "<br>" . $_SERVER[REQUEST_URI];

$tokenPos = strpos($_SERVER[REQUEST_URI], "register/?token=") + 16;
$uri = $_SERVER[REQUEST_URI];
$uriLength = strlen($uri);
$token = substr($_SERVER[REQUEST_URI], $tokenPos, $uriLength);

echo "<br>tokenPos = " . $tokenPos;
echo "<br>uriLength = " . $uriLength;
echo "<br>uriLength = " . $uriLength;
echo "<br>token = " . $token;
*/

session_start();

$tokenPos = strpos($_SERVER[REQUEST_URI], "register/?token=") + 16;
$uri = $_SERVER[REQUEST_URI];
$token = substr($_SERVER[REQUEST_URI], $tokenPos, strlen($uri));

$url = "https://edu-cityexplorer.herokuapp.com/register/registrationConfirm?token=" . $token;

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_COOKIESESSION,false);
curl_setopt($ch,CURLOPT_POST,false);
curl_setopt($ch,CURLOPT_HTTPGET,true);
curl_setopt($ch,CURLOPT_HEADER,true);
curl_setopt($ch,CURLINFO_HEADER_OUT,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$header = curl_exec($ch);
//$headerOut = curl_getinfo($ch,CURLINFO_HEADER_OUT);
$headerCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
//$adminJson = json_decode($admin, true);


echo "<br>token = " . $token;
echo "<br>uri = " . $uri;
echo "<br>tokenPos = " . $tokenPos;
echo "<br>HEADER: " . $header;
echo "<br><br>";
echo "<br>HEADER_OUT: " . $headerOut;
echo "<br><br>";
echo "<br>HEADER_CODE: " . $headerCode;
echo "<br><br>";

//include($_SERVER['DOCUMENT_ROOT'] . "/index.php");
//header("location: https://cityexplorer.000webhostapp.com/");
?>