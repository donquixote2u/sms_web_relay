<?php
// http server for sms queries     written 18/4/18 Bruce Woolmore
$args=$_GET['msg'];
$msg = explode("\n",$args);
switch ($msg[0]) {
case "qfx": 
	{ 
	// DEBUG print("CMD=".$msg[0]."\n");
	$url="http://sharenet.otumoetaitennis.co.nz/shares/FXRates.php";
	include_once("curlgetpage.php"); // curl web page retriever
	// include_once "strip_html_tags.php"; // html stripper
	// $result=strip_html_tags(str_replace("\n","",geturl($url)));
	$page=geturl($url);						// get page
	$page=str_replace(">","> ",$page);		// inserting spaces
	$page=str_replace("<tr","\n<tr",$page);	// inserting line breaks
	// DEBUG print($page);
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