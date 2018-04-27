<?php
// sample http server for sms queries     written 18/4/18 Bruce Woolmore
// sample url request: http://somedomain.com/smshttp.php?msg=qfx
$args=$_GET['msg'];
$msg = explode("\n",$args);
switch ($msg[0]) {
case "qfx": // put your code case statement here (with prefix as specified by android relay pgm, in this case "q")
	{ 
	// DEBUG print("CMD=".$msg[0]."\n");
	$url="http://somedomain.com/FXRates.php"; // go get this web page
	include_once("curlgetpage.php"); // curl web page retriever (see separate module)
	$page=geturl($url);						// get page, next two lines do some formatting
	$page=str_replace(">","> ",$page);		// inserting spaces
	$page=str_replace("<tr","\n<tr",$page);	// inserting line breaks
	// DEBUG print($page);                  // uncomment to show page
	$result=strip_tags($page);				// strip html tags from formatting
	break; 
	}
default: 
	{$result="INVALID COMMAND";}
}
print("<reply><sms-to-sender>");
print $result;
print("</sms-to-sender></reply>");
?>