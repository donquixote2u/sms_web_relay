# sms_web_relay
get web data via sms  ;  Android Studio Project ide; forked from kalsms, sms multipart txt functionality added<br>
sms send via http request thanks to https://github.com/lopspower/AndroidWebServer example of nanohttpd<br>

uses android phone as sms relay:

send an sms with a predefined prefix to this phone<br>
it will send http request to a (web) server  (sample php code in examples; smshttp.php),<br>
and return the response as sms txt(s) to the requesting phone<br>
http server xml response format here: https://github.com/niryariv/KalSMS/wiki/Reply-XML<br>

send an http request containing a phone # and txt msg to this phone's ip address (port 8080),<br>
it will forward the msg as sms to that phone<br>
