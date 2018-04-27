# sms_web_relay
get web data via sms  ;  Android Studio Project ide; forked from kalsms, sms multipart txt functionality added<br>
sms send via http request thanks to https://github.com/lopspower/AndroidWebServer example of nanohttpd<br>

uses android phone as sms relay:

SMS QUERY OF WEB PAGE
send an sms with a predefined prefix to this phone<br>
it will send http request to a (web) server  (sample php code in examples; smshttp.php),<br>
and return the response as sms txt(s) to the requesting phone<br>
e.g. "http://somedomain.com/smshttp.php?msg=qfx"
gets response "<reply><sms-to-sender>FX Rates  (etc etc)  </sms-to-sender></reply>"

more on http server xml response format here: https://github.com/niryariv/KalSMS/wiki/Reply-XML<br>

SMS MESSAGE VIA WEB URL
send an http request containing a phone # and txt msg to this phone's ip address(specified port),<br>
e.g. "http://192.168.0.100:8080/?phone_number=123456&sms_message=Hello!"
it will forward the msg as sms to that phone<br>
