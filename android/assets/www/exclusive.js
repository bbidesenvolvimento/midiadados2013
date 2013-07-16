/**
 * Created with IntelliJ IDEA.
 * User: filiperp
 * Date: 04/07/13
 * Time: 01:57
 * To change this template use File | Settings | File Templates.
 */



function startGA(){
   // window.plugins.analytics.start("UA-41162029-1", function(){console.log("GA SUCCESS");}, function(){console.log("GA: failure");});
}




function trackAndroidGAEvent(category, action, label, value){
  //  window.plugins.analytics.trackEvent(category, action, event, 1, onSuccessGAEvent,onFailGAEvent);
}

function onSuccessGAEvent(){
    alert("trackAndroidGAEvent: success");
}



function onFailGAEvent(){
    alert("trackAndroidGAEvent: FAIL");
}
