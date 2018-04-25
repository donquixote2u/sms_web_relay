<?php
function geturl($url)
{
if (!$ch = curl_init()) {
    echo "Could not initialize cURL library";
       exit;
	}   
$userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);
// curl_setopt($ch, CURLOPT_TIMEOUT, 10);
// 7/11/15 change curl version select from 3 to 4, being rejected by some sites
curl_setopt($ch, CURLOPT_SSLVERSION, 4); // Force SSLv3 to fix Unknown SSL Protocol error
$html = curl_exec($ch);
if (!$html) {
	echo " cURL error number:" .curl_errno($ch);
	echo " cURL error:" . curl_error($ch);
	// exit;
	return "cURL error:" . curl_error($ch); 
}
curl_close ($ch);
return $html;
}
?>