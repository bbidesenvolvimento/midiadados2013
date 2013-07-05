/**
 * Created with IntelliJ IDEA.
 * User: filiperp
 * Date: 04/07/13
 * Time: 01:57
 * To change this template use File | Settings | File Templates.
 */



function startGA(){
    console.log('GA STARTED');
  //  window.GA.trackerWithTrackingId("UA-41162029-1");
    //window.GA.trackView("/index");
    
 //  window.plugins.analytics.start("UA-41162029-1", function(){console.log("GA SUCCESS");}, function(){console.log("GA: failure");});
}




function trackAndroidGAEvent(category, action, label, value){
    //console.log('trackAndroidGAEvent',1,category,2, action,3, label,4, value)
   //window.GA.trackEvent(category, action, event, 1, onSuccessGAEvent,onFailGAEvent);
}

function onSuccessGAEvent(){
    alert("trackAndroidGAEvent: success");
}



function onFailGAEvent(){
    alert("trackAndroidGAEvent: FAIL");
}
