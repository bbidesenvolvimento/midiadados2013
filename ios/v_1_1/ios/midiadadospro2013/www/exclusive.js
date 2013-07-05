/**
 * Created with IntelliJ IDEA.
 * User: filiperp
 * Date: 04/07/13
 * Time: 01:57
 * To change this template use File | Settings | File Templates.
 */



function startGA(){
    console.log('GA STARTED')
    ga_storage._setAccount('UA-42254608-1'); //Replace with your own
    ga_storage._trackPageview('/index.html');
 //  window.plugins.analytics.start("UA-42254608-1", function(){console.log("GA SUCCESS");}, function(){console.log("GA: failure");});
}




function trackAndroidGAEvent(category, action, label, value){
    ga_storage._trackEvent('trackAndroidGAEvent',1,category,2, action,3, label,4, value)
 //   window.plugins.analytics.trackEvent(category, action, event, 1, onSuccessGAEvent,onFailGAEvent);
}

function onSuccessGAEvent(){
    alert("trackAndroidGAEvent: success");
}



function onFailGAEvent(){
    alert("trackAndroidGAEvent: FAIL");
}
