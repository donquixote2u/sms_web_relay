package com.example.sms_web_relay;

import android.util.Log;
import java.util.Map;
import fi.iki.elonen.NanoHTTPD;
import static com.example.sms_web_relay.SMSReceiver.*;

public class WebServer extends NanoHTTPD {

    public WebServer(int port) {
        super(port);
    }

    public WebServer(String hostname, int port) {
        super(hostname, port);
    }

    @Override
    public Response serve(IHTTPSession session) {
        String msg = "<html><body><h1>Hello server</h1>\n";
        Map<String, String> parms = session.getParms();
        Log.d("KALSMS", parms.toString());
        if (parms.get("phone_number") == null) {
            msg += "<form action='?' method='get'>\n  ";
            msg += "<p>Phone Number: <input type='text' name='phone_number'></p>\n";
            msg += "<p>Message: <input type='text' name='sms_message'></p>\n";
            msg += "<p><input type='submit'></p>\n</form>";
        } else {
            msg += "<p>message sent to:" + parms.get("phone_number") + "</p>";
            SendSMS(parms.get("phone_number"), parms.get("sms_message") );
        }
        return newFixedLengthResponse( msg + "</body></html>\n" );
    }
}
