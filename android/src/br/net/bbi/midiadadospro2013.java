package br.net.bbi;

import android.app.Activity;
import android.os.Bundle;
import org.apache.cordova.*;
import android.webkit.WebSettings;
import android.webkit.WebSettings.ZoomDensity;



public class midiadadospro2013 extends DroidGap {
    /**
     * Called when the activity is first created.
     */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        super.init(); // Don't forget this, you'll get runtime error otherwise!

        // The following does the trick:
        super.appView.getSettings().setUseWideViewPort(true);
        super.appView.getSettings().setLoadWithOverviewMode(true);


      /*  super.appView.getSettings().setBuiltInZoomControls(true);

        super.appView.getSettings().setSupportZoom(true); */
      //  setContentView(R.layout.main);
        super.loadUrl("file:///android_asset/www/index.html");

        WebSettings ws = super.appView.getSettings();
        ws.setSupportZoom(true);
        ws.setBuiltInZoomControls(true);
    }
}
