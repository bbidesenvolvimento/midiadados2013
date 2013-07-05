/*
 * PhoneGap is available under *either* the terms of the modified BSD license *or* the
 * MIT License (2008). See http://opensource.org/licenses/alphabetical for full text.
 *
 * Copyright (c) 2006-2011 Worklight, Ltd.  
 */

package com.phonegap.plugins.analytics;

import org.apache.cordova.api.CordovaPlugin;
import org.apache.cordova.api.PluginResult;
import org.apache.cordova.api.PluginResult.Status;
import org.json.JSONArray;
import org.json.JSONException;
import org.apache.cordova.api.CallbackContext;

import android.util.Log;

public class GoogleAnalyticsTracker extends CordovaPlugin {
	public static final String START = "start";
	public static final String TRACK_PAGE_VIEW = "trackPageView";
	public static final String TRACK_EVENT = "trackEvent";
	public static final String SET_CUSTOM_VARIABLE = "setCustomVariable";
    
	public static final int DISPATCH_INTERVAL = 20;
	private com.google.android.apps.analytics.GoogleAnalyticsTracker tracker;

	public GoogleAnalyticsTracker() {
		//tracker = new  com.google.analytics.tracking.android.Tracker() ;
		tracker = com.google.android.apps.analytics.GoogleAnalyticsTracker.getInstance();
	}
	
	@Override
    public boolean execute(String action, JSONArray data, CallbackContext callbackContext) {
		PluginResult result = null;
		if (START.equals(action)) {
			try {
				start(data.getString(0));
				result = new PluginResult(Status.OK);
			} catch (JSONException e) {
				result = new PluginResult(Status.JSON_EXCEPTION);
			}
		} else if (TRACK_PAGE_VIEW.equals(action)) {
			try {
				trackPageView(data.getString(0));
				result = new PluginResult(Status.OK);
			} catch (JSONException e) {
				result = new PluginResult(Status.JSON_EXCEPTION);
			}
		} else if (TRACK_EVENT.equals(action)) {
			try {
				trackEvent(data.getString(0), data.getString(1), data.getString(2), data.getInt(3));
				result = new PluginResult(Status.OK);
			} catch (JSONException e) {
				result = new PluginResult(Status.JSON_EXCEPTION);
			}
		} else if (SET_CUSTOM_VARIABLE.equals(action)){
			try {
				setCustomVar(data.getInt(0), data.getString(1), data.getString(2), data.getInt(3));
				result = new PluginResult(Status.OK);
			} catch (JSONException e) {
				result = new PluginResult(Status.JSON_EXCEPTION);
			}
		} else {
			result = new PluginResult(Status.INVALID_ACTION);
		}
        callbackContext.sendPluginResult(result);
        return true;
	}
	
	private void start(String accountId) {
		tracker.startNewSession(accountId, DISPATCH_INTERVAL, this.cordova.getActivity());
	}
	
	private void trackPageView(String key) {
		tracker.trackPageView(key);
	}

	private void trackEvent(String category, String action, String label, int value){
		tracker.trackEvent(category, action, label, value);
	}

	private void setCustomVar(int index, String label, String value, int scope) {
		if(scope > 0) tracker.setCustomVar(index, label, value, scope);
		else tracker.setCustomVar(index, label, value);
	}
}